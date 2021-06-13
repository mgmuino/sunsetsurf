<script>
    login();
</script>
<div class="justify-content-center content mt-2 mb-2">
    <!-- PESTAÑAS -->
    <ul class="nav nav-tabs nav-dark" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#lista_clientes">Clientes</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#gestion_clases">Clases</a>
        </li>
    </ul>

    <!-- LISTADO DE CLIENTES  -->
    <div class="tab-content">
        <div id="lista_clientes" class="transparent tab-pane active table-responsive"><br>
        <h3 class="ml-3">Listado de clientes</h3>
            <table class="table table-striped text-light text-left">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellidos</th>
                        <th scope="col">Dni</th>
                        <th scope="col">Fecha de Nacimiento</th>
                        <th scope="col">Teléfono</th>
                        <th scope="col">Email</th>
                        <th scope="col">Nombre contacto</th>
                        <th scope="col">Descripción contacto</th>
                        <th scope="col">Teléfono contacto</th>
                        <th scope="col">Nombre contacto</th>
                        <th scope="col">Descripción contacto</th>
                        <th scope="col">Teléfono contacto</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($this->modelcliente->listar() as $r) : ?>
                        <tr>
                            <td scope="row"><?php echo $r['nombre']; ?></td>
                            <td><?php echo $r['apellidos']; ?></td>
                            <td><?php echo $r['dni']; ?></td>
                            <td><?php echo $r['fec_nac']; ?></td>
                            <td><?php echo $r['telefono']; ?></td>
                            <td><?php echo $r['email']; ?></td>
                            <td><?php echo $r['nombre1']; ?></td>
                            <td><?php echo $r['descripcion1']; ?></td>
                            <td><?php echo $r['telefono1']; ?></td>
                            <td><?php echo $r['nombre2']; ?></td>
                            <td><?php echo $r['descripcion2']; ?></td>
                            <td><?php echo $r['telefono2']; ?></td>
                            <td>
                                <a class="btn btn-info mr-sm-2 mb-sm-2" href="?c=Cliente&a=editar&id=<?php echo $r['id_cliente']; ?>&id_contacto=<?php echo $r['id_contacto_emerg']; ?>">Editar</a>
                            </td>
                            <td>
                                <a class="btn btn-danger mr-sm-2 mb-sm-2" onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=Cliente&a=eliminar&id=<?php echo $r['id_cliente']; ?>&id_contacto=<?php echo $r['id_contacto_emerg']; ?>">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <!-- COMENTARIOS -->
        <div id="gestion_clases" class="container tab-pane fade"><br>
            <h3>Comentarios</h3>
            <ul class="list-group">
                <li class="list-group-item">1. Buena compra y buena relacion calidad precio. </li>
                <li class="list-group-item">2. No me llego a tiempo el pedido y tuve que reclamar, eso
                    si me
                    solucionaron todo y ahora estoy super contento con mi ordenador nuevo. </li>
                <li class="list-group-item">3. Me falla el conector de sonido, lo he devuelto. </li>
                <li class="list-group-item">4. Es compatible con la placa ASUS z150???.</li>
            </ul>

        </div>
    </div>
</div>
</div>