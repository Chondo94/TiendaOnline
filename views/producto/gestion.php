<h1>Gestion de Productos</h1>

<a href="<?=base_url?>producto/crear" class="button button-small">
    Crear Producto
</a>

<!-- Muestro mensaje de que se Creo o No el producto -->
<?php if(isset($_SESSION['producto']) && $_SESSION['producto'] == 'complete'):?>
    <strong class="alert_green">Producto Creado con Exito</strong>
<?php elseif(isset($_SESSION['producto']) && $_SESSION['producto'] != 'complete'):?>
    <strong class="alert_red">Fallo la creacion de Producto</strong>
<?php endif; ?>
<?php Utils::deleteSession('producto'); ?>


<!-- Muestro mensaje de que se Elimino o No el producto -->
<?php if(isset($_SESSION['delete']) && $_SESSION['delete'] == 'complete'):?>
    <strong class="alert_green">Producto Eliminado con Exito</strong>
<?php elseif(isset($_SESSION['delete']) && $_SESSION['delete'] != 'complete'):?>
    <strong class="alert_red">Fallo la Eliminación de Producto</strong>
<?php endif; ?>
<?php Utils::deleteSession('delete'); ?>

<table>
    <tr>
        <th>id</th>
        <th>Nombre</th>
        <th>precio</th>
        <th>stock</th>
        <th>Accion</th>
    </tr>
    <!-- Ciclo para recorrer cada registro que tengo en prodegorias -->
    <?php while($pro = $productos->fetch_object()): ?>
    <tr>
        <td><?=$pro->id;?></td>
        <td><?=$pro->nombre;?></td>
        <td><?=$pro->precio;?></td>
        <td><?=$pro->stock;?></td>
        <td>
            <a href="<?=base_url?>producto/editar&id=<?=$pro->id?>" class="button button-gestion" >Editar</a>
            <a href="<?=base_url?>producto/eliminar&id=<?=$pro->id?>" class="button button-gestion button-red">Eliminar</a>
        </td>
    </tr>
    <?php endwhile; ?>
</table>