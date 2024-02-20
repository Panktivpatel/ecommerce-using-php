<?php
function pdo_connect_mysql() {
    // Update the details below with your MySQL details
    $DATABASE_HOST = 'localhost';
    $DATABASE_USER = 'root';
    $DATABASE_PASS = 'root';
    $DATABASE_NAME = 'cart_system';
    try {
    	return new PDO('mysql:host=' . $DATABASE_HOST . ';dbname=' . $DATABASE_NAME . ';charset=utf8', $DATABASE_USER, $DATABASE_PASS);
    } catch (PDOException $exception) {
    	// If there is an error with the connection, stop the script and display the error.
    	die ('Failed to connect to database!');
    }
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Home</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <style>
            .head{
                text-transform: uppercase; 
                text-align: center; 
                color: white;
                font-size: 30px; 
                font-weight: 700;
            }
            header{
                background-color: rgb(255, 61, 61);
            }
        </style>
    </head>
<body>
<header>
    <div class="text-center head">
        <?php
            require("db.php");
            include("auth_session.php");

            $num_items_in_cart = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;

        ?>
        <p> <?php echo $_SESSION['name']; ?> ! </p>
        <p>Online Shopping</p>
    </div>
    <nav class="navbar navbar-inverse">
<div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      
    </div>
    <div id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active text-center"><a href="index.php?page=home">Home</a></li>
        <li class="active text-center"><a href="index.php?page=products">Products</a></li>
        <li class="active text-center"><a href="add.php" >Add Product</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="active text-center">
          <a id="cart-popover" class="btn" data-placement="bottom" title="Shopping Cart">
            <span class=" glyphicon glyphicon-shopping-cart active"></span>
            <span class="badge"></span><?php echo $num_items_in_cart?></a></li>
        <li class="active text-center"><a href="index.php?page=cart" id="cart-popover"><span class="active"></span>CART</a></li>
        <li class="active text-center"><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> LogOut</a></li>
      </ul>
    </div>
  </div>
    </nav>
</header>
<script>
    $('#cart-popover').popover({
    html : true,
          container: 'body',
          content:function(){
          return $('#popover_content_wrapper').html();
          }
  });
</script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	</body>
</html>