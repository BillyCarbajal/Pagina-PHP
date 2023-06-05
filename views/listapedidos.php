<div class="col-auto p-4">
    <h2 class="text-center">Lista de pedidos:</h2>
    <div class="container scroll-container">
        <div class="list-group">
            <?php foreach ($data as $pedido) : ?>
                <!-- Button trigger modal -->
                <button type="button" class="btn-outiline-success btn list-group-item list-group-item-action" data-bs-toggle="modal" data-bs-target="#pedido<?= $pedido[0]['id_pedido'] ?>" aria-current="true">
                    <div class="row col-auto m-2 d-inline-block">
                        ID: <?php print_r($pedido[0]['id_pedido']) ?>
                    </div>
                    <div class="row col-auto m-2 d-inline-block">
                        Fecha: <?php print_r($pedido[0]['fecha']) ?>
                    </div>
                    <div class="row col-auto m-2 d-inline-block">
                        Usuario: <?php print_r($pedido[0]['id_usuario']) ?>
                    </div>
                </button>
                <!-- Modal -->
                <div class="modal fade" id="pedido<?= $pedido[0]['id_pedido'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel"><?php print_r($pedido[0]['id_usuario']) ?></h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <?php foreach ($pedido[1] as $producto) : ?>
                                <div class="modal-body row">
                                    <div class="col-md-10">
                                        <button type="button" class="btn-outiline-success btn list-group-item list-group-item-action col-md-11" data-bs-toggle="modal" data-bs-target="#pedido<?= $pedido[0]['id_pedido'] ?>" aria-current="true">
                                            <div class="col-md-auto me-5 d-inline-block">
                                                Nombre: <?= ($producto['nombre']) ?>
                                            </div>
                                            <div class="col-md-auto me-5 d-inline-block">
                                                Precio: <?= ($producto['precio']) ?>
                                            </div>
                                            <div class="col-md-4 d-inline-block">
                                                Cantidad: <?= ($producto['cantidad']) ?>
                                            </div>

                                        </button>
                                    </div>
                                    <a href="index.php?controller=OrderController&action=eliminarproductodepedido&id=<?= $producto['id_producto'] ?>&idp=<?= $pedido[0]['id_pedido'] ?>" type="button" class="btn btn-secondary p-3 text-center col-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z" />
                                            <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z" />
                                        </svg>
                                    </a>
                                </div>
                            <?php endforeach; ?>
                            <div class="modal-footer">
                                <a href="index.php?controller=OrderController&action=eliminarpedido&id=<?= $pedido[0]['id_pedido'] ?>" type="button" class="btn btn-secondary">Eliminar Pedido</a>
                                <button type="button" class="btn btn-primary">TOTAL: <?= $pedido[3] ?> €</button>
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