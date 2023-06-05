<div class="col-md-7 p-4">
    <form method="post" class="d-flex col-md-12" action="index.php?controller=UserController&action=administrar&id=editproducto">
        <div class="input-group">
            <select name="idproducto" class="form-select" aria-label="Example select with button addon">
                <option selected>Selecciona una opcion...</option>
                <?php foreach ($data as $opcion) : ?>
                    <option value="<?= $opcion['id_producto'] ?>"><?= $opcion['nombre'] ?></option>
                <?php endforeach; ?>
            </select>
            <button class="btn btn-outline-secondary" type="submit">Buscar</button>
        </div>
    </form>
    <br>
    <h2>Datos del producto:</h2>
    <form action="index.php?controller=UserController&action=administrar&id=editproducto" method="post">
        <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">Nombre</span>
            <input value="<?php if (isset($data1['nombre'])) : echo $data1['nombre'];
                            endif; ?>" required type="text" name="nombre" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text">Descripción</span>
            <textarea required class="form-control" name="descripcion" aria-label="With textarea"><?php if (isset($data1['descripcion'])) : echo $data1['descripcion'];
                                                                                                    endif; ?></textarea>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">Precio</span>
            <input value="<?php if (isset($data1['precio'])) : echo $data1['precio'];
                            endif; ?>" required type="number" name="precio" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
            <input hidden name="id_producto" value="<?php if (isset($data1['id_producto'])) { echo $data1['id_producto'];} ?>">
        </div>
        <div class="input-group mb-3">
            <input value="<?php if (isset($data1['imagen'])) { echo $data1['imagen']; } ?>" type="file" name="foto" class="form-control">
            <label class="input-group-text">Foto</label>
        </div>
        <input class="btn btn-primary" type="submit" name="modificarproducto" value="Guardar cambios">
    </form>
    <?php if (isset($data1['general'])) : ?>

        <div class="btn btn-outline-success">
            <?= $data1['general'] ?>
        </div>
    <?php endif; ?>
    
</div>
</div>