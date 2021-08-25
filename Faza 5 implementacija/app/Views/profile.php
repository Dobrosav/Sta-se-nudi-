<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="author" content="Aleksandra">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel='stylesheet' type='text/css' href='css/style.css'>
    <link href="img/sta_se_nudi_ico.ico" rel="shortcut icon" type="image/x-icon"/>
    <script src="js/java.js"></script>
    <title>Šta se nudi - Profil</title>
</head>
<body>

    <div id='menu'>
        <table>
            <tr>
                <td align="left">
                    &nbsp;
                    <select id="menu-list">
                        <option selected>Sve kategorije</option>
                        <option>Kućni ljubimci</option>
                        <option>Odeća</option>
                        <option>Tehnologija</option>
                    </select>
                    <select id="menu-list">
                        <option selected>Svi tipovi</option>
                        <option>Razmena</option>
                        <option>Poklanjanje</option>
                    </select>
                    <select id="menu-list">
                        <option selected>Sve države</option>
                        <option >Srbija</option>
                        <option>Crna Gora</option>
                        <option>Makedonija</option>
                        <option >Bosna i Hercegovina</option>
                        <option>Hrvatska</option>
                    </select>                 
                </td>
                <td align="center" style="padding-top: 2px;">
                    <form method="POST" action="<?= site_url("Pretraga") ?>">
                        <input name="pretraga" type="text" size="55" placeholder="Pretraži oglase...">
                        <button class="btn-dark" type="submit" style="padding: 2px;">Pretraži</button>
                    </form>
                </td>
                <td align="right">
                    <a href="Announcements">Obaveštenja</a>
                    &nbsp;
                </td>
            </tr>
        </table>        
    </div>
    <div id='user-profile' class="content">
        <img src="/img/defaultUserImage.png" alt="Slika korisnika" width=30% float=left>
        <div id='user-info'>
            <h1>Ime korisnika:<?php echo "{$user->getName()} {$user->getSurname()}"?> </h1>
            <h2>Korisničko ime: <?php echo "{$user->getUsername()}"?></h2>
            <h3>Ocena korisnika: </h3>
       <!--     <a href="send-message.html" target="_blank"> <input type="button" id="message-button" value="Pošaljite poruku"> </a>-->
            <br/>
            <a href="Profile/allads">Svi aktivni oglasi</a>
            <a href="Profile/insertAd">Postavi oglas</a>
            <a href="PasswordForget">Promena lozinke</a>
           <?php echo anchor("Profile/deleteRequest/{$user->getIdk()}","Obrisi nalog")?>
            <!--<div>
                <span onmouseover="starmark(this)" onclick="result()" id="1one" style="font-size:40px;cursor:pointer;" class="fa fa-star checked"></span>
                <span onmouseover="starmark(this)" onclick="result()" id="2one" style="font-size:40px;cursor:pointer;" class="fa fa-star "></span>
                <span onmouseover="starmark(this)" onclick="result()" id="3one" style="font-size:40px;cursor:pointer;" class="fa fa-star "></span>
                <span onmouseover="starmark(this)" onclick="result()" id="4one" style="font-size:40px;cursor:pointer;" class="fa fa-star"></span>
                <span onmouseover="starmark(this)" onclick="result()" id="5one" style="font-size:40px;cursor:pointer;" class="fa fa-star"></span>
                <span id="rate">4.7</span>
            </div>-->
        </div>
    </div>
    <div id='footer'>
        <a href="Support">Kontakt</a>
        &nbsp;|&nbsp;
        <a href="">Uputstva</a>
        &nbsp;|&nbsp;
        <a href="">O nama</a>
        &nbsp;|&nbsp;
        <a href="">Pravila korišćenja</a>
        &nbsp;|&nbsp;
        <a href="Support">Podrška</a>
    </div>
</body>
</html>