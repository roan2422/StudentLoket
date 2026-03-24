<?php

require_once 'enum.inc.php';

function checkticketdata($conn, $ticket)
{
    if (empty(trim($ticket['title']))) {
        throw new Exception("Titel mag niet leeg zijn");
    }

    if (empty(trim($ticket['description']))) {
        throw new Exception("Beschrijving mag niet leeg zijn");
    }

    if (isset($ticket['priority'])) {
        $trimmed = trim($ticket['priority']);
        if (!in_array($trimmed, getEnumOptions($conn, 'tickets', 'priority'))) {
            throw new Exception("Prioriteit is niet geldig");
        }
    } else {
        $ticket['priority'] = "Geen";
    }

    if (isset($ticket['status'])) {
        $trimmed = trim($ticket['status']);
        if (!in_array($trimmed, getEnumOptions($conn, 'tickets', 'status'))) {
            throw new Exception("Status is niet geldig");
        }
    } else {
        $ticket['status'] = "Open";
    }

    if (empty(trim($ticket['school']))) {
        throw new Exception("School mag niet leeg zijn");
    }

    if (empty(trim($ticket['maker']))) {
        throw new Exception("Maker mag niet leeg zijn");
    }

    return $ticket;
}

function addticket($conn, $ticket)
{
    try {
        $checkedticket = checkticketdata($conn, $ticket);
        $query = $conn->prepare("INSERT INTO tickets (title, description, priority, creationdate, status, schoolid, makerid, assigneeid, notes) VALUES (:title, :description, :priority, now(), :status, :schoolid, :makerid, :assigneeid, :notes)");
        $query->bindParam(':title', $checkedticket["title"], PDO::PARAM_STR);
        $query->bindParam(':description', $checkedticket["description"], PDO::PARAM_STR);
        $query->bindParam(':priority', $checkedticket["priority"], PDO::PARAM_STR);
        $query->bindParam(':status', $checkedticket["status"], PDO::PARAM_STR);
        $query->bindParam(':schoolid', $checkedticket["school"], PDO::PARAM_INT);
        $query->bindParam(':makerid', $checkedticket["maker"], PDO::PARAM_INT);
        $query->bindParam(':assigneeid', $checkedticket["assignee"], PDO::PARAM_INT);
        $query->bindParam(':notes', $checkedticket["notes"], PDO::PARAM_STR);
        $query->execute();
    } catch (Exception $e) {
        echo "<p>Error: " . $e->getMessage() . "</p>";
    }
}

function editticket($conn, $ticket)
{
    try {
        $checkedticket = checkticketdata($conn, $ticket);
        $query = $conn->prepare("UPDATE tickets SET title=:title, description=:description, priority=:priority, creationdate=:creationdate, status=:status, schoolid=:schoolid, makerid=:makerid, assigneeid=:assigneeid, notes=:notes WHERE ticketid=:ticketid");
        $query->bindParam(':title', $checkedticket["title"], PDO::PARAM_STR);
        $query->bindParam(':description', $checkedticket["description"], PDO::PARAM_STR);
        $query->bindParam(':priority', $checkedticket["priority"], PDO::PARAM_STR);
        $query->bindParam(':creationdate', $checkedticket["creationdate"], PDO::PARAM_STR);
        $query->bindParam(':status', $checkedticket["status"], PDO::PARAM_STR);
        $query->bindParam(':schoolid', $checkedticket["school"], PDO::PARAM_INT);
        $query->bindParam(':makerid', $checkedticket["maker"], PDO::PARAM_INT);
        $query->bindParam(':assigneeid', $checkedticket["assignee"], PDO::PARAM_INT);
        $query->bindParam(':notes', $checkedticket["notes"], PDO::PARAM_STR);
        $query->bindParam(':ticketid', $checkedticket['ticketid'], PDO::PARAM_INT);
        $query->execute();
    } catch (Exception $e) {
        echo "<p>Error: " . $e->getMessage() . "</p>";
    }
}

function deleteticket($conn, $id)
{
    try {
        $query = $conn->prepare("DELETE FROM tickets WHERE ticketid=:ticketid");
        $query->bindParam(':ticketid', $id, PDO::PARAM_INT);
        $query->execute();
    } catch (Exception $e) {
        echo "<p>Error: " . $e->getMessage() . "</p>";
    }
}

function deleteticketsbyschool($conn, $schoolid)
{
    try {
        $query = $conn->prepare("DELETE FROM tickets WHERE schoolid=:schoolid");
        $query->bindParam(':schoolid', $schoolid, PDO::PARAM_INT);
        $query->execute();
    } catch (Exception $e) {
        echo "<p>Error: " . $e->getMessage() . "</p>";
    }
}

function getticket($conn, $id)
{
    try {
        $query = $conn->prepare("SELECT * FROM tickets WHERE ticketid=:ticketid");
        $query->bindParam(':ticketid', $id, PDO::PARAM_INT);
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        echo "<p>Error: " . $e->getMessage() . "</p>";
    }
}

function gettickets($conn)
{
    try {
        $query = $conn->prepare("SELECT t.title, t.description, t.priority, t.creationdate, t.status, s.schoolname, u.name AS maker, us.name AS assignee FROM tickets t
LEFT JOIN schools s ON t.schoolid = s.schoolid
LEFT JOIN users u ON t.makerid = u.userid
LEFT JOIN users us ON t.assigneeid = us.userid;");
        $query->execute();
        return $query->fetchAll();
    } catch (Exception $e) {
        echo "<p>Error: " . $e->getMessage() . "</p>";
    }
}

function searchtickets($conn, $args)
{
    try {
        $query = $conn->prepare("SELECT t.title, t.description, t.priority, t.creationdate, t.status, s.schoolname, u.name AS maker, us.name AS assignee FROM tickets t
LEFT JOIN schools s ON t.schoolid = s.schoolid
LEFT JOIN users u ON t.makerid = u.userid
LEFT JOIN users us ON t.assigneeid = us.userid
WHERE (t.title LIKE :search OR t.description LIKE :search)
AND t.priority LIKE :priority
AND t.status LIKE :status");
        $search = "%" . $args['search'] . "%";
        $priority = "%" . $args['priority'] . "%";
        $status = "%" . $args['status'] . "%";
        $query->bindParam(':search', $search, PDO::PARAM_STR);
        $query->bindParam(':priority', $priority, PDO::PARAM_STR);
        $query->bindParam(':status', $status, PDO::PARAM_STR);
        $query->execute();
        return $query->fetchAll();
    } catch (Exception $e) {
        echo "<p>Error: " . $e->getMessage() . "</p>";
    }
}