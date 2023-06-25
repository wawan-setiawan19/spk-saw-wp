<?php
require "include/conn.php";
$id = $_GET['id'];
mysqli_query($db, "delete from saw_sub_criterias where id='$id'");
header("location:./sub-kriteria.php");
