<script>
    if (document.referrer == "https://" + window.location.hostname + "/sunsetsurf/public/index.php?c=monitor&a=index") {
        login();
    }
</script>
<div class="d-flex justify-content-center mb-5">
    <div class="card-deck mt-5">
        <div class="transparent card text-light">
            <div class="card-body">
                <h1 class="page-header">
                    <?php echo $cli->getId_cliente() != null ? $usu->getNombre() : 'Nuevo Registro'; ?>
                </h1>
                <form id="frm-cliente" action="?c=Cliente&a=guardar" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $cli->getId_cliente(); ?>" />

                    <div class="form-group">
                        <label>Nombre *</label>
                        <input type="text" name="nombre" value="<?php echo $usu->getNombre(); ?>" class="form-control" placeholder="Ingrese su nombre" required />
                    </div>

                    <div class="form-group">
                        <label>Apellidos *</label>
                        <input type="text" name="apellidos" value="<?php echo $usu->getApellidos(); ?>" class="form-control" placeholder="Ingrese su apellido" required />
                    </div>

                    <div class="form-group">
                        <label>Dni *</label>
                        <input type="text" name="dni" value="<?php echo $usu->getDni(); ?>" class="form-control" placeholder="Ingrese su dni" required />
                    </div>

                    <div class="form-group">
                        <label>Fecha de nacimiento *</label>
                        <input type="date" name="fec_nac" value="<?php echo $usu->getFec_nac(); ?>" class="form-control datepicker" placeholder="Ingrese su fecha de nacimiento" required />
                    </div>
                    <div class="form-group">
                        <label>Teléfono *</label>
                        <input type="text" name="telefono" value="<?php echo $usu->getTelefono(); ?>" class="form-control datepicker" placeholder="Ingrese su teléfono" required />
                    </div>
                    <div class="form-group">
                        <label>Correo *</label>
                        <input type="text" name="email" value="<?php echo $usu->getEmail(); ?>" class="form-control" placeholder="Ingrese su correo electrónico" required />
                    </div>
                    <div class="form-group">
                        <label>Contraseña *</label>
                        <input type="password" name="password" value="<?php echo $usu->getPassword(); ?>" class="form-control" placeholder="Ingrese su contraseña" required />
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="id_contacto" value="<?php echo $cont->getId_contacto(); ?>" />
                        <label>Contacto de emergencia 1*</label>
                        <input type="text" name="nombre1" value="<?php echo $cont->getNombre1(); ?>" class="form-control" placeholder="Nombre" required />
                        <input type="text" name="descripcion1" value="<?php echo $cont->getDescripcion1(); ?>" class="form-control" placeholder="Descripción" required />
                        <input type="text" name="telefono1" value="<?php echo $cont->getTelefono1(); ?>" class="form-control" placeholder="Teléfono" required />
                    </div>
                    <div class="form-group">
                        <label>Contacto de emergencia 2 (opcional)</label>
                        <input type="text" name="nombre2" value="<?php echo $cont->getNombre2(); ?>" class="form-control" placeholder="Nombre" />
                        <input type="text" name="descripcion2" value="<?php echo $cont->getDescripcion2(); ?>" class="form-control" placeholder="Descripción" />
                        <input type="text" name="telefono2" value="<?php echo $cont->getTelefono2(); ?>" class="form-control" placeholder="Teléfono" />
                    </div>

                    <div class="d-flex justify-content-center">
                        <input class="btn btn-info mr-1" type="reset" value="Reset">
                        <button class="btn btn-success mr-5">Guardar</button>
                        <button class="btn btn-danger mr-1" onclick="history.back ()">Atrás</button>
                    </div>
                </form>
                <script>
                    $(document).ready(function() {
                        $("#frm-cliente").submit(function() {
                            return $(this).validate();
                        });
                    })
                </script>
            </div>
        </div>
    </div>
</div>
</div>