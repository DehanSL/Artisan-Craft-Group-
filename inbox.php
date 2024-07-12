<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit();
}

$user_id = $_SESSION['user_id'];

$sql = "SELECT DISTINCT sender_id, product_id FROM messages WHERE receiver_id = '$user_id' ORDER BY timestamp DESC";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Inbox</title>
    <style>

        .container{
            /* border:4px solid green; */
            /* display:flex; */
            align-items:center;
            justify-content:center;
            
        }
        .messagebox{
            border:2px solid red;
            width:720px;
            margin:10px;
            padding:20px;
            background-color:#f2f1ed;
        }

        h2{
            color:#d69722;
            font-size:35px;
        }

        button{
            background-color:#4057a1;
            margin-top:30px;
            height:40px;
            width:80px;
            border-radius:20px;
            margin-left:20px;
            border:none;
            color:white;
        }
        button:hover{
            background-color:#c5cbe3;
            color:black;
        }

        a{
            text-decoration:none;
            color:white;
            font-size:15px;
            background-color:#4057a1;
            padding:10px;
            border-radius:20px;
        }
        p{
            font-size:30px;
            /* color:white; */
        }

        a:hover{
            color:black;
            font-size:15px;
            background-color:#c5cbe3;
            padding:10px;
            border-radius:20px;
        }
    </style>
</head>
<body>
    <h2>Inbox</h2>

    <div class="container">
        <?php while ($row = mysqli_fetch_assoc($result)) { 
            $sender_id = $row['sender_id'];
            $product_id = $row['product_id'];
            
            $sender_sql = "SELECT * FROM users WHERE id = $sender_id";
            $sender_result = mysqli_query($conn, $sender_sql);
            $sender = mysqli_fetch_assoc($sender_result);
            
            $product_sql = "SELECT * FROM products WHERE id = $product_id";
            $product_result = mysqli_query($conn, $product_sql);
            $product = mysqli_fetch_assoc($product_result);
        ?>
            <div class="messagebox">
                <p>From: <?php echo $sender['first_name'] . ' ' . $sender['second_name']; ?></p>
                <p>Product: <?php echo $product['name']; ?></p>
                <a href="chat.php?product_id=<?php echo $product_id; ?>&user_id=<?php echo $sender_id; ?>">Continue Chat</a>

                <button onclick="window.location.href='index.php'">Home</button>
            </div>
        <?php } ?>
    </div>

    
</body>
</html>
