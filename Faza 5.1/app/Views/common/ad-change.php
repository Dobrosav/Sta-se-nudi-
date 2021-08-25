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
    <title>Šta se nudi - Izmena oglasa</title>
</head>
<body>
    <div id='post-upload' class="content">
        <form action="<?= site_url("User/adChangeSubmit/$adId") ?>" method="POST" enctype=multipart/form-data id="sign-in-and-register">
        <table>
            <tr>
                <td colspan='2' style="text-align: center;"><h2>Izmena oglasa <?= $title ?></h2></td>
            </tr>   
            <tr>
                <td class="cell-titles"><b>Kategorija</b></td>
                <td><b><?= $category ?></b></td>
            </tr>
            <tr>
                <td class="cell-titles"><b>Tip*</b></td>
                <td>            
                    <input id="razmena" type="radio" name="tip" value="Razmena" checked>
                    <label for="razmena">Razmena</label>
                    <input id="poklanjanje" type="radio" name="tip" value="Poklanjanje">
                    <label for="poklanjanje">Poklanjanje</label>
                </td>
            </tr>
            <tr>
                <td class="cell-titles"><b>Stanje*</b></td>
                <td>
                    <ul style="list-style-type:none;">
                        <li>
                            <input id="kao-novo" type="radio" name="stanje" value="Kao novo (nekorišćeno)" checked>
                            <label for="kao-novo">Kao novo (nekorišćeno)</label>
                        </li>
                        <li>
                            <input id="korisceno" type="radio" name="stanje" value="Korišćeno">
                            <label for="korisceno">Korišćeno</label>
                        </li>
                        <li>
                            <input id="neispravno" type="radio" name="stanje" value="Neispravno (oštećeno)">
                            <label for="neispravno">Neispravno (oštećeno)</label>
                        </li>
                    </ul>                             
                </td>
            </tr>
            <tr>
                <td class="cell-titles"><b>Opis</b></td>
                <td>
                    <textarea cols="50%" rows="7" name="description" maxlength="170"></textarea>
                </td>
            </tr>
            <tr>
                <td class="cell-titles" colspan="2">
                    <form action="">
                        <input type="file" accept="image/*" name="file">
                        <!-- add multiple -->
                    </form>  
                </td>
            </tr>
            <tr>
                <td align="right" colspan="2">
                    <input class="btn btn-success" type="submit" name="submit" value="Potvrdi izmenu" />
                    <input class="btn btn-secondary" type="reset" value="Poništi" />
                </td>
            </tr>
        </table>
        </form>
    </div>
</body>
</html>