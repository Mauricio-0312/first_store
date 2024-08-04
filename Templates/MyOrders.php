<div id="orders">
    <?php while($order = $consultOrders->fetch_assoc()):?>
        <div class="order">
            <ul>
                <h3>Pedido <?= $order["id"]?></h3>

                <li>Municipio: <?= $order["municipio"]?></li>
                <li>Localidad: <?= $order["localidad"]?></li>
                <li>Direccion: <?= $order["direccion"]?></li>
                <li>Costo: <?= $order["costo"]?></li>
                <li>Estado: <?= $order["estado"]?> </li>

                    <form action="index.php?controller=MyOrdersController&action=ChangeOrderStatus&orderId=<?= $order['id']?>" id="statusForm" method="POST">
                    <h5>Cambiar estado:</h5>
                    <select name="status" >
                    <option value="Entregado">Entregado</option>
                    <option value="En progreso">En progreso</option>

                    </select>
                    <input type="submit">
                    </form>
                
                
            </ul>

            <table>
                <tr>
                    <th>Producto</th>
                    <th>Unidades</th>
                </tr>
            <?php
                $consultProductsOrdered = $this->model->getProductsOrdered();
                while($productOrdered = $consultProductsOrdered ->fetch_assoc()):?>
                <?php if($productOrdered["pedido_id"] == $order["id"]):?>
                    <tr>
                        <td><?= $productOrdered["nombre"]?> </td>
                        <td><?= $productOrdered["unidades"]?></td>
                    </tr>
                <?php endif;?>
                <?php endwhile;?>
            </table>
        </div>
    <?php endwhile;?>
</div>