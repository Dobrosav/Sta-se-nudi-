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
    <title>Šta se nudi - Registracija</title>
</head>
<body>
    <div class="content" style="padding-top: 30px;">
        <br><br> 
        <div class="row">
            <div class="col-sm-3">&nbsp;</div>
            <div class="col-sm-6" id="sign-in-and-register"><h3>Registracija</h3></div>
            <div class="col-sm-3">&nbsp;</div>
        </div> 
        <div class="row">
            <div class="col-sm-3">&nbsp;</div>
            <div class="col-sm-6" id="sign-in-and-register">
                <?php if(isset($poruka)) echo "<font color='red'>$poruka</font><br>"; ?>
                <form action="<?= site_url("Guest/registerSubmit") ?>" method="post" id="sign-in-and-register">
                    <table>
                        <tr>
                            <td>Ime*</td>
                            <td><input id="ime" name="name" type="text"></td>
                            <td><font color='red'> 
                                <?php if(!empty($errors['name'])) 
                                    echo $errors['name'];
                                ?></font>
                            </td>
                        </tr>
                        <tr>
                            <td>Prezime*</td>
                            <td><input id="prezime" name="surname" type="text"></td>
                            <td><font color='red'> 
                                <?php if(!empty($errors['surname'])) 
                                    echo $errors['surname'];
                                ?></font>
                            </td>
                        </tr>
                        <tr>
                            <td>Korisničko ime*</td>
                            <td><input id="username" name="username" type="text"></td>
                            <td><font color='red'> 
                                <?php if(!empty($errors['username'])) 
                                    echo $errors['username'];
                                ?></font>
                            </td>
                        </tr>
                        <tr>
                            <td>E-mail*</td>
                            <td><input id="email" name="email" type="email"></td>
                            <td><font color='red'> 
                                <?php if(!empty($errors['email'])) 
                                    echo $errors['email'];
                                ?></font>
                            </td>
                        </tr>
                        <tr>
                            <td>Lozinka*</td>
                            <td><input id="pass" name="password" type="password"></td>
                            <td><font color='red'> 
                                <?php if(!empty($errors['password'])) 
                                    echo $errors['password'];
                                ?></font>
                            </td>
                        </tr>
                        <tr>
                            <td>Potvrdite lozinku*</td>
                            <td><input id="passr" name="confirmpassword" type="password"></td>
                            <td><font color='red'> 
                                <?php if(!empty($errors['confirmpassword'])) 
                                    echo $errors['confirmpassword'];
                                ?></font>
                            </td>
                        </tr>
                        <tr>
                            <td>Država*</td>
                            <td><input id="country" name="country" type="text"></td>
                            <td><font color='red'> 
                                <?php if(!empty($errors['country'])) 
                                    echo $errors['country'];
                                ?></font>
                            </td>
                        </tr>
                        <tr>
                            <td>Broj telefona*</td>
                            <td><input id="phone" name="phone" type="text"></td>
                            <td><font color='red'> 
                                <?php if(!empty($errors['phone'])) 
                                    echo $errors['phone'];
                                ?></font>
                            </td>
                        </tr>
                        <tr>
                            <td align="center" colspan="2">
                                <input type="submit" value ="Registruj se" class="btn btn-success">
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