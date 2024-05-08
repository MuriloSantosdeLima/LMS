<?php 
require_once('./src/infra/Util.php');
require_once('./src/service/processoService.php');
require_once('./src/model/processoModel.php');
require_once('./src/service/integracaoService.php');
class PageController {
    
    public function filaProcessos() {
        Util::TemplateRender('./src/view/listagemProcessos.php');
    }  
    
    public function formProcesso() {
        Util::TemplateRender('./src/view/formProceso.php');
    } 

    public function cadastrarProcesso() {
        if (
            Util::verifyEmptyIsset($_POST['nome_processo']) &&
            Util::verifyEmptyIsset($_POST['nome_pessoa']) &&
            Util::verifyEmptyIsset($_POST['nome_unidade']) && 
            Util::verifyEmptyIsset($_POST['status_processo'])
        ) {
            $processoModel = new ProcessoModel();
            $processoModel->setNomeProcesso($_POST['nome_processo']);
            $processoModel->setPessoaId($_POST['nome_pessoa']);
            $processoModel->setUnidadeId($_POST['nome_unidade']);
            $processoModel->setStatusProcess($_POST['status_processo']);
            $processoService = new ProcessoService();
            $newID = $processoService->cadastrarProcesso($processoModel);
            $data = array(
                'editar' => $newID,
            );
            Util::redirectPageTo("/LMS/administracao/cadastro",$data); 
        } else {
            $data = array(
                'error' => 'todos os campos devem ser preenchidos',
            );
            Util::redirectPageTo("/LMS/administracao/cadastro",$data); 
        }
    }

    public function editarProcesso() {
        if (
            Util::verifyEmptyIsset($_POST['id_processo']) &&
            Util::verifyEmptyIsset($_POST['status_processo'])
        ) { 
            $processoService = new ProcessoService();
            $statusServico = $processoService->editarStatusProcesso($_POST['id_processo'], $_POST['status_processo']);
            if ($statusServico) {
                $data = array(
                    'editar' => $_POST['id_processo'],
                );
                Util::redirectPageTo("/LMS/administracao/cadastro",$data); 
            }
        }
    }

    public function listarprocessos() {
        $processoService = new ProcessoService();
        $processoService->listarProcessos();
    }

    public function deletarProcesso() {
        $queryParams = Util::getUrlQuery();
        if (isset($queryParams['id'])) {
            $processoService = new ProcessoService();
            $processoService->excluirProcesso($queryParams['id']);
            Util::TemplateRender('./view/listagemProcessos.php');
        }else {
            echo "Erro ao deletar";
        }
    }

    public function integrarVolkLMS() {
        $integracaoService = new IntegracaoService();
        $result = $integracaoService->integrarProcessoLMSVolk($_POST['idProcesso']);
        echo $result;
    }

}
?>