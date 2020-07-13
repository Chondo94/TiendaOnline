<?php if (isset($_SESSION['pedido']) && $_SESSION['pedido'] == 'complete') : ?>
    <h1>Tu pedido se ha confirmado, Gracias...</h1>
    <P>
        Gracias por confirmar tu pedido, el ultimo pasa para poder recibir tu
        pedido, es que pases a readtzar el deposito a nuestra cuenta bancaria.
    </P>

    <dl>
        <dt> Banrural</dt>
        <dd>- No. 444-53234 </dd>
        <dt>G&T</dt>
        <dd>- No. 6566-754544 </dd>
        <dt>Industrial </dt>
        <dd>- No. 3456-2222 </dd>
    </dl>

<?php elseif (isset($_SESSION['pedido']) && $_SESSION['pedido'] != 'complete') : ?>
    <h1>Tu pedido no ha podido procesarse</h1>
<?php endif; ?>