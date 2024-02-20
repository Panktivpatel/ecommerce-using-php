<?php
if (isset($_GET['id'])) {
    $stmt = $pdo->prepare('SELECT * FROM products WHERE id = ?');
    $stmt->execute([$_GET['id']]);
    $product = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$product) {
        die ('Product does not exist!');
    }
} else {
    die ('Product does not exist!');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$product['name']?></title>
    <style>
        body{background-color: #edede8;}
        .card{ border-radius: 3%; background-color: white; box-shadow:  0 3px 5px 6px #ccc;}
        .color{padding:2%;}
        .name{color:#ee6c4d; text-transform: uppercase; font-size: 30px; font-weight: bolder;}
        .desc{color:#293241; text-transform: uppercase;}
        .price{color:#3D5A80; text-transform: uppercase; font-size: 21px; font-weight: bolder;}
        .submit{border:none; outline:none; background-color: #3D5A80; border:2px solid #3D5A80; margin:5px; text-align: center;color:white; width:200px}
        .qty{border:none; outline:none; background: none; border-bottom:2px solid #3D5A80; width:50px; margin:5px; text-align: center;}
    </style>
</head>
<body>
    <div class="text-left">
        <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6 col-md-6 col-lg-6">
            <img src="image/<?php echo $product['image'] ?>" class="card-img-top" height="470px" width="500px">
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6">
                <h1 class="name"><?=$product['name']?></h1>
                <h2 class="price"> ₹&nbsp;<?=$product['price']?>&nbsp;/- </h2>
                <form action="index.php?page=cart" method="post">
                    <input type="number" name="quantity" value="1" min="1" max="<?=$product['quantity']?>" placeholder="Quantity" required class="qty">
                    <input type="hidden" name="product_id" value="<?=$product['id']?>"><br>
                    <input type="submit" value="Add To Cart" class="submit">
                </form>
                <h3 class="description">
                    <?=$product['description']?>
                </h3>
            </div>
        </div>
    </div>
    <script>
        
    </script>
</body>
</html>