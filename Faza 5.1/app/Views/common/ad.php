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
    <title>Šta se nudi - Oglas</title>
</head>
<body>
    <div class="content set-overflow">
        <div style='text-align: center'>
            <h1><?= $title ?></h1>
        </div>
        <div id="ad-position">
            <div class="ad-body">
                <div class="ad-user">
                    <p><?= anchor("$controller/userProfile/{$userId}", "$username") ?></p>
                    <?php
                    if ($sessionId != $userId) {
                    ?>
                        <form method="POST" action="<?= site_url("$controller/sendMessage/$userId") ?>">
                            <button class="btn btn-info" type="submit">Pošalji poruku</button>
                        </form>
                    <?php } ?>
                </div>
                <div>
                    <p>Država: &nbsp; <?= $country ?></p><br/>
                    <p>Kategorija: &nbsp; <?= $category ?></p><br/>
                    <p>Tip: &nbsp; <?= $type ?></p><br/>
                    <p>Stanje: &nbsp; <?= $state ?></p><br/>
                    <p>Opis: &nbsp; <?= $description ?></p><br/>
                </div>            
            </div>
            <div class="ad-images">
                <?php
                if ($sessionId == $userId && $controller != 'Admin') {
                ?>
                    <div class="flex-row">
                        <form method='POST' action="<?= site_url("$controller/deleteAdForm/$adId") ?>">
                            <input class='btn btn-danger' type='submit' value='Obriši oglas'>
                        </form>
                        &nbsp;
                        <form method='POST' action="<?= site_url("$controller/adChange/$adId") ?>">
                            <input class='btn btn-info' type='submit' value='Izmeni'>
                        </form>
                    </div>
                    <br>
                <?php } ?>
                
                
                <?php if ($controller == 'Admin'){ ?>
                    <?php if ($isValid == false){ ?>
                        <div class="flex-row">
                            <form method='POST' action="<?= site_url("$controller/approveAd/$adId") ?>">
                                <input class='btn btn-success' type='submit' value='Odobri oglas'>
                            </form>
                            &nbsp;
                    <?php } ?>
                        <form method='POST' action="<?= site_url("$controller/deleteAdForm/$adId") ?>">
                            <input class='btn btn-danger' type='submit' value='Obriši oglas'>
                        </form>
                    </div>
                    <br>
                <?php } ?>
                <br>
                <?php if ($img != null){ ?>
                        <img src="/assets/imgAds/<?= $img ?>" width="300" height="300">
                <?php } ?>
                
                
            </div>
        </div>
    </div>   
</body>
</html>
                        