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
        <label>a:</label><input type="text" name="a"><br>
        <label>b:</label><input type="text" name="b"><br>
        <button type="submit">SUBMIT</button>
    </form>
<?php 
         $a = $_POST['a'];
         $b = $_POST['b'];
        
         $tab[$a][$b];

         for($y=0;$y<$b;$y++){
            for($x=0;$x<$a;$x++){
                 ($tab[$x][$y]);//pobranie zawartosci
            } 
        }

         for($x=0;$x<$a;$x++){
            for($y=0;$y<$b;$y++){
                echo $tab[$x][$y];
            }
        }
    ?>
</body>
</html>