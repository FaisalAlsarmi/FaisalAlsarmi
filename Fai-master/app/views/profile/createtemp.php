<?php require_once '../app/views/templates/headerPublic.php' ?>
<div class="container">
    <div class="page-header" id="banner">
        <div class="row">
            <div class="col-lg-12">
                <h1>Please create a profile</h1>
                <p class="lead"> <?= date("F jS, Y"); ?></p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">

            <h7> Please enter profile infomation for creating</h7>
            <form  method="post" action="/profile/create">

                Firstname:<input type="text" name="firstname" value="<?=$data['firstname']?>"><br><br>
                Lastname:<input type="text" name="lastname" value="<?=$data['lastname']?>"><br><br>
                Birthdate:<input type="text" name="birthdate" placeholder="format as mm-dd-yyyy" value="<?=$data['birthdate']?>"><br><br>
                Phone number:<input type="text" name="phonenumber" value="<?=$data['phonenumber']?>"><br><br>
                Email:   <input type="text" name="email" value="<?=$data['email']?>"><br><br>
                <input type="submit" name="save" value="save">

            </form>

        </div>
        <div class="row">
            <div class="col-lg-12">
                <p class="message"> <?=$data['message']?> </p>
            </div>
        </div>
    </div>
    <div class="row">
        <a href="/profile">Back to the profile</a>
    </div>

    <?php require_once '../app/views/templates/footer.php' ?>
