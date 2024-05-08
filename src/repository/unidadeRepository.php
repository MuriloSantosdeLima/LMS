<?php
require_once('./src/infra/Database.php');

class UnidadeRepository {
    public function listar(): array {
        $query = Database::getInstancia()->prepare('select * from unidades');
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