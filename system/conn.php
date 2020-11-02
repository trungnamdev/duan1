<?php
function ketnoidb()
{
    $servername = "localhost";
    $username = "root";
    $password = "";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=duan1", $username, $password);

        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch (PDOException $e) {
    }
}
function laydulieu($sql)   {
    $conn = ketnoidb();
    $result = $conn->query($sql);
    $row = $result->fetchAll(PDO::FETCH_ASSOC);
    return $row;
    }
    function laymot($sql) {
        $conn = ketnoidb();
        $result = $conn->query($sql);
        $row = $result->fetch(PDO::FETCH_ASSOC);
        return $row;
    }
    function postdulieu($sql) {
        $conn = ketnoidb();
        $result = $conn ->exec($sql);
        return $result;
    }
    
?>