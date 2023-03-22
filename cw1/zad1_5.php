<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post">
        <label>tekst:</label><input type="text" name="a"><br>
        
        <button type="submit">SUBMIT</button>
    </form>
<?php 
         $a = $_POST['a'];
         $strings = explode(" ",$a);
         echo "$strings[0] $strings[1]%$#";
    ?>
</body>
</html>