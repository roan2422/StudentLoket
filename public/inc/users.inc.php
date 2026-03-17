<?php

function checkuserdata($conn, $user)
{
    if (empty(trim($user['firstname']))) {
        throw new Exception("Voornaam mag niet leeg zijn");
    }

    if (empty(trim($user['lastname']))) {
        throw new Exception("Achternaam mag niet leeg zijn");
    }

    if (!empty(trim($user['email']))) {
        if (!filter_var($user['email'], FILTER_VALIDATE_EMAIL)) {
            throw new Exception("Email is niet geldig");
        }

        if (!isset($user['userid'])) {
            $query = $conn->prepare("SELECT * FROM users where email=:email");
            $query->bindParam(':email', $user['email'], PDO::PARAM_STR);
        } else {
            $query = $conn->prepare("SELECT * FROM users where email=:email AND userid!=:userid");
            $query->bindParam(':email', $user['email'], PDO::PARAM_STR);
            $query->bindParam(':userid', $user['userid'], PDO::PARAM_INT);
        }
        $query->execute();
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $email = $query->fetch();
        if ($email !== false) {
            throw new Exception("Email is al in gebruik");
        }
    } else {
        throw new Exception("Email mag niet leeg zijn");
    }
}

function adduser($conn, $user)
{
    try {
        checkuserdata($conn, $user);
        $query = $conn->prepare("INSERT INTO users (firstname, infix, lastname, email) VALUES (:firstname, :infix, :lastname, :email)");
        $query->bindParam(':firstname', $user["firstname"], PDO::PARAM_STR, 255);
        $query->bindParam(':infix', $user["infix"], PDO::PARAM_STR, 255);
        $query->bindParam(':lastname', $user["lastname"], PDO::PARAM_STR, 255);
        $query->bindParam(':email', $user["email"], PDO::PARAM_STR, 255);
        $query->execute();
    } catch (Exception $e) {
        echo "<p>Error: " . $e->getMessage() . "</p>";
    }
}

function edituser($conn, $user)
{
    try {
        checkuserdata($conn, $user);
        $query = $conn->prepare("UPDATE users SET firstname=:firstname, infix=:infix, lastname=:lastname, email=:email WHERE userid=:userid");
        $query->bindParam(':firstname', $user["firstname"], PDO::PARAM_STR, 255);
        $query->bindParam(':infix', $user["infix"], PDO::PARAM_STR, 255);
        $query->bindParam(':lastname', $user["lastname"], PDO::PARAM_STR, 255);
        $query->bindParam(':email', $user["email"], PDO::PARAM_STR, 255);
        $query->bindParam(':userid', $user['userid'], PDO::PARAM_INT);
        $query->execute();
    } catch (Exception $e) {
        echo "<p>Error: " . $e->getMessage() . "</p>";
    }
}

function deleteuser($conn, $id)
{
    try {
        $query = $conn->prepare("DELETE FROM users WHERE userid=:userid");
        $query->bindParam(':userid', $id, PDO::PARAM_INT);
        $query->execute();
    } catch (Exception $e) {
        echo "<p>Error: " . $e->getMessage() . "</p>";
    }
}

function getuser($conn, $id)
{
    try {
        $query = $conn->prepare("SELECT * FROM users WHERE userid=:userid");
        $query->bindParam(':userid', $id, PDO::PARAM_INT);
        $query->execute();
        $fetcheduser = $query->fetch(PDO::FETCH_ASSOC);
        return $fetcheduser;
    } catch (Exception $e) {
        echo "<p>Error: " . $e->getMessage() . "</p>";
    }
}

function getusers($conn)
{
    try {
        $query = $conn->prepare("SELECT * FROM users");
        $query->execute();
        $fetchedusers = $query->fetchAll(PDO::FETCH_ASSOC);
        return $fetchedusers;
    } catch (Exception $e) {
        echo "<p>Error: " . $e->getMessage() . "</p>";
    }
}
