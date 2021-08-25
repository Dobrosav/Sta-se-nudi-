<html lang="sr">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
    <body>
    <?php
        echo "".anchor("Administrator/logout","Odjava")." admin";
    ?>
        <div class="container">
            <div class="row">
            <div class="col-sm-12"> <h1> Zahtevi za korisnike</h1></div>
            </div>
            <?php
            foreach ($korisnici as $pet){
                echo "<div class='row'>";
                echo "<div class='col-sm-3'>&nbsp;</div>";
                echo "<div class='col-sm-6 border border-dark'><h5>KorisnikID{$pet->getIdk()}</h5> {$pet->getUsername()}</div>";
                echo "<div class='col-sm-3'>".anchor("Administrator/PotvrdaK/{$pet->getIdk()}","potvrdi Korisnika")." ".anchor("Administrator/brisiK/{$pet->getIdk()}","Obrisi Korisnika")."</div></div>";
            }
            ?>
            <div class="row">
                <div class="col-sm-12"> <h1>Zahtevi za oglase</h1></div>
            </div>
            <?php
            foreach ($oglasi as $pet){
                echo "<div class='row'>";
                echo "<div class='col-sm-3'>&nbsp;</div>";
                echo "<div class='col-sm-6 border border-dark'><h5>{$pet->getTitle()}</h5> </br> {$pet->getText()}</div>";
                echo "<div class='col-sm-3'>".anchor("Administrator/PotvrdaO/{$pet->getIdo()}","potvrdi oglas")." ".anchor("Administrator/brisiO/{$pet->getIdo()}","Obrisi Oglas")."</div></div>";
            }
            ?>
            <div class="row">
                <div class="col-sm-12"> <h1> Potvrdjeni korisnici</h1></div>
            </div>
            <?php
            foreach ($korisnicip as $pet){
                echo "<div class='row'>";
                echo "<div class='col-sm-3'>&nbsp;</div>";
                echo "<div class='col-sm-6 border border-dark'><h5>KorisnikID{$pet->getIdk()}</h5> {$pet->getUsername()}</div>";
                echo "<div class='col-sm-3'>".anchor("Administrator/brisiK/{$pet->getIdk()}","Obrisi Korisnika")."</div></div>";
            }
            ?>
            <div class="row">
                <div class="col-sm-12"> <h1> Potvrdjeni oglasi</h1></div>
            </div>
            <?php
            foreach ($oglasip as $pet){
                echo "<div class='row'>";
                echo "<div class='col-sm-3'>&nbsp;</div>";
                echo "<div class='col-sm-6 border border-dark'><h5>{$pet->getTitle()}</h5> </br> {$pet->getText()}</div>";
                echo "<div class='col-sm-3'>".anchor("Administrator/brisiO/{$pet->getIdo()}","Obrisi Oglas")."</div></div>";
            }
            ?>
        </div>
    </body>
</html>