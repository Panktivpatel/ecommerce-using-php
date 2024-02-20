<?php
$num_products_on_each_page = 15;
$current_page = isset($_GET['p']) && is_numeric($_GET['p']) ? (int)$_GET['p'] : 1;
$stmt = $pdo->prepare('SELECT * FROM products');
$stmt->bindValue(1, ($current_page - 1) * $num_products_on_each_page, PDO::PARAM_INT);
$stmt->bindValue(2, $num_products_on_each_page, PDO::PARAM_INT);
$stmt->execute();
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
$total_products = $pdo->query('SELECT * FROM products')->rowCount();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
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
<div class="products content-wrapper">
    <h1 class="text-center">Products</h1>
    <p class="text-center"><?=$total_products?> Products</p>
    <div class="products-wrapper">
        <?php foreach ($products as $product): ?>
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
    <div class="buttons">
        <?php if ($current_page > 1): ?>
        <a href="index.php?page=products&p=<?=$current_page-1?>">Prev</a>
        <?php endif; ?>
        <?php if ($total_products > ($current_page * $num_products_on_each_page) - $num_products_on_each_page + count($products)): ?>
        <a href="index.php?page=products&p=<?=$current_page+1?>">Next</a>
        <?php endif; ?>
    </div>
</div>
</body>
</html>