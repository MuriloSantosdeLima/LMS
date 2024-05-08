<?php
require_once('./src/infra/Database.php');
require_once('./src/model/processoModel.php');

class PessoasRepository {
    public function listar(): array {
        $query = Database::getInstancia()->prepare('select * from pessoa');
        $query->execute();
        $rows = $query->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    } 

    public function buscar(): array {
        $query = Database::getInstancia()->prepare('select * from pessoa');
        $query->execute();
        $rows = $query->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    } 

    public function editar() {

    }

    public function deletar() {

    }
}
?>