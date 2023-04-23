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
        <select id="action" name="action">
        <option value="add">+</option>   
        <option value="sub">-</option>  
        <option value="mult">*</option>  
        <option value="div">/</option>  
    </select>

        <button type="submit">submit</button>
    </form>
<?php 
        require 'zad1_funkcje.php';
            
         $a = $_POST['a'];
         $b = $_POST['b'];
         $action = $_POST['action'];
        
         switch ($action){
            case "add":
                echo dodawanie($a, $b);
                break;
            case "sub":
                echo odejmowanie($a, $b);
                break;
            case "mult":
                echo mnozenie($a, $b);
                    break;
            case "div":
                echo dzielenie($a, $b);
                break;
         }
    ?>
</body>
</html>