<?php
require "Databaseconnectieles.php";


if(isset($_POST["Verzend"])){

  try {
      $sql = "INSERT INTO producten (product_naam, prijs_per_stuk, omschrijving) VALUES (:product_naam, :prijs_per_stuk, :omschrijving)";
      $stmt = $pdo->prepare($sql);
      $stmt->execute([
          'product_naam' => $_POST["product_naam"],
          'prijs_per_stuk' => $_POST["prijs_per_stuk"],
          'omschrijving' => $_POST["omschrijving"]
      ]);
      echo "Toevoegen gelukt!";
      } catch (PDOException $e) {
      echo "Fout".$e->getMessage();
      }
      
}


$personen = $pdo->query("SELECT * FROM producten");
$result = $personen->fetchAll();


?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Document</title>
    <style>
.editbutton{                
        background-color:rgb(0, 145, 255);
        color: white;
}

.deletebutton{
    background-color:rgb(255, 30, 0);
    color: white;

}
    </style>
</head>
<body>
<h2>Dit is om producten toe te voegen aan de winkel</h2>
    <form method="post">
<input type="text" name="product_naam" id="product_naam" placeholder="product naam" require>
<input type="number" name="prijs_per_stuk" id="prijs_per_stuk" step="0.01" placeholder="prijs per stuk" require>
<input type="text" name="omschrijving" id="omschrijving" placeholder="product omschrijving" require>
<input type="submit" name="Verzend" value="Toevoegen">
    </form>

    <table class="table table-dark table-borderless">
    <h2>Dit is een overzicht van de producten in de winkel</h2>
      <tr>
        <th>product_code</th>
        <th>product_naam</th>
        <th>prijs_per_stuk</th>
        <th>omschrijving</th>
        <th>Action</th>
        <th></th>
      </tr>
      <tr>
       <?php
foreach($result as $product){
echo "<tr>";
echo "<td>". $product["product_code"]. "</td>";
echo "<td>". $product["product_naam"]. "</td>";
echo "<td>". "€". $product["prijs_per_stuk"]. "</td>";
echo "<td>". $product["omschrijving"]. "</td>";
echo "<td><a href = 'edit-product_code.php?product_code=".$product['product_code']."'><input class='editbutton' type='button' value='edit'></a></td>";
echo "<td><a href = 'delete-product.php?product_code=".$product['product_code']."'><input class='deletebutton' type='button' value='delete'></a></td>";
}
       ?>
      </tr>
    </table>
</body>
</html>