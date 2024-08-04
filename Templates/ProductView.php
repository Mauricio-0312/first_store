<div class="productPage">
    <img src="images/<?= $image?>" alt="Imagen del producto">

    <ul>
        <li><strong>Nombre:</strong>  <?=$name?></li>
        <li><strong>Descripcion:</strong>  <?=$description?></li>
        <li><strong>Categoria:</strong>  <?=$category?></li>
        <li><strong>Stock:</strong>  <?=$stock?></li>
        <li><strong>Oferta:</strong>  <?=$ofert?></li>
        <li><strong> Precio:</strong>  <?=$price?></li>
        
        <?php if(isset($_SESSION["rol"]) && $_SESSION["rol"] == "admin"):?>
            <a href="index.php?controller=MainController&action=deleteProduct&id=<?=$id?>" class="delete boton">Borrar</a>
            <a href="index.php?controller=MainController&action=addProducts&id=<?=$id?>" class="edit boton">Editar</a>
        <?php endif;?>
      
 

    </ul>


       <?php if(isset($_SESSION["name"]) && $_SESSION["rol"] != "admin"):?>

        <form action="index.php?controller=CartController&action=addToCart&product_id=<?=$id?>" method="POST">
            <h3>Agegar al carrito</h3>
            <p class="error"><?php echo isset($_SESSION["stock-error"]) ? $_SESSION["stock-error"] : ""?></p>
            <p class="succeed"><?php echo isset($_SESSION["productInCart"]) ? $_SESSION["productInCart"] : ""?></p>

            <label for="amount">Cuantas unidades:</label>
            <input type="number" name="amount">
            <input type="submit" value="Agegar">
        </form>

        <?php endif;?>

</div>

<?php
helpers::deleteProductInCartErrors();
?>