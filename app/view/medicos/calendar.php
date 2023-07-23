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
                            <h5 class="card-title text-primary text-center"> Administrar Horario de Atención</h5>
                            <div class="divider">
                                <div class="divider-text">
                                    <i class="bx bxs-layer"></i>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <input type="hidden" id="id_medico" value="<?= $_GET['id'] ?>">
                                    <label for="">Médico: </label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text" readonly><i class="bx bx-user"></i></span>
                                        <input type="text" disabled class="form-control" value="<?= $info->nombre_medico.' '.$info->apellidos_medico ?>">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label for="">Número Documento:</label>
                                    <input type="text" class="form-control" value="<?= $info->dni_medico ?>" readonly>
                                </div>
                                <div class="col-lg-12 mt-2">
                                    <h5 class="text-danger"><i class="bx bx-calendar"></i> Administrar de Atención</h5>
                                </div>
                                <div class="col-lg-6 mt-2">
                                    <div class="form-check">
                                        <input type="checkbox" id="lunes" class="form-check-input" >
                                        <label for="lunes" class="form-check-label">LUNES</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" id="martes" class="form-check-input" >
                                        <label for="martes" class="form-check-label">MARTES</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" id="miercoles" class="form-check-input" >
                                        <label for="miercoles" class="form-check-label">MIERCOLES</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" id="jueves" class="form-check-input" >
                                        <label for="jueves" class="form-check-label">JUEVES</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" id="viernes" class="form-check-input" >
                                        <label for="viernes" class="form-check-label">VIERNES</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" id="sabado" class="form-check-input" >
                                        <label for="sabado" class="form-check-label">SABADO</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" id="domingo" class="form-check-input" >
                                        <label for="domingo" class="form-check-label">DOMINGO</label>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <label for="hora_inicio">Hora Inicio</label>
                                            <input type="time" id="hora_inicio" class="form-control">
                                        </div>
                                        <div class="col-lg-6">
                                            <label for="hora_fin">Hora de Termino</label>
                                            <input type="time" id="hora_fin" class="form-control">
                                        </div>
                                        <div class="col-lg-6">
                                            <label for="intervalo" >Intervalo (Minutos)</label>
                                            <input type="number" class="form-control" value="0" id="intervalo">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 text-center">
                                    <button class="btn btn-lg btn-success" id="btn-save-data" onclick="save_calendar()" ><i class="bx bx-list-ul"></i> GUARDAR INFORMACIÒN </button>
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