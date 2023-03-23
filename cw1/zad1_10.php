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
        <button type="submit">SUBMIT</button>
    </form>
<?php 
         $a = $_POST['a'];
         $b = 0;
         
         while($b<$a)
         {
            for($i = 0;$i<=$b;$i++)
            {
                echo "*";
            }
            echo "<br>";
            $b++;
         }
         $b = $a;

         while($b)
         {
            for($i = 0;$i<$b;$i++)
            {
                echo "*";
            }
            echo "<br>";
            $b--;
         }

         $b = $a;

         while($b)
         {
            for($i = 0;$i<$b;$i++)
            {
                echo "*";
            }
            echo "<br>";
            $b--;
         }

         $b = 0;
         
         while($b<$a)
         {
            for($i = 0;$i<=$b;$i++)
            {
                echo "*";
            }
            echo "<br>";
            $b++;
         }
    ?>
</body>
</html>