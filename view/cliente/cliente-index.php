<script>
    login();
</script>
<div class="justify-content-center content mt-2  mb-5">
    <!-- PESTAÑAS -->
    <ul class="nav nav-tabs nav-dark" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#perfil">Perfil</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#gestion_clases">Clases</a>
        </li>
    </ul>

    <!-- EDITAR PERFIL  -->
    <div class="tab-content">
        <div id="perfil" class="container tab-pane active card-deck mt-5">
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
                            <button class="btn btn-success">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- GESTION DE CLASES -->
        <div id="gestion_clases" class="transparent tab-pane table-responsive"><br>
            <h3 class="ml-3">Gestion de clases</h3>
            <table class="table table-striped text-light text-left">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Tipo</th>
                        <th scope="col">Id monitor</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Lugar</th>
                        <th scope="col">Asistentes</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (count($fetchallclases) > 0) {
                        foreach ($fetchallclases as $r) : ?>
                            <tr>
                                <td scope="row"><?php echo $r['nombre_tipo']; ?></td>
                                <td><?php echo $r['id_monitor']; ?></td>
                                <td><?php echo $r['fecha']; ?></td>
                                <td><?php echo $r['lugar']; ?></td>
                                <td><?php echo $r['asistentes']; ?></td>
                                <td>
                                    <a class="btn btn-info mr-sm-2 mb-sm-2" href="mailto:reservas@sunsetsurf.com?subject=<?php echo $r['nombre_tipo'] . " " . $r['fecha'] . " " . $r['lugar']; ?>">Reservar</a>
                                </td>
                            </tr>
                    <?php endforeach;
                    } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>