<div id="addProducts">
    <h2>Agregar Productos</h2>

    <p class="succeed"><?php echo isset($_SESSION["productAdded"]) ? $_SESSION["productAdded"].' <a href="index.php?controller=MainController&action=firstPage"> Ver Productos</a>' : ""?> </p>

    <form action="index.php?controller=MainController&action=insertProduct&id=<?= isset($id) ? $id : null?>" method="POST" enctype="multipart/form-data">

        <label for="productName">Nombre:</label>
        <input type="text" name="productName" value="<?= isset($name) ? $name : ''?>">
        <p class="error"><?php echo isset($_SESSION["product-name-error"]) ? $_SESSION["product-name-error"] : ""?></p>

        <label for="productPrice">Precio:</label>
        <input type="number" name="productPrice" value="<?=isset($price) ? $price : ''?>">
        <p class="error"><?php echo isset($_SESSION["product-price-error"]) ? $_SESSION["product-price-error"] : ""?></p>


        <label for="productDescription">Descripcion:</label>
        <input type="text" name="productDescription" value="<?=isset($description) ? $description : ''?>">
        <p class="error"><?php echo isset($_SESSION["product-description-error"]) ? $_SESSION["product-description-error"] : ""?></p>


        <label for="productStock">Stock:</label>
        <input type="number" name="productStock" value="<?=isset($stock) ? $stock : ''?>">
        <p class="error"><?php echo isset($_SESSION["product-stock-error"]) ? $_SESSION["product-stock-error"] : ""?></p>



        <label for="productOfert">Oferta:</label>
        <select name="productOfert" >
            <option value="Si" >Si</option>
            <option value="No" >No</option>
        </select>
        <p class="error"><?php echo isset($_SESSION["product-ofert-error"]) ? $_SESSION["product-ofert-error"] : ""?></p>

        <label for="productCategory">Categoria:</label>
        <select name="productCategory" selected="<?=$category?>">
            <?php foreach($_SESSION["categories"] as $category):?>
            <option value="<?=$category?>" ><?=$category?></option>
            <?php endforeach; ?>
        </select>
        <p class="error"><?php echo isset($_SESSION["product-category-error"]) ? $_SESSION["product-category-error"] : ""?></p>


        <label for="productImage">Image:</label>
        <input type="file" name="productImage">
        <p class="error"><?php echo isset($_SESSION["product-image-error"]) ? $_SESSION["product-image-error"] : ""?></p>


        <input type="submit" value="Publicar">

    </form>
</div>
<?php
helpers::deleteProductErrors(); 
?>