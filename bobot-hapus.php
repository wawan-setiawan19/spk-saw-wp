<?php
require "include/conn.php";
$id = $_GET['id'];
mysqli_query($db, "delete from saw_criterias where id_criteria='$id'");
header("location:./kriteria.php");
