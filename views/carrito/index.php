<h1>Carrito de la compa</h1>

<?php if (isset($_SESSION['carrito']) && count($_SESSION['carrito']) >= 1) : ?>
    <table style="border: 1px solid #ccc;">
        <tr>
            <th>Imagen</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Unidades</th>
            <th>Eliminar</th>
        </tr>
        <!-- Por medio de un bucle muestro los productos que deseo comprar -->
        <?php
        foreach ($carrito as $indice => $elemento) :
            $producto = $elemento['producto'];
        ?>
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
                    <?= $elemento['unidades'] ?>
                    <div class="updown-unidades">
                        <a href="<?= base_url ?>carrito/up&index=<?= $indice ?>" class="button is-primary">+</a>
                        <a href="<?= base_url ?>carrito/down&index=<?= $indice ?>" class="button is-primary">-</a>
                    </div>
                </td>
                <td>
                    <a href="<?= base_url ?>carrito/remove&index=<?= $indice ?>" class="button button-carrito is-danger">Quitar producto</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <br />
    <div class="delete-carrito">
        <a href="<?= base_url ?>carrito/delete_all" class="button button-delete is-danger">Vaciar Carrito</a>
    </div>
    <div class="total-carrito">
        <?php $stats = Utils::statsCarrito(); ?>
        <h3>Precio Total: Q.<?= $stats['total'] ?></h3>
        <a href="<?= base_url ?>pedido/hacer" class="button button-pedido is-primary">Realizar el Pedido</a>
    </div>

<?php else : ?>
    <h5>El carrito se encuentra vacío</h5>

<?php endif; ?>