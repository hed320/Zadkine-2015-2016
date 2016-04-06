<?php

$content = new TemplatePower("html/product.html");
$content->prepare();

if(isset($_GET['id'])){
    // details laten zien
    $getProduct = $verbinding->prepare("SELECT * FROM producten 
                                          WHERE idproducten = :id");
    $getProduct->bindParam(":id", $_GET['id']);
    $getProduct->execute();

    // maar 1 rij opgehaald, dus geen lus nodig
    $product = $getProduct->fetch(PDO::FETCH_ASSOC);
    $content->newBlock("DETAIL");
    $content->assign(array(
        "NAAM" => $product['naam'],
        "PRIJS" => $product['prijs'],
        "PRODUCTCODE" => $product['productcode'],
        "ID" => $product['idproducten'],
        "OMSCHRIJVING" => $product['omschrijving'],
        "PLAATJE" => $product['plaatje']
    ));

}else{
    $content->newBlock("OVERZICHT");
    // overzicht laten zien
    $getProducts = $verbinding->query("SELECT * FROM producten");
    while($product = $getProducts->fetch(PDO::FETCH_ASSOC)){
        $content->newBlock("RIJ");
        $content->assign(array(
            "NAAM" => $product['naam'],
            "PRIJS" => $product['prijs'],
            "PRODUCTCODE" => $product['productcode'],
            "ID" => $product['idproducten']
        ));
    }

}

