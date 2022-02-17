<?php require_once './header.php'; ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header"> </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Listagem de Contas a Receber</h3><br>
                            <form action="./ctRecListar.php" method="get">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>Opções</label>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox">
                                                <input class="custom-control-input" type="checkbox" id="customCheckbox1" name="todas" value="1">
                                                <label for="customCheckbox1" class="custom-control-label">Trazer todos</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input class="custom-control-input" type="checkbox" id="customCheckbox2" name="abertas" value="1">
                                                <label for="customCheckbox2" class="custom-control-label">Somente em Aberto</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input class="custom-control-input" type="checkbox" id="customCheckbox3" name="pagas" value="1">
                                                <label for="customCheckbox3" class="custom-control-label">Somente Pagas</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Buscar por Cliente</label>
                                            <?= $objClientes->montaSelect('cliente_id'); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Período</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="far fa-calendar-alt"></i>
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control float-right data_intervalo" name="data">
                                            </div> <!-- /.input group -->
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group clearfix">
                                            <label>Emissão ou Vencimento</label><br>
                                            <div class="icheck-primary d-inline">
                                                <input type="radio" id="radioPrimary1" name="ordem" value="datac">
                                                <label for="radioPrimary1"> Por Emissão</label>
                                            </div>
                                            <br>
                                            <div class="icheck-primary d-inline">
                                                <input type="radio" id="radioPrimary2" name="ordem" value="data_venc">
                                                <label for="radioPrimary2"> Por Vencimento</label>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <button type="submit" class="btn btn-primary btn-sm">Filtrar</button>
                            </form>
                        </div> <!-- /.card-header -->
                        <?php
                        $where = "";
                        if ($_GET) {
                            if (isset($_GET['todas']) || isset($_GET['abertas']) || isset($_GET['pagas']) || ($_GET['cliente_id']) <> "" || $_GET['data'] <> "") {
                                $todas = isset($_GET['todas']);
                                $abertas = isset($_GET['abertas']);
                                $pagas = isset($_GET['pagas']);
                                $clienteID = $_GET['cliente_id'] <> "" ? $_GET['cliente_id'] : "";
                                $data = isset($_GET['data']) <> "" ? $_GET['data'] : "";
                                $datain = gravaData(substr($data, 0, 10));
                                $datafi = gravaData(substr($data, 13));
                                $ordem = isset($_GET['ordem']) ? $_GET['ordem'] : "";
                                //MONTAR O WHERE                                
                                if ($todas) {
                                    $where .= "";
                                }
                                if ($abertas) {
                                    if ($where <> "") {
                                        $where .= " AND pago=FALSE ";
                                    } else {
                                        $where .= "  pago=FALSE ";
                                    }
                                }
                                if ($pagas) {
                                    if ($where <> "") {
                                        $where .= " and pago=TRUE ";
                                    } else {
                                        $where .= "  pago=TRUE ";
                                    }
                                }
                                if ($clienteID) {
                                    if ($where <> "") {
                                        $where .= " and cliente_id=$clienteID ";
                                    } else {
                                        $where .= "  cliente_id=$clienteID ";
                                    }
                                }
                                if ($ordem) {
                                    if ($where <> "") {
                                        $where .= " AND $ordem BETWEEN '$datain' AND '$datafi' ";
                                    } else {
                                        $where .= " $ordem BETWEEN '$datain' AND '$datafi'  ";
                                    }
                                }
                            }
                            $ctrec = $objContasReceber->select($where);
                        }
                        if (isset($ctrec)) { ?>
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped table-sm">
                                    <thead>
                                        <tr>
                                            <th>NroNF</th>
                                            <th>Série</th>
                                            <th>Data</th>
                                            <th>Valor</th>
                                            <th>Data Venc</th>
                                            <th>Situação</th>
                                            <th>Ação</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($ctrec as $ctr) { ?>
                                            <tr>
                                                <td><?= $ctr->nronf; ?></td>
                                                <td><?= $ctr->serie; ?></td>
                                                <td><?= formataData($ctr->datac); ?></td>
                                                <td><?= formataMoeda($ctr->valor); ?></td>
                                                <td><?= formataData($ctr->data_venc); ?></td>
                                                <td><?= $ctr->pago == '1' ? 'PAGO' : 'EM ABERTO'; ?></td>
                                                <td>
                                                    <?php
                                                    if ($ctr->pago <> '1') { ?>
                                                        <a class="btn bg-gradient-primary btn-xs" href="./ctRecQuitar.php?id=<?= base64_encode($ctr->id) ?>"><i class="fa fa-edit"></i> Quitar </a>
                                                    <?php }else{ ?>
                                                        <a class="btn bg-gradient-primary btn-xs" href="./ctRecExcluirQuitacao.php?id=<?= base64_encode($ctr->id) ?>"><i class="fa fa-edit"></i> Excluir Quitação </a>
                                                    <?php }
                                                    ?>
                                                    <a class="btn bg-gradient-danger btn-xs" href="./ctRecExcluir.php?id=<?= base64_encode($ctr->id) ?>"><i class="fa fa-eraser"></i> Exluir Conta </a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            <?php } ?>
                            </div> <!-- /.card-body -->
                            <div class="card-footer">
                                <a href="./clienteIncluir.php" class="btn btn-primary btn-sm">Cadastrar Cliente</a>
                                <a href="./ctRecIncluir.php" class="btn btn-primary btn-sm">Incluir Conta</a>
                            </div>
                    </div> <!-- /.card -->
                </div> <!-- /.col -->
            </div> <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section><!-- /.content -->
</div> <!-- /.content-wrapper -->
<?php require_once './footer.php'; ?>