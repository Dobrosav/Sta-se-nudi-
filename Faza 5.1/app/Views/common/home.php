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
    <title>Šta se nudi - Početna</title>    
</head>
<body>
    <div class="content" style="padding-top: 30px;">
        <br><br> 
        <div class="row">
            <div class="col-sm-3">&nbsp;</div>
            <div class="col-sm-6"><h3>Kategorije</h3></div>
            <div class="col-sm-3">&nbsp;</div>
        </div> 
        <div class="row">
            <div class="col-sm-3">&nbsp;</div>
            <div class="col-sm-6 d-flex">
                <div class="kategorija">
                    <img class="kategorija" src="/assets/img/cad.jpg"><br><?php $ret = 'Ljubimci'; echo anchor("$controller/searchCategory/{$ret}", "Ljubimci") ?>
                </div>
                <div class="d-inline-block">
                    <img class="kategorija" src="/assets/img/clotches.jpg"><br><?php $ret = 'Odeca'; echo anchor("$controller/searchCategory/{$ret}", "Odeća") ?>
                </div>
                <div class="d-inline-block">
                    <img class="kategorija" src="/assets/img/tech.jpg"><br><?php $ret = 'Tehnika'; echo anchor("$controller/searchCategory/{$ret}", "Tehnika") ?>
                </div>
            </div>
            <div class="col-sm-3">&nbsp;</div>
        </div>
    </div>
</body>
</html>