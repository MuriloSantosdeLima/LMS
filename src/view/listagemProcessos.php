<?php
require_once('./src/service/processoService.php');
$processoService = new ProcessoService();
$listaProcessos = $processoService->listarProcessos();
?>
<script>
    $(document).ready(function() {
        const tabela = $('#table_process').DataTable();
        const actionbuttons = (function() {
            function filtrar() {
                tabela.search($('#search_process').val()).draw();
            }
            return {
                filtrar: filtrar
            }
        })();
        
        $("#bnt_filtrar").click(actionbuttons.filtrar);
        $(".exclude-icon").on('click',function () {
            $.post('/LMS/administracao/processo/deletar', {idProcesso: $(this).data('id')} , function(data) {
                console.log(data);
            }).fail(function() {
                alert('Erro ao enviar requisição.');
            })
        });
    });

</script>
<div class="container">
    <div class="row">
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Filtro</span>
            <input id="search_process" type="text" class="form-control" aria-describedby="basic-addon1">
            <button class="btn btn-success" id="bnt_filtrar">filtrar</button>
            
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <a href="/LMS/administracao/cadastro" class="btn btn-success" style="float: right;">Novo Processo</a>
        </div>
    </div>
    <table id="table_process">
        <thead>
            <tr>
                <th scope="col">Cégido</th>
                <th scope="col">Nome</th>
                <th scope="col">Pessoa</th>
                <th scope="col">Unidade</th>
                <th scope="col">Status</th>
                <th scope="col">Data Criação</th>
                <th scope="col">Data Modificação</th>
                <th scope="col">Opções</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($listaProcessos as $key => $value) { ?>
                <tr>
                    <td><?= $value['id'] ?></td>
                    <td><?= $value['nome'] ?></td>
                    <td><?= $value['nome_pessoa'] ?></td>
                    <td><?= $value['nome_unidade'] ?></td>
                    <td><?= $value['status_process'] ?></td>
                    <td><?= $value['created_at'] ?></td>
                    <td><?= $value['updated_at'] ?></td>
                    <td>
                        <a class="exclude-icon" href="/LMS/administracao/processo/deletar?id=<?=$value['id']?>"></a>
                        <a class="search-icon" href="/LMS/administracao/cadastro?editar=<?=$value['id']?>"></a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>