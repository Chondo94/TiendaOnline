<?php if(isset($categoria)): ?>
    <h1> <?=$categoria->nombre?> </h1>
    
    <?php if($productos->num_rows == 0): ?>
        <h1>No hay productos para mostrar</h1>
    
    <?php else: ?>
        <?php while($product = $productos->fetch_object()): ?>
        <div class="product">
            <?php if($product->imagen != null):?>
                <img src="<?=base_url?>uploads/images/<?=$product->imagen?>" alt="">
            <?php else: ?>
                <img src="<?=base_url?>assets/img/camiseta.png"/>
            <?php endif; ?>
            <h2><?=$product->nombre?></h2>
            <p><?=$product->precio?></p>
            <a href="" class="button">Comprar</a>
        </div>
        <?php endwhile; ?>

    <?php endif; ?>
<?php else: ?>
    <h1>No existe esta categoria</h1>
<?php endif; ?>
