<?php
require 'Databaseconnectieles.php';

if($_GET['product_code']){
$sql = "DELETE FROM producten WHERE product_code=:product_code";
$result = $pdo->prepare($sql);
$Placeholders = [
    "product_code" => $_GET['product_code']
];
$result->execute($Placeholders);
if($result){
    echo 'product is verwijderd!'; 
    header("refresh:3; url=select.php");
    } else {
        echo 'film kon niet verwijderd worden.';
        echo "Fout".$e->getMessage();
        }
}else{
    header("Location: select.php");
    die();
}


?>