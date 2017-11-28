<?php require_once '../app/views/templates/header.php' ?>
<div class="container">
    <div class="page-header" id="banner">
        <div class="row">
            <div class="col-lg-12">
                <h1>Hey, <?=$_SESSION['name']?></h1>
                <p class="lead"> <?= date("F jS, Y"); ?></p>
            </div>
        </div>
    </div>

    <h2>Reminder Details</h2>

    <div class="row">
        <div class="col-lg-12">
            <p> <?=$data['message']?> </p>
        </div>
    </div>

    <?php
        if(empty($data['message'])) {
            ?>

            <div class="row">
                <div class="col-lg-12">
                    <p> id: <?= $data['values']['id'] ?> </p>
                    <p> subject: <?= $data['values']['subject'] ?> </p>
                    <p> description: <?= $data['values']['description'] ?> </p>
                    <p> created_date: <?= $data['values']['created_date'] ?> </p>
                </div>
            </div>

            <?php
        }
    ?>

    <div class="row">
        <a href="/home">Back to the list</a>
    </div>

    <?php require_once '../app/views/templates/footer.php' ?>
