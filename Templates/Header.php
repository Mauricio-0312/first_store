<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" href="assets/img/camiseta.png">

    <title>Tienda de camisetas</title>
</head>
<body>
    <div id="container">
        <header>
            <img id="logo" src="./assets/img/camiseta.png" alt="Logo de camiseta">
            <h1>Tienda de camisetas</h1>
        </header>
        <nav>
      
            <ul>
                <li><a href="index.php?controller=MainController&action=firstPage">Inicio</a></li>
                <li id="categories"><a href="#" >Categorias</a>
                    <ul>
                        <?php foreach($_SESSION["categories"] as $category): ?>
                            <li><a href="index.php?controller=MainController&action=firstPage&category=<?= $category?>"><?= $category?></a></li>
                        <?php endforeach;?>
            
                    </ul>
                </li>
                        <?php if(isset($_SESSION["name"]) && $_SESSION["rol"] == NULL):?>
                <li><a href="index.php?controller=CartController&action=getProductsInCart">Carrito</a></li>
                        <?php endif;?>

                        <?php if(isset($_SESSION["rol"]) && $_SESSION["rol"] == "admin"):?>
                <li><a href="index.php?controller=MyOrdersController&action=showTemplate">Mis Pedidos</a></li>
                        <?php endif;?>

            </ul>
        </nav>