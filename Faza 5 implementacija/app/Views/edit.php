<html>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <link rel="stylesheet" href="http://localhost:8080/css/style.css">
        <title> Izmeni oglas</title>
    </head>
    <body>
        <form method="post" action="<?= site_url("Profile/edit/{$oglas->getIdO()}") ?>">
            <div id="inputads">
                <textarea name="text" id="ad1" cols="30" rows="10"><?php echo "{$oglas->getText()}"?></textarea><br>
                <button type="submit">Izmeni</button> <a href="http://localhost:8080/Profile/allads" <button type="button">Odbaci</button>
            </div
        </form>
    </body>
</html>