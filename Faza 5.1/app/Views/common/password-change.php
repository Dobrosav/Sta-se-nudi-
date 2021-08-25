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
    <title>Šta se nudi - Promena lozinke</title>
</head>
<body>
    <div id='password-change' class="content">
        <h2>Promena lozinke naloga</h2><br><br>
         <?php if(isset($poruka)) echo "<font color='red'>$poruka</font><br>"; ?>
        <form action="<?= site_url("$controller/passwordChangeSubmit") ?>" method="POST">
            <table>
                <tr>
                    <td class="password-change-td">Stara lozinka*</td>
                    <td class="password-change-td"> <input id="old-password" name="old-pass" type="password" size = "27%" placeholder="Unesite staru lozinku" required></td>
                </tr>
                <tr>
                    <td class="password-change-td">Nova lozinka*</td>
                    <td class="password-change-td"> <input id="new-password" name="new-pass" type="password" size = "27%" placeholder="Unesite novu lozinku" required></td>
                </tr>
                <tr>
                    <td class="password-change-td">Potvrdite novu lozinku*</td>
                    <td class="password-change-td"> <input id="confirm-password" name="new-pass-conf" type="password" size = "27%" placeholder="Potvrdite novu lozinku" required></td>
                </tr>
                <tr>
                    <td colspan="2" align="right">
                        <br>
                        <input type="submit" class="btn btn-success" value="Potvrdi" name="Potvrdi">&nbsp;
                        <input type="reset" class="btn btn-secondary" value="Poništi" name="Poništi">
                    </td>
                </tr>
            </table>
            <br>
        </form>        
    </div>
</body>
</html>