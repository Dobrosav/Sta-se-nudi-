<!DOCTYPE html>
<html lang="sr">
<head>
    <meta name="author" content="Dusan">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="http://localhost:8080/css/style.css">
    <link href="http://localhost:8080/img/sta_se_nudi_ico.ico" rel="shortcut icon" type="image/x-icon"/>
    <title>Šta se nudi - Postavljanje oglasa</title>
</head>
<body>
<div id='menu'>
    <table>
        <tr>
            <td align="left">&nbsp;
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
            </td>
        </tr>
    </table>
</div>
    <div id='post-upload' class="content">
        <form method="post" action="<?= site_url("Profile/insertNewAd") ?>" enctype="multipart/form-data">
        <table>
            <tr>
                <td colspan='2' style="text-align: center;"><h2>Postavljanje oglasa</h2></td>
            </tr>
            <tr>
                <td class="cell-titles"><b>Naziv oglasa*</b></td>
                <td>
                    <input name="naziv" id="post-name" size="50%" type="text" placeholder="Naziv oglasa" required>
                </td>
            </tr>
            <tr>
                <td class="cell-titles"><b>Kategorija*</b></td>
                <td>
                    <select name="category">
                        <option selected disabled>Izaberite kategoriju</option>
                        <option value="Ljubimac">Ljubimci</option>
                        <option value="Odeca">Odeca</option>
                        <option value="Tehnika">Tehnika</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td class="cell-titles"><b>Tip*</b></td>
                <td>            
                    <input id="razmena" name="radiob" type="radio" value="Razmena" checked>
                    <label for="razmena">Razmena</label>
                    <input id="poklanjanje" name="radiob" type="radio" value="Poklanjanje">
                    <label for="poklanjanje">Poklanjanje</label>
                </td>
            </tr>

                   <tr>
                <td class="cell-titles"><b>Opis</b></td>
                <td>
                    <textarea name="opis" cols="50%" rows="7"></textarea>
                </td>
            </tr>
            <<tr>
                <td class="cell-titles" colspan="2">

                        <input name="image" type="file" multiple required accept="image/*">
                </td>
            </tr>
            <tr>
                <td align="right" colspan="2">
                    <input class="btn btn-success" type="submit" value="Potvrdi" />
                    <a href="http://localhost:8080/Profile"><input type="button" class="btn btn-secondary" value="Nazad" /></a>
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
    </div>
</body>
</html>