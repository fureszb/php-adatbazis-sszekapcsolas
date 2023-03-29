<?php
    include_once("./Ab.php")
?>
<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Furesz Bence</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="keret">
    <?php
        $adatbazis=new Ab();
        //$adatbazis->adatLeker("név","kép", "szín");
        $adatbazis-> adatLekerTabla("név","kép", "szín");
        $adatbazis-> kapcsolatBezar();
    ?>
    </div>
</body>

</html>