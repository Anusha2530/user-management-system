<?php
session_start();

include 'db.php';

if(!isset($_SESSION['user_id']))
{
    header("Location: login.php");
}

$result = mysqli_query($conn,
"SELECT users.*, roles.role_name
FROM users
JOIN roles ON users.role_id = roles.id");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>

<h1>Welcome <?php echo $_SESSION['name']; ?></h1>

<a href="add_user.php">Add User</a>

<br><br>
<a href="profile.php">
    My Profile
</a>

<table border="1" cellpadding="10">

<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Email</th>
    <th>Role</th>
    <th>Action</th>
</tr>

<?php
while($row = mysqli_fetch_assoc($result))
{
?>

<tr>

<td><?php echo $row['id']; ?></td>

<td><?php echo $row['name']; ?></td>

<td><?php echo $row['email']; ?></td>

<td><?php echo $row['role_name']; ?></td>

<td>
    <a href="edit_user.php?id=<?php echo $row['id']; ?>">
        Edit
    </a>

    |

    <a onclick="return confirm('Are you sure?')"
    href="delete_user.php?id=<?php echo $row['id']; ?>">
        Delete
    </a>
</td>

</tr>

<?php
}
?>

</table>

<br>

<a href="logout.php">Logout</a>

</body>
</html>