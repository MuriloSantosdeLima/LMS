<?php
require('./src/repository/pessoaRepository.php');
class PessoaService {
    private $pessoaRepository;

    function __construct() {
        $this->pessoaRepository = new PessoasRepository();
    }

    public function ListarPessoas(): array {
        return $this->pessoaRepository->listar();
    }
}


?>