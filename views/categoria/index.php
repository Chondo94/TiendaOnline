<h1>Gestionas Categorias</h1>

<a href="<?=base_url?>categoria/crear" class="button button-small">Crear Categoria</a>
<!-- Ciclo para recorrer cada registro que tengo en categorias -->
<table>
    <tr>
        <th>id</th>
        <th>Nombre</th>
    </tr>
    <?php while($cat = $categorias->fetch_object()): ?>
    <tr>
        <td><?=$cat->id;?></td>
        <td><?=$cat->nombre;?></td>
    </tr>
    <?php endwhile; ?>
</table>