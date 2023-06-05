<div class="d-flex flex-wrap gap-5 p-5 min-vh-100 text-center">
    <h1 class="col-md-12">CESTA DE PEDIDOS</h1>
    <?php foreach ($data as $article) : ?>
        <div class='elementos-sin-bordes text-decoration-none'>
            <div class='card'>
                <div class="container ratio">
                    <a href="index.php?controller=ProductController&action=getProduct&id=<?= $article[0]['id_producto'] ?>">
                        <img class="card-img-top img-fluid" src="img/<?= $article[0]['imagen'] ?>" onerror="this.src='img/error.jpg'">
                    </a>
                </div>
                <div class='card-body'>
                    <div class='row align-items-center'>
                        <h5 class='card-title col-md-7'><?= $article[0]['precio'] ?>€</h5>
                        <a href='index.php?controller=OrderController&action=reducirPedido&id=<?= $article[0]['id_producto'] ?>' class='btn btn-danger col-md-2 m-1'>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-dash-lg" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M2 8a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11A.5.5 0 0 1 2 8Z" />
                            </svg>
                        </a>
                        <a href='index.php?controller=OrderController&action=aumentarPedido&id=<?= $article[0]['id_producto'] ?>' class='btn btn-success col-md-2 m-1'>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z" />
                            </svg>
                        </a>
                    </div>
                    <p class='card-text'><?= $article[0]['nombre'] ?> (<?= $article[1] ?>uds.)</p>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    <div class='text-center sticky col-md-12'>
        <a href='index.php?controller=OrderController&action=vaciarCesta' class='btn btn-danger mb-5 mx-2'>Vaciar cesta</a>
        <a href='index.php?controller=OrderController&action=hacerPedido' class='btn btn-success mb-5 mx-2'>Hacer pedido</a>
    </div>
</div>