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
        <label>Bok a:</label><input type="number" name="a"><br>
        <label>Bok b:</label><input type="number" name="b">
        <button type="submit">SUBMIT</button>
    </form>
<?php 
         $a = $_POST['a'];
         $b = $_POST['b'];
         echo $a*$b;
    ?>
</body>
</html>