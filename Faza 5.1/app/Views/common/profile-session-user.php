<!DOCTYPE html>

<!--
    Autor: Aleksandra Milović 2018/0126
-->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel='stylesheet' type = 'text/css' href='/assets/css/style.css'>
    <link href="/assets/img/sta_se_nudi_ico.ico" rel="shortcut icon" type="image/x-icon"/> 
    <title>Šta se nudi - Profil</title>
</head>
<body>
    <div id='user-profile' class="content">
        <img src="/assets/img/defaultUserImage.png" alt="Slika korisnika" width=30% float=left>
        <div id='user-info'>
            <h1> <?= $name." ".$surname  ?> </h1>
            <h2>Korisničko ime: <?= $username ?></h2>
            <h2>Država: <?= $country ?> </h2>
            
            <?php if ($controller == 'User') { ?>
                <h2>Broj telefona: <?= $num ?> </h2>
            <?php } ?>
            
            
            <h3>Član od <?= $date ?></h3>
            
             
            
            <?php if ($controller == 'User') { ?>
                <h3>Ocena korisnika: <?= $rating?></h3>
                <form method='POST' action='<?= site_url("$controller/postAd") ?>'>
                    <button type='submit' class='btn btn-info' id='message-button'>Postavi oglas</button>
                </form>
                <?= anchor("$controller/showUserAds/{$sessionId}", "Svi aktivni oglasi");?>
            <!--    <?= anchor("$controller/postAd", "Postavi oglas");?>  -->
                <?= anchor("$controller/changePassword", "Promena lozinke");?>
                <?= anchor("$controller/accountDeleteForm/{$sessionId}", "Obriši nalog");?> 
                &nbsp;&nbsp;
            <?php } ?>
                
            <?php if ($controller == 'Admin') { ?>
                <?= anchor("$controller/changePassword", "Promena lozinke");?>
            <?php } ?>    
                
            <br>
        </div>
    </div>
</body>
</html>