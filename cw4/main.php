<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        // Start sesji
        session_start();

        // Zdefiniowane danych logowania
        $validUsername = "admin";
        $validPassword = "password";

        function saveToCSV($data) {
            $filename = 'reservations.csv';
            $file = fopen($filename, 'a');
            fputcsv($file, $data, ';');
            fclose($file);
        }

        function displayCSV() {
            $filename = 'reservations.csv';
            if (file_exists($filename)) {
                $file = fopen($filename, 'r');
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

        function clearFormCookies() {
            setcookie('first', '', time() - 3600);
            setcookie('last', '', time() - 3600);
            setcookie('dateFrom', '', time() - 3600);
            setcookie('dateTo', '', time() - 3600);
            setcookie('people', '', time() - 3600);
            setcookie('bed', '', time() - 3600);
            setcookie('extra', '', time() - 3600);
        }

        function displayReservationForm() {
            $first = $_COOKIE['first'] ?? '';
            $last = $_COOKIE['last'] ?? '';
            $dateFrom = $_COOKIE['dateFrom'] ?? '';
            $dateTo = $_COOKIE['dateTo'] ?? '';
            $people = $_COOKIE['people'] ?? '';
            $bed = $_COOKIE['bed'] ?? '';
            $extra = $_COOKIE['extra'] ?? '';

            echo '<form method="post">';
            echo '<label>First name: </label><input type="text" name="first" value="' . $first . '"><br>';
            echo '<label>Last name: </label><input type="text" name="last" value="' . $last . '"><br>';
            echo '<label>Date from: </label><input type="date" name="dateFrom" value="' . $dateFrom . '"><br>';
            echo '<label>Date to: </label><input type="date" name="dateTo" value="' . $dateTo . '"><br>';
            echo '<label>People: </label><select id="people" name="people">';
            echo '<option value="1" ' . ($people == '1' ? 'selected' : '') . '>1</option>';
            echo '<option value="2" ' . ($people == '2' ? 'selected' : '') . '>2</option>';
            echo '<option value="3" ' . ($people == '3' ? 'selected' : '') . '>3</option>';
            echo '<option value="4" ' . ($people == '4' ? 'selected' : '') . '>4</option>';
            echo '</select><br>';
            echo '<label for="kid">Extra bed for kid</label>';
            echo '<input type="checkbox" id="dostawka" name="bed" ' . ($bed == 'yes' ? 'checked' : '') . '><br>';
            echo '<label for="extra">Extra:</label><br>';
            echo '<select id="extra" name="extra[]" multiple>';
            echo '<option value="clima" ' . (strpos($extra, 'clima') !== false ? 'selected' : '') . '>Clima</option>';
            echo '<option value="smoking" ' . (strpos($extra, 'smoking') !== false ? 'selected' : '') . '>Smoking</option>';
            echo '</select><br>';
            echo '<button type="submit" name="submit">Submit</button>';
            echo '<button type="submit" name="clear">Clear Form</button>';
            echo '</form>';
        }

        if (isset($_POST['submit'])) {
            // Zapisz dane formularza w ciasteczkach
            setcookie('first', $_POST['first'], time() + 3600);
            setcookie('last', $_POST['last'], time() + 3600);
            setcookie('dateFrom', $_POST['dateFrom'], time() + 3600);
            setcookie('dateTo', $_POST['dateTo'], time() + 3600);
            setcookie('people', $_POST['people'], time() + 3600);
            setcookie('bed', isset($_POST['bed']) ? 'yes' : 'no', time() + 3600);
            $extra = isset($_POST['extra']) ? implode(',', $_POST['extra']) : '';
setcookie('extra', $extra, time() + 3600);


            // Zapisz dane formularza do pliku CSV
            $data = array(
                $_POST['first'],
                $_POST['last'],
                $_POST['dateFrom'],
                $_POST['dateTo'],
                $_POST['people'],
                isset($_POST['bed']) ? 'yes' : 'no',
                implode(',', $_POST['extra'] ?? [])

            );
            saveToCSV($data);
        }

        if (isset($_POST['clear'])) {
            // Wyczyść ciasteczka formularza
            clearFormCookies();
        }

        if (isset($_POST['login'])) {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';

            // Sprawdź poprawność danych logowania
            if ($username === $validUsername && $password === $validPassword) {
                // Ustaw sesję po zalogowaniu
                $_SESSION['loggedIn'] = true;
                $_SESSION['username'] = $username;
            }
        }

        if (isset($_POST['logout'])) {
            // Zakończ sesję po wylogowaniu
            session_unset();
            session_destroy();
        }
        
       
        
        // Wyświetl formularz logowania, jeśli użytkownik nie jest zalogowany
        if (!isset($_SESSION['loggedIn'])) {
            echo '<h2>Login</h2>';
            echo '<form method="post">';
            echo 'Username: <input type="text" name="username"><br>';
            echo 'Password: <input type="password" name="password"><br>';
            echo '<button type="submit" name="login">Login</button>';
            echo '</form>';
            echo '<p>You need to log in to access the reservation form.</p>';
        } else {
            // Wyświetl powitanie użytkownika
            echo '<h2>Welcome, ' . htmlspecialchars($_SESSION['username']) . '!</h2>';
            echo '<form method="post">';
            echo '<button type="submit" name="logout">Logout</button>';
            echo '</form>';
        
            // Wyświetl formularz rezerwacji
            echo '<h2>Reservation Form</h2>';
            displayReservationForm();
        }

        // Wyświetl dane z pliku CSV
        displayCSV();
    ?>
</body>
</html>
