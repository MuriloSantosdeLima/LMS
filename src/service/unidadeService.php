<?php
require('./src/repository/unidadeRepository.php');
class UnidadeService {
    private $unidadeRepository;

    function __construct() {
        $this->unidadeRepository = new UnidadeRepository();
    }

    public function ListarUnidades(): array {
        return $this->unidadeRepository->listar();
    }
}


?>