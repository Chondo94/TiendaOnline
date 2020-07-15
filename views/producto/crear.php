<?php if (isset($edit) && isset($pro) && is_object($pro)) : ?>
    <h1>Editar producto - <?= $pro->nombre ?></h1>
    <?php $url_action = base_url . "producto/save&id=" . $pro->id; ?>

<?php else : ?>
    <h1>Crear nuevo productos</h1>
    <?php $url_action = base_url . "producto/save"; ?>
<?php endif; ?>

<div class="form_container">
    <form action="<?= $url_action ?>" method="POST" enctype="multipart/form-data">

        <div class="field">
            <div class="control">
                <label class="label" for="nombre">Nombre</label>
                <input class="input is-primary" type="text" name="nombre" value="<?= isset($pro) && is_object($pro) ? $pro->nombre : ''; ?>" placeholder="Nombre Producto" required />
            </div>
        </div>

        <div class="field">
            <div class="control">
                <label class="label" for="descripcion">Descripcion</label>
                <textarea placeholder="Describa los detalles del producto" class="textarea is-primary" name="descripcion"><?= isset($pro) && is_object($pro) ? $pro->descripcion : ''; ?></textarea>
            </div>
        </div>

        <div class="field">
            <div class="control">
                <label class="label" for="precio">Precio</label>
                <input placeholder="Ingrese solo numero, puede usar decimales" class="input is-primary" type="text" name="precio" value="<?= isset($pro) && is_object($pro) ? $pro->precio : ''; ?>" required />
            </div>
        </div>

        <div class="field">
            <div class="control">
                <label class="label" for="stock">Stock</label>
                <input placeholder="Ingrese las unidades" class="input is-primary" type="number" name="stock" value="<?= isset($pro) && is_object($pro) ? $pro->stock : ''; ?>" required />
            </div>
        </div>

        <label class="label" for="categoria">Categoria</label>
        <!-- bucle while obtenemos las categorias -->
        <?php $categorias = Utils::showCategorias(); ?>
        <div class="select">
            <select name="categoria">
                <?php while ($cat = $categorias->fetch_object()) : ?>
                    <option value="<?= $cat->id ?>" <?= isset($pro) && is_object($pro) && $cat->id == $pro->categoria_id ? 'selected' : ''; ?>>
                        <?= $cat->nombre; ?>
                    </option>
                <?php endwhile; ?>
            </select>
        </div>

        <label class="label" for="imagen">Imagen</label>
        <?php if (isset($pro) && is_object($pro) && !empty($pro->imagen)) : ?>
            <img class="thumb" src="<?= base_url ?>uploads/images/<?= $pro->imagen ?>" />
        <?php endif; ?>
        <div class="control">
            <input class="input is-success" type="file" name="imagen" />
        </div>

        <div class="field">
            <div class="control">
                <button class="button is-primary" type="submit">
                    Guardar producto
                </button>
            </div>
        </div>
        <!-- <input type="submit" value="Guardar producto" /> -->
    </form>
</div>