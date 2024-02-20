<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- <link rel="stylesheet" href="css/login.css"> -->
    <style>
        .flex{
            font-family: "Century Gothic";
            padding: 70px;
            background-color: rgb(255, 61, 61);
        }
        input {
            border: none;
            outline: none;
            background: none;
            width: 70%;
            border-bottom: 2px solid white;
        }
        .submit{
            border: 2px solid white;
            padding: 5px 25px;
            color: white;
        }
        input::placeholder {
            color: white;
        }
        a{
            text-decoration: none;
            text-align: center;
            font-size: 20px;
            font-weight: 700;
            color: white;
        }
        a:hover{
            text-decoration: none;
            text-align: center;
            font-size: 20px;
            font-weight: 700;
            color: white;
        }
    </style>
</head>
<body>
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-9 col-md-10 col-lg-6">
        <img src="welcome.jpg" width="100%" height="100%">
    </div>
    <div class="col-sm-3 col-md-10 col-lg-6 text-center flex">
        <h1 class="text-center mt-5" style="text-transform: uppercase; text-align: center; color: white; font-weight: 700;">Online Shopping</h1>
        <p class="text-center" style="text-transform: uppercase; text-align: center; color: white; font-weight: 700;"> To continue, Register yourself</p>
        <form class="form" action="" method="post">
            <h3 style="text-transform: uppercase; text-align: center; color: white; font-weight: 700;">Registration</h3><br>
            <input type="text" class="text-center" name="name" placeholder="Username" required style="text-transform: uppercase; text-align: center; color: white; font-weight: 700;"/><br><br>
            <input type="password" class="text-center" name="password" placeholder="Password" style="text-transform: uppercase; text-align: center; color: white; font-weight: 700;"/><br><br>
            <input type="submit" name="submit" value="Register" class="submit" style="text-transform: uppercase; text-align: center; color: white; font-weight: 700;"/><br><br>
            <p class="link"><a href="welcome.php" style="text-transform: uppercase; text-align: center; color: white; font-weight: 700;">Click to Login</a></p>
        </form>
    </div>
  </div>
</div>
<?php
    require('db.php');
    if (isset($_REQUEST['name'])) {

        $name = $_REQUEST['name'];
        //Connecting MYSQL with username by $con and $username 
        $name = mysqli_real_escape_string($con, $name);

        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);

        $query = "INSERT into `users` (name, password)
                VALUES('$name', '$password')";
        $result = mysqli_query($con, $query);
        if ($result) {
        echo "<div class='form1'>
            <h2>You are registered successfully.</h2>
            <p class='link'><a href='welcome.php' class='l1'>Login</a></p>
            </div>";
        } 
        else {
        echo "<div class='form'>
            <h2>Required fields are missing.</h2>
            <p class='link'><a href='registor.php' class='l1'>registration</a> again.</p>
            </div>";
        }
    } 
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>