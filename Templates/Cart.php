<h2>Mi Carrito de compras</h2>
<div class="products">
    <?php while($productInCart = $consult->fetch_assoc()): ?>
        
            <div class="product">
            <a href="index.php?controller=CartController&action=deleteProductInCart&id=<?=  $productInCart['id_productLine']?>" id="deleteLink">Eliminar</a>
                <span> <?= $productInCart["unidades"]?> unidades </span>
                    <img src="images/<?= $productInCart['imagen']?>" alt="Imagen del producto"> 
                    <h4><?= $productInCart["nombre"]?></h4>
                
                    <p>$ <?= $productInCart["precio"] ?> c/u</p>
            </div>
     
    <?php endwhile;?>
</div>

<?php if($consult2->num_rows > 0):?>
    <a href="index.php?controller=CartController&action=makeOrder" id="pedidoLink">Hacer Pedido</a>
<?php endif;?>
<?php if($consult2->num_rows <= 0):?>
    <p class="cartError">No tiene ningun producto para comprar</p>

<?php endif;?>




