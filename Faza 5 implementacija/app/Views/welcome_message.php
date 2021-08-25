<!DOCTYPE html>
<html lang="sr">
<head>
    <meta name="author" content="Dobrosav">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="..\css\style.css">
    <link rel="stylesheet" href="css\style.css">
    <link href="img/sta_se_nudi_ico.ico" rel="shortcut icon" type="image/x-icon"/>
    <title>Šta se nudi - Početna</title>    
    
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
    <div class="content" style="padding-top: 30px;">
        <br><br> 
        <div class="row">
            <div class="col-sm-3">&nbsp;</div>
            <div class="col-sm-6"><h3>Kategorije</h3></div>
            <div class="col-sm-3">&nbsp;</div>
        </div> 
        <div class="row">
            <div class="col-sm-3">&nbsp;</div>
            <div class="col-sm-6 d-flex">
                <div class="kategorija">
                    <a href="Pets"><img class="kategorija" src="img/cad.jpg"><br>Ljubimci</a>
                </div>
                <div class="d-inline-block">
                    <a href="Clothes"><img class="kategorija" src="img/clotches.jpg"><br>Odeća</a>
                </div>
                <div class="d-inline-block">
                    <a href="Tech"><img class="kategorija" src="img/tech.jpg"><br>Tehnika</a>
                </div>
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