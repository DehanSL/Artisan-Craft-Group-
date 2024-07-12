<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <style>
        
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            /* background-color: white ; */
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


        .serches{
            margin-left:50px;
            margin-top:60px;
        }

        header {
            background: #35424a;
            color: #fff;
            padding-top: 30px;
            min-height: 70px;
            /* border-bottom: #e8491d 3px solid; */
        }
        header a {
            color: #fff;
            text-decoration: none;
            text-transform: uppercase;
            font-size: 16px;
        }
        header ul {
            padding: 0;
            list-style: none;
        }
        header li {
            display: inline;
            padding: 0 20px 0 20px;
        }
        #showcase {
            min-height: 600px;
            background: url('sellerR.jpg') no-repeat 0 -400px;
            background-attachment: fixed;
            text-align: center;
            color:white;
            font-family:fantasy;
            
        }
        #showcase h1 {
            margin-top: 100px;
            font-size: 85px;
            margin-bottom: 10px;
            /* background-color:white; */
        }
        #showcase p {
            font-size: 30px;
            /* color:black; */
            /* background-color:white; */
        }


        /* #newsletter {
            padding: 15px;
            color: #fff;
            background: #35424a;
        }
        #newsletter form {
            display: flex;
            justify-content: space-between;
            align-items: center;
        } */
        /* .product-grid {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }
        .product {
            background: #fff;
            padding: 20px;
            border: 1px solid #ddd;
            flex: 1 1 calc(33.333% - 40px);
            box-sizing: border-box;
        }
        .product img {
            max-width: 100%;
        } */
        footer {
            padding: 20px;
            background: #4056A1;
            color: #000;
            text-align: center;
        }


        .container{
            width: auto;
            height: auto;
            overflow: hidden;
            display: flex;
            justify-content:center;
        }

       .title{
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        text-align: center;
        font-size: 25px;
        color: white;
        background-color: #F5DAD2 ;
        font-weight: bolder;
       }




       .mathrukawa{
        font-size:20px;
        color:#D79922;
        width:800px;
        font-family:serif;
        margin-top:10px;
        margin-left:25px;
       
        /* border:2px solid red; */
       }
       


div.polaroid {
  width: 250px;
  text-align: center;
  margin-left:60px;
  border-radius:0px 30px 30px 30px; 
}
/* div.polaroid:hover{
    box-shadow: 0 4px 8px 0 rgba(60, 20, 10, 70.2), 0 6px 20px 0 rgba(80, 20, 70,100.85);
} */

div.containeres {
  /* padding: 10px; */
  margin: 10px;
  background-color:#9AC8CD;
  color:white;
  font-family:cursive;
  /* border-radius:20px; */
  border:1px solid #4056A1;
  border-radius:40px 40px 0px 40px; 
}

img{
width: 250px;
  height:250px;
  border:3px solid #4056A1;
  border-radius:0px 40px 40px 40px; 
}

img:hover{
    border:3px solid #f2f1ed;
    box-shadow: 0 4px 8px 0 rgba(60, 20, 10, 70.2), 0 6px 20px 0 rgba(80, 20, 70,100.85);
}

.boxess{
    /* display:flex;
    justify-content:center; */

    /* border:2px solid red; */
}

.first{
    display:flex;
    justify-content:center;
}

.second{
    margin-top:100px;
    display:flex;
    justify-content:center;
    margin-bottom:50px;
}

.serches{
    display:flex;
    justify-content:center;
}

.serchk{
height:20px;
width:350px;
border:2px solid #4056A1;
border-radius:20px;
padding:10px;
}

.serchk:hover{
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0,0.85);
}

select{
    width:90px;
    height:40px;
    margin-left:10px;
    border:2px solid #4056A1;
}
.serchks{
background-color:#4056A1;
color:white;
width:80px;
height:30px;
margin-top:10px;
margin-left:10px;
border-radius:25px;
border:2px solid white;

}
.serchks:hover{
    background-color:#C5CBE3;
    border:2px solid #4056A1;
    color:black;
}


.colors{
    color:#F13C20;

}

    </style>
</head>
<body>
    <nav>
        <div class="container">
            <h1 class="titles">Artisan Craft</h1>
     

            <div class="navtitle">

                <a class="colors" href="index.php">Home</a>
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
    
    <header id="showcase">
            <h1>Welcome to Artisan Craft</h1>
            <p>Your one-stop shop for unique, handmade items.</p>
    </header>

    <!-- <section id="newsletter">
        <div class="container">
            <h1>Subscribe to Our Newsletter</h1>
            <form>
                <input type="email" placeholder="Enter Email...">
                <button type="submit" class="button_1">Subscribe</button>
            </form>
        </div>
    </section> -->

    <?php if (isset($_SESSION['user_id'])) { ?>
                    <div class="serches">
                        <form action="search.php" method="get">
                            <input class="serchk" type="text" name="query" placeholder="Serch Anything here.....">
                            <select name="type">
                                <option value="">All Types</option>
                                <option value="jewelry">Jewelry</option>
                                <option value="pottery">Pottery</option>
                                <option value="paper craft">Paper Craft</option>
                                <option value="metal working">Metal Working</option>
                                <option value="leather working">Leather Working</option>
                                <option value="textile arts">Textile Arts</option>
                                <option value="wood working">Wood Working</option>
                                <option value="glass working">Glass Working</option>
                                <option value="others">Others</option>
                            </select>
                            <input class="serchks" type="submit" value="Search">
                        </form>
           
                    </div>
                    <?php } ?>
    
    <div class="mathrukawa">
        <h1>Here are our popular categories</h1>

    </div>


<div class="boxess">

    <div class="first">

        <div class="polaroid">
            <img src="glass.jpg" alt="Norway" style="width:100%">
            <div class="containeres">
                <p>Glass Working</p>
            </div>
        </div>

        <div class="polaroid">
            <img src="jwelery.jpg" alt="Norway" style="width:100%">
            <div class="containeres">
                <p>Jewelry</p>
            </div>
        </div>

        <div class="polaroid">
            <img src="pottry.jpeg" alt="Norway" style="width:100%">
            <div class="containeres">
                <p>Pottery</p>
            </div>
        </div>

        <div class="polaroid">
            <img src="paper.jpg" alt="Norway" style="width:100%">
            <div class="containeres">
                <p>Paper Craft</p>
            </div>
        </div>
    </div>

    <div class="second">

<div class="polaroid">
    <img src="textile.jpg" alt="Norway" style="width:100%">
    <div class="containeres">
        <p>Textile Arts</p>
    </div>
</div>

<div class="polaroid">
    <img src="metl.jpg" alt="Norway" style="width:100%">
    <div class="containeres">
        <p>Metal Working</p>
    </div>
</div>

<div class="polaroid">
    <img src="wood.jpg" alt="Norway" style="width:100%">
    <div class="containeres">
        <p>Wood Working</p>
    </div>
</div>

<div class="polaroid">
    <img src="lether.jpg" alt="Norway" style="width:100%">
    <div class="containeres">
        <p>Leather Working</p>
    </div>
</div>
</div>


</div>

    <footer>
        <p>Artisan Craft &copy; 2024</p>
    </footer>
</body>
</html>
