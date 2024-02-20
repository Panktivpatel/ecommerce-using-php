<?php
include 'functions.php';
$pdo = pdo_connect_mysql();
$msg = '';
if (isset($_GET['id'])) {
    if (!empty($_POST)) {

        
        $id = isset($_POST['id']) ? $_POST['id'] : NULL;
        //echo $id;die;
        $name = isset($_POST['name']) ? $_POST['name'] : '';
        $description = isset($_POST['description']) ? $_POST['description'] : '';
        $price = isset($_POST['price']) ? $_POST['price'] : '';
        $image = isset($_POST['image']) ? $_POST['image'] : '';
        $stmt = $pdo->prepare('UPDATE products SET id = ?, name = ?, description = ?, price = ?, image = ? WHERE id = ?');
        $stmt->execute([$id, $name, $description, $price, $image, $_GET['id']]);
        $msg = 'Updated Successfully!';
    }
    if(isset($_POST['update'])){
        header("Location: index.php?page=home");
    }
    // Get the contact from the contacts table
    $stmt = $pdo->prepare('SELECT * FROM products WHERE id = ?');
    $stmt->execute([$_GET['id']]);
    $contact = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$contact) {
        exit('Contact doesn\'t exist with that ID!');
    }
} else {
    exit('No ID specified!');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" a href="bootstrap.css"/>
    <title>Edit </title>
    <style>
        body{
            font-family: "Century Gothic";
            padding: 70px;
            background-color: rgb(255, 61, 61);
            color: white;
        }
        input {
            border: none;
            outline: none;
            background: none;
            width: 30%;
            color: white;
            border-bottom: 2px solid white;
        }
        .submit{
            border: 2px solid white;
            padding: 5px 25px;
            width: 20%;
            color: white;
            margin-top:8px;
        }
        input::placeholder {
            color: white;
        }
        label{
            margin-top:8px;
        }
    </style>
</head>
<body class="bg-dark">
    <div class="content update">
        <h2>UPDATE PRODUCT DETAILS OF ID=<?=$contact['id']?></h2>
        <form action="edit.php?id=<?=$contact['id']?>" method="post">
            <label for="id">ID</label><br>
            <input type="text" name="id" placeholder="<?=$contact['id']?>" value="<?=$contact['id']?>" id="id"><br>
            <label for="name">Name</label><br>
            <input type="text" name="name" placeholder="<?=$contact['name']?>" value="<?=$contact['name']?>" id="name"><br>
            <label for="email">description</label><br>
            <input type="text" name="description" placeholder="<?=$contact['description']?>" value="<?=$contact['description']?>" id="email"><br>
            <label for="phone">price</label><br>
            <input type="text" name="price" placeholder="<?=$contact['price']?>" value="<?=$contact['price']?>" id="phone"><br>
            <label for="title">image</label><br>   
            <input type="text" name="image" placeholder="<?=$contact['image']?>" value="<?=$contact['image']?>" id="title"><br>
            <input type="submit" value="Update" name="update" class="submit">
        </form>
        <?php if ($msg): ?>
        <p><?=$msg?></p>
        <?php endif; ?>
    </div>   
</body>
</html>
