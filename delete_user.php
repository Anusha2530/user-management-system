<?php
session_start();

include 'db.php';

if(!isset($_SESSION['user_id']))
{
    header("Location: login.php");
}

$id = $_GET['id'];

$sql = "DELETE FROM users WHERE id=?";

$stmt = mysqli_prepare($conn, $sql);

mysqli_stmt_bind_param($stmt, "i", $id);

if(mysqli_stmt_execute($stmt))
{
    header("Location: dashboard.php");
}
else
{
    echo "Delete Failed";
}
?>