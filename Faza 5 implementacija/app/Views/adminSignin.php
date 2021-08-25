<!DOCTYPE html>
<html lang="sr">
<head>
    <meta name="author" content="Dobrosav">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link href="img/sta_se_nudi_ico.ico" rel="shortcut icon" type="image/x-icon"/>
    <title>Šta se nudi - Prijava Admin</title>
    <script src="js/java.js"></script>
</head>
<body onload="loading2()">
<div id='header'>
    <table width="100%" style="table-layout: fixed;">
        <tr>
            <td align="left"><a href="Home"><img src="img/logoMali.png" width=80px height=80px alt="Logo"/></a></td>
            <td align="center" id="header-caption"><h1><a href="Home">Šta se nudi</a></h1></td>
            <td align="right">
                        &nbsp; &nbsp;&nbsp;
            </td>
        </tr>
    </table>
</div>
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
<div class="content" style="padding-top: 30px;">
    <br><br>
    <div class="row">
        <div class="col-sm-3">&nbsp;</div>
        <div class="col-sm-6" id="sign-in-and-register"><h3>Prijava</h3></div>
        <div class="col-sm-3">&nbsp;</div>
    </div>
    <div class="row">
        <div class="col-sm-3"><?php if(isset($poruka)) echo "<font color='red'>$poruka</font><br>"; ?></div>
        <div class="col-sm-6" id="sign-in-and-register">
            <form name="loginform" action="<?= site_url("Administrator/loginSubmit") ?>" method="POST">
                <table>
                    <tr>
                        <td>Korisničko ime</td>
                        <td><input minlength="3" name="username" required id="username" type="text"></td>
                    </tr>
                    <tr>
                        <td>Lozinka</td>
                        <td><input name="pass" minlength="3" id="pass" required type="password"></td>
                    </tr>
                    <tr>
                        <td align="center" colspan="2">
                            <button type="submit"  class="btn btn-success">Prijavi se</button>
                        </td>
                    </tr>
                </table>
                <div class="row">
                    <div class="col-sm-12">
                        <div id="alert" class="alert alert-danger alert-dismissable">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="alert alert-danger alert-dismissable">
                                        <!--<button class="close" data-dismiss="alert">&times;</button>-->
                                        Neka polja nisu ispravno popunjena ili su prazna. Pokušajte ponovo.
                                    </div>
                                </div>
                            </div>
            </form>
        </div>
        <div class="col-sm-3">&nbsp;</div>
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