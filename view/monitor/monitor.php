<!--Script boton login-->
<script>
    login();
</script>
<div class="transparent d-flex justify-content-center content mt-2 mb-2">
    <h2>MONITOR SITE</h2>
<table class="table table-striped">
<!--LISTADO DE CLIENTES-->
    <caption>Clientes</caption>
    <thead>
        <tr>
            <th style="width:180px;">Id</th>
            <th style="width:180px;">Nombre</th>
            <th>Apellidos</th>
            <th>Dni</th>
            <th style="width:120px;">Fecha de Nacimiento</th>
            <th style="width:120px;">Teléfono</th>
            <th style="width:120px;">Email</th>
            <th style="width:120px;">Nombre contacto 1</th>
            <th style="width:120px;">Descripción contacto 1</th>
            <th style="width:120px;">Teléfono contacto 1</th>
            <th style="width:120px;">Nombre contacto 2</th>
            <th style="width:120px;">Descripción contacto 2</th>
            <th style="width:120px;">Teléfono contacto 2</th>
            <th style="width:60px;"></th>
            <th style="width:60px;"></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($this->modelcliente->listar() as $r) : ?>
            <tr>
                <td><?php echo $r['nombre']; ?></td>
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
                    <a href="?c=Cliente&a=editar&id=<?php echo $r['id_cliente']; ?>&id_contacto=<?php echo $r['id_contacto_emerg']; ?>">Editar</a>
                </td>
                <td>
                    <a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=Cliente&a=eliminar&id=<?php echo $r['id_cliente']; ?>&id_contacto=<?php echo $r['id_contacto_emerg']; ?>">Eliminar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

</div>