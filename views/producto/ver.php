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
            <!-- el href apunta o me lleva al controlador de carrito y al metodo add() -->
            <a href="<?=base_url?>carrito/add&id=<?=$product->id?>" class="button">Comprar</a>
        </div>
    </div>
    
<?php else: ?>
    <h1>No existe el Producto</h1>
<?php endif; ?>
