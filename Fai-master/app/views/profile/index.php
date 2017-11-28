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

    <h2>Profile Details</h2>

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
                    <p> username: <?= $data['values']['username'] ?> </p>
                    <p> firstname: <?= $data['values']['firstname'] ?> </p>
                    <p> lastname: <?= $data['values']['lastname'] ?> </p>
                    <p> birthdate: <?= $data['values']['birthdate'] ?> </p>
                    <p> phonenumber: <?= $data['values']['phonenumber'] ?> </p>
                    <p> email: <?= $data['values']['email'] ?> </p>

                </div>
            </div>

            <?php
        }
    ?>

    <div class="row">
        <a href="/home">Back to the home page</a>
    </div>

    <?php require_once '../app/views/templates/footer.php' ?>
