<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Principal</title>
    <style>
        .card {
            border-color: gray;
            border-radius: 20px;
        }

        .card-img-top {
            border-radius: 20px 20px 0 0;
        }

        .boton-redondeado {
            border-radius: 20px;
            margin-bottom: -10px;
        }

        .elementos-sin-bordes {
            margin: 0px;
            padding: 0px;
            width: 300px;
        }

        .ratio {
            position: relative;
            width: 100%;
        }

        .ratio img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .ratio:before {
            content: "";
            display: block;
            padding-top: 100%;
        }

        .altura-minima {
            min-height: 500px;
        }

        .scroll-container {
            height: 500px;
            overflow-y: auto;
        }

        .header {
            min-height: 60px;
        }

        .bordesuperior {
            margin-top: 60px;
        }

        .sticky {
            position: sticky;
            align-items: center;
            bottom: 0;
        }
    </style>
</head>

<body>
    <div id="header" class="fixed-top header bg-dark container-fluid">

        <div class="row align-items-center col-md-12">
            <div class="text-light col-md-4">
                <svg width="50" height="50" viewBox="0 0 500 500" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" id="svg_null">
                    <defs>
                        <path d="M364.147 158.98c0 -0.203 -0.025 -0.403 -0.038 -0.603c-0.01 -0.17 -0.01 -0.346 -0.034 -0.514c-0.03 -0.207 -0.08 -0.407 -0.123 -0.61c-0.037 -0.161 -0.053 -0.327 -0.098 -0.489c-0.055 -0.209 -0.134 -0.407 -0.207 -0.612c-0.05 -0.145 -0.091 -0.298 -0.152 -0.44c-0.09 -0.21 -0.2 -0.413 -0.303 -0.617c-0.061 -0.123 -0.118 -0.255 -0.186 -0.376c-0.128 -0.218 -0.276 -0.42 -0.417 -0.623c-0.07 -0.098 -0.127 -0.202 -0.195 -0.296c-0.196 -0.257 -0.412 -0.493 -0.637 -0.727c-0.032 -0.037 -0.062 -0.075 -0.098 -0.11c-0.52 -0.527 -1.121 -0.991 -1.781 -1.373l-105.814 -61.095c-2.653 -1.528 -5.921 -1.522 -8.569 0.014l-105.13 61.094c-0.166 0.096 -0.313 0.21 -0.468 0.316c-0.153 0.103 -0.314 0.196 -0.457 0.307c-0.15 0.119 -0.29 0.25 -0.432 0.378c-0.137 0.12 -0.28 0.234 -0.41 0.362c-0.134 0.136 -0.252 0.289 -0.377 0.432c-0.119 0.134 -0.246 0.264 -0.348 0.405c-0.116 0.152 -0.217 0.316 -0.323 0.477c-0.096 0.148 -0.205 0.29 -0.292 0.44c-0.095 0.165 -0.168 0.34 -0.252 0.511c-0.08 0.162 -0.173 0.314 -0.239 0.48c-0.07 0.178 -0.12 0.36 -0.186 0.54c-0.057 0.17 -0.126 0.336 -0.173 0.509c-0.046 0.18 -0.07 0.366 -0.107 0.546c-0.039 0.184 -0.089 0.363 -0.114 0.552c-0.02 0.185 -0.02 0.371 -0.034 0.558c-0.014 0.184 -0.039 0.37 -0.039 0.557l-0.261 126.354c-0.01 3.061 1.621 5.888 4.269 7.42l105.815 61.09c0 0.001 0.004 0.001 0.006 0.004c1.322 0.762 2.794 1.144 4.272 1.144c0.364 0 0.737 -0.025 1.103 -0.073c0.127 -0.016 0.25 -0.05 0.378 -0.073c0.239 -0.043 0.477 -0.082 0.712 -0.143c0.143 -0.039 0.282 -0.096 0.425 -0.141c0.212 -0.07 0.428 -0.132 0.64 -0.216c0.147 -0.064 0.288 -0.146 0.431 -0.216c0.19 -0.091 0.39 -0.173 0.571 -0.28c0.007 -0.002 0.01 -0.007 0.016 -0.01c0.005 -0.001 0.011 -0.001 0.014 -0.006l105.13 -61.095c2.629 -1.526 4.244 -4.333 4.25 -7.371l0.262 -126.352l0 -0.016l0 -0.013z" id="5f69b39a-c9a0-49ee-92da-25a6187b71dd"></path>
                    </defs>
                    <g id="root" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <mask id="842b316f-55d7-44f5-81b8-dea038f747a9" fill="#fff">
                            <use xlink:href="#5f69b39a-c9a0-49ee-92da-25a6187b71dd"></use>
                        </mask>
                        <use id="shape.primary" fill="#8c54a1" xlink:href="#5f69b39a-c9a0-49ee-92da-25a6187b71dd"></use>
                        <path d="M250 112.45l-78.554 43.301l0 93.598c0.003 2.518 1.124 4.84 2.946 6.101l72.77 39.329c0.91 0.63 1.822 0.953 2.838 0.953c1.022 0 2.043 -0.318 2.96 -0.953l72.667 -39.342c1.806 -1.257 2.385 -3.915 2.388 -6.425c0.001 -1.673 0.001 -32.76 0 -93.261l-78.015 -43.302z" id="shape.accent" fill-opacity=".2" fill="#b2ebf9" mask="url(#842b316f-55d7-44f5-81b8-dea038f747a9)"></path>
                        <path d="M250 112.45c-0.255 122.004 -0.043 183.007 0.635 183.007c1.02 0 2.042 -0.32 2.959 -0.954l72.033 -39.066c1.806 -1.257 2.385 -3.915 2.388 -6.425c0.001 -1.673 0.001 -32.665 0 -92.977l-78.015 -43.586z" id="shape.accent" fill-opacity=".2" fill="#b2ebf9" mask="url(#842b316f-55d7-44f5-81b8-dea038f747a9)"></path>
                        <path d="M252.705 227.013c-1.822 -1.053 -4.078 -1.049 -5.9 0.011l-72.431 42.09c-1.818 1.056 -2.932 2.999 -2.927 5.1c0.002 2.1 1.123 4.038 2.943 5.089l72.904 42.092c0.91 0.528 1.926 0.787 2.943 0.787c1.024 0 2.043 -0.263 2.96 -0.796l72.43 -42.09c1.817 -1.056 2.443 -3.208 2.439 -5.307c-0.002 -2.1 -0.635 -3.832 -2.455 -4.883l-72.906 -42.093z" id="shape.accent" fill-opacity=".5" fill="#b2ebf9" mask="url(#842b316f-55d7-44f5-81b8-dea038f747a9)"></path>
                        <g id="Group" transform="translate(40.000000, 371.000000)">
                            <rect id="Rectangle-77" x="0" y="0" width="420" height="41"></rect><text id="headerText.primary" font-family="PT Sans" font-size="40" font-weight="400" line-spacing="40" letter-spacing="5.714" fill="#8c54a1" data-text-alignment="C" font-style="normal">
                                <tspan x="210" y="220.5"></tspan>
                            </text>
                        </g>
                    </g>
                </svg>
                <a href="index.php" class="btn text-light">
                    <h3>TIENDA</h3>
                </a>
            </div>
            <div class="row col-md-4">
                <form method="get" class="d-flex" action="index.php?controller=ProductController&action=buscarproducto" role="search">
                    <input class="form-control me-2" name="id" type="search" placeholder="Buscar" aria-label="Search">
                    <input type="hidden" name="controller" value="ProductController">
                     <!--   <input type="hidden" name="action" value="getProduct">-->
                        <input type="hidden" name="action" value="buscarproducto">
                    <button class="btn btn-outline-success" type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                        </svg>
                    </button>
                </form>
            </div>
            <div class="row col-md-4">
                <?php if (isset($_SESSION['user'])) : ?>
                    <div class="row dropdown col-md-6 d-inline-block mx-3">
                        <button class="btn btn-primary mx-3 col-md-12" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?= $_SESSION['user'] ?>
                        </button>
                        <ul class="dropdown-menu">
                            <?php if ($_SESSION['rol'] == "admin") : ?>
                                <li><a class="dropdown-item" href="index.php?controller=UserController&action=administrar">Administrar</a></li>
                            <?php else : ?>
                                <li><a class="dropdown-item" href="index.php?controller=OrderController&action=verpedidos">Ver pedidos</a></li>
                            <?php endif; ?>
                            <li><a class="dropdown-item" href="index.php?controller=UserController&action=cerrarsesion">Cerrar sesión</a></li>
                        </ul>
                    </div>
                    <?php if ($_SESSION['rol'] != "admin") : ?>
                        <div class="row d-inline-block col-md-4">
                            <a class="row d-inline-block btn btn-success col-md-12 mx-3" href="index.php?controller=OrderController&action=getCesta">Carrito</a>
                        </div>
                    <?php endif; ?>
                <?php else : ?>
                    <div class="row col-auto d-inline-block">
                        <a class="d-inline-block btn btn-primary col-auto mx-3" href="index.php?controller=UserController&action=iniciarsesion">Iniciar sesión</a>
                    </div>
                    <div class="row col-auto d-inline-block">
                        <a class="d-inline-block btn btn-success col-auto mx-3" href="index.php?controller=OrderController&action=getCesta">Carrito</a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    
    <div class="bordesuperior">
        <?php print_r($_GET);
        print_r($_SESSION['mensaje']); ?>