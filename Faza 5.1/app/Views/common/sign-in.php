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
    <title>Šta se nudi - Prijava</title>
</head>
<body>
    <div class="content" style="padding-top: 30px;">
        <br><br> 
        <div class="row">
            <div class="col-sm-3">&nbsp;</div>
            <div class="col-sm-6" id="sign-in-and-register"><h3>Prijava</h3></div>
            <div class="col-sm-3">&nbsp;</div>
        </div>
        <div class="row">
            <div class="col-sm-3">&nbsp;</div>
            <div class="col-sm-6" id="sign-in-and-register">
                <?php if(isset($poruka)) echo "<font color='red'>$poruka</font><br>"; ?>
                <form action="<?= site_url("Guest/loginSubmit") ?>" method="post" id="sign-in-and-register">
                    <table>
                        <tr>
                            <td>Korisničko ime</td>
                            <td><input id="username" name="username" type="text"></td>
                            <td><font color='red'> 
                                <?php if(!empty($errors['username'])) 
                                    echo $errors['username'];
                                ?></font>
                            </td>
                        </tr>
                        <tr>
                            <td>Lozinka</td>
                            <td><input id="pass" name="password" type="password"></td>
                            <td><font color='red'> 
                                <?php if(!empty($errors['password'])) 
                                    echo $errors['password'];
                                ?></font>
                            </td>
                        </tr>
                        <tr>
                            <td align="center" colspan="2">
                                <input type="submit" value="Prijavi se" class="btn btn-success" >
                                <br>
                                <?= anchor("$controller/passwordForget", "Zaboravili ste lozinku?") ?>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
            <div class="col-sm-3">&nbsp;</div>
        </div>
   </div>
</body>
</html>