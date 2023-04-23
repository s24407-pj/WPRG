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
        <label>text:</label><input type="text" name="text"><br>
        <button type="submit">Save</button>
    </form>
<?php           
        $text = $_POST['text'];
        $file = fopen("zad2.txt", "a");
        fwrite($file, $text . "\n");
        fclose($file);      
    ?>
</body>
</html>