<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Store Shop</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
    <!-- Cabecera -->
    <header>
        <div id="header">
            <div id="logo">
                <img src="assets/img/camiseta.png" alt="logo-camiseta">
                <a href="index.php">
                    Tienda de Camisetas
                </a>
            </div>
        </div>
    </header>

    <!-- Menu -->
    <nav id="menu">
        <ul>
            <li>
                <a href="#">Inicio</a>
            </li>
            <li>
                <a href="#">Catengoria</a>
            </li>
            <li>
                <a href="#">Catengoria</a>
            </li>
            <li>
                <a href="#">Catengoria</a>
            </li>
            <li>
                <a href="#">Catengoria</a>
            </li>
            <li>
                <a href="#">Catengoria</a>
            </li>
        </ul>
    </nav>

    <div id="content">
        <!-- Barra Lateral -->
        <aside id="lateral">

            <div id="login" class="block_aside">
                <form action="#" method="post">
                    <label for="email">Email</label>
                    <input type="email" name="email">

                    <label for="password">Contraseña</label>
                    <input type="password" name="password">
                    
                    <input type="submit" value="Enviar">
                </form>
                <ul>
                    <li>
                        <a href="#">Mis pedidos</a>
                    </li>
                    <li>
                        <a href="#">Gestionar pedidos</a>
                    </li>
                    <li>
                        <a href="#">Gestionar categorias</a>
                    </li>
                </ul>
            </div>
        
        </aside>

        <!-- Contenido Central -->
        <div id="central">
            <div class="product">
                <img src="assets/img/camiseta" alt="">
                <h2>Camiseta Azul Ancha</h2>
                <p>Q120.00</p>
                <a href="#" class="button">Comprar</a>
            </div>
            <div class="product">
                <img src="assets/img/camiseta" alt="">
                <h2>Camiseta Azul Ancha</h2>
                <p>Q120.00</p>
                <a href="#" class="button">Comprar</a>
            </div>
            <div class="product">
                <img src="assets/img/camiseta" alt="">
                <h2>Camiseta Azul Ancha</h2>
                <p>Q120.00</p>
                <a href="#" class="button">Comprar</a>
            </div>
        </div>
    </div>

    <!-- Pie de pagina -->
    <footer id="footer">
        <p>Desarrollador por Edgar BC &copy; <?=date('Y')?></p>
    </footer>
</body>
</html>