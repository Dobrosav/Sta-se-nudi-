<!DOCTYPE html>

<!--
    Autor: Lazar Gospavić 2018/0677
-->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel='stylesheet' type = 'text/css' href='/assets/css/style.css'>
    <link href="/assets/img/sta_se_nudi_ico.ico" rel="shortcut icon" type="image/x-icon"/> 
    <title>Šta se nudi - Obaveštenja</title>
</head>
<body>
    <div id='announcements' class="content">
        <h1>Obaveštenja</h1>
        <hr>
        <?php
            foreach ($announcements as $ann) {
                echo "<h4>$ann->date</h4>";
                echo "<h2>$ann->title</h2>";
                echo "<p>$ann->text</p>";
                echo "<hr>";
            }
        ?>
        </div>
</body>
</html>