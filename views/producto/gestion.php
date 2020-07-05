<h1>Gestion de Productos</h1>

<a href="<?=base_url?>producto/crear" class="button button-small">
    Crear Producto
</a>
<table>
    <tr>
        <th>id</th>
        <th>Nombre</th>
        <th>precio</th>
        <th>stock</th>
    </tr>
    <!-- Ciclo para recorrer cada registro que tengo en prodegorias -->
    <?php while($pro = $productos->fetch_object()): ?>
    <tr>
        <td><?=$pro->id;?></td>
        <td><?=$pro->nombre;?></td>
        <td><?=$pro->precio;?></td>
        <td><?=$pro->stock;?></td>
    </tr>
    <?php endwhile; ?>
</table>