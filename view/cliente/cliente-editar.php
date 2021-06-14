<!--Script boton login-->
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
                <!--Formulario de Edicion/Creacion de clientes-->
                <form id="frm-cliente" action="?c=Cliente&a=guardar" method="post" enctype="multipart/form-data">
                <div class="error" id="error_form"></div>
                <input type="hidden" name="id" value="<?php echo $cli->getId_cliente(); ?>" />

                    <div class="form-group">
                        <label>Nombre *</label>
                        <input type="text" name="nombre" value="<?php echo $usu->getNombre(); ?>" class="form-control" placeholder="Ingrese su nombre" required pattern="[A-Za-z\sñ]+" title="Solo texto"/>                        
                    </div>

                    <div class="form-group">
                        <label>Apellidos *</label>
                        <input type="text" name="apellidos" value="<?php echo $usu->getApellidos(); ?>" class="form-control" placeholder="Ingrese su apellido" required pattern="[A-Za-z\sñ]+" title="Solo texto"/>
                    </div>

                    <div class="form-group">
                        <label>Dni *</label>
                        <input type="text" name="dni" value="<?php echo $usu->getDni(); ?>" class="form-control" placeholder="Ingrese su dni" required pattern="[0-9]{8,8}[A-Z]" title="8 digitos 1 letra mayuscula"/>
                    </div>

                    <div class="form-group">
                        <label>Fecha de nacimiento *</label>
                        <input type="date" name="fec_nac" value="<?php echo $usu->getFec_nac(); ?>" class="form-control datepicker" placeholder="Ingrese su fecha de nacimiento" required pattern="\d{1,2}\/\d{1,2}\/\d{2,4}" title="dd/mm/yyyy"/>
                    </div>
                    <div class="form-group">
                        <label>Teléfono *</label>
                        <input type="text" name="telefono" value="<?php echo $usu->getTelefono(); ?>" class="form-control datepicker" placeholder="Ingrese su teléfono" required pattern="[0-9]{9}" title="9 numeros enteros"/>
                    </div>
                    <div class="form-group">
                        <label>Correo *</label>
                        <input type="text" name="email" value="<?php echo $usu->getEmail(); ?>" class="form-control" placeholder="Ingrese su correo electrónico" required pattern="[^@\s]+@[^@\.\s]+(\.[^@\.\s]+)+" title="Formato email"/>
                    </div>
                    <div class="form-group">
                        <label>Contraseña *</label>
                        <input type="password" name="password" value="<?php echo $usu->getPassword(); ?>" class="form-control" placeholder="Ingrese su contraseña" required />
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="id_contacto" value="<?php echo $cont->getId_contacto(); ?>" />
                        <label>Contacto de emergencia 1*</label>
                        <input type="text" name="nombre1" value="<?php echo $cont->getNombre1(); ?>" class="form-control" placeholder="Nombre" required pattern="[A-Za-z\sñ]+" title="Solo texto"/>
                        <input type="text" name="descripcion1" value="<?php echo $cont->getDescripcion1(); ?>" class="form-control" placeholder="Descripción" required pattern="[A-Za-z\sñ]+" title="Solo texto"/>
                        <input type="text" name="telefono1" value="<?php echo $cont->getTelefono1(); ?>" class="form-control" placeholder="Teléfono" required pattern="[0-9]{9}" title="9 numeros enteros"/>
                    </div>
                    <div class="form-group">
                        <label>Contacto de emergencia 2 (opcional)</label>
                        <input type="text" name="nombre2" value="<?php echo $cont->getNombre2(); ?>" class="form-control" placeholder="Nombre" pattern="[A-Za-z\sñ]+" title="Solo texto"/>
                        <input type="text" name="descripcion2" value="<?php echo $cont->getDescripcion2(); ?>" class="form-control" placeholder="Descripción" pattern="[A-Za-z\sñ]+" title="Solo texto"/>
                        <input type="text" name="telefono2" value="<?php echo $cont->getTelefono2(); ?>" class="form-control" placeholder="Teléfono" pattern="[0-9]{9}" title="9 numeros enteros"/>
                    </div>

                    <div class="d-flex justify-content-center">
                        <input class="btn btn-info mr-1" type="reset" value="Reset">
                        <button class="btn btn-success mr-5">Guardar</button>
                        <button class="btn btn-danger mr-1" onclick="history.back ()">Atrás</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>