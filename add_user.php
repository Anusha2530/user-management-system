<?php
session_start();

include 'db.php';

if(!isset($_SESSION['user_id']))
{
    header("Location: login.php");
}

if(isset($_POST['add_user']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role_id = $_POST['role_id'];

    $sql = "INSERT INTO users(name,email,password,role_id)
            VALUES(?,?,?,?)";

    $stmt = mysqli_prepare($conn, $sql);

    mysqli_stmt_bind_param($stmt, "sssi",
    $name, $email, $password, $role_id);

    if(mysqli_stmt_execute($stmt))
    {
        header("Location: dashboard.php");
    }
    else
    {
        echo "Error";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add User</title>
</head>
<body>

<h2>Add User</h2>

<form method="POST">

<label>Name:</label><br>
<input type="text" name="name" required><br><br>

<label>Email:</label><br>
<input type="email" name="email" required><br><br>

<label>Password:</label><br>
<input type="password" name="password" required><br><br>

<label>Role:</label><br>

<select name="role_id">

<option value="1">Admin</option>
<option value="2">User</option>

</select>

<br><br>

<button type="submit" name="add_user">
    Add User
</button>

</form>

<br>

<a href="dashboard.php">Back to Dashboard</a>

</body>
</html>