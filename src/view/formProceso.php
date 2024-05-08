<?php
require_once('./src/infra/Util.php');
require_once('./src/service/unidadeService.php');
require_once('./src/service/pessoaService.php');
require_once('./src/service/processoService.php');
$processoService = new ProcessoService();
$unidadeService = new UnidadeService();
$pessoaService = new PessoaService();
$queryParams = Util::getUrlQuery();

$pessoa = $pessoaService->ListarPessoas();
$unidades = $unidadeService->ListarUnidades();
$editStatusView = false;

$statusList = ['PROCESSANDO', 'PROCESSADO', 'CANCELADO'];
$activeUrlAction = "/LMS/administracao/cadastro";

if(isset($queryParams['editar'])) {
    $editStatusView = true;
    $processo = $processoService->buscarProcesso($queryParams['editar']);
    $activeUrlAction = "/LMS/administracao/processo/editar";
}

$listaSelectPessoa = "";
foreach ($pessoa as $key => $value) {
    if ($editStatusView && $processo['pessoa_id'] == $pessoa[$key]['id']) {
        $listaSelectPessoa .= "<option value='".$pessoa[$key]['id']."' selected>".$pessoa[$key]['nome_pessoa']."</option>";
    } else {
        $listaSelectPessoa .= "<option value='".$pessoa[$key]['id']."'>".$pessoa[$key]['nome_pessoa']."</option>";
    }
}

$listaSelectUnidades = "";
foreach ($unidades as $key => $value) {
    if ($editStatusView && $processo['unidade_id'] == $unidades[$key]['id']) {
        $listaSelectUnidades .= "<option value='".$unidades[$key]['id']."' selected>".$unidades[$key]['nome_unidade']."</option>";
    } else {
        $listaSelectUnidades .= "<option value='".$unidades[$key]['id']."'>".$unidades[$key]['nome_unidade']."</option>";
    }
}

?>
<div class="container">
    <?php if(isset($queryParams['error'])) {?>
        <div class="alert alert-danger" role="alert">
            <?=$queryParams['error']?>
        </div>
    <?php } ?>

    <div class="row">
        <div class="col-sm-12">
            <?php if(isset($queryParams['editar'])) {?>
                <button class="btn btn-success" style="float: right;" onclick="integrar(<?=$queryParams['editar']?>)">Integrar ao VolksLMS</button>
                <script>
                        function integrar (id) {
                            $.post('/LMS/administracao/integrar-volk', {idProcesso: id} , function(data) {
                               if (new Boolean(data)) {
                                    alert('Processo enviado para integração!');
                               } else {
                                    alert('Erro ao enviar processo para integração');
                               }
                                 
                            }).fail(function() {
                                alert('Erro ao enviar requisição.');
                            })
                        }
                </script>
            <?php } ?>
        </div>
    </div>
    <form method="POST" action="<?=$activeUrlAction?>">
        <?=$editStatusView ? '<input type="hidden" name="id_processo" value="'.$queryParams['editar'].'">': '' ?>
        <div class="form-group row" style="margin-bottom: 5px;">
            <label for="inputEmail3" class="col-sm-1 col-form-label">Nome</label>
            <div class="col-sm-4">
                <input value="<?=isset($processo) ? $processo['nome']: ''?>"type="text" class="form-control" id="inputEmail3" name="nome_processo" <?=$editStatusView ? 'disabled': ''?>>
            </div>
        </div>
        <div class="form-group row" style="margin-bottom: 5px;">
            <label for="inputPassword3" class="col-sm-1 col-form-label">Pessoa</label>
            <div class="col-sm-4">
                <select class="form-select" aria-label="Default select example" name="nome_pessoa" <?=$editStatusView ? 'disabled': ''?>>
                    <option value='' selected></option>
                    <?=$listaSelectPessoa?>
                </select>
            </div>
        </div>
        <div class="form-group row" style="margin-bottom: 5px;">
            <label for="inputPassword3" class="col-sm-1 col-form-label">Unidade</label>
            <div class="col-sm-4">
                <select class="form-select" aria-label="Default select example" name="nome_unidade" <?=$editStatusView ? 'disabled': ''?>>
                    <option value='' selected></option>
                    <?=$listaSelectUnidades?>
                </select>
            </div>
        </div>
        <div class="form-group row" style="margin-bottom: 5px;">
            <label for="inputPassword3" class="col-sm-1 col-form-label">Status</label>
            <div class="col-sm-4">
                <select class="form-select" aria-label="Default select example" name="status_processo" >     
                    <option value="" selected></option>               
                    <?php foreach($statusList as $value) {?>
                        <option value="<?=$value?>" <?=$editStatusView && $processo['status_process'] === $value ? 'selected': ''?>>
                            <?=$value?>
                        </option>
                    <?php }?>
                </select> 
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-10">
                <?php if ($editStatusView) {
                    echo '<button type="submit" class="btn btn-success">Salvar</button>';
                    echo '<a href="/LMS/administracao/cadastro" class="btn btn-success">Novo</a>';
                } else {
                    echo '<button type="submit" class="btn btn-success">Criar</button>';
                }
                echo '<a href="/LMS/administracao/filadeprocessos" class="btn btn-success" >Fila de Processos</a>';

                ?>
            </div>
        </div>
    </form>

</div>