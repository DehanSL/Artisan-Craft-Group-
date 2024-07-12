<?php
session_start();
include 'db.php'; // Include database connection

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

$user_id = $_SESSION['user_id'];

// Get current user details
$sql = "SELECT * FROM users WHERE id = $user_id";
$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($result);

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $first_name = $_POST['first_name'];
    $second_name = $_POST['second_name'];
    $email = $_POST['email'];
    $mobile_number = $_POST['mobile_number'];
    $address = $_POST['address'];

    // Initialize error variable
    $error = '';

    // Handle file upload
    if (isset($_FILES['profile_photo']) && $_FILES['profile_photo']['error'] == 0) {
        $file_name = $_FILES['profile_photo']['name'];
        $file_tmp = $_FILES['profile_photo']['tmp_name'];
        $file_size = $_FILES['profile_photo']['size'];
        $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        $allowed_extensions = ['jpg', 'jpeg', 'png', 'gif'];

        if (in_array($file_ext, $allowed_extensions)) {
            if ($file_size < 5000000) { // 5MB limit
                $new_file_name = uniqid() . '.' . $file_ext;
                $file_path = 'uploads/' . $new_file_name;
                move_uploaded_file($file_tmp, $file_path);
                $profile_photo = $file_path;
            } else {
                $error = "File size should be less than 5MB.";
            }
        } else {
            $error = "Invalid file type. Only JPG, JPEG, PNG, and GIF are allowed.";
        }
    } else {
        $profile_photo = $user['profile_photo']; // Keep the existing photo if no new file is uploaded
    }

    // Handle password change
    if (!empty($_POST['current_password']) && !empty($_POST['new_password']) && !empty($_POST['confirm_new_password'])) {
        $current_password = $_POST['current_password'];
        $new_password = $_POST['new_password'];
        $confirm_new_password = $_POST['confirm_new_password'];

        if (password_verify($current_password, $user['password'])) {
            if ($new_password === $confirm_new_password) {
                $new_password_hashed = password_hash($new_password, PASSWORD_BCRYPT);
                $sql_password_update = "UPDATE users SET password = '$new_password_hashed' WHERE id = $user_id";
                if (!mysqli_query($conn, $sql_password_update)) {
                    $error = "Error updating password: " . mysqli_error($conn);
                }
            } else {
                $error = "New password and confirmation do not match.";
            }
        } else {
            $error = "Current password is incorrect.";
        }
    }

    if (empty($error)) {
        $sql = "UPDATE users SET 
                first_name = '$first_name', 
                second_name = '$second_name', 
                email = '$email', 
                mobile_number = '$mobile_number', 
                address = '$address',
                profile_photo = '$profile_photo' 
                WHERE id = $user_id";

        if (mysqli_query($conn, $sql)) {
            header('Location: profile.php');
            exit();
        } else {
            $error = "Error updating record: " . mysqli_error($conn);
        }
    }

    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f1ed ;
        }


        .kkk{
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            margin-bottom:130px;
        }
        .edit-profile-containers {
            background: #fff;
            padding: 70px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }
         h2 {
             font-size:35px;
            font-family:serif;
            color:#4056A1;
        }
        .edit-profile-containers input[type="text"],
        .edit-profile-containers input[type="email"],
        .edit-profile-containers input[type="password"],
        .edit-profile-containers input[type="file"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .edit-profile-containers button {
            width: 100%;
            padding: 10px;
            margin: 15px;
            background: #4056A1;
            color:white;
            height:40px;
            border:2px solid white;
            border-radius: 25px;
        }
        .edit-profile-containers button:hover {
            background: #C5CBE3;
            color: black;
            border: 2px solid #4056A1;
        }
        .error {
            color: red;
            margin-top: 10px;
        }


        nav {
            background-color:#4056A1 ;
            color: black;
            /* padding: 10px; */
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        nav a {
            text-align:center;
            color: black;
            text-decoration: none;
            margin-left:  25px;
            margin-top:60px;
            font-family:monospace;
            font-size:18px;
            /* padding-left:10px; */
            /* border:2px solid red; */
        }

        nav a:hover{
            /* background-color:#1A4D2E; */
            color:#F13C20;
        }

        .container{
            width: auto;
            height: auto;
            overflow: hidden;
            display: flex;
            justify-content:center;
        }

        .navtitle{
            margin-top:10px;
            margin-left:20px;
            /* border:2px solid red; */
            display:flex;
            height:30px;
        }

        .titles{
        font-size:33px;
        font-family:cursive;
        color:white;
       }










       h2{
        /* border:2px solid green; */
        color:#D79922;
        font-size:45px;
        margin-left:30px;
       }


       footer {
            padding: 20px;
            background: #4056A1;
            color: #000;
            text-align: center;
        }

    </style>
</head>
<body>

<nav>
    <div class="container">
            <h1 class="titles">Artisan Craft</h1>
     

            <div class="navtitle">
                <a href="index.php">Home</a>
                <a href="register.html">Register</a>
                <a href="login.html">Login</a>
                <?php if (isset($_SESSION['user_id'])) { ?>
                    <a href="product_upload.html">Upload Product</a>
                    <a href="manage_products.php">Manage Products</a>
                    <a href="product_view.php">View Products</a>
                    <a href="cart.php">Cart</a>
                    <a href="profile.php">My Profile</a>
                    <a href="logout.php">Logout</a>
                <?php } ?>
            </div>
        </div>
    </nav>

<h2>Edit Profile</h2>

<div class="kkk">
        <div class="edit-profile-containers">
            
            <?php if (!empty($error)) { ?>
                <div class="error"><?php echo $error; ?></div>
            <?php } ?>
            <form method="post" action="edit_profile.php" enctype="multipart/form-data">
                <input type="text" name="first_name" value="<?php echo $user['first_name']; ?>" placeholder="First Name" required>
                <input type="text" name="second_name" value="<?php echo $user['second_name']; ?>" placeholder="Second Name" required>
                <input type="email" name="email" value="<?php echo $user['email']; ?>" placeholder="Email" required>
                <input type="text" name="mobile_number" value="<?php echo $user['mobile_number']; ?>" placeholder="Mobile Number" required>
                <input type="text" name="address" value="<?php echo $user['address']; ?>" placeholder="Address" required>
                <input type="file" name="profile_photo" accept="image/*">
                <input type="password" name="current_password" placeholder="Current Password">
                <input type="password" name="new_password" placeholder="New Password">
                <input type="password" name="confirm_new_password" placeholder="Confirm New Password">
                <button type="submit">Save Changes</button>
            </form>
            <button class="cancel-button" onclick="window.location.href='profile.php'">Cancel</button>
        </div>

</div>

<footer>
        <p clss="footerp">Artisan Craft &copy; 2024</p>
</footer>
</body>
</html>
