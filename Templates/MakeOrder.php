<div id="makeOrderForm">
    <h2>Hacer Pedido</h2>
    <form action="index.php?controller=CartController&action=makeFinalOrder&costo=<?=$total?>" method="POST">
    <p class="succeed"><?php echo isset($_SESSION["orderDone"]) ?  $_SESSION["orderDone"] :  ""?></p> 
    <p class="error"><?php echo isset($_SESSION["orderFailed"]) ?  $_SESSION["orderFailed"] :  ""?></p> 

        <label for="municipio">Municipio</label>
        <input type="text" name="municipio">
        <p class="error"><?php echo isset($_SESSION["municipio-error"]) ?  $_SESSION["municipio-error"] :  ""?></p> 


        <label for="localidad">Localidad:</label>
        <input type="text" name="localidad">
        <p class="error"><?php echo isset($_SESSION["localidad-error"]) ?  $_SESSION["localidad-error"] :  ""?></p> 


        <label for="direccion">Direccion:</label>
        <input type="text" name="direccion">
        <p class="error"><?php echo isset($_SESSION["direccion-error"]) ?  $_SESSION["direccion-error"] :  ""?></p> 


        <input type="submit" value="Hacer pedido">
        

    </form>

    <table id="factura">
        <tr>
            <th>Producto</th>
            <th>Unidades</th>
            <th>Precio c/u</th>
            <th>Total</th>
        </tr>
        <?php while($productInCart = $consult->fetch_assoc()): ?>
            <tr>
            <td><?=$productInCart["nombre"]?></td>
            <td><?=$productInCart["unidades"]?></td>
            <td><?=$productInCart["precio"]?></td>
            <td><?=($productInCart["precio"]*$productInCart["unidades"])?></td>
            </tr>
            <?php 
               
                $costoTable += ($productInCart["precio"]*$productInCart["unidades"]);
            ?>
        <?php endwhile;?>
        <tr>
            <td></td>
            <td></td>
            <th>Total</th>
            <th><?=$costoTable?></th>
            </tr>
    </table>
    
</div>

<?php
helpers::deleteOrderErrors();
?>