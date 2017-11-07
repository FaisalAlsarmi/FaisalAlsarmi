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

    <div class="row">
        <div class="col-lg-12">
            <p> <?=$data['message']?> </p>
        </div>
    </div>

    <h2>Reminder Page</h2>

    <table class='table table-striped table-condensed'>
        <tr>
            <th>Subject</th>
            <th>Action</th>
        </tr>

        <?php foreach ($data['list'] as $items){ ?>
            <tr>
                <td><?=$items['subject']?></td>
                <td><a href="/remind/remove/<?=$items['id']?>">Remove</a> |
                    <a href="/remind/<?=$items['id']?>">View</a> |
                    <a href="/remind/update/<?=$items['id']?>">Update</a>
                </td>
            </tr>
        <?php }?>

    </table>

    <div class="row">
        <a href="/remind/create"> Create a Reminder </a>
    </div>

    <?php require_once '../app/views/templates/footer.php' ?>
