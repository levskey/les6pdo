<?php
require "Databaseconnectieles.php";

if(isset($_POST["Verzend"])){

try {
    $sql = "UPDATE producten SET product_naam= :product_naam, prijs_per_stuk= :prijs_per_stuk, omschrijving= :omschrijving WHERE product_code = :product_code";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'product_naam' => $_POST["product_naam"],
        'prijs_per_stuk' => $_POST["prijs_per_stuk"],
        'omschrijving' => $_POST["omschrijving"],
        'product_code' => $_GET['product_code']
    ]);
    echo 'product is toegevoegd'; 
    header("refresh:3; url=fselect.php");
    } catch (PDOException $e) {
    echo "Fout".$e->getMessage();
    }
    
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>product editten</h1>
<form method="post">
<input type="text" name="product_naam" id="product_naam" placeholder="product naam" require>
<input type="number" name="prijs_per_stuk" id="prijs_per_stuk" step="0.01" placeholder="prijs per stuk" require>
<input type="text" name="omschrijving" id="omschrijving" placeholder="product omschrijving" require>
<input type="submit" name="Verzend" value="Toevoegen">
    </form>
</body>
</html>

