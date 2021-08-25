<!DOCTYPE html>

<!--
    Autor: Dobrosav Vlašković 2018/0005
-->
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel='stylesheet' type = 'text/css' href='/assets/css/style.css'>
    <link href="/assets/img/sta_se_nudi_ico.ico" rel="shortcut icon" type="image/x-icon"/>
</head>
<body>
    <div id='menu'>
        <table>
            <tr>
                <form method="GET" action="<?= site_url("$controller/search") ?>">
                    <td align="left">
                        &nbsp;
                        <select name="search-category" class="menu-list">
                            <option selected>Sve kategorije</option>
                            <option>Ljubimci</option>
                            <option>Odeca</option>
                            <option>Tehnika</option>
                        </select>
                        <select name="search-type" class="menu-list">
                            <option selected>Svi tipovi</option>
                            <option>Razmena</option>
                            <option>Poklanjanje</option>
                        </select>
                        <select name="search-country" class="menu-list">
                            <option selected>Sve države</option>
                            <option >Srbija</option>
                            <option>Crna Gora</option>
                            <option>Makedonija</option>
                            <option >Bosna i Hercegovina</option>
                            <option>Hrvatska</option>
                        </select>
                    </td>
                    <td align="center" style="padding-top: 2px;">
                        <input name="search-bar" type="text" size="55" placeholder="Pretraži oglase...">
                        <button class="btn-dark" type="submit" style="padding: 2px;">Pretraži</button>
                    </td>
                </form>
                <td align="right">
                    <?php if ($controller == 'Admin') { ?>
                        <a href="<?= site_url("$controller/pendingPosts") ?>">Neodobreni oglasi</a>&nbsp;&nbsp;
                        <a href="<?= site_url("$controller/postAnnouncement") ?>">Postavi obaveštenje</a>
                        &nbsp;&nbsp;
                    <?php } ?>
                    <?php if ($controller == 'User' || $controller == 'Admin') { ?>
                        <a href="<?= site_url("$controller/inbox") ?>">Poruke</a>
                        &nbsp;&nbsp;
                    <?php } ?>
                    <a href="<?= site_url("$controller/showAnnouncements") ?>">Obaveštenja</a>
                    &nbsp;
                </td>
            </tr>
        </table>        
    </div>
</body>
</html>