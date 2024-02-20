<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
            color: white;
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
    <div class="col-sm-12 col-md-6 col-lg-6">
        <img src="welcome.jpg" width="100%" height="100%">
    </div>
    <div class="col-sm-12 col-md-6 col-lg-6 text-center flex">
        <h1 class="text-center login-title mt-5" style="text-transform: uppercase; text-align: center; color: white; font-weight: 700;">Online Shopping</h1>
        <p class="text-center login-title mt-3" style="text-transform: uppercase; text-align: center; color: white; font-weight: 700;"> To continue, First Login</p>
        <form class="form text-center" method="post" name="login">
            <h3 class="login-title" style="text-transform: uppercase; text-align: center; color: white; font-weight: 700;">Login</h3><br>
            <input type="text" class="ltext-center" style="text-transform: uppercase; text-align: center; font-weight: 700;" name="name" placeholder="Username" autofocus=true/>
            <br><br> 
            <input type="password" class="text-center" name="password" placeholder="Password" style="text-transform: uppercase; font-weight: 700; text-align: center;"/>
            <br><br> 
            <input type="submit" value="Login" class="submit" name="submit" style="text-transform: uppercase; text-align: center; font-weight: 700;">
            <br><br>         
            <p class="link"><a href="registor.php" style="text-transform: uppercase; text-align: center;">New Registration</a></p>
        </form>
    </div>
  </div>
</div>

    <?php
        require('db.php');
        session_start();
        if (isset($_POST['name'])) {
            $name = stripslashes($_REQUEST['name']); 
            $name = mysqli_real_escape_string($con, $name);
            $password = stripslashes($_REQUEST['password']);
            $password = mysqli_real_escape_string($con, $password);
            $query = "SELECT * FROM users WHERE name='$name' AND password='$password'";
            $result = mysqli_query($con, $query) or die(mysqli_error($con, $query));
            $rows = mysqli_num_rows($result);

            if ($rows == 1) {
                $_SESSION['name'] = $name;
                header("Location: index.php");
            } 
            else {
                echo "<div class='form'>
                    <h2>Incorrect Username/password.</h2>
                    <p class='link'><a href='login.php' class='l1'>Login again.</a> </p>
                    </div>";
            }
        }    
    ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>