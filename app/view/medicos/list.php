<?php
/**
 * Created by PhpStorm
 * User: CESARJOSE39
 * Date: 14/10/2020
 * Time: 21:54
 */
?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->

    <!-- Content Row -->
    <div class="row">
        <div class="col-lg-12 mb-4 order-0">
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-sm-12">
                        <div class="card-body">
                            <h5 class="card-title text-primary text-center"> <i class="bx bx-data"></i>Lista de Médicos Registrados</h5>
                            <div class="row">
                                <div class="col-lg-12 text-right mt-2 mb-2">
                                    <a target="_blank" href="<?= _SERVER_.'Medicos/registro' ?>" class="btn btn-sm btn-success"><i class="bx bx-user-plus"></i>   Registrar Médico  </a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="table-responsive">
                                        <table id="dataTable" class="table table-hover">
                                            <thead>
                                            <tr>
                                                <th>Item</th>
                                                <th>Nombres</th>
                                                <th>Apellidos</th>
                                                <th>Documento</th>
                                                <th>Estado</th>
                                                <th>Opciones</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                <?php $a=1; foreach ($medicos as $m){ ?>
                                                    <tr>

                                                    <td><?= $a ?></td>
                                                    <td><?= $m->nombre_medico ?></td>
                                                    <td><?= $m->apellidos_medico ?></td>
                                                    <td><?= $m->dni_medico ?></td>
                                                    <td><?= $m->estado_medico ?></td>
                                                    <td>
                                                        <a href="" class="btn btn-sm rounded-pill btn-icon btn-outline-warning" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top" title data-bs-html="true" data-bs-original-title ="Editar Información"><i class="bx bx-pencil"></i> </a>
                                                        <a href="<?= _SERVER_.'Medicos/'.$m->ruta.'/'.$m->id_medico ?>" class="btn btn-sm rounded-pill btn-icon btn-outline-info" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top" title data-bs-html="true" data-bs-original-title ="Administrar Horario"><i class="bx bx-calendar-event"></i> </a>
                                                        <a href="" class="btn btn-sm rounded-pill btn-icon btn-outline-danger" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top" title data-bs-html="true" data-bs-original-title ="Deshabilitar Médico"><i class="bx bxs-user-x"></i> </a>
                                                    </td>
                                                    </tr>
                                                <?php $a++; } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>

</div>
<!-- /.container-fluid -->
</div>
<script src="<?php echo _SERVER_ . _JS_;?>domain.js"></script>
<script src="<?php echo _SERVER_ . _JS_;?>medico.js"></script>
<!-- End of Main Content -->