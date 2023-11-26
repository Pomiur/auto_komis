<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "auto_komis";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Błąd połączenia z bazą danych: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $marka = $_POST["marka"];
    $model = $_POST["model"];
    $rok = $_POST["rok"];
    $stan = $_POST["stan"];
    $link_do_zdjecia = $_POST["link_do_zdjecia"];

    $sql = "INSERT INTO ogloszenia (marka, model, rocznik, stan, link_do_zdjecia) VALUES ('$marka', '$model', '$rok', '$stan', '$link_do_zdjecia')";

    if ($conn->query($sql) === TRUE) {
        $conn->close();
        
        header("Location: oferty.php");
        exit();
    } else {
        echo "Błąd: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ogłoszenie sprzedaży auta</title>
    <style>
        body {
            font-family: 'Comic Sans MS';
            background-color: #000;
            color: #fff;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            color: #FFFFFF;
        }

        form {
            max-width: 400px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            color: #333;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #333;
        }

        input,
        select,
        textarea {
            width: calc(100% - 16px);
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="radio"] {
            margin-right: 5px;
        }

        input[type="submit"] {
            background-color: #3498db;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
        }

        input[type="submit"]:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>

<h1>Dodaj ogłoszenie sprzedaży auta</h1>

<form action="" method="post">
    <label for="marka">Marka:</label>
    <input type="text" id="marka" name="marka" required>

    <br>

    <label for="model">Model:</label>
    <input type="text" id="model" name="model" required>

    <br>

    <label for="rok">Rocznik:</label>
    <select id="rok" name="rok" required>
        <option value="2023">2023</option>
        <option value="2022">2022</option>
        <option value="2021">2021</option>
        <option value="2020">2020</option>
        <option value="2019">2019</option>
        <option value="2018">2018</option>
        <option value="2017">2017</option>
        <option value="2016">2016</option>
        <option value="2015">2015</option>
        <option value="2014">2014</option>
        <option value="2013">2013</option>
        <option value="2012">2012</option>
        <option value="2011">2011</option>
        <option value="2010" selected>2010</option>
    </select>

    <br>

    <label for="stan">Stan radia:</label><br>
    <input type="radio" id="uszkodzony" name="stan" value="uszkodzony" required>
    <label for="uszkodzony">Uszkodzony</label>

    <input type="radio" id="nieuszkodzony" name="stan" value="nieuszkodzony" required>
    <label for="nieuszkodzony">Nieuszkodzony</label>

    <br>

    <label for="image1">Link do zdjęcia:</label>
    <input type="text" id="image1" name="link_do_zdjecia" required>

    <br>

    <input type="submit" name="submit" value="Dodaj ogłoszenie">
</form>
</body>
</html>
