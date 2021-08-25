<!DOCTYPE html>

<!--
    Autor: Aleksandra Milović 2018/0126
-->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel='stylesheet' type = 'text/css' href='/assets/css/style.css'>
    <link href="/assets/img/sta_se_nudi_ico.ico" rel="shortcut icon" type="image/x-icon"/>
    <title>Šta se nudi - Prijemno sanduče</title>
</head>
<body>
    <div class="content set-overflow">
        <h1>Inbox</h1><hr>
        <?php
        $userModel = new \App\Models\UserModel();
        foreach($friends as $friend)
        {
            $user = $userModel->find($friend->user_to == $sessionId ? $friend->user_from : $friend->user_to);
            echo anchor("$controller/chat/{$user->idK}", "<h4>$user->name"." "."$user->surname</h4><hr>");
        }
        ?>
    </div>   
</body>
</html>
                        