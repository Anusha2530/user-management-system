<?php
session_start();

include 'db.php';

if(!isset($_SESSION['user_id']))
{
    header("Location: login.php");
}

$id = $_SESSION['user_id'];

$result = mysqli_query($conn,
"SELECT * FROM users WHERE id=$id");

$user = mysqli_fetch_assoc($result);

if(isset($_POST['update_profile']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];

    $image_name = $user['profile_pic'];

    if(!empty($_FILES['profile_pic']['name']))
    {
        $file = $_FILES['profile_pic'];

        $filename = $file['name'];

        $tmpname = $file['tmp_name'];

        $size = $file['size'];

        $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

        $allowed = ['jpg', 'jpeg', 'png'];

        if(in_array($ext, $allowed))
        {
            if($size < 2000000)
            {
                move_uploaded_file($tmpname,
                "uploads/".$filename);

                $image_name = $filename;
            }
            else
            {
                echo "File too large";
            }
        }
        else
        {
            echo "Invalid file type";
        }
    }

    $sql = "UPDATE users
            SET name=?, email=?, profile_pic=?
            WHERE id=?";

    $stmt = mysqli_prepare($conn, $sql);

    mysqli_stmt_bind_param($stmt,
    "sssi",
    $name,
    $email,
    $image_name,
    $id);

    if(mysqli_stmt_execute($stmt))
    {
        header("Location: profile.php");
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>
</head>
<body>

<h2>My Profile</h2>

<?php
if($user['profile_pic'])
{
?>
<img src="uploads/<?php echo $user['profile_pic']; ?>"
width="120">
<br><br>
<?php
}
?>

<form method="POST" enctype="multipart/form-data">

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

<label>Profile Picture:</label><br>

<input type="file" name="profile_pic">

<br><br>

<button type="submit" name="update_profile">
    Update Profile
</button>

</form>

<br>

<a href="dashboard.php">
    Back to Dashboard
</a>

</body>
</html>