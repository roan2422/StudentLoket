<?php

require_once 'enum.inc.php';

function checkaccountdata($conn, $account)
{
    if (!empty($account['password'])) {
        if (strlen($account['password']) < 8) {
            throw new Exception("Wachtwoord moet minimaal 8 tekens lang zijn");
        }
    } else {
        throw new Exception("Wachtwoord mag niet leeg zijn");
    }

    if (!empty(trim($account['role']))) {
        if (!in_array($account['role'], getEnumOptions($conn, 'accounts', 'role'))) {
            throw new Exception("Rol is niet geldig");
        }
    } else {
        $account['role'] = "standaard";
    }

    if (empty(trim($account['userid']))) {
        throw new Exception("User ID mag niet leeg zijn");
    }
}

function addaccount($conn, $account)
{
    try {
        checkaccountdata($conn, $account);
        $query = $conn->prepare("INSERT INTO accounts (userid, password, role) VALUES (:userid, :password, :role)");
        $query->bindParam(':userid', $account["userid"], PDO::PARAM_INT);
        $query->bindParam(':password', $account["password"], PDO::PARAM_STR);
        $query->bindParam(':role', $account["role"], PDO::PARAM_STR);
        $query->execute();
    } catch (Exception $e) {
        echo "<p>Error: " . $e->getMessage() . "</p>";
    }
}

function editaccount($conn, $account)
{
    try {
        checkaccountdata($conn, $account);
        $query = $conn->prepare("UPDATE accounts SET password=:password, role=:role, userid=:userid WHERE accountid=:accountid");
        $query->bindParam(':password', $account["password"], PDO::PARAM_STR);
        $query->bindParam(':role', $account["role"], PDO::PARAM_STR);
        $query->bindParam(':userid', $account['userid'], PDO::PARAM_INT);
        $query->bindParam(':accountid', $account['accountid'], PDO::PARAM_INT);
        $query->execute();
    } catch (Exception $e) {
        echo "<p>Error: " . $e->getMessage() . "</p>";
    }
}

function deleteaccount($conn, $id)
{
    try {
        $query = $conn->prepare("DELETE FROM accounts WHERE accountid=:accountid");
        $query->bindParam(':accountid', $id, PDO::PARAM_INT);
        $query->execute();
    } catch (Exception $e) {
        echo "<p>Error: " . $e->getMessage() . "</p>";
    }
}

function getaccount($conn, $id)
{
    try {
        $query = $conn->prepare("SELECT * FROM accounts WHERE accountid=:accountid");
        $query->bindParam(':accountid', $id, PDO::PARAM_INT);
        $query->execute();
        $fetchedaccount = $query->fetch(PDO::FETCH_ASSOC);
        return $fetchedaccount;
    } catch (Exception $e) {
        echo "<p>Error: " . $e->getMessage() . "</p>";
    }
}

function getaccounts($conn)
{
    try {
        $query = $conn->prepare("SELECT * FROM accounts");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        echo "<p>Error: " . $e->getMessage() . "</p>";
    }
}

function connectaccountwithschool($conn, $accountid, $schoolid)
{
    try {
        $query = $conn->prepare("INSERT INTO accountschoolconn (accountid, schoolid) VALUES (:accountid, :schoolid)");
        $query->bindParam(':accountid', $accountid, PDO::PARAM_INT);
        $query->bindParam(':schoolid', $schoolid, PDO::PARAM_INT);
        $query->execute();
    } catch (Exception $e) {
        echo "<p>Error: " . $e->getMessage() . "</p>";
    }
}
