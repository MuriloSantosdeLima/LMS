<?php
class ProcessoModel {
    private $id;
    private $nome_processo;
    private $pessoa_id;
    private $unidade_id;
    private $status_process;
    private $created_at;
    private $updated_at;

    public function getId() {
        return $this->id;
    }

    public function getNomeProcesso() {
        return $this->nome_processo;
    }

    public function getPessoaId() {
        return $this->pessoa_id;
    }

    public function getUnidadeId() {
        return $this->unidade_id;
    }

    public function getStatusProcess() {
        return $this->status_process;
    }

    public function getCreatedAt() {
        return $this->created_at;
    }

    public function getUpdatedAt() {
        return $this->updated_at;
    }

    // Setters
    public function setId($id) {
        $this->id = $id;
    }

    public function setNomeProcesso($nome_processo) {
        $this->nome_processo = $nome_processo;
    }

    public function setPessoaId($pessoa_id) {
        $this->pessoa_id = $pessoa_id;
    }

    public function setUnidadeId($unidade_id) {
        $this->unidade_id = $unidade_id;
    }

    public function setStatusProcess($status_process) {
        $this->status_process = $status_process;
    }

    public function setCreatedAt($created_at) {
        $this->created_at = $created_at;
    }

    public function setUpdatedAt($updated_at) {
        $this->updated_at = $updated_at;
    }
}
