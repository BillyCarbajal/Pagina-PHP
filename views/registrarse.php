<div class="containe p-5">
    <form method="post" action="index.php?controller=UserController&action=registrarse">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card bg-dark text-white" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">
                        <div class="mb-md-5 mt-md-4 pb-5">
                            <h2 class="fw-bold mb-2 text-uppercase">Registrarse</h2>
                            <div class="form-outline form-white mb-4">
                                <label class="form-label">Usuario</label>
                                <input value="<?php if (isset($_POST['nombre'])) : echo $_POST['nombre'];
                                                        endif; ?>" type="text" name="nombre" class="form-control form-control-lg" />
                                <?php
                                if (isset($data['nombre']))
                                    echo "<div class='alert alert-danger'>"
                                        . $data['nombre'] .
                                        "</div>";
                                ?>
                            </div>
                            <div class="form-outline form-white mb-4">
                                <label class="form-label">Contraseña</label>
                                <input type="password" name="password1" class="form-control form-control-lg" />
                                <?php
                                if (isset($data['password1']))
                                    echo "<div class='alert alert-danger'>"
                                        . $data['password1'] .
                                        "</div>";
                                ?>
                            </div>
                            <div class="form-outline form-white mb-4">
                                <label class="form-label">Repita la contraseña</label>
                                <input type="password" name="password2" class="form-control form-control-lg" />
                                <?php
                                if (isset($data['password2']))
                                    echo "<div class='alert alert-danger'>"
                                        . $data['password2'] .
                                        "</div>";
                                ?>
                            </div>
                            <button class="btn btn-outline-light btn-lg px-5" name="registrarse" type="submit">Registrarse</button>
                            <?php
                            if (isset($data['general']))
                                echo "<div class='alert alert-danger'>"
                                    . $data['general'] .
                                    "</div>";
                            ?>
                        </div>
                        <p>Ya tienes cuenta? <a href="index.php?controller=UserController&action=iniciarsesion">Iniciar sesion</a></p>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>