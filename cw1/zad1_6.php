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
        <label>a:</label><input type="number" name="a"><br>
        <label>b:</label><input type="number" name="b"><br>
        <label>c:</label><input type="number" name="c"><br>
        <button type="submit">SUBMIT</button>
    </form>
<?php 
         $a = $_POST['a'];
         $b = $_POST['b'];
         $c = $_POST['c'];

         if ($a+$b>$c & $a+$c>$b & $b+$c>$a){
            echo "Jeszcze jak";
         }else{
            echo "Zle";
         }
    ?>
</body>
</html>