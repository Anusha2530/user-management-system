<?php
session_start();

include 'db.php';

if(!isset($_SESSION['user_id']))
{
    header("Location: login.php");
}

$id = $_GET['id'];

$result = mysqli_query($conn,
"SELECT * FROM users WHERE id=$id");

$user = mysqli_fetch_assoc($result);

if(isset($_POST['update_user']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $role_id = $_POST['role_id'];

    $sql = "UPDATE users
            SET name=?, email=?, role_id=?
            WHERE id=?";

    $stmt = mysqli_prepare($conn, $sql);

    mysqli_stmt_bind_param($stmt,
    "ssii",
    $name,
    $email,
    $role_id,
    $id);

    if(mysqli_stmt_execute($stmt))
    {
        header("Location: dashboard.php");
    }
    else
    {
        echo "Update Failed";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
</head>
<body>

<h2>Edit User</h2>

<form method="POST">

<label>Name:</label><br>

<input type="text"
name="name"
value="<?php echo $user['name']; ?>"
required>

<br><br>

<label>Email:</label><br>

<input type="email"
name="email"
value="<?php echo $user['email']; ?>"
required>

<br><br>

<label>Role:</label><br>

<select name="role_id">

<option value="1"
<?php
if($user['role_id']==1)
echo "selected";
?>>
Admin
</option>

<option value="2"
<?php
if($user['role_id']==2)
echo "selected";
?>>
User
</option>

</select>

<br><br>

<button type="submit" name="update_user">
    Update User
</button>

</form>

<br>

<a href="dashboard.php">
    Back to Dashboard
</a>

</body>
</html>