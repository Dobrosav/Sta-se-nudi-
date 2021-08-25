<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="author" content="Lazar">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel='stylesheet' type = 'text/css' href='../css/style.css'>
    <link href="../img/sta_se_nudi_ico.ico" rel="shortcut icon" type="image/x-icon"/>
    <title>Šta se nudi - Podrška</title>
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
    <div id='support' class="content">
        <div>
             <h1>Šta se nudi - Podrška</h1>
             <h2>Mi smo tu za vas!</h2><br>
        </div>
        <div>
            <h3>Dajte nam sugestiju:</h3><br>
            <ul style="list-style: disc;">
                <a href="SlanjePoruke"><li>Utisci o radu i izgledu sajta</li></a>
                <a href="SlanjePoruke"><li>Predlog za novo mesto/grad</li></a>
                <a href="SlanjePoruke"><li>Predlog za novu kategoriju</li></a>
                <a href="SlanjePoruke"><li>Predlog za poboljšanje</li></a>
            </ul><br><br>

            <h3>Prijavite problem:</h3><br>
            <ul style="list-style: disc;">
                <a href="SlanjePoruke"><li>Greška na sajtu</li></a>
                <a href="SlanjePoruke"><li>Problem</li></a>
                <a href="SlanjePoruke"><li>Žalba na korisnika</li></a>
            </ul><br><br>
            
            <h3>Ostalo:</h3><br>
            <ul style="list-style: disc;">
                <a href="SlanjePoruke"><li>Komentar</li></a>
                <a href="SlanjePoruke"><li>Pitanje</li></a>
                <a href="SlanjePoruke"><li>Pohvala</li></a>
             </ul><br><br>           
        </div>
    </div>
    <div id='footer'>
        <a href="SlanjePoruke">Kontakt</a>
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