<div class="col-md-7 p-4">
    <h2 class="text-center">Datos del producto:</h2>
    <form action="index.php?controller=ProductController&action=addproduct" method="post">
        <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">Nombre</span>
            <input required type="text" name="nombre" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text">Descripción</span>
            <textarea required class="form-control" name="descripcion" aria-label="With textarea"></textarea>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">Precio</span>
            <input required type="number" name="precio" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
        </div>
        <div class="input-group mb-3">
            <input required type="file" name="foto" class="form-control" id="inputGroupFile02">
            <label class="input-group-text" for="inputGroupFile02">Foto</label>
        </div>
        <input class="btn btn-primary" type="submit" name="submit" value="Crear producto">
    </form>
    <?php if (isset($data['general'])) : ?>
        <div class="btn btn-outline-success">
            <?= $data['general'] ?>
        </div>
    <?php endif; ?>
</div>
</div>