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
                            <h5 class="card-title text-primary"> <i class="bx bx-plus-medical"></i>Formulario de Registrar Médico  </h5>
                            <form enctype="multipart/form-data" method="post" id="info_medico">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label for=""><i class="fa fa-minus"></i> DNI </label>
                                        <input type="text" id="dni_medico" name="dni_medico" class="form-control" placeholder="Ingrese solo numeros" maxlength="10" onkeyup="validar_numeros(this.id)">
                                    </div>
                                    <div class="col-lg-3">
                                        <a href="" class="btn btn-block btn-success mt-4" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true" title data-bs-original-title="<i class='bx bx-check-shield'><i/> <span>Verificación Datos Sunat<span/>">Validación DNI</a>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for=""><i class="fa fa-minus"></i> Nombres </label>
                                        <input type="text" class="form-control" id="nombre_medico" name="nombre_medico" onkeyup="mayuscula(this.id)" placeholder="Ingrese Información...">
                                    </div>
                                    <div class="col-lg-6">
                                        <label for=""><i class="fa fa-minus"></i> Apellidos </label>
                                        <input type="text" class="form-control" id="apellidos_medico" name="apellidos_medico" placeholder="Ingrese Información..." onkeyup="mayuscula(this.id)">
                                    </div>
                                    <div class="col-lg-3">
                                        <label for=""><i class="fa fa-minus"></i> Dirección</label>
                                        <input type="text" class="form-control" id="direccion_medico" name="direccion_medico" placeholder="Ingrese Información..." onkeyup="mayuscula(this.id)" maxlength="350"  >
                                    </div>
                                    <div class="col-lg-3">
                                        <label for=""><i class="fa fa-minus"></i> Email</label>
                                        <input type="email" class="form-control" id="email_medico" name="email_medico" placeholder="Ingrese Información..." onkeyup="mayuscula(this.id)" maxlength="100"  >
                                    </div>
                                    <div class="col-lg-3">
                                        <label for=""><i class="fa fa-minus"></i> Télefono/Celular</label>
                                        <input type="text" class="form-control" id="telefono_medico" name="telefono_medico" placeholder="Ingrese Información..." onkeyup="validar_numeros(this.id)" maxlength="100"  >
                                    </div>
                                    <div class="col-lg-3">
                                        <label for=""><i class="fa fa-minus"></i> Epecialidad</label>
                                        <select name="id_especialidad" id="id_especialidad" class="form-control">
                                            <option value="">Seleecione una Especialidad</option>
                                            <option value="1">MEDICO GENERAL</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-12 text-center mt-2">
                                        <button type="submit" id="btn-save-medic"  class="btn btn-block btn-success text-white"> <i class="bx bx-save"></i> Guardar Información </button>
                                    </div>


                                </div>
                            </form>

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