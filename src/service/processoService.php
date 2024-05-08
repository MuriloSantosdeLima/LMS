<?php
require_once('./src/repository/processoRepository.php');
class ProcessoService {
    
    private $processoRepository;

    function __construct() {
        $this->processoRepository = new ProcessoRepository();
    }

    public function listarProcessos() {
        try {
            $rows =  $this->processoRepository->listar();
            return $rows;

        } catch(Exception $e) {
            echo $e->getMessage();
        }
    }

    public function buscarProcesso($id) {
        try {
            if(isset($id)) {
                return $this->processoRepository->buscar($id);
            }
        } catch(Exception $e) {
            echo $e->getMessage();
        }
    }

    public function cadastrarProcesso($processoModel): int {
        try {
            if(!empty($processoModel)) {
                $idCadastro = $this->processoRepository->cadastrar($processoModel);
                return $idCadastro;
            }
        } catch(Exception $e) {
            echo $e->getMessage();
        }
    }   

    public function editarStatusProcesso($idProcesso, $newStatus) {
        try {
            if(!empty($idProcesso) && isset($idProcesso)) {
                return $this->processoRepository->editarStatus($idProcesso, $newStatus); 
            }
        }catch(Exception $e) {
            echo $e->getMessage();
        }
    }
    
    public function excluirProcesso($id) {
        try {
            if(!empty($id) && isset($id)) {
                return $this->processoRepository->deletar($id); 
            }
        }catch(Exception $e) {  
            echo $e->getMessage();
        }
    }

}
?>