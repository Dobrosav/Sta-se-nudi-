<!DOCTYPE html>

<!--
    Autor: Dušan Gradojević 2018/0310
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
    <div id='header'>
        <table width="100%" style="table-layout: fixed;">
            <tr>
                <td align="left"><a href="<?= site_url("$controller/index") ?>"><img src="/assets/img/logoMali.png" width=80px height=80px alt="Logo"/></a></td>
                <td align="center" id="header-caption"><h1><a href="<?= site_url("$controller/index") ?>">Šta se nudi</a></h1></td>
                <td align="right">
                    <a href="<?= site_url("$controller/userProfile/{$sessionId}") ?>"><button class="btn btn-success" type="button">&nbsp; Moj profil &nbsp;</button></a>
                    <a href="<?= site_url("$controller/logout") ?>"><button class="btn btn-danger" type="button">Odjavi se</button></a>&nbsp;
                </td>
            </tr>
        </table>     
    </div>
</body>
</html>