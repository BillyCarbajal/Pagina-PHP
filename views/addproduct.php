<div class="col-md-7 p-4">
    <h2 class="text-center">Datos del producto:</h2>
    <form action="index.php?controller=ProductController&action=addproduct" method="post">
        <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">Nombre</span>
            <input value="<?php if (isset($_POST['nombre'])){ echo $_POST['nombre'];} ?>" type="text" name="nombre" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
        </div>
        <?php if (isset($data['nombre'])) : ?>
            <div class='alert alert-danger'>
                <?= $data['nombre'] ?>
            </div>
        <?php endif; ?>
        <div class="input-group mb-3">
            <span class="input-group-text">Descripción</span>
            <textarea class="form-control" name="descripcion" aria-label="With textarea"><?php if (isset($_POST['descripcion'])){ echo $_POST['descripcion'];} ?></textarea>
        </div>
        <?php if (isset($data['descripcion'])) : ?>
            <div class='alert alert-danger'>
                <?= $data['descripcion'] ?>
            </div>
        <?php endif; ?>
        <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">Precio</span>
            <input value="<?php if (isset($_POST['precio'])){ echo $_POST['precio'];} ?>" type="number" name="precio" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
        </div>
        <?php if (isset($data['precio'])) : ?>
            <div class='alert alert-danger'>
                <?= $data['precio'] ?>
            </div>
        <?php endif; ?>
        <div class="input-group mb-3">
            <input type="file" name="foto" class="form-control" id="inputGroupFile02">
            <label class="input-group-text" for="inputGroupFile02">Foto</label>
        </div>
        <?php if (isset($data['foto'])) : ?>
            <div class='alert alert-danger'>
                <?= $data['foto'] ?>
            </div>
        <?php endif; ?>
        <input class="btn btn-primary" type="submit" name="submit" value="Crear producto">
    </form>
    <?php if (isset($data['general'])) : ?>
        <div class="btn btn-outline-success">
            <?= $data['general'] ?>
        </div>
    <?php endif; ?>
</div>
</div>