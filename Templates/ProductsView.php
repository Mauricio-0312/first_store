<div class="products">
    <?php while($product= $productsGotten->fetch_assoc()): ?>
        
            <div class="product">
            
                <a href="index.php?controller=MainController&action=productPage&id=<?= $product['id']?>" >
                    <img src="images/<?= $product['imagen']?>" alt="Imagen del producto"> 
                    <h4><?= $product["nombre"]?></h4>
                
                    <p>$ <?= $product["precio"]?></p>
                </a>
            </div>
     
    <?php endwhile;?>

</div>