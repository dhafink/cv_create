<?php
include 'config.php';
$id = $_GET['id'];

// hapus pengalaman dulu
mysqli_query($conn, "DELETE FROM experience WHERE cv_id=$id");
// lalu hapus CV
mysqli_query($conn, "DELETE FROM cv WHERE id=$id");

header("Location: index.php");
