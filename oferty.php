<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "auto_komis";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Błąd połączenia z bazą danych: " . $conn->connect_error);
}

$sql = "SELECT * FROM ogloszenia";
$result = $conn->query($sql);

$conn->close();
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oferty sprzedaży aut</title>
    <style>
        body {
            font-family: 'Comic Sans MS';
            background-color: #000;
            color: #CB2B44;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #000;
            color: #fff;
            text-align: center;
            padding: 20px 0;
        }

        h1 {
            color: #FFFFFF;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px;
        }

        .ogloszenie {
            margin-bottom: 20px;
            padding: 15px;
            border: 1px solid #ccc;
            border-radius: 8px;
        }

        .ogloszenie img {
            max-width: 100%;
            height: auto;
            border-radius: 4px;
        }

        footer {
            background-color: #3498db;
            color: #fff;
            text-align: center;
            padding: 10px 0;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>

<h1>Oferty sprzedaży aut</h1>

<?php
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<h2>{$row['marka']} {$row['model']}</h2>";
        echo "<p>Rocznik: {$row['rocznik']}</p>";
        echo "<p>Stan radia: {$row['stan']}</p>";
        echo "<img src='{$row['link_do_zdjecia']}' alt='Zdjęcie auta'>";
        echo "<hr>";
    }
} else {
    echo "<p>Brak dostępnych ofert.</p>";
}
?>

</body>
</html>
