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
    <title>Šta se nudi - Prepiska</title>
</head>
<body>
    <div class="content set-overflow">
        <?= anchor("$controller/userProfile/{$userId}", "<h4>$name"." "."$surname</h4><hr>") ?>
        <?php
        
        $last = '';
        foreach($chat as $msg)
        {   
            if ($last == '')
            {
                $last = $msg->user_from;
                echo $last == $sessionId ? "<h5>$nameSession"." "."$surnameSession:</h5>" : "<h5>$name"." "."$surname:</h5>";
            }
            
            
            
            if ($msg->user_from == $sessionId)
            {
                if ($last != $msg->user_from)
                {   
                    $last = $msg->user_from;
                    echo "<h5>$nameSession"." "."$surnameSession:</h5>";                    
                }
                echo "<p>$msg->message</p>";
            }
            else
            {
                if ($last != $msg->user_from)
                {   
                    $last = $msg->user_from;
                    echo "<h5>$name"." "."$surname:</h5>";                    
                }
                echo "<p>$msg->message</p>";
            }            
        }
        ?>
    </div>   
</body>
</html>
                        