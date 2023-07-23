<?php
/**
 * Created by PhpStorm
 * User: CESARJOSE39
 * Date: 14/10/2020
 * Time: 21:54
 */
?>
<div class="modal fade" id="edit_especialidad" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar Especialidad</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">

                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <input type="hidden" id="id_especialidad" >
                            <label for="name_edit_espe">Descripción:</label>
                            <input type="text" id="name_edit_espe" onkeyup="mayuscula(this.id)" class="form-control" maxlength="100" >
                        </div>
                        <div class="col-lg-12">
                            <label for="estado_edit_espe">Estado:</label>
                            <select name="estado_edit_espe" class="form-control" id="estado_edit_espe">
                                <option value="0">Habilitado</option>
                                <option value="1">Deshabilitado</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-close fa-sm text-white-50"></i> Cerrar</button>
                <button type="button" class="btn btn-success" id="btn-edit-espe" onclick="save_edit_espe()"><i class="fa fa-save fa-sm text-white-50"></i> Guardar</button>
            </div>
        </div>
    </div>
</div>


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
                            <h5 class="card-title text-primary text-center"> <i class="bx bx-cog"></i>Administrar Especilidades</h5>
                            <div class="row">
                                <div class="col-lg-12">
                                    <h4><i class="bx bxl-slack"></i> Agregar Nueva Especialidad  </h4>
                                </div>
                                <div class="col-lg-4">
                                    <label for="name_espe">Descripción de la Especialidad:</label>
                                    <input type="text" class="form-control" id="name_espe" onkeyup="mayuscula(this.id)" placeholder="Ingrese Información" maxlength="250" >
                                </div>
                                <div class="col-lg-6">
                                    <button class="btn btn-success mt-4" id="save_espebtn" onclick="save_espe()" > Guardar Especialidad </button>
                                </div>
                            </div>
                            <div class="divider">
                                <div class="divider-text">
                                    <i class="bx bxs-meteor"></i>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <h5 class="text-info"><i class="bx bx-minus"></i> Lista de Especialidades</h5>
                                </div>
                                <div class="col-lg-12">
                                    <div class="table-responsive">
                                        <table class="table table-hover" id="dataTable" >
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Descripción</th>
                                                <th>Estado</th>
                                                <th>Opciones</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php $a=1; foreach ($especialidades as $s){
                                                ($s->estado_especialidad ==0)? $est = 'Habilitado': $est='Deshabilitado';
                                                ?>
                                                <tr>
                                                    <td><?= $a ?></td>
                                                    <td><?= $s->nombre_especialidad ?></td>
                                                    <td><?= $est ?></td>
                                                    <td>
                                                        <a onclick="data_espe('<?= $s->id_especialidad ?>','<?= $s->nombre_especialidad ?>','<?= $s->estado_especialidad ?>')" class="btn rounded-pill btn-icon btn-outline-warning" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top" title data-bs-html="true" data-bs-original-title ="Editar Información"  ><i class="bx bx-edit"></i></a>
                                                        <a href="" class="btn rounded-pill btn-icon btn-outline-danger" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top" title data-bs-html="true" data-bs-original-title ="Deshabilitar Servicio" ><i class="bx bx-shield-x"></i></a>
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
<script src="<?php echo _SERVER_ . _JS_;?>logistica.js"></script>
<!-- End of Main Content -->