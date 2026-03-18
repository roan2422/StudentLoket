<?php

function getEnumOptions($conn, $table, $column)
{
    $query = $conn->prepare("SHOW COLUMNS FROM $table LIKE :column");
    $query->bindParam(':column', $column, PDO::PARAM_STR);
    $query->execute();
    $row = $query->fetch(PDO::FETCH_ASSOC);

    if (!$row) return [];

    $type = $row['Type']; // e.g. "enum('active','inactive','pending')"
    preg_match("/^enum\(\'(.*)\'\)$/", $type, $matches);
    $options = explode("','", $matches[1]);
    return $options;
}
