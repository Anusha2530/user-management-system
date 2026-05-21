<?php
include 'db.php';

if(isset($_POST['register']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role_id = $_POST['role_id'];

    $stmt = mysqli_prepare($conn,
    "INSERT INTO users(name,email,password,role_id)
    VALUES(?,?,?,?)");

    mysqli_stmt_bind_param($stmt,"sssi",
    $name,$email,$password,$role_id);

    if(mysqli_stmt_execute($stmt))
{
    echo "<script>
            window.location.href='login.php';
          </script>";
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
    <title>Register</title>
</head>
<body>

<h2>User Registration</h2>

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

    </select><br><br>

    <button type="submit" name="register">
        Register
    </button>

</form>

</body>
</html>