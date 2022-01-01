
<?php
$webroot = 'http://localhost/CRUD/';

$_id = $_GET['id'];

//Connect to database
$conn = new PDO("mysql:host=localhost;dbname=ecommerce",
    'root', '');
//set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE,
    PDO::ERRMODE_EXCEPTION);

$query = "SELECT * FROM `cart` WHERE id = :id";

$stmt = $conn->prepare($query);

$stmt->bindParam(':id', $_id);

$result = $stmt->execute();

$cart = $stmt->fetch();

/*echo "<pre>";
print_r($product);
echo "</pre>";*/

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Edit Cart</title>
</head>
<body>
<section>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <h1 class="text-center mb-4">Edit Cart</h1>
                <form method="post" action="update.php" enctype="multipart/form-data">
                    <!-- Id -->
                    <div class="mb-3 row">
                        <label for="inputId" class="col-md-3 col-form-label"></label>
                        <div class="col-md-9">
                            <input
                                type="hidden"
                                class="form-control"
                                id="inputId"
                                name="id"
                                value="<?=$cart['id']?>"
                            >
                        </div>
                    </div>
                    <!-- Producr id -->
                    <div class="mb-3 row">
                        <label for="inputTitle" class="col-md-3 col-form-label">Product ID:</label>
                        <div class="col-md-9">
                            <input
                                type="text"
                                class="form-control"
                                id="inputPro_id"
                                name="product_id"
                                value="<?=$cart['product_id']?>"
                            >
                        </div>
                    </div>
                    <!-- Product Title -->
                    <div class="mb-3 row">
                        <label for="inputTitle" class="col-md-3 col-form-label">Product Title:</label>
                        <div class="col-md-9">
                            <input
                                type="text"
                                class="form-control"
                                id="inputPro_title"
                                name="product_title"
                                value="<?=$cart['product_title']?>"
                            >
                        </div>
                    </div>
                    <!-- Quantity -->
                    <div class="mb-3 row">
                        <label for="inputTitle" class="col-md-3 col-form-label">Quanity:</label>
                        <div class="col-md-9">
                            <input
                                type="text"
                                class="form-control"
                                id="inputQty"
                                name="qty"
                                value="<?=$cart['qty']?>"
                            >
                        </div>
                    </div>
                    <!-- Picture -->
                    <div class="mb-3 row">
                        <label for="inputFile" class="col-md-3 col-form-label">Picture:</label>
                        <div class="col-md-9">
                            <input
                                    type="file"
                                    class="form-control"
                                    id="inputFile"
                                    name="picture"
                                    value="<?=$cart['picture'];?>"
                            >
                        </div>
                        <img src="<?=$webroot;?>uploads/<?=$cart['picture'];                       ?>">
                        <input type="hidden" name="old_picture"
                               value="<?=$cart['picture'];?>">
                    </div>





                    <!-- Submit -->
                    <div class="mb-3 row">
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary mb-3">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>
