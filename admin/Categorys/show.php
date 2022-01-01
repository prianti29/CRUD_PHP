<?php



$approot = $_SERVER['DOCUMENT_ROOT']."/CRUD/";

include_once($approot. "vendor/autoload.php"); //connect with vendor

use bitm\Categorys;

$_category = new Categorys();

$category= $_category->show();

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Show Category</title>
</head>
<body>
<section>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <h1 class="text-center mb-4">Show Category</h1>

                <dl class="row">
                    <dt class="col-md-6">ID:</dt>
                    <dd class="col-md-6"><?= $category['id'];?></dd>
                </dl>
                <dl class="row">
                    <dt class="col-md-6">Name:</dt>
                    <dd class="col-md-6"><?= $category['name'];?></dd>
                </dl>
                <dl class="row">
                    <dt class="col-md-6">Link:</dt>
                    <dd class="col-md-6"><?= $category['link'];?></dd>
                </dl>
                <dl class="row">
                    <dt class="col-md-2">Created AT:</dt>
                    <dt class="col-md-4"></dt>
                    <dd class="col-md-6"><?= $category['created_at'];?></dd>
                </dl>
                <dl class="row">
                    <dt class="col-md-2">Modified AT:</dt>
                    <dt class="col-md-4"></dt>
                    <dd class="col-md-6"><?= $category['modified_at'];?></dd>
                </dl>
               <!-- IS Draft -->
               <dl class="row">
                    <dt class="col-md-2">is Draft:</dt>
                    <dt class="col-md-4"></dt>
                    <dd class="col-md-6">
                        <?php
                       /* if($product['is_active'] == 1){
                            echo "Product is active";
                        }
                        else{
                            echo "Product is not active";
                        }*/
                         echo $category ['is_draft']?'Activate' :'Deactivated';
                        ?>
                    </dd>
                </dl>
            </div>
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>