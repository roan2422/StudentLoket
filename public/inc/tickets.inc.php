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

    if (!empty(trim($ticket['category']))) {
        if (!in_array($ticket['category'], getEnumOptions($conn, 'tickets', 'category'))) {
            throw new Exception("Categorie is niet geldig");
        }
    } else {
        $ticket['category'] = "Overig";
    }

    if (!empty(trim($ticket['status']))) {
        if (!in_array($ticket['status'], getEnumOptions($conn, 'tickets', 'status'))) {
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
}

function addticket($conn, $ticket)
{
    try {
        checkticketdata($conn, $ticket);
        $query = $conn->prepare("INSERT INTO tickets (title, description, category, creationdate, status, schoolid, makerid, assigneeid, notes) VALUES (:title, :description, :category, :creationdate, :status, :schoolid, :makerid, :assigneeid, :notes)");
        $query->bindParam(':title', $ticket["title"], PDO::PARAM_STR);
        $query->bindParam(':description', $ticket["description"], PDO::PARAM_STR);
        $query->bindParam(':category', $ticket["category"], PDO::PARAM_STR);
        $query->bindParam(':creationdate', $ticket["creationdate"], PDO::PARAM_STR);
        $query->bindParam(':status', $ticket["status"], PDO::PARAM_STR);
        $query->bindParam(':schoolid', $ticket["school"], PDO::PARAM_INT);
        $query->bindParam(':makerid', $ticket["maker"], PDO::PARAM_INT);
        $query->bindParam(':assigneeid', $ticket["assignee"], PDO::PARAM_INT);
        $query->bindParam(':notes', $ticket["notes"], PDO::PARAM_STR);
        $query->execute();
    } catch (Exception $e) {
        echo "<p>Error: " . $e->getMessage() . "</p>";
    }
}

function editticket($conn, $ticket)
{
    try {
        checkticketdata($conn, $ticket);
        $query = $conn->prepare("UPDATE tickets SET title=:title, description=:description, category=:category, creationdate=:creationdate, status=:status, schoolid=:schoolid, makerid=:makerid, assigneeid=:assigneeid, notes=:notes WHERE ticketid=:ticketid");
        $query->bindParam(':title', $ticket["title"], PDO::PARAM_STR);
        $query->bindParam(':description', $ticket["description"], PDO::PARAM_STR);
        $query->bindParam(':category', $ticket["category"], PDO::PARAM_STR);
        $query->bindParam(':creationdate', $ticket["creationdate"], PDO::PARAM_STR);
        $query->bindParam(':status', $ticket["status"], PDO::PARAM_STR);
        $query->bindParam(':schoolid', $ticket["school"], PDO::PARAM_INT);
        $query->bindParam(':makerid', $ticket["maker"], PDO::PARAM_INT);
        $query->bindParam(':assigneeid', $ticket["assignee"], PDO::PARAM_INT);
        $query->bindParam(':notes', $ticket["notes"], PDO::PARAM_STR);
        $query->bindParam(':ticketid', $ticket['ticketid'], PDO::PARAM_INT);
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
        $query = $conn->prepare("SELECT * FROM tickets");
        $query->execute();
        return $query->fetchAll();
    } catch (Exception $e) {
        echo "<p>Error: " . $e->getMessage() . "</p>";
    }
}
