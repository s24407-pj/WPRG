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
        <label>First name: </label><input type="text" name="first"  ><br>
        <label>Last name: </label><input type="text" name="last"  ><br>
        <label>Date from: </label><input type="date" name="dateFrom"  ><br>
        <label>Date to: </label><input type="date" name="dateTo"  ><br>
        <label>People: </label><select id="people" name="people"  >
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
        <button type="submit" name="submit">Submit</button>
        <button type="submit" name="load">Load</button>
    </form>


    <?php
        function saveToCSV($data) {
            $filename = 'reservations.csv';
            $file = fopen($filename, 'a'); // 'a' - append mode
            fputcsv($file, $data, ';');
            fclose($file);
        }

        function displayCSV() {
            $filename = 'reservations.csv';
            if (file_exists($filename)) {
                $file = fopen($filename, 'r'); // 'r' - read mode
                echo '<h2>Reservation Data</h2>';
                echo '<table>';
                while (($row = fgetcsv($file, 0, ';')) !== false) {
                    echo '<tr>';
                    foreach ($row as $cell) {
                        echo '<td>' . htmlspecialchars($cell) . '</td>';
                    }
                    echo '</tr>';
                }
                echo '</table>';
                fclose($file);
            }
        }

        if (isset($_POST['submit'])) {
            $first = $_POST['first'];
            $last = $_POST['last'];
            $dateFrom = $_POST['dateFrom'];
            $dateTo = $_POST['dateTo'];
            $people = $_POST['people'];
            $bed = isset($_POST['bed']) ? "yes" : "no";
            $extra = isset($_POST['extra']) ? implode(", ", (array)$_POST['extra']) : "none";


            $data = array($first, $last, $dateFrom, $dateTo, $people, $bed, $extra);
            saveToCSV($data);

            echo '<h2>Summary</h2>';
            echo '<p><strong>People:</strong> ' . $people . '</p>';
            echo '<p><strong>First name:</strong> ' . $first . '</p>';
            echo '<p><strong>Last name:</strong> ' . $last . '</p>';
            echo '<p><strong>Date from:</strong> ' . $dateFrom . '</p>';
            echo '<p><strong>Date to:</strong> ' . $dateTo . '</p>';
            echo '<p><strong>Extra bed for kid:</strong> ' . $bed . '</p>';
            echo '<p><strong>extra:</strong> ' . $extra . '</p>';
        }

        if (isset($_POST['load'])) {
            displayCSV();
        }
    ?>
</body>
</html>
