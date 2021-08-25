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
    <title>Šta se nudi - Zaboravljena lozinka</title> 
</head>
  <body>
    <div id="password-forget" class="content"> 
        <?php if(isset($poruka)) echo "<font color='red'>$poruka</font><br>"; ?>
        <form method="post" action="<?= site_url("Guest/mailForgetPassword") ?>">
            <table>
                <tr>
                    <td colspan="2" align="center">
                        <h2>Resetovanje zaboravljene lozinke</h2><br>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <p>Unesite korisničko ime Vašeg naloga na koju će Vam biti prosleđena zaboravljena lozinka.</p>
                    </td>
                </tr>
                <tr>
                    <td class="password-forget-td" align="right">
                        <br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        Korisničko ime:
                    </td>
                    <td class="password-forget-td" align="center">
                        <br>
                        <input id="email" type="text" name="username" size="50%" placeholder="Unesite korisničko ime">
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="right">
                        <br>
                        <input type="submit" class="btn btn-success" value="Pošalji" name="Pošalji">&nbsp;
                        <input type="reset" class="btn btn-secondary" value="Poništi" name="Poništi">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>