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
        <label>First name: </label><input type="text" name="first" required ><br>
        <label>Last name: </label><input type="text" name="last" required ><br>
        <label>Date from: </label><input type="date" name="dateFrom" required ><br>
        <label>Date to: </label><input type="date" name="dateTo" required ><br>
        <label>People: </label><select id="people" name="people" required >
        <option value="1">1</option>   
        <option value="2">2</option>  
        <option value="3">3</option>  
        <option value="4">4</option>  
    </select><br>
    <label for="kid">Extra bed for kid</label>
<input type="checkbox" id="dostawka" name="bed"><br>
<label for="extra">extra:</label><br>
<select id="extra" name="extra" multiple>
<option value="clima">Clima</option>
<option value="smoking">smoking</option>
</select>
<br>

        <button type="submit">submit</button>
    </form>
<?php 
         $first = $_POST['first'];
         $last = $_POST['last'];
         $dateFrom = $_POST['dateFrom'];
         $dateTo = $_POST['dateTo'];
         $people = $_POST['people'];
         $bed = isset($_POST['bed'])? "yes" : "no";
         $extra = "";
         $extra = "";
         if(isset($_POST["extra"]) && is_array($_POST["extra"])) {
             $extra = implode(", ", $_POST["extra"]);
         }
         $extra = isset($_POST["extra"]) ? $_POST["extra"] : "none";



         
         $summ = "
  <h2>Summary</h2>
  <p><strong>People:</strong> $people</p>
  <p><strong>First name:</strong> $first</p>
  <p><strong>Last name:</strong> $last</p>
  <p><strong>Date from:</strong> $dateFrom</p>
  <p><strong>Date to:</strong> $dateTo</p>
  <p><strong>Extra bed for kid:</strong> $bed</p>
  <p><strong>extra:</strong> $extra</p>
  ";

  echo $summ;
    ?>
</body>
</html>