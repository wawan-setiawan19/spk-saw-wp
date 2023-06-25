<?php
require "include/conn.php";
$id = $_POST['id'];
$sub_criteria = $_POST['sub_criteria'];
$range = $_POST['range'];
$value = $_POST['value'];

$sql = "UPDATE saw_sub_criterias SET sub_criteria='$sub_criteria',range_sub='$range',value='$value' WHERE id='$id'";
$result = $db->query($sql);
header("location:./sub-kriteria.php");
