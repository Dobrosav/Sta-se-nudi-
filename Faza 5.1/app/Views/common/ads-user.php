<!DOCTYPE html>

<!--
    Autor: Dušan Gradojević 2018/0310
-->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel='stylesheet' type = 'text/css' href='/assets/css/style.css'>
    <link href="/assets/img/sta_se_nudi_ico.ico" rel="shortcut icon" type="image/x-icon"/> 
    <title>Šta se nudi - Svi oglasi korisnika</title>
</head>
<body>
    <div id='user-ads' class="content">
        <?php if ($userId != 'admin') { ?>
            <h1>Oglasi korisnika <?= $username ?>:</h1>
        <?php } ?>
        <?php if ($userId == 'admin') { ?>
            <h1>Neodobreni oglasi:</h1>
        <?php } ?>
        <br>
        <table id='userAds'>
        <?php
            foreach ($ads as $ad) {
                echo "<tr><td align='center'><h2>".anchor("$controller/getAd/{$ad->idO}", "$ad->title")."</h2></td></tr>";
                echo "<tr><td align='center'><p id='ad'>$ad->text</p></td></tr>";
            }
        ?>
        </table>
        <br>
    </div>
</body>
</html>