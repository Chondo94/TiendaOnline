<h1>Crer nuevos productos</h1>

<div class="form_container">
<form action="<?=base_url?>producto/save" method="POST">
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" required/>

    <label for="descripcion">Descripcion</label>
    <textarea name="descripcion"></textarea>

    <label for="precio">Precio</label>
    <input type="text" name="precio" required/>

    <label for="stock">Stock</label>
    <input type="number" name="stock" required />
    
    <label for="categoria">Categoria</label>
    <!-- bucle while obtenemos las categorias -->
    <?php $categorias = Utils::showCategorias(); ?>
    <select name="categoria">
        <?php while($cat = $categorias->fetch_object()): ?>
            <option value="<?=$cat->id?>">
                <?=$cat->nombre;?>
            </option>
        <?php endwhile; ?>
    </select>

    <label for="imagen">Imagen</label>
    <input type="file" name="imagen"/>

    <input type="submit" value="Guardar producto" />
</form>
</div>