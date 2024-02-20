<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <style>
        body{
            font-family: "Century Gothic";
            padding: 70px;
            color: white;
            font-size: 25px;
            background-color: rgb(255, 61, 61);
        }
        input {
            border: none;
            outline: none;
            background: none;
            width: 70%;
            font-size: 25px;
            color: white;
            border-bottom: 2px solid white;
        }
        .submit{
            border: 2px solid white;
            padding: 5px 25px;
            color: white;
        }
        textarea{
            border: none;
            outline: none;
            background: none;
            font-size: 25px;
            width: 70%;
            color: white;
            border-bottom: 2px solid white;
        }
        textarea::placeholder{
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
        .button{
            border: 2px solid white;
        }
    </style>
</head>
<body>
<form action="add.php" method="POST" name="form1" enctype="multipart/form-data" class="form-control">
			<legend>Add Product Form:</legend>
			<table class="center">
				<tr>
					<td><label>Product Name:</label></td>
					<td><input type="text" name="name" required></td>
				</tr>
				<tr>
					<td><label>Product Description:</label></td>
					<td><textarea name="description" required></textarea></td>
                </tr>
                <tr>
					<td><label>Product Code:</label></td>
					<td><input type="text" name="code" required></td>
				</tr>
				<tr>
					<td><label>Product Price:</label></td>
					<td><input type="number" name="price"  required></td>
				</tr>
				<tr>
					<td><label>Product Image:</label></td>
					<td><input type="file" name="image" required></td>
				</tr>
                <tr>
                    <td>
                        <input type="submit" name="submit" value="Add" class="button">
                    </td>
                </tr>
			</table>
    </form>
    <?php
        if(isset($_POST['submit'])){
            $p_name = $_POST['name'];
            $p_description = $_POST['description'];
            $p_code = $_POST['code'];
            $p_price = $_POST['price'];
            
            include_once('connect_db.php');

            $image = $_FILES['image']['name'];
            $filetmp = $_FILES['image']['tmp_name'];
            $target = 'image/';
            move_uploaded_file($filetmp, $target.$image);
            
            $result = mysqli_query($con, "INSERT INTO products(name,description,code,price,image) 
            VALUES('$p_name','$p_description','$p_code','$p_price','$image') ");
            echo "Data added successfully.";

            
        }
    ?>
    <a href="index.php?page=home">HOME</a>
</body>
</html>