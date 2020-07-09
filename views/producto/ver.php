<?php if(isset($product)): ?>
    <h1> <?=$product->nombre?> </h1>

    <div id="detail-product">
        <div class="image">
            <?php if($product->imagen != null):?>
                <img src="<?=base_url?>uploads/images/<?=$product->imagen?>" alt="">
            <?php else: ?>
                <img src="<?=base_url?>assets/img/camiseta.png"/>
            <?php endif; ?>
        </div>
        <div class="data">
            <p class="description"><?=$product->descripcion?></p>
            <p class="price">Q.<?=$product->precio?></p>
            <a href="#" class="button">Comprar</a>
        </div>
    </div>
    
<?php else: ?>
    <h1>No existe el Producto</h1>
<?php endif; ?>
