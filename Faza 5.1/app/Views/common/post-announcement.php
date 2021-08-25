<!DOCTYPE html>
<html lang="sr">
<head>
    <meta name="author" content="Lazar">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel='stylesheet' type = 'text/css' href='/assets/css/style.css'>
    <link href="/assets/img/sta_se_nudi_ico.ico" rel="shortcut icon" type="image/x-icon"/>  
    <title>Šta se nudi - Postavljanje obaveštenja</title>
</head>
<body>
    <div id='post-upload' class="content">
        <?php if(isset($poruka)) echo "<font color='red'>$poruka</font><br>"; ?>
        <form action="<?= site_url("Admin/announcementSubmit") ?>" method="post" id="sign-in-and-register">
        <table>
            <tr>
                <td colspan='2' style="text-align: center;"><h2>Postavljanje obaveštenja</h2></td>
            </tr>
            <tr>
                <td class="cell-titles"><b>Naslov obaveštenja*</b></td>
                <td>
                    <input id="post-name" size="50%" type="text" placeholder="Naziv oglasa" name="name" maxlength="20" required>
                </td>
            </tr>
            <tr>
                <td class="cell-titles"><b>Opis*</b></td>
                <td>
                    <textarea cols="50%" rows="7" name="description" maxlength="170" required></textarea>
                </td>
            </tr>
            <tr>
                <td align="right" colspan="2">
                    <input class="btn btn-success" type="submit" value="Potvrdi" />
                    <input class="btn btn-secondary" type="reset" value="Poništi" />
                </td>
            </tr>
        </table>
        </form>
    </div>
</body>
</html>