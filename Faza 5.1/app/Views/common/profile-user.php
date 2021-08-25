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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel='stylesheet' type = 'text/css' href='/assets/css/style.css'>
    <link href="/assets/img/sta_se_nudi_ico.ico" rel="shortcut icon" type="image/x-icon"/>  
    <title>Šta se nudi - Profil</title>
</head>
<body>
    <div id='user-profile' class="content">
        <img src="/assets/img/defaultUserImage.png" alt="Slika korisnika" width=30% float=left>
        <div id='user-info'>
            <h1> <?= $name." ".$surname  ?> </h1>
            <h2>Korisničko ime: <?= $username ?></h2>
            <h2>Država: <?= $country ?> </h2>
            <h2>Broj telefona: <?= $num ?> </h2>
            <h3>Član od <?= $date ?></h3>
            <h3>Ocena korisnika: <?= $rating?></h3>
            <form method='POST' action='<?= site_url("$controller/sendMessage/$userVisitId") ?>'>
                <button type='submit' class='btn btn-info' id='message-button'>Pošaljite poruku</button>
            </form>
            <br/>
            
            <?= anchor("$controller/showUserAds/{$userVisitId}", "Svi aktivni oglasi") ?>
            
            <?php if ($controller == 'User' && $userVisitId != 1) { ?>
                <br>
                <form method='POST' action='<?= site_url("$controller/gradeUser/$userVisitId") ?>'>                    
                    <select name="rate" class="menu-list">
                        <option selected>Ocenite korisnika</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                    &nbsp;
                    <button type='submit' class='btn btn-success'>Oceni</button>
                </form>
            <?php } ?>
                
            <?php if ($controller == 'Admin') { ?>
                <?= anchor("$controller/accountDeleteForm/{$userVisitId}", "Obriši nalog");?> 
                &nbsp;&nbsp;
            <?php } ?>
                
            <br>
            
            <!--<script>
                var count;
                function result(){
                    let cnt = parseFloat(count)
                    alert(cnt)
                }

                function starmark(item){
                    count = item.id[0];
                    sessionStorage.starRating = count;
                    var subid = item.id.substring(1);
                    for(var i=0;i<5;i++) {
                        if(i<count)
                            document.getElementById((i+1)+subid).style.color="orange";
                        else
                            document.getElementById((i+1)+subid).style.color="black";  
                    }
                }
            </script>-->
            
            
            
            <!--<div>
                <span onmouseover="starmark(this)" onclick="result()" id="1one" style="font-size:40px;cursor:pointer;" class="fa fa-star checked"></span>
                <span onmouseover="starmark(this)" onclick="result()" id="2one" style="font-size:40px;cursor:pointer;" class="fa fa-star "></span>
                <span onmouseover="starmark(this)" onclick="result()" id="3one" style="font-size:40px;cursor:pointer;" class="fa fa-star "></span>
                <span onmouseover="starmark(this)" onclick="result()" id="4one" style="font-size:40px;cursor:pointer;" class="fa fa-star"></span>
                <span onmouseover="starmark(this)" onclick="result()" id="5one" style="font-size:40px;cursor:pointer;" class="fa fa-star"></span>
                <span id="rate">4.7</span>-->
            </div>
        </div>
    </div>
</body>
</html>