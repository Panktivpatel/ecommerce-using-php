<?php
$stmt = $pdo->prepare('SELECT * FROM products');
$stmt->execute();
$recently_added_products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        body{background-color: #edede8;}
        .card{ border-radius: 3%; background-color: white; box-shadow:  0 3px 5px 6px #ccc;}
        .color{ padding:2%;}
        .name{color:#ee6c4d; text-transform: uppercase; font-size: 20px; font-weight: bolder;}
        .desc{color:#293241; text-transform: uppercase;}
        .price{color:#3D5A80; text-transform: uppercase; font-size: 20px; font-weight: bolder;}
        .edit{text-decoration:none; background-color: #006D77;color:white; padding: 5px 20px; text-transform: uppercase;font-weight: bolder;}
        .delete{text-decoration:none; background-color: #293241;color:white; padding: 5px 15px; text-transform: uppercase;font-weight: bolder;}
        a:hover{text-decoration: none; color:#AACC00}
    </style>    
</head>
<body>
<div class="recentlyadded content-wrapper">
    <h2 class="active text-center">STUDENTS ESSENTIAL PRODUCT</h2>
    <div class="products">
        <?php foreach ($recently_added_products as $product): ?>
        <a href="index.php?page=product&id=<?=$product['id']?>" class="product">
        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 text-center">
                <div class="card">
                    <div class="color">
                        <img src="image/<?php echo $product['image'] ?>" class="card-img-top" height="180px" width="180px">
                        <h4 class="name"><?php echo $product['name'] ?></h4>
                        <h6 class="desc"><?php echo $product['description'] ?></h6>
                        <h5 class="price">₹&nbsp;<?php echo $product['price'] ?>/-</h5>
                        <div class="p-1">
                            <a href="edit.php?id=<?=$product['id']?>" class="edit">Edit</a> <a href="delete.php?id=<?=$product['id']?>" class="delete">Delete</a>
                        </div>
                    </div>
                </div>
                <br>
            </div>
        </a>
        <?php endforeach; ?>
    </div>
</div>
</body>
</html>

