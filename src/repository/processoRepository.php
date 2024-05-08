<?php
require_once('./src/infra/Database.php');

class ProcessoRepository {

    public function listar(): Array {
        $query = Database::getInstancia()->prepare("SELECT processos.*, pessoa.nome_pessoa, unidades.nome_unidade FROM processos
        inner join pessoa 
            on processos.pessoa_id = pessoa.id
        inner join unidades 
            on processos.unidade_id = unidades.id");
      
        $query->execute();
        $rows = $query->fetchAll(PDO::FETCH_ASSOC);
        return $rows;    
    }

    public function buscar($id) {
        $query = Database::getInstancia()->prepare("SELECT * FROM processos WHERE id = :id ");
        $query->bindParam(":id",$id);
        $query->execute();
        if ($query->rowCount()) {
            return $query->fetch(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
    }

    public function cadastrar(ProcessoModel $processoModel): mixed {
        $sql = "INSERT INTO processos
                    (nome,pessoa_id,unidade_id,status_process,created_at)
                VALUES
                    (:nome,:pessoa_id,:unidade_id,:status_process,NOW())";

        $query = Database::getInstancia()->prepare($sql);
        $query->bindValue(":nome",$processoModel->getNomeProcesso(), PDO::PARAM_STR);
        $query->bindValue(":pessoa_id",$processoModel->getPessoaId(),PDO::PARAM_INT);
        $query->bindValue(":unidade_id",$processoModel->getUnidadeId(),PDO::PARAM_INT);
        $query->bindValue(":status_process",$processoModel->getStatusProcess(),PDO::PARAM_STR);
        
        if ($query->execute()) {
            return Database::getInstancia()->lastInsertId();
        } else {
            throw new Exception("Erro ao cadastrar processo");
        }
        
    }

    public function editarStatus($id,$newStatus) {
        $query = Database::getInstancia()->prepare("UPDATE processos SET status_process = :status, updated_at = NOW() WHERE id = :id");
        $query->bindParam(":id",$id);
        $query->bindParam(":status",$newStatus);
     
        if ($query->execute()) {
            return true;
        } else {
            throw new Exception("Erro ao Atualizar registro");
        }
    }

    public function deletar($id) {
        $query = Database::getInstancia()->prepare("DELETE FROM processos WHERE id = :id");
        $query->bindParam(':id', $id, PDO::PARAM_INT);

        if ($query->execute()) {
            return true;
        } else {
            throw new Exception("Erro ao excluir");
        }
    }
}
?>