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
    <title>Šta se nudi - Podrška (forma)</title>
</head>
<body>
    <div id='support' class="content">
        <h2>Pomozite nam da poboljšamo Šta se nudi?</h2><br><br>
        <form action="<?= site_url("$controller/sendMessageSubmit/1/true") ?>" method="POST">
            <table>
                <tr>
                    <td colspan="2" style="text-align: center;"><b>Unesite tekst komentara/pitanje:</td>
                </tr>
                <tr>
                    <td colspan="2">
                        <textarea rows="10" cols="80" name="message-body" required=""></textarea>
                    </td>
                </tr>
                <tr>
                    <td align="right" colspan="2">                        
                        <input type="submit" class="btn btn-success" value="Pošalji">
                        <input type="reset" class="btn btn-secondary" value="Poništi">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>