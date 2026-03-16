<?php

$school = array("schoolname" => "", "city" => "", "street" => "", "postalcode" => "");

function checkschooldata($conn)
{
    global $school;
    if (!empty($_POST['schoolname'])) {
        if (!isset($_POST['schoolid'])) {
            echo "nieuwe school wordt aangemaakt";
            $query = $conn->prepare("SELECT * FROM schools where schoolname=:schoolname");
            $query->bindParam('schoolname', $_POST['schoolname'], PDO::PARAM_STR);
        } else {
            echo "school wordt aangepast";
            $query = $conn->prepare("SELECT * FROM schools where schoolname=:schoolname AND schoolid!=:schoolid");
            $query->bindParam('schoolname', $_POST['schoolname'], PDO::PARAM_STR);
            $query->bindParam(':schoolid', $_POST['schoolid'], PDO::PARAM_INT);
        }
        $query->execute();
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $schoolname = $query->fetch();
        if ($schoolname !== false) {
            throw new Exception("Schoolnaam is al in gebruik");
        } else {
            $school["schoolname"] = $_POST['schoolname'];
        }
    } else {
        throw new Exception("Schoolnaam mag niet leeg zijn");
    }

    if (!empty($_POST['city'])) {
        $school["city"] = $_POST['city'];
    } else {
        throw new Exception("Plaats mag niet leeg zijn");
    }

    if (!empty($_POST['street'])) {
        $school["street"] = $_POST['street'];
    } else {
        throw new Exception("Straat mag niet leeg zijn");
    }

    if (!empty($_POST['postalcode'])) {
        if (strlen($_POST['postalcode']) == 6 && (is_numeric(substr($_POST['postalcode'], 0, -2)) && ctype_alpha(substr($_POST['postalcode'], -2)))) {
            $school["postalcode"] = $_POST['postalcode'];
        } else {
            throw new Exception("Postcode is niet geldig");
        }
    } else {
        throw new Exception("Postcode mag niet leeg zijn");
    }
}

function addschool($conn)
{
    global $school;
    try {
        checkschooldata($conn);
        $query = $conn->prepare("INSERT INTO schools (schoolname, city, street, postalcode) VALUES (:schoolname, :city, :street, :postalcode)");
        $query->bindParam(':schoolname', $school["schoolname"], PDO::PARAM_STR, 255);
        $query->bindParam(':city', $school["city"], PDO::PARAM_STR, 255);
        $query->bindParam(':street', $school["street"], PDO::PARAM_STR, 255);
        $query->bindParam(':postalcode', $school["postalcode"], PDO::PARAM_STR, 6);
        $query->execute();
    } catch (Exception $e) {
        echo "<p>Error: " . $e->getMessage() . "</p>";
    }
}

function editschool($conn)
{
    global $school;
    try {
        checkschooldata($conn);
        $query = $conn->prepare("UPDATE schools SET schoolname=:schoolname, city=:city, street=:street, postalcode=:postalcode WHERE schoolid=:schoolid");
        $query->bindParam(':schoolname', $school["schoolname"], PDO::PARAM_STR, 255);
        $query->bindParam(':city', $school["city"], PDO::PARAM_STR, 255);
        $query->bindParam(':street', $school["street"], PDO::PARAM_STR, 255);
        $query->bindParam(':postalcode', $school["postalcode"], PDO::PARAM_STR, 6);
        $query->bindParam(':schoolid', $_POST['schoolid'], PDO::PARAM_INT);
        $query->execute();
        echo "changed succesfully";
    } catch (Exception $e) {
        echo "<p>Error: " . $e->getMessage() . "</p>";
    }
}

function deleteschool($conn)
{
    try {
        $query = $conn->prepare("DELETE FROM schools WHERE schoolid=:schoolid");
        $query->bindParam(':schoolid', $_POST['schoolid'], PDO::PARAM_INT);
        $query->execute();
        echo "Deleted record";
    } catch (Exception $e) {
        echo "<p>Error: " . $e->getMessage() . "</p>";
    }
}

function getschool($conn)
{
    try {
        $query = $conn->prepare("SELECT * FROM schools WHERE schoolid=:schoolid");
        $query->bindParam(':schoolid', $_POST['schoolid'], PDO::PARAM_INT);
        $query->execute();
        $fetchedschool = $query->fetch(PDO::FETCH_ASSOC);
        return $fetchedschool;
    } catch (Exception $e) {
        echo "<p>Error: " . $e->getMessage() . "</p>";
    }
}

function getschools($conn)
{
    try {
        $query = $conn->prepare("SELECT * FROM schools");
        $query->execute();
        $fetchedschools = $query->fetchAll();
        return $fetchedschools;
    } catch (Exception $e) {
        echo "<p>Error: " . $e->getMessage() . "</p>";
    }
}
