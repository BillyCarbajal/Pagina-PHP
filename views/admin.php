<div class="row col-12">
    <div class="px-4 bg-dark-subtle h-auto col-auto altura-minima">
        <h2 class="mt-3 text-center col-md-12">Administración</h2>
        <div class="d-flex justify-content-center align-items-center col-auto pe-5 mt-3" action="index.php?controller=UserController&action=administrar" method="post">
            <div class="btn-group-vertical" role="group" aria-label="Vertical radio toggle button group">
                <a class="btn btn-primary" href="index.php?controller=UserController&action=administrar&id=addproduct">Añadir producto</a>
                <a class="btn btn-primary" href="index.php?controller=UserController&action=administrar&id=editproducto">Editar producto</a>
                <a class="btn btn-primary" href="index.php?controller=UserController&action=administrar&id=delproducto">Eliminar producto</a>
                <a class="btn btn-primary" href="index.php?controller=UserController&action=administrar&id=showpedidos">Ver pedidos</a>
            </div>
        </div>
    </div>