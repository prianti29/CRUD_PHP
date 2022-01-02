
<?php

$approot = $_SERVER['DOCUMENT_ROOT']."/CRUD/";

use bitm\admin;
$_admin = new Admin();

$admin= $_admin->show();
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Show Admins</title>
</head>
<body>
<section>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <h1 class="text-center mb-4">Show Admins</h1>
                <dl class="row">
                    <dt class="col-md-6">ID:</dt>
                    <dd class="col-md-6"><?= $admin['id'];?></dd>
                </dl>
                <dl class="row">
                    <dt class="col-md-6">Name:</dt>
                    <dd class="col-md-6"><?= $admin['name'];?></dd>
                </dl>
                <dl class="row">
                    <dt class="col-md-6">Email:</dt>
                    <dd class="col-md-6"><?= $admin['email'];?></dd>
                </dl>
                <dl class="row">
                    <dt class="col-md-6">Password:</dt>
                    <dd class="col-md-6"><?= $admin['password'];?></dd>
                </dl>

                <!-- created_at -->

                <dl class="row">
                    <dt class="col-md-2">created_at:</dt>
                    <dt class="col-md-4"> </dt>
                    <dd class="col-md-6"><?= $admin['created_at'];?></dd>
                </dl>  
                <!-- modified_at -->

                <dl class="row">
                    <dt class="col-md-2">modified_at:</dt>
                    <dt class="col-md-4"> </dt>
                    <dd class="col-md-6"><?= $admin['modified_at'];?></dd>
                </dl>
            </div>
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>
