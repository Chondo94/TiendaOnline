<h1>Detalle del Pedido</h1>

<?php if (isset($pedido)) : ?>
    <?php if (isset($_SESSION['admin'])) : ?>
        <h3>Cambiar estado del Pedido</h3>
        <form action="<?=base_url?>pedido/estado" method="POST">
        <!-- Saco el id del pedido, para el cual se le apliquen los cambios del select -->
            <input type="hidden" value="<?=$pedido->id?>" name="pedido_id"> 
            <div class="select">
                <select name="estado">
                    <option value="confirm" <?=$pedido->estado == "confirm" ? 'selected' : ''?>>Pendiente</option>
                    <option value="preparation" <?=$pedido->estado == "preparation" ? 'selected' : ''?>>En preparacion</option>
                    <option value="ready" <?=$pedido->estado == "ready" ? 'selected' : ''?>>Preparado para enviar</option>
                    <option value="sended" <?=$pedido->estado == "sended" ? 'selected' : ''?>>Enviado</option>
                </select>
            </div>
            <div class="fiel">
                <div class="control">
                    <button class="button is-info">Cambiar estado</button>
                </div>
            </div>
            <!-- <input type="submit" value="Cambiar Estado"> -->
            <br>
        </form>
    <?php endif; ?>

    <h3>Direcion de Envío:</h3>
    <strong>Departamento:</strong> <?= $pedido->provincia ?><br>
    <strong>Ciudad:</strong> <?= $pedido->localidad ?><br>
    <strong>Direccion:</strong><?= $pedido->direccion ?><br><br>

    <h3>Datos del pedido:</h3>
    <strong>Estado: </strong><?=Utils::showStatus($pedido->estado)?> <br>
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