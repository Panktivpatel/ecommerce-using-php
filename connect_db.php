<?php

$currency = '₹ ';
$con = mysqli_connect("e-commerce-php.database.windows.net","your_username","your_password","ecommerce");

if (mysqli_connect_errno()){
  echo "Failed to connect to MySQL:" .mysqli_connect_error();
}

?>