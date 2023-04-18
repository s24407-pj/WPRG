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
        <label>num: </label><input type="number" name="num" required ><br>
        
<br>

        <button type="submit">submit</button>
    </form>
<?php 
$loop = 0;
         if(isset($_POST['num'])) {
            $num = $_POST['num'];
            
            function isPrime($num){
                
                for($i=2; $i<=$num/2; $i++){
                    $loop++;
                    if($num%$i==0){
                        return true;
                    }
                }
                return false;
                
            }
         if($num>=0){
            if(isPrime($num)==true){
                echo "prime";
                echo $loop;
            }else{
                echo "not prime";
                echo $loop;
            }
            
         }else{
             echo "wrong number";
         }
        } else {
            
        }
        
         
         
    ?>
</body>
</html>