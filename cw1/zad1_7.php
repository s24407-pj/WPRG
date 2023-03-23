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
        <label>a:</label><input type="number" name="a" min=1 max=12><br>
        <button type="submit">SUBMIT</button>
    </form>
<?php 
         $a = $_POST['a'];

         switch($a){
            case 1:
                echo "Miesiąc: Styczeń. Liczba dni: 31";
                break;
              case 2:
                echo "Miesiąc: Luty. Liczba dni: 28";
                break;
              case 3:
                echo "Miesiąc: Marzec. Liczba dni: 31";
                break;
              case 4:
                echo "Miesiąc: Kwiecień. Liczba dni: 30";
                break;
              case 5:
                echo "Miesiąc: Maj. Liczba dni: 31";
                break;
              case 6:
                echo "Miesiąc: Czerwiec. Liczba dni: 30";
                break;
              case 7:
                echo "Miesiąc: Lipiec. Liczba dni: 31";
                break;
              case 8:
                echo "Miesiąc: Sierpień. Liczba dni: 31";
                break;
              case 9:
                echo "Miesiąc: Wrzesień. Liczba dni: 30";
                break;
              case 10:
                echo "Miesiąc: Październik. Liczba dni: 31";
                break;
              case 11:
                echo "Miesiąc: Listopad. Liczba dni: 30";
                break;
              case 12:
                echo "Miesiąc: Grudzień. Liczba dni: 31";
                break;
            default:
                 echo "blad";
         }
    ?>
</body>
</html>