<?php if(isset($_SESSION['identity'])): ?>
<h1>Hacer Pedido</h1>
<a href="href=<?=base_url?>carrito/index">Ver los productos y el precio del pedido</a>
<?php else: ?>
<h1>Necesita Identificarse</h1>
<p>Bienvenido, para poder realizar pedidos, necesita registrarse o iniciar sesion.</p>
<?php endif; ?>