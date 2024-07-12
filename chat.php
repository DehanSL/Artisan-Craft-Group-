<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit();
}

$product_id = $_GET['product_id'];
$owner_id = $_GET['user_id'];
$user_id = $_SESSION['user_id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $message = $_POST['message'];
    $sql = "INSERT INTO messages (sender_id, receiver_id, product_id, message) VALUES ('$user_id', '$owner_id', '$product_id', '$message')";
    mysqli_query($conn, $sql);
}

$sql = "SELECT * FROM messages WHERE (sender_id = '$user_id' AND receiver_id = '$owner_id' AND product_id = '$product_id') OR (sender_id = '$owner_id' AND receiver_id = '$user_id' AND product_id = '$product_id') ORDER BY timestamp";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Chat</title>
    <style>
        h2{
            color:#d69722;
            font-size:35px;
        }

        .container{
            /* border:4px solid blue; */
            padding:10px;
            width:1080;
            background-color:#f2f1ed;
            margin:20px;
            padding:30px;
            border-radius:20px;
            
        }
        strong{
            color:red;
            font-size:25px;
        }

        p{
            background-color:#c5cbe3;
            width: auto;
            height:10px;
            border-radius:10px;
            padding:20px;
        }
        form{
            display:flex;
        }

        textarea{
            width:250px;
        }
        button{
            height:40px;
            margin-left:10px;
            width:80px;
            border-radius:20px;
            border:none;
            color:white;
            background-color:#4057a1;
        }

        button:hover{
            background-color:#c5cbe3;
            color:black;
        }

        .home{
            margin-left:20px;
            width:130px;
        }
    </style>
</head>
<body>
    <h2>Chat with <?php
        $owner_sql = "SELECT * FROM users WHERE id = $owner_id";
        $owner_result = mysqli_query($conn, $owner_sql);
        $owner = mysqli_fetch_assoc($owner_result);
        echo $owner['first_name'] . ' ' . $owner['second_name'];
    ?></h2>

    <div class="container">
            <?php while ($message = mysqli_fetch_assoc($result)) { ?>
                <div>
                    <strong><?php echo ($message['sender_id'] == $user_id) ? 'You' : 'Sender'; ?>:</strong>
                    <p><?php echo $message['message']; ?></p>
                    <small><?php echo $message['timestamp']; ?></small>
                </div>
            <?php } ?>
        

        <form method="post">
            <textarea name="message" required></textarea>
            <button type="submit">Send</button>
            <button class="home" onclick="window.location.href='product_view.php'">Cancel</button>
        </form>
    </div>           
    
</body>
</html>
