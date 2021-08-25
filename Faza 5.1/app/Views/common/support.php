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
    <title>Šta se nudi - Podrška</title>
</head>
<body>
    <div id='support' class="content set-overflow">
        <div>
             <h1>Šta se nudi - Podrška</h1>
             <h2>Mi smo tu za vas!</h2><br>
        </div>
        <div>
            <h3>Dajte nam sugestiju:</h3><br>
            <ul style="list-style: disc;">
                <a href=<?= site_url("User/supportForm") ?>><li>Utisci o radu i izgledu sajta</li></a>
                <a href=<?= site_url("User/supportForm") ?>><li>Predlog za novo mesto/grad</li></a>
                <a href=<?= site_url("User/supportForm") ?>><li>Predlog za novu kategoriju</li></a>
                <a href=<?= site_url("User/supportForm") ?>><li>Predlog za poboljšanje</li></a>
            </ul><br><br>

            <h3>Prijavite problem:</h3><br>
            <ul style="list-style: disc;">
                <a href=<?= site_url("User/supportForm") ?>><li>Greška na sajtu</li></a>
                <a href=<?= site_url("User/supportForm") ?>><li>Problem</li></a>
                <a href=<?= site_url("User/supportForm") ?>><li>Žalba na korisnika</li></a>
            </ul><br><br>
            
            <h3>Ostalo:</h3><br>
            <ul style="list-style: disc;">
                <a href=<?= site_url("User/supportForm") ?>><li>Komentar</li></a>
                <a href=<?= site_url("User/supportForm") ?>><li>Pitanje</li></a>
                <a href=<?= site_url("User/supportForm") ?>><li>Pohvala</li></a>
             </ul><br><br>           
        </div>
    </div>
</body>
</html>