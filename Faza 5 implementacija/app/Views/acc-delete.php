<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="author" content="Dusan">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="http://localhost:8080/css/style.css">
    <link href="http://localhost:8080/img/sta_se_nudi_ico.ico" rel="shortcut icon" type="image/x-icon"/>
    <title>Šta se nudi - Brisanje naloga</title>
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
    <div id='acc-delete' class="content">
    <form method="post" action="<?= site_url("Profile/delete")?>">
        <table>
            <tr>
                <td align="center">
                    <h2>Brisanje naloga</h2>
                </td>                
            </tr>
            <tr>
                <td>
                    <p>Da li ste sigurni da želite da obrišete svoj nalog? Ukoliko nastavite, sve vaše objave i aktivnosti će biti obrisane i nećete biti u mogućnosti da ih povratite.</p>
                </td>                
            </tr>
            <tr>
                <td style="padding-left: 3%;">
                    <ol>
                        <li>Za nastavak radnje pritisnite dugme „Obriši”;</li>
                        <li>Za povratak na početnu stranu pritisnite dugme „Nazad”.</li>
                    </ol>
                </td>                
            </tr>
            <tr>
                <td align="right">
                    <?php echo anchor("Profile/delete/{$id}","Obrisi")?>
                   <?php echo anchor("Profile",'Nazad')?>
                </td>
            </tr>
        </table>
    </form>
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
    </div></body>
</html>