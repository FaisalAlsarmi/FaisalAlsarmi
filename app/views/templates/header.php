<?php
if (isset($_SESSION['auth']) != 1) {
    header('Location: /home');
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <link href= "/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link rel="icon" href="/favicon.png">
        <title>COSC 4806</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="mobile-web-app-capable" content="yes">
    </head>
    <body>
        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" href="/home">COSC</a>
                    <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">

                    </button>
                </div>

                <div class="navbar-collapse collapse" id="navbar-main">

                    <ul class="nav navbar-nav navbar-right">
                        <li class="icon-bar"><a href="/home">Reminders</a> </li>
                        <?php if(isset($_SESSION['usertype']) && $_SESSION['usertype'] == 'admin'){ ?>
                            <li class="icon-bar"><a href="/reports/admin">Report</a> </li>
                        <?php } ?>
                        <li><a href="/logout">Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>