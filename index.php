<?php
session_start();
 
// Check jika user telah login, jika belum maka ke halaman login
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Home | Out Door</title>
        <link rel="stylesheet" href="master.css">
    </head>
    <body>
        <div class="container">
            <nav>
                <input type="checkbox" id="nav" class="hidden">
                <label for="nav" class="nav-btn">
                    <i></i>
                    <i></i>
                    <i></i>
                </label>
                <div class="logo">
                    <a href="index.php">Out Door</a>
                </div>
                <div class="nav-wrapper">
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="#">About</a></li>
                        <li><a href="product.php">Products</a></li>
                    </ul>
                </div>
                <div class="nav-logout">
                    <ul style="float: right; padding: 0px; margin-right: 16px;">
                        <li><a href="logout.php">Logout</a></li>
                    </ul>
                </div>
                <div class="content">
                    <h1>Back to Nature</h1>
                    <h3>with the comfort</h3>
                </div>
                <div class="btn">
                    <form method="POST" action="product.php" enctype="multipart/form-data" >
                        <button type="submit">See Products</button>
                    </form>
                </div>
            </nav>
        </div>
        <footer>
            <p>Photo by : Kilarov Zaneit at Mount Bromo, East Java, Indonesia</p>
        </footer> 
    </body>
</html>