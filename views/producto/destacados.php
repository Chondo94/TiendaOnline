
<h1>Productos</h1>

<!-- bucle para mostrar 6 productos aleatoriamente -->
<?php while($product = $productos->fetch_object()): ?>
<div class="product">
    <?php if($product->imagen != null):?>
        <img src="<?=base_url?>uploads/images/<?=$product->imagen?>" alt="">
    <?php else: ?>
        <img src="<?=base_url?>assets/img/camiseta.png"/>
    <?php endif; ?>
    <h2><?=$product->nombre?></h2>
    <p><?=$product->precio?></p>
    <a href="#" class="button">Comprar</a>
</div>
<?php endwhile; ?>