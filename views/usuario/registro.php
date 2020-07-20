<h1>Registrarse</h1>

    
<?php if(isset($_SESSION['register']) && $_SESSION['register'] == 'complete'): ?>
    <strong class="alert_green">Su registro fue exitoso</strong>
<?php elseif(isset($_SESSION['register']) && $_SESSION['register'] == 'failed'): ?>
    <strong class="alert_red">Lo sentimos, su registro Fallo, Ingrese correctamente los datos</strong>
<?php endif; ?>
<?php utils::deleteSession('register'); ?>

<form action="<?=base_url?>usuario/save" method="POST">
    <div class="fiel">
        <div class="control">
            <label class="label" for="nombre">Nombre</label>
            <input class="input is-primary" type="text" name="nombre" required placeholder="Ingrese su nombre"/>
        </div>
    </div>
    <div class="fiel">
        <div class="control">
            <label class="label" for="apellidos">Apellidos</label>
            <input class="input is-primary" type="text" name="apellidos" required placeholder="Ingrese sus dos apellidos"/>
        </div>
    </div>
    <div class="fiel">
        <div class="control">
            <label class="label" for="email">Email</label>
            <input class="input is-primary" type="email" name="email" required placeholder="Ingrese un correo electronico"/>
        </div>
    </div>
    <div class="fiel">
        <div class="control">
            <label class="label" for="password">Contraseña</label>
            <input class="input is-primary" type="password" name="password" required placeholder="XXXX XXXX"/>
        </div>
    </div>
    <div class="fiel">
        <br>
        <p class="control">
            <button class="button is-primary" type="submit" value="Registrarse" style="border-radius: 7px;">Registrarse</button>
        </p>
    </div>
    <!-- <input type="submit" Value="Registrarse"> -->
</form>