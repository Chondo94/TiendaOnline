<?php if (isset($_SESSION['pedido']) && $_SESSION['pedido'] == 'complete') : ?>
    <h1>Tu pedido se ha confirmado, Gracias...</h1>
    <P>
        Gracias por confirmar tu pedido, el ultimo pasa para poder recibir tu
        pedido, es que pases a realizar el deposito a una de nuestra cuenta bancaria que se enlistan a continuación.
    </P><br>

    <dl>
        <dt><strong> Banrural</strong></dt>
        <dd>    No. 444-53234 </dd>
        <dt><strong>G&T</strong></dt>
        <dd>    No. 6566-754544 </dd>
        <dt><strong>Industrial </strong></dt>
        <dd>    No. 3456-2222 </dd>
    </dl>

    <br>
    <?php if (isset($pedido)) : ?>
        <h3><strong>Datos del pedido:</strong></h3>
        <strong>Numero de pedido:</strong> <?= $pedido->id ?>
        <br>
        <strong>Total a pagar:</strong> Q.<?= $pedido->coste ?>
        <br>
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

<?php elseif (isset($_SESSION['pedido']) && $_SESSION['pedido'] != 'complete') : ?>
    <h1>Tu pedido no ha podido procesarse</h1>
<?php endif; ?>