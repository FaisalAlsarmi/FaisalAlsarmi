<?php require_once '../app/views/templates/headerPublic.php' ?>
<div class="container">
    <div class="page-header" id="banner">
        <div class="row">
            <div class="col-lg-12">
                <h1>Please create a reminder</h1>
                <p class="lead"> <?= date("F jS, Y"); ?></p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">

            <h7> Please enter reminder infomation for creating</h7>
            <form  method="post" action="/remind/create">

                Subject:<input type="text" name="subject"><br><br>
                Description:   <input type="text" name="description"><br><br>
                <input type="submit" name="save" value="save">

            </form>

        </div>
        <div class="row">
            <div class="col-lg-12">
                <p> <?=$data['message']?> </p>
            </div>
        </div>
    </div>
    <div class="row">
        <a href="/home">Back to the list</a>
    </div>

    <?php require_once '../app/views/templates/footer.php' ?>
