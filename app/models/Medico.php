<?php
/**
 * Created by PhpStorm
 * User: CESARJOSE39
 * Date: 19/10/2020
 * Time: 20:01
 */
class Medico{
    private $pdo;
    private $log;
    public function __construct(){
        $this->pdo = Database::getConnection();
        $this->log = new Log();
    }
    public function get_data_medico_id($id_medico){
        try{
            $sql = 'select * from medicos where id_medico=? limit 1';
            $stm = $this->pdo->prepare($sql);
            $stm->execute([$id_medico]);
            return $stm->fetch();
        } catch (Throwable $e){
            $this->log->insertar($e->getMessage(), get_class($this).'|'.__FUNCTION__);
            return [];
        }
    }
    public function get_turno($id_medico){
        try{
            $sql = 'select * from turnos where id_medico=? limit 1';
            $stm = $this->pdo->prepare($sql);
            $stm->execute([$id_medico]);
            return $stm->fetch();
        } catch (Throwable $e){
            $this->log->insertar($e->getMessage(), get_class($this).'|'.__FUNCTION__);
            return [];
        }
    }
    public function list_doctors(){
        try{
            $sql = 'SELECT m.*,CASE WHEN t.id_medico IS NOT NULL THEN "edit_calendar" ELSE "calendar" END AS ruta FROM 
  medicos m LEFT JOIN turnos t ON m.id_medico = t.id_medico';
            $stm = $this->pdo->prepare($sql);
            $stm->execute([]);
            return $stm->fetchAll();
        } catch (Throwable $e){
            $this->log->insertar($e->getMessage(), get_class($this).'|'.__FUNCTION__);
            return [];
        }
    }
}
