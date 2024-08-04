<div id="categoriesContainer">
    <h2>Agregar categorias</h2>
    <form action="index.php?controller=MainController&action=adminCategories" method="POST"> 

    <label for="categoryName">Nombre de la categoria:</label>
    <input type="text" name="categoryName">
    <p class="error"><?php echo isset($_SESSION["category-error"]) ? $_SESSION["category-error"] : ""?></p>
    <input type="submit">

    <p class="succeed"><?php echo isset($_SESSION["categoryAdded"]) ? $_SESSION["categoryAdded"] : ""?></p>

       
    </form>
    <ul id="categories">
        <h3>Categorias:</h3>
            <?php foreach($_SESSION["categories"] as $category):?>
            <li class="category"><?=$category?></li>
            <?php endforeach;?>
        </ul>
</div>
<?php
helpers::deleteCategoryErrors(); 
?>