<div class="containe mt-5 altura-minima col-md-11">
  <div class='row align-items-center'>
    <div class='col-md-6 p-5'>
      <img class='card-img-top' src="img/<?= $data['imagen'] ?>" onerror="this.src='img/error.jpg'" alt="Imagen">
    </div>
    <div class='col-md-4'>
      <h1><?= $data['nombre'] ?></h1>
      <h3>Precio: <?= $data['precio'] ?>€</h3>
      <p><?= $data['descripcion'] ?></p>
      <button type="button" class="boton-redondeado btn btn-warning m-1" data-toggle="modal" data-target="#addcesta<?= $data['id_producto'] ?>">Añadir a la cesta</button>
    </div>
    <div class="modal" id="addcesta<?= $data['id_producto'] ?>">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title"><?= $data['nombre'] ?></h5>
          </div>
          <div class="modal-body">
            <form action="index.php?controller=OrderController&action=addToCesta" method="post">
              <div class="form-group">
                <label for="numero">Cantidad:</label>
                <input type="number" class="form-control" name="cantidad" id="numero" value="1" required>
                <input type="hidden" value="<?= $data['id_producto'] ?>" name="id_producto">
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary" name="add_cesta">Añadir a la cesta</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>