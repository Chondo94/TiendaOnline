<h1>Crear nueva categoria</h1>

<form action="<?=base_url?>categoria/save" method="POST">
    <div class="fiel">
        <div class="control">
            <label class="label" for="nombre">Nombre</label>
            <input class="input" type="text" name="nombre" required placeholder="Ingrese el nombre de la categoría"/>
        </div>
    </div>
    <div class="fiel">
        <br>
        <p class="control">
            <button class="button is-primary" type="submit" value="Guardar categoria" style="border-radius: 7px;">Guardar categoria</button>
        </p>
    </div>
    <!-- <input type="submit" value="Guardar categoria" /> -->
</form>