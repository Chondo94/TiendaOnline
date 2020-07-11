<h1>Carrito de la compa</h1>

<table style="border: 1px solid #ccc;">
    <tr>
        <th>Imagen</th>
        <th>Nombre</th>
        <th>Precio</th>
        <th>Unidades</th>
    </tr>
    <!-- Por medio de un bucle muestro los productos que deseo comprar -->
    <?php 
        foreach($carrito as $indice => $elemento):
        $producto = $elemento['producto'];
    ?>
    <tr>
        <td>
        <?php if($producto->imagen != null):?>
            <img src="<?=base_url?>uploads/images/<?=$producto->imagen?>" class="img_carrito" alt="imagen producto"/>
        <?php else: ?>
            <img src="<?=base_url?>assets/img/camiseta.png" class="img_carrito" alt="imagen producto"/>
        <?php endif; ?>
        </td>
        <td>
        <!-- con el link a, voy al producto y puedo vover a seleccionarlo para aumentar las cantidades -->
            <a href="<?=base_url?>producto/ver&id=<?=$producto->id?>"><?=$producto->nombre?></a>
        </td>
        <td>
            <?=$producto->precio?>
        </td>
        <td>
            <?=$elemento['unidades']?>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<br/>

<div class="total-carrito">
    <?php $stats = Utils::statsCarrito(); ?>
    <h3>Precio Total: Q.<?=$stats['total']?></h3>
    <a href="" class="button button-pedido">Realizar el Pedido</a>
</div>