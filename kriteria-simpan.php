<?php
require "include/conn.php";
$name = $_POST['name'];
$weight = $_POST['bobot'];
$attribute = $_POST['atribut'];
// $x = $db->query($sql);
// var_dump($x);
$sql = "INSERT INTO saw_criterias (criteria, weight, attribute) VALUES ('$name','$weight','$attribute')";

if ($db->query($sql) === true) {
    header("location:./kriteria.php");
} else {
    echo "Error: " . $sql . "<br>" . $db->error;
}

