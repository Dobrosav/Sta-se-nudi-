<!DOCTYPE html>

<!--
    Autor: Dobrosav Vlašković 2018/0005
-->
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel='stylesheet' type = 'text/css' href='/assets/css/style.css'>
    <link href="/assets/img/sta_se_nudi_ico.ico" rel="shortcut icon" type="image/x-icon"/>  
    <title>Šta se nudi - Pretraga</title>
</head>
<body>
    <div class="content set-overflow">
    <?php
        if (!empty($searched)) {
            echo "<h4>Rezultati pretrage $searched:</h4>";
        }
        else {
            echo "<h1>Svi oglasi</h1>";
        }   
        echo "<br>";
        foreach ($ads as $ad) {
            echo "<h2>".anchor("$controller/getAd/{$ad->idO}", "$ad->title")."</h2>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<p>$ad->text</p><br>";
        }
    ?>
    </div>
</body>
</html>