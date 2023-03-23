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

         if ($a <= $b && $a <= $c) {
            $min = $a;
            if ($b <= $c) {
                $mid = $b;
                $max = $c;
            } else {
                $mid = $c;
                $max = $b;
            }
        } elseif ($b <= $a && $b <= $c) {
            $min = $b;
            if ($a <= $c) {
                $mid = $a;
                $max = $c;
            } else {
                $mid = $c;
                $max = $a;
            }
        } else {
            $min = $c;
            if ($a <= $b) {
                $mid = $a;
                $max = $b;
            } else {
                $mid = $b;
                $max = $a;
            }
        }
        
        
        echo "Liczby w kolejności od najmniejszej do największej: $min, $mid, $max<br>";
        echo "Liczby w kolejności od największej do najmniejszej: $max, $mid, $min";
         
    ?>
</body>
</html>