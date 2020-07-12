<?php if (isset($_SESSION['identity'])) : ?>
    <h1>Hacer Pedido</h1>
    <p>
        <a href="href=<?= base_url ?>carrito/index">Ver los productos y el precio del pedido</a>
    </p>
    <br />
    <h3>Direecion para enviar su pedido</h3>
    <form action="<?= base_url . 'pedido/add' ?>" method="POST">
        <label for="provincia">Departamento</label>
        <input type="text" name="provincia" required>

        <label for="ciudad">Ciudad</label>
        <input type="text" name="ciudad" required>

        <label for="direccion">Direccion</label>
        <input type="text" name="direccion" required>

        <input type="submit" value="Confirmar Pedido">
    </form>

<?php else : ?>
    <h1>Necesita Identificarse</h1>
    <p>Bienvenido, para poder realizar pedidos, necesita registrarse o iniciar sesion.</p>
<?php endif; ?>