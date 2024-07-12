<?php
session_start();
include 'db.php'; // Include database connection

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

$user_id = $_SESSION['user_id'];

// Check if the product ID is set
if (isset($_GET['id'])) {
    $product_id = $_GET['id'];

    // Fetch product details
    $sql = "SELECT * FROM products WHERE id = $product_id AND owner_id = $user_id";
    $result = mysqli_query($conn, $sql);
    $product = mysqli_fetch_assoc($result);

    if (!$product) {
        header('Location: manage_product.php');
        exit();
    }

    // Handle form submission
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $product_name = $_POST['product_name'];
        $product_type = $_POST['product_type'];
        $product_price = $_POST['product_price'];
        $product_details = $_POST['product_details'];
        $product_quantity = $_POST['product_quantity'];

        // Update product
        $sql = "UPDATE products SET 
                name = '$product_name', 
                type = '$product_type', 
                price = $product_price, 
                details = '$product_details', 
                quantity = $product_quantity 
                WHERE id = $product_id AND owner_id = $user_id";

        if (mysqli_query($conn, $sql)) {
            header('Location: manage_products.php');
            exit();
        } else {
            echo "Error updating record: " . mysqli_error($conn);
        }

        mysqli_close($conn);
    }
} else {
    header('Location: manage_products.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f1ed ;
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

        footer {
            padding: 20px;
            background: #4056A1;
            color: #000;
            text-align: center;
        }

        h2 {
            font-size: 40px;
            margin-left: 40px;
            margin-bottom: 20px;
            color:#D79922 ;
            font-family: serif;
        }

        .kkk{
            /* border:2px solid red; */
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .edit-containers {
            /* border:2px solid green; */
            background: #ffffff21;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 400px;
            text-align: center;
            padding:50px;
        }
        h2 {
            font-size: 40px;
            margin-left: 40px;
            margin-bottom: 20px;
            color:#D79922 ;
            font-family: serif;
        }
        .edit-containers input[type="text"],
        .edit-containers input[type="number"],
        .edit-containers select,
        .edit-containers textarea {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .edit-containers select{
            width:420px;
        }

        .edit-containers button {
            width: 48%;
            padding: 10px;
            background: #4056A1;
            color: #fff;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            font-size: 16px;
            margin-bottom: 10px;
            border:2px solid white;
        }
        .edit-containers button:hover {
            background: #C5CBE3;
            color: black;
            border: 2px solid #4056A1;
        }
        /* .edit-containers .cancel-button {
            background: #e8491d;
        } */
        /* .edit-containers .cancel-button:hover {
            background: #35424a;
        } */
    </style>
</head>
<body>

<nav>
        <div class="container">
            <h1 class="titles">Artisan Craft</h1>
     

            <div class="navtitle">

                <a href="index.php">Home</a>
                <a href="register.html">Register</a>
                <a href="login.php">Login</a>
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

<h2>Edit Product</h2>
<div class="kkk">
        <div class="edit-containers">
            
            <form method="post" action="edit_product.php?id=<?php echo $product_id; ?>">
                <input type="text" name="product_name" value="<?php echo $product['name']; ?>" placeholder="Product Name" required>
                <select name="product_type" required>
                    <option value="jewellery" <?php if ($product['type'] == 'jewellery') echo 'selected'; ?>>Jewellery</option>
                    <option value="pottery" <?php if ($product['type'] == 'pottery') echo 'selected'; ?>>Pottery</option>
                    <option value="paper_craft" <?php if ($product['type'] == 'paper_craft') echo 'selected'; ?>>Paper Craft</option>
                    <option value="metal_working" <?php if ($product['type'] == 'metal_working') echo 'selected'; ?>>Metal Working</option>
                    <option value="leather_working" <?php if ($product['type'] == 'leather_working') echo 'selected'; ?>>Leather Working</option>
                    <option value="textile_arts" <?php if ($product['type'] == 'textile_arts') echo 'selected'; ?>>Textile Arts</option>
                    <option value="wood_working" <?php if ($product['type'] == 'wood_working') echo 'selected'; ?>>Wood Working</option>
                    <option value="glass_working" <?php if ($product['type'] == 'glass_working') echo 'selected'; ?>>Glass Working</option>
                    <option value="others" <?php if ($product['type'] == 'others') echo 'selected'; ?>>Others</option>
                </select>
                <input type="number" name="product_price" value="<?php echo $product['price']; ?>" placeholder="Product Price" required>
                <textarea name="product_details" placeholder="Product Details" rows="4" required><?php echo $product['details']; ?></textarea>
                <input type="number" name="product_quantity" value="<?php echo $product['quantity']; ?>" placeholder="Product Quantity" required>
                <button type="submit">Update Product</button>
                <button type="button" class="cancel-button" onclick="window.location.href='manage_products.php'">Cancel</button>
            </form>
        </div>
    </div>

    <footer>
    <p>Artisan Craft &copy; 2024</p>
</footer>
</body>
</html>
