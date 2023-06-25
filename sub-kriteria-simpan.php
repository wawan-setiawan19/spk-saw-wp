<?php
require "include/conn.php";
$name = $_POST['name'];
$range = $_POST['range'];
$value = $_POST['nilai'];
// $x = $db->query($sql);
// var_dump($x);
$sql = "INSERT INTO saw_sub_criterias (sub_criteria, range_sub, value) VALUES ('$name','$range','$value')";

if ($db->query($sql) === true) {
    header("location:./sub-kriteria.php");
} else {
    echo "Error: " . $sql . "<br>" . $db->error;
}

