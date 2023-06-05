<div class="col-md-8 p-4">
    <h2 class="text-center">Lista de productos:</h2>
    <div class="container scroll-container">
        <div class="list-group">
            <?php foreach ($data as $producto) : ?>
                <!-- Button trigger modal -->
                <button type="button" class="btn-outiline-success btn list-group-item list-group-item-action" data-bs-toggle="modal" data-bs-target="#pedido<?= $producto['id_producto'] ?>" aria-current="true">
                    <div class="row m-2 col-auto d-inline-block">
                        ID: <?= $producto['id_producto'] ?>
                    </div>
                    <div class="row m-2 col-auto d-inline-block">
                        Nombre: <?= $producto['nombre'] ?>
                    </div>
                    <div class="row m-2 col-auto d-inline-block">
                        Descripcion: <?= $producto['descripcion'] ?>
                    </div>
                    <div class="row m-2 col-auto d-inline-block">
                        Precio: <?= $producto['precio'] ?>
                    </div>
                </button>
                <!-- Modal -->
                <div class="modal fade" id="pedido<?= $producto['id_producto'] ?>" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel"><?= $producto['nombre'] ?></h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <h2> Deseas eliminar el siguiente producto?</h2>
                                <button type="button" class="btn-outiline-success btn list-group-item list-group-item-action" data-bs-toggle="modal" data-bs-target="#pedido<?= $pedido[0]['id_pedido'] ?>" aria-current="true">
                                    <div class="row m-2 col-auto d-inline-block">
                                        ID: <?= $producto['id_producto'] ?>
                                    </div>
                                    <div class="row m-2 col-auto d-inline-block">
                                        Nombre: <?= $producto['nombre'] ?>
                                    </div>
                                    <div class="row m-2 col-auto d-inline-block">
                                        Descripcion: <?= $producto['descripcion'] ?>
                                    </div>
                                    <div class="row m-2 col-auto d-inline-block">
                                        Precio: <?= $producto['precio'] ?>
                                    </div>
                                </button>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                <a href="index.php?controller=ProductController&action=delproducto&id=<?= $producto['id_producto'] ?>" type="button" class="btn btn-primary">Eliminar</a>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
            <? endforeach; ?>
        </div>
    </div>
</div>
</div>