<h1>Detalle del Pedido</h1>

<?php if (isset($pedido)) : ?>
    <h3>Direcion de Envío:</h3>
    <strong>Departamento:</strong> <?= $pedido->provincia ?><br>
    <strong>Ciudad:</strong> <?= $pedido->localidad ?><br>
    <strong>Direccion:</strong><?= $pedido->direccion ?><br><br>

    <h3>Datos del pedido:</h3>
    <strong>Numero de pedido:</strong> <?= $pedido->id ?><br>
    <strong>Total a pagar:</strong> Q.<?= $pedido->coste ?><br>
    <strong>Productos:</strong>

    <!-- Bucle para mostrar los productos del pedido -->
    <table style="border: 1px solid #ccc;">
        <tr>
            <th>Imagen</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Unidades</th>
        </tr>
        <?php while ($producto = $productos->fetch_object()) : ?>
            <tr>
                <td>
                    <?php if ($producto->imagen != null) : ?>
                        <img src="<?= base_url ?>uploads/images/<?= $producto->imagen ?>" class="img_carrito" alt="imagen producto" />
                    <?php else : ?>
                        <img src="<?= base_url ?>assets/img/camiseta.png" class="img_carrito" alt="imagen producto" />
                    <?php endif; ?>
                </td>
                <td>
                    <!-- con el link a, voy al producto y puedo vover a seleccionarlo para aumentar las cantidades -->
                    <a href="<?= base_url ?>producto/ver&id=<?= $producto->id ?>"><?= $producto->nombre ?></a>
                </td>
                <td>
                    <?= $producto->precio ?>
                </td>
                <td>
                    <?= $producto->unidades ?>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
<?php endif; ?>