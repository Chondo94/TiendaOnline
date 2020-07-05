<h1>Gestion de Productos</h1>

<a href="<?=base_url?>pruducto/crear" class="button button-small">Crear Producto</a>
<!-- Ciclo para recorrer cada registro que tengo en prodegorias -->
<table>
    <tr>
        <th>id</th>
        <th>Nombre</th>
        <th>precio</th>
        <th>stock</th>
    </tr>
    <?php while($prod = $productos->fetch_object()): ?>
    <tr>
        <td><?=$prod->id;?></td>
        <td><?=$prod->nombre;?></td>
        <td><?=$prod->precio;?></td>
        <td><?=$prod->stock;?></td>
    </tr>
    <?php endwhile; ?>
</table>