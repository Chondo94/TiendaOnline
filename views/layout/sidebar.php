        <!-- Barra Lateral -->
        <aside id="lateral">
            <div id="carrito" class="block_aside">
                <h3>Carrito</h3>
                <ul>
                <?php $stats = Utils::statsCarrito(); ?>
                    <li><a href="<?=base_url?>carrito/index" style="text-decoration: none;">Productos (<?=$stats['count']?>)</a></li>
                    <li><a href="<?=base_url?>carrito/index" style="text-decoration: none;">Total: Q.<?=$stats['total']?></a></li>
                    <li><a href="<?=base_url?>carrito/index" style="text-decoration: none;">Ver</a></li>
                </ul>
            </div>

            <div id="login" class="block_aside">

                <?php if(!isset($_SESSION['identity'])): ?>
                <h3>Ingresar</h3>
                <form action="<?=base_url?>usuario/login" method="post">
                <div class="fiel">
                    <div class="control">
                        <label class="label" for="email">Email</label>
                        <input class="input" type="email" name="email"/>
                    </div>
                </div>
                <div class="fiel">
                    <div class="control">
                        <label class="label" for="password">Contraseña</label>
                        <input class="input" type="password" name="password"/>
                    </div>
                </div>
                <div class="fiel">
                    <div class="control">
                        <button class="button is-primary" type="submit" value="Enviar">Ingresar</button>
                    </div>
                </div>
                    <!-- <input type="submit" value="Enviar"> -->
                </form>

                <?php else: ?>
                    <h3><?=$_SESSION['identity']->nombre?> <?=$_SESSION['identity']->apellidos?></h3>
                <?php endif;?>

                <ul>
                    <?php if(isset($_SESSION['admin'])): ?>
                        <li>
                            <a href="<?=base_url?>categoria/index">Gestionar categorias</a>
                        </li>
                        <li>
                            <a href="<?=base_url?>producto/gestion">Gestionar productos</a>
                        </li>
                        <li>
                            <a href="<?=base_url?>pedido/gestion">Gestionar pedidos</a>
                        </li>
                    <?php endif; ?>

                    <?php if(isset($_SESSION['identity'])): ?>
                        <li>
                             <a href="<?=base_url?>pedido/mis_pedidos">Mis pedidos</a>
                         </li>
                        <li>
                            <a href="<?=base_url?>usuario/logout">Cerrar sesion</a>
                        </li>
                    <?php else: ?>
                        <li><a href="<?=base_url?>usuario/registro">Registrarse</a></li>
                    <?php endif; ?>
                </ul>
            </div>
        
        </aside>
        
          <!-- Contenido Central -->
          <div id="central">