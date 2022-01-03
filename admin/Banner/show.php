<?php

include_once($_SERVER['DOCUMENT_ROOT']."/CRUD/config.php");
use bitm\Banner;

// $_id = $_GET['id'];

$_banner = new Banner();

// $banner= $_banner->show($_id);
$banner= $_banner->show($_id);

?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Show</title>
</head>
<body>
<section>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <h1 class="text-center mb-4">Show</h1>
                <!-- ID -->
                <dl class="row">
                    <dt class="col-md-6">ID:</dt>
                    <dd class="col-md-6"><?= $banner['id'];?></dd>
                </dl>
                <!-- Title-->
                <dl class="row">
                    <dt class="col-md-6">Title:</dt>
                    <dd class="col-md-6"><?= $banner['title'];?></dd>
                </dl>
                <!-- Is Active -->
                <dl class="row">
                    <dt class="col-md-2">Is Active</dt>
                    <dt class="col-md-4"></dt>
                    <dd class="col-md-6">
                        <?php
                        echo $banner['is_active'] ? 'Activated' : 'Deactivated';
                        ?>
                    </dd>
                </dl>
                <!-- Is draft -->
                <dl class="row">
                    <dt class="col-md-2">is Draft:</dt>
                    <dt class="col-md-4"></dt>
                    <dd class="col-md-6">
                        <?php                   
                         echo $banner ['is_draft']?'Activate' :'Deactivated';
                        ?>
                    </dd>
                </dl>
                <!-- Created at -->
                <dl class="row">
                    <dt class="col-md-2">Created AT:</dt>
                    <dt class="col-md-4"></dt>
                    <dd class="col-md-6"><?= $banner['created_at'];?></dd>
                </dl>
                <!-- Modified AT -->
                <dl class="row">
                    <dt class="col-md-2">Modified AT:</dt>
                    <dt class="col-md-4"></dt>
                    <dd class="col-md-6"><?= $banner['modified_at'];?></dd>
                </dl>
                <!-- Link -->
                <dl class="row">
                    <dt class="col-md-2">Link:</dt>
                    <dt class="col-md-4"></dt>
                    <dd class="col-md-6"><?= $banner['link'];?></dd>
                </dl>
                <!-- Promotional Message -->
                <dl class="row">
                    <dt class="col-md-2">Promotional Message:</dt>
                    <dt class="col-md-4"></dt>
                    <dd class="col-md-6"><?= $banner['promotional_message'];?></dd>
                </dl>
                <!-- Picture -->
                <dl class="row">
                    <dt class="col-md-2">Picture:</dt>
                    <dt class="col-md-4"></dt>
                    <dd class="col-md-6">
                        <?= $banner['picture'];?>
                        <img src="<?=$webroot;?>uploads/<?=$banner['picture'];?>">
                    </dd>
                </dl>
            </div>
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>