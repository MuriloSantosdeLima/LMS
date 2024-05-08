<?php
require_once('./src/repository/processoRepository.php');
class IntegracaoService {

    private $processoRepository;

    function __construct() {    
        $this->processoRepository = new ProcessoRepository();
    }

    public function integrarProcessoLMSVolk($id) {
        $data = $this->processoRepository->buscar($id);
        $url = 'http://localhost:3000/integrate-lms'; 
        $options = array(
            'http' => array(
                'method'  => 'POST',
                'header'  => 'Content-type: application/json',
                'content' => json_encode($data)
            )
        );

        $context  = stream_context_create($options);
        $resultado = file_get_contents($url, false, $context);
        if ($resultado === false) {
            return false;
        }
        return true;
    }
}
