<?php if (isset($gestion)) : ?>
    <h1>Gestionar pedidos</h1>

<?php else : ?>
    <h1>Mis pedidos</h1>

<?php endif; ?>
<table style="border: 1px solid #ccc;">
    <tr>
        <th>No. Pedido</th>
        <th>Coste</th>
        <th>Fecha</th>
        <th>Estado</th>
    </tr>
    <!-- Por medio de un bucle muestro los productos que deseo comprar -->
    <?php
    while ($ped = $pedidos->fetch_object()) :
    ?>
        <tr>
            <td>
                <a href="<?= base_url ?>pedido/detalle&id=<?= $ped->id ?>"><?= $ped->id ?></a>
            </td>
            <td>
                Q.<?= $ped->coste ?>
            </td>
            <td>
                <?= $ped->fecha ?>
            </td>
            <td>
                <?=Utils::showStatus($ped->estado) ?><br>
            </td>
        </tr>
    <?php endwhile; ?>
</table>