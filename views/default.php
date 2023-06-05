<div class="containe min-vh-100 px-5 pt-3">
  <h2 class="text-center"> LISTA DE PRODUCTOS</h1>
    <div class='d-flex flex-wrap gap-5 p-5 text-center row'>
      <?php
      foreach ($data as $article) : ?>
        <div class=" elementos-sin-bordes text-decoration-none">
        <div class="card">
            <div class="container ratio">
            <a href="index.php?controller=ProductController&action=getProduct&id=<?= $article['id_producto'] ?>">
              <img class="card-img-top img-fluid" src="img/<?= $article['imagen'] ?>" onerror="this.src='img/error.jpg'" alt="Imagen">
            </a>
            </div>
            <div class="card-body">
              <h5 class="card-text cod-md-12"><?= $article['nombre'] ?></h5>
              <div class="row align-items-center">
                <h5 class="card-title col-md-12"><?= $article['precio'] ?>€</h5>
                <a hidden href="index.php?controller=ProductController&action=getProduct&id=<?= $article['id_producto'] ?>" class="btn float-end col-md-3 btn-warning">Ver mas</a>
                <button type="button" class="boton-redondeado btn btn-warning" data-toggle="modal" data-target="#addcesta<?= $article['id_producto'] ?>">Añadir a la cesta</button>
              </div>
            </div>
          </div>
        </div>
        <div class="modal" id="addcesta<?= $article['id_producto'] ?>">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title"><?= $article['nombre'] ?></h5>
              </div>
              <div class="modal-body">
                <form action="index.php?controller=OrderController&action=addToCesta" method="post">
                  <div class="form-group">
                    <label for="numero">Cantidad:</label>
                    <input type="number" class="form-control" name="cantidad" id="numero" value="1" required>
                    <input type="hidden" value="<?= $article['id_producto'] ?>" name="id_producto">
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
      <?php endforeach; ?>
    </div>
</div>
