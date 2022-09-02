<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/backend/app.php';
$app_instance = new IdeiasComRelevo();

$login = IdeiasComRelevo::verify_login();
if (!$login)
    header("Location: /admin/login");

if (isset($_GET['id'])) {
    $projeto = $app_instance->ProjectsManagement->get_project($_GET['id']);
    $projeto->reload_appartments();
}
    

?>
<!DOCTYPE html>
<html lang="pt">

<!-- 
    This contains the head part of the file.
    To set the page name change the $PAGE_NAME variable
-->
<?php
$PAGE_NAME = (isset($_GET['id']) ? "Editar" : "Criar") . " Projeto";
$PAGE_ID = "criar_projeto";
include_once '../includes/admin/head.php';
?>
<style>
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    input[type=number] {
        -moz-appearance: textfield;
    }

    .carousel{
        display: block;
        width: 100%;
        height: 200px;
        overflow-x: scroll;
        padding: 10px;
        margin: 0;
        white-space: nowrap; 
        border-top: 2px solid rgba(0, 0, 0, 0.1);
        border-bottom: 2px solid rgba(0, 0, 0, 0.1);
    }

    .carousel-item {
        display: inline-block;
        height: 100%;
        max-width: 300px;
        margin: 0 10px;
        float: none;
        background-size: cover;
        position: relative;
    }

    .carousel-item img {
        height: 100%;
    }

    .carousel-item:nth-child(1) img {
        border-style: solid;
        border-color:white;

    }


</style>

<body class="hold-transition sidebar-mini dark-mode">
    <div class="wrapper">

        <!-- Navbar -->
        <?php include_once '../includes/admin/navbar.php'; ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php include_once '../includes/admin/sidebar.php'; ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="pb-2"><?= isset($_GET['id']) ? "Editar" : "Criar" ?> Projeto</h1>
                            <p class="mb-0">Aqui podem preencher o seguinte formulario para criar um projeto.</p>
                            <p class="mb-1">No campo <a href="#inputDescricao">descrição</a> tem a capacidade de
                                interpretar markdown. Seguindo estas <a href="https://www.markdownguide.org/basic-syntax/">regras</a>.</p>
                            <p class="mb-0">Para pré-visualizar pode usar o botão <b>Visualizar</b>.</p>
                            <p class="mb-0">Assim que estiver feliz com o resultado poderá <b>Finalizar</b> para enviar
                                para o site.</p>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Criar Projeto</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <!-- /.col-md-12 -->
                        <div class="col-lg-12">
                            <form class="needs-validation" id="form-project">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="m-0">Formulário projeto</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="w-100 d-flex flex-wrap">
                                            <div class=" overflow-hidden w-100 d-block">
                                                <?php if (isset($projeto)): ?>
                                                    <div class="carousel d-block">
                                                        <?php foreach($projeto->get_photos() as $photo): ?>
                                                            <div class="carousel-item">
                                                                <a class="badge badge-danger position-absolute m-1 p-1 delBtn" 
                                                                    id="<?= $photo ?>">
                                                                    <i class="fa-solid fa-2x fa-trash-can"></i>
                                                                </a>
                                                                <img src="/uploads/<?= $photo ?>">
                                                            </div>
                                                        <?php endforeach; ?>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                            <div class="form-group col-lg-12">

                                                <label for="inputImages">Imagens (*)</label>
                                                <input type="file" name="imagens[]" class="form-control" id="inputImages" accept="image/png, image/jpeg" multiple required>
                                            </div>
                                            <div class="form-group col-lg-12">
                                                <label for="inputTitle">Titulo (*)</label>
                                                <input id="inputTitle" name="titulo" class="form-control" type="text" placeholder="Insira o titulo"required <?= isset($_GET['id']) ? 'value="' . $projeto->get_title() . '"' : '' ?>>

                                                <div class="valid-feedback">Valido.</div>
                                                <div class="invalid-feedback">Por favor, preencher este campo.</div>
                                            </div>
                                            <div class="form-group col-lg-4">
                                                <label for="inputZona">Zona (*)</label>
                                                <input id="inputZona" name="zona" class="form-control" type="text" placeholder="Insira a zona" required <?= isset($_GET['id']) ? 'value="' . $projeto->get_zone() . '"' : '' ?>>

                                                <div class="valid-feedback">Valido.</div>
                                                <div class="invalid-feedback">Por favor, preencher este campo.</div>
                                            </div>
                                            <div class="form-group col-lg-4">
                                                <label for="inputConcelho">Concelho (*)</label>
                                                <input id="inputConcelho" name="concelho" class="form-control" type="text" placeholder="Insira o concelho" required <?= isset($_GET['id']) ? 'value="' . $projeto->get_county() . '"' : '' ?>>

                                                <div class="valid-feedback">Valido.</div>
                                                <div class="invalid-feedback">Por favor, preencher este campo.</div>
                                            </div>
                                            <div class="form-group col-lg-4">
                                                <label for="inputFreguesia">Freguesia (*)</label>
                                                <input id="inputFreguesia" name="freguesia" class="form-control" type="text" placeholder="Insira a freguesia" required <?= isset($_GET['id']) ? 'value="' . $projeto->get_city() . '"' : '' ?>>

                                                <div class="valid-feedback">Valido.</div>
                                                <div class="invalid-feedback">Por favor, preencher este campo.</div>
                                            </div>
                                            <div class="form-group col-lg-6">
                                                <label for="inputTipoEdificio">Tipo de Edificio (*)</label>
                                                <select id="inputTipoEdificio" name="tipoEdificio" class="form-control" placeholder="Tipo de Edificio" required>
                                                    <option <?= isset($_GET['id']) ? '' : 'selected' ?> value style="display:none">Escolha o tipo de Edificio</option>
                                                    <option <?= isset($_GET['id']) ? ($projeto->get_building_type() == 1 ? 'selected' : '') : '' ?> value="1">Prédio</option>
                                                    <option <?= isset($_GET['id']) ? ($projeto->get_building_type() == 2 ? 'selected' : '') : '' ?> value="2">Moradia Isolada</option>
                                                    <option <?= isset($_GET['id']) ? ($projeto->get_building_type() == 3 ? 'selected' : '') : '' ?> value="3">Moradia Germinada</option>
                                                    <option <?= isset($_GET['id']) ? ($projeto->get_building_type() == 4 ? 'selected' : '') : '' ?> value="4">Loja</option>
                                                </select>

                                                <div class="valid-feedback">Valido.</div>
                                                <div class="invalid-feedback">Por favor, preencher este campo.</div>
                                            </div>
                                            <div class="form-group col-lg-6">
                                                <label for="inputNPisos">Nº de Pisos (*)</label>
                                                <input id="inputNPisos" name="nPisos" class="form-control" type="number" min="0" placeholder="Insira o Nº de Pisos" required <?= isset($_GET['id']) ? 'value="' . $projeto->get_floor_count() . '"' : '' ?>>

                                                <div class="valid-feedback">Valido.</div>
                                                <div class="invalid-feedback">Por favor, preencher este campo.</div>
                                            </div>
                                            <div class="form-group col-lg-12">
                                                <label for="inputDescricao">Descrição (*)</label>
                                                <textarea id="inputDescricao" name="descricao" class="form-control" type="text" placeholder="Descreva o projeto" style="min-height:12rem" required><?= isset($_GET['id']) ? $projeto->get_description() : '' ?></textarea>

                                                <div class="valid-feedback">Valido.</div>
                                                <div class="invalid-feedback">Por favor, preencher este campo.</div>
                                            </div>
                                            <div class="form-group col-lg-5">
                                                <label for="inputEstado">Estado (*)</label>
                                                <select id="inputEstado" name="estado" class="form-control" type="text" placeholder="Selecione o estado" required>
                                                    <option <?= isset($_GET['id']) ? '' : 'selected' ?> value style="display:none">Selecione o estado</option>
                                                    <option <?= isset($_GET['id']) ? ($projeto->get_state() == 0 ? 'selected' : '') : '' ?> value="0">-</option>
                                                    <option <?= isset($_GET['id']) ? ($projeto->get_state() == 1 ? 'selected' : '') : '' ?> value="1">Vende-se</option>
                                                    <option <?= isset($_GET['id']) ? ($projeto->get_state() == 2 ? 'selected' : '') : '' ?> value="2">Aluga-se</option>
                                                    <option <?= isset($_GET['id']) ? ($projeto->get_state() == 3 ? 'selected' : '') : '' ?> value="3">Vendido</option>
                                                </select>

                                                <div class="valid-feedback">Valido.</div>
                                                <div class="invalid-feedback">Por favor, preencher este campo.</div>
                                            </div>
                                            <div class="form-group col-lg-5">
                                                <label for="inputValor">Valor (€)</label>
                                                <input id="inputValor" class="form-control" name="valor" type="number" min="0" step="0.01" placeholder="Insira o Valor (€)" required <?= isset($_GET['id']) ? ($projeto->get_building_type() == 1 ? '' : 'value="' . $projeto->get_value() . '"') : '' ?>>
                                                
                                                <div class="valid-feedback">Valido.</div>
                                                <div class="invalid-feedback">Por favor, preencher este campo.</div>
                                            </div>
                                            <div class=" col-lg-2 d-flex flex-row justify-content-center">
                                                <div class="form-check d-flex align-self-center justify-content-center" title="Inclui Elevador">
                                                    <label for="inputElevador" class="mr-2"><i class="fa-solid fa-2x fa-elevator"></i></label>
                                                    <input <?= isset($_GET['id']) ? ($projeto->get_has_elevator() ? 'checked' : '') : '' ?> id="inputElevador" type="checkbox" name="elevador" placeholder="Inclui Elevador">
                                                </div>
                                            </div>
                                            <div class="hidden" id="hiddenInputs">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer w-100 d-flex justify-content-end">
                                        <?php if (!isset($_GET['id'])): ?>
                                            <button type="submit" class="btn btn-primary" id="finalizar-btn">Criar</button>
                                            <button type="button" class="btn btn-primary" hidden="true" id="alterar-btn">Alterar</button>
                                        <?php else: ?>
                                            <button type="button" class="btn btn-primary" hidden="true" id="finalizar-btn">Criar</button>
                                            <button type="submit" class="btn btn-primary" id="alterar-btn">Alterar</button>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.col-md-6 -->

                        <!-- /.col-md-12 -->
                        <div class="col-lg-6" id="tipologia-form">
                            <form>
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="m-0">Formulário Tipologia</h5>
                                    </div>
                                    <div class="card-body row">
                                        <div class="form-group col-lg-3">
                                            <label for="inputTipArea">Area (m<sup>2</sup>) (*)</label>
                                            <input id="inputTipArea" class="form-control" type="number" placeholder="Insira a Area">
                                        </div>
                                        <div class="form-group col-lg-3">
                                            <label for="inputTipCategEnergia">Categoria Energética (*)</label>
                                            <input id="inputTipCategEnergia" class="form-control" type="text" placeholder="Insira a Categoria">
                                        </div>
                                        <div class="form-group col-lg-3">
                                            <label for="inputTipTipologia">Tipologia (*)</label>
                                            <input id="inputTipTipologia" class="form-control" type="text" placeholder="Insira a Tipologia">
                                        </div>
                                        <div class="form-group col-lg-3">
                                            <label for="inputTipEstado">Estado</label>
                                            <select id="inputTipEstado" class="form-control" placeholder="Selecione o estado">
                                                <option value selected style="display:none">Selecione o estado</option>
                                                <option value="1">Vende-se</option>
                                                <option value="2">Aluga-se</option>
                                                <option value="3">Vende-se e Aluga-se</option>
                                                <option value="4">Vendido</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-lg-4">
                                            <label for="inputTipWCQuantidade">WCs (*)</label>
                                            <input id="inputTipWCQuantidade" class="form-control" type="number" placeholder="Insira quantas WCs">
                                        </div>
                                        <div class="form-group col-lg-4">
                                            <label for="inputTipPiso">Piso (*)</label>
                                            <input id="inputTipPiso" class="form-control" type="number" placeholder="Insira o Piso">
                                        </div>
                                        <div class="col-md-2 d-flex flex-row justify-content-start">
                                            <div class="form-check d-flex align-self-center justify-content-center" title="Inclui Garagem">
                                                <label for="inputTipGaragem" class="mr-2"><i class="fa-solid fa-2x fa-warehouse"></i></label>
                                                <input id="inputTipGaragem" type="checkbox" placeholder="Inclui Garagem">
                                            </div>
                                        </div>
                                        <div class="col-md-2 d-flex flex-row justify-content-start">
                                            <div class="form-check d-flex align-self-center justify-content-center" title="Inclui Estacionamento">
                                                <label for="inputTipEstacionamento" class="mr-2"><i class="fa-solid fa-2x fa-square-parking"></i></label>
                                                <input id="inputTipEstacionamento" type="checkbox" placeholder="Inclui Estacionamento">
                                            </div>
                                        </div>
                                        <div class="form-group col-lg-12">
                                            <label for="inputTipDescricao">Descrição</label>
                                            <textarea id="inputTipDescricao" class="form-control" type="text" placeholder="Descreva o projeto" style="min-height:12rem"></textarea>
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label for="inputTipValorVenda">Valor Venda (€)</label>
                                            <input id="inputTipValorVenda" class="form-control" type="number" min="0" step="0.01" placeholder="Insira o Valor (€)">
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label for="inputTipValorAluguer">Valor Aluguer (€/mês)</label>
                                            <input id="inputTipValorAluguer" class="form-control" type="number" min="0" step="0.01" placeholder="Insira o Valor (€/mês)">
                                        </div>
                                    </div>
                                    <div class="card-footer w-100 d-flex justify-content-end">
                                        <a class="btn btn-primary" id="adicionar-btn">Adicionar</a>
                                    </div>
                                </div>
                            </form>
                        </div>


                        <!-- /.col-md-6 -->
                        <!-- /.col-md-12 -->
                        <div class="col-lg-6" id="tipologia-table">
                            <form>
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="m-0">Tipologias</h5>
                                    </div>
                                    <div class="card-body overflow-auto">
                                        <table class="table table-responsive-lg table-bordered table-hover shadow" style="width: max-content">
                                            <thead>
                                                <tr>
                                                    <th>Area (m<sup>2</sup>)</th>
                                                    <th>Categoria Energetica</th>
                                                    <th>Tipologia</th>
                                                    <th>Estado</th>
                                                    <th>WCs</th>
                                                    <th>Piso</th>
                                                    <th><i class="fa-solid fa-warehouse"></i></th>
                                                    <th><i class="fa-solid fa-parking"></i></th>
                                                    <th>Descrição</th>
                                                    <th>Valor Venda (€)</th>
                                                    <th>Valor Aluguer (€/mês)</th>
                                                    <th>Ações</th>
                                                </tr>
                                            </thead>
                                            <tbody id="typology-table-body"></tbody>
                                        </table>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.col-md-6 -->
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Main Footer -->
        <?php include_once '../includes/admin/footer.php'; ?>

    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    <?php include_once '../includes/admin/scripts.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <script>
        let LIMIT_TYPO = true;

        class Tipologia {
            #area = 0;
            #categoriaEnergetica = "";
            #tipologia = "";
            #estado = 0;
            #wcs = 0;
            #piso = 0;
            #hasGaragem = false;
            #hasParking = false;
            #descricao = "";
            #venda = 0;
            #aluguer = 0;

            constructor(area, categoriaEnergetica, tipologia, estado, wcs, piso, hasGaragem, hasParking, descricao, venda, aluguer) {
                this.#area = area;
                this.#categoriaEnergetica = categoriaEnergetica;
                this.#tipologia = tipologia;
                this.#estado = estado;
                this.#wcs = wcs;
                this.#piso = piso;
                this.#hasGaragem = hasGaragem;
                this.#hasParking = hasParking;
                this.#descricao = descricao;
                this.#venda = venda;
                this.#aluguer = aluguer;
            }

            area() {
                return document.createTextNode(this.#area);
            }

            categoriaEnergetica() {
                return document.createTextNode(this.#categoriaEnergetica);
            }

            tipologia() {
                return document.createTextNode(this.#tipologia);
            }

            estado() {
                var return_value = document.createElement("span");
                return_value.classList.add("badge");

                switch (this.#estado) {
                    case 1:
                        return_value.appendChild(document.createTextNode("Vende-se"));
                        return_value.classList.add("badge-success");
                        break;

                    case 2:
                        return_value.appendChild(document.createTextNode("Aluga-se"));
                        return_value.classList.add("badge-warning");
                        break;

                    case 3:
                        return_value.appendChild(document.createTextNode("Vende-se e Aluga-se"));
                        return_value.classList.add("badge-info");
                        break;

                    case 4:
                        return_value.appendChild(document.createTextNode("Vendido"));
                        return_value.classList.add("badge-danger");
                        break;

                    default:
                        return_value.appendChild(document.createTextNode("Value not right"));
                }

                return return_value;
            }

            wcs() {
                return document.createTextNode(this.#wcs);
            }

            piso() {
                return document.createTextNode(this.#piso);
            }

            hasGaragem() {
                var return_value = document.createElement("i");
                return_value.classList.add("fa-solid");

                if (this.#hasGaragem)
                    return_value.classList.add("text-success", "fa-check");
                else
                    return_value.classList.add("text-danger", "fa-close");

                return return_value;
            }

            hasParking() {
                var return_value = document.createElement("i");
                return_value.classList.add("fa-solid");

                console.log(this.#hasParking);

                this.#hasParking ?
                    return_value.classList.add("text-success", "fa-check") :
                    return_value.classList.add("text-danger", "fa-close")

                return return_value;
            }

            descricao() {
                return document.createTextNode(this.#descricao);
            }

            venda() {
                return document.createTextNode(this.#venda);
            }

            aluguer() {
                return document.createTextNode(this.#aluguer);
            }

            toObj() {
                return {
                    area: this.#area,
                    categoriaEnergetica: this.#categoriaEnergetica,
                    tipologia: this.#tipologia,
                    estado: this.#estado,
                    wcs: this.#wcs,
                    piso: this.#piso,
                    hasGaragem: this.#hasGaragem,
                    hasParking: this.#hasParking,
                    descricao: this.#descricao,
                    venda: this.#venda,
                    aluguer: this.#aluguer
                };
            }

            serialise() {
                return JSON.stringify(this.toObj());
            }
        }

        let adicionarBtn = document.getElementById("adicionar-btn");
        let tableBody = document.getElementById("typology-table-body");
        let rows = [];
        let indexCount = 0;

        function composeRows(arr) {
            for (const tip of arr) {
                let newRow = tableBody.insertRow();

                console.log(tip.estado());
            
                newRow.insertCell().appendChild(tip.area());
                newRow.insertCell().appendChild(tip.categoriaEnergetica());
                newRow.insertCell().appendChild(tip.tipologia());
                newRow.insertCell().appendChild(tip.estado());
                newRow.insertCell().appendChild(tip.wcs());
                newRow.insertCell().appendChild(tip.piso());
                newRow.insertCell().appendChild(tip.hasGaragem());
                newRow.insertCell().appendChild(tip.hasParking());
                newRow.insertCell().appendChild(tip.descricao());
                newRow.insertCell().appendChild(tip.venda());
                newRow.insertCell().appendChild(tip.aluguer());

                let icon = document.createElement("i");
                icon.classList.add("fa-solid", "fa-trash-can");

                let elim = document.createElement("a");
                elim.classList.add("badge", "bg-danger", "p-1", "px-2", "mr-1", "deleteBtn");
                elim.id = indexCount;
                elim.title = "Eliminar";
                elim.appendChild(icon);
                elim.onclick = function deleteSelf() {
                    this.closest("tr").remove();
                    rows.splice(this.id, 1);
                };

                newRow.insertCell().appendChild(elim);

                rows.push(tip.toObj());
                indexCount++;
            }
        }


        let auxArr = [];

        <?php if(isset($_GET['id'])): ?>

            <?php foreach($projeto->get_appartments() as $appartment): ?>
                
        auxArr.push(
            new Tipologia(
                <?= $appartment->get_area() ?>,
                '<?= $appartment->get_energy_category() ?>',
                '<?= $appartment->get_typology() ?>',
                <?= $appartment->get_state() ?>,
                <?= $appartment->get_wc_count() ?>,
                <?= $appartment->get_floor() ?>,
                <?= $appartment->get_has_garage() ? 'true' : 'false' ?>,
                <?= $appartment->get_has_parking() ? 'true' : 'false' ?>,
                '<?= $appartment->get_description() ?>',
                <?= $appartment->get_sell_price() ?>,
                <?= $appartment->get_rent_price() ?>
            )
        );

            <?php endforeach; ?>

        <?php endif; ?>

        composeRows(auxArr);

        adicionarBtn.addEventListener("click", () => {
            let area = document.getElementById("inputTipArea");
            let categ = document.getElementById("inputTipCategEnergia");
            let tipologia = document.getElementById("inputTipTipologia");
            let estado = document.getElementById("inputTipEstado");
            let wcs = document.getElementById("inputTipWCQuantidade");
            let piso = document.getElementById("inputTipPiso");
            let garagem = document.getElementById("inputTipGaragem");
            let parking = document.getElementById("inputTipEstacionamento");
            let descricao = document.getElementById("inputTipDescricao");
            let venda = document.getElementById("inputTipValorVenda");
            let aluguer = document.getElementById("inputTipValorAluguer");

            composeRows([
                new Tipologia(
                    area.value,
                    categ.value,
                    tipologia.value,
                    estado.value,
                    wcs.value,
                    piso.value,
                    garagem.checked,
                    parking.checked,
                    descricao.value,
                    venda.value,
                    aluguer.value
                )
            ]);
        });

        function getData() {
            const inputImages = document.getElementById("inputImages").files;
            const inputTitle = document.getElementById("inputTitle").value;
            const inputZona = document.getElementById("inputZona").value;
            const inputConcelho = document.getElementById("inputConcelho").value;
            const inputFreguesia = document.getElementById("inputFreguesia").value;
            const inputTipoEdificio = document.getElementById("inputTipoEdificio").value;
            const inputNPisos = document.getElementById("inputNPisos").value;
            const inputDescricao = document.getElementById("inputDescricao").value;
            const inputEstado = document.getElementById("inputEstado").value;
            const inputValor = document.getElementById("inputValor").value;
            const inputElevador = document.getElementById("inputElevador").checked;

            let images = [];
            for (const image of inputImages) {
                images.push(image.valueOf());
            }

            return {
                <?= isset($_GET['id']) ? "id: '".$_GET['id']."'," : "" ?>
                imagens: images,
                titulo: inputTitle,
                zona: inputZona,
                concelho: inputConcelho,
                freguesia: inputFreguesia,
                tipoEdificio: inputTipoEdificio,
                nPisos: inputNPisos,
                descricao: inputDescricao,
                estado: inputEstado,
                valor: inputValor,
                elevador: inputElevador
            }
        }

        let imagesIDs = [];

        function addContentToForm(rowList, iID = []) {
            function createHInput(data, index) {
                let inputs = [];

                for (const key of Object.keys(data)) {
                    let hInput   = document.createElement("input");

                    hInput.type  = "hidden";
                    hInput.name  = "tipologia[" + index + "]" + "[" + key +"]";
                    hInput.value = data[key];

                    inputs.push(hInput);
                }

                return inputs;
            }

            function createHInputID(id) {
                let inputs = [];

                let hInput   = document.createElement("input");

                hInput.type  = "hidden";
                hInput.name  = "delete[]";
                hInput.value = id;

                inputs.push(hInput);

                return inputs;
            }

            let hInputs = [];
            
            for (let index = 0; index < rowList.length; index++) {
                const row = rowList[index];
                
                hInputs = hInputs.concat(
                    createHInput(row, index)
                );
            }

            for (const id of iID) {
                hInputs = hInputs.concat(
                    createHInputID(id)
                );
            }

            const hiddenInputs = document.getElementById("hiddenInputs");

            hInputs.forEach(el => {
                hiddenInputs.appendChild(el);
            });
        }

        let inputImagens = document.getElementById("inputImages");
        let formProject = document.getElementById("form-project")
        formProject.addEventListener("submit", () => {
            console.log('rows.length === 0 || (inputImagens.files.length === 0 && document.getElementsByClassName("carousel-item").length === 0) \n' + rows.length === 0 || (inputImagens.files.length === 0 && document.getElementsByClassName("carousel-item").length === 0))
            if (rows.length === 0 || (inputImagens.files.length === 0 && document.getElementsByClassName("carousel-item").length === 0)) {
                event.preventDefault();
                return false;
            }
            // console.log(rows)

            addContentToForm(LIMIT_TYPO ? [rows[rows.length - 1]] : rows, imagesIDs);

            <?php if (!isset($_GET['id'])): ?>
            formProject.setAttribute("action", "/backend/post_scripts/create_project.php");
            <?php else: ?>
            formProject.setAttribute("action", "/backend/post_scripts/edit_project.php");
            <?php endif; ?>

            formProject.setAttribute("method", "post");
            formProject.setAttribute("enctype", "multipart/form-data");
            
            return true;
        });

        let delBtns = document.getElementsByClassName("delBtn");
        for (const btn of delBtns) {
            btn.addEventListener("click", () => {
                imagesIDs.push(btn.getAttribute("id"));
                btn.closest("div").remove();
            });
        }
    </script>

    <script>
        let tipoEdificio = document.getElementById("inputTipoEdificio");
        let finalizarBtn = document.getElementById("finalizar-btn");
        let tableRows = document.getElementById("typology-table-body");

        let wasValidated = () => {
            let x = document.getElementById("form-project")
            if (x.classList.contains("needs-validation")) {
                x.classList.remove("needs-validation");
                x.classList.add("was-validated");
            }
        }
        
        function management(deleteIt = true) {
            let tipoEdificio        = document.getElementById("inputTipoEdificio");
            let tipologiaForm       = document.getElementById("tipologia-form");
            let tipologiaTable      = document.getElementById("tipologia-table");
            let inptEstado          = document.getElementById("inputEstado");
            let inptValor           = document.getElementById("inputValor");

            let inptTipValorVenda   = document.getElementById("inputTipValorVenda");
            let inptTipValorAluguer = document.getElementById("inputTipValorAluguer");
            let inptTipDescricao    = document.getElementById("inputTipDescricao");
            let inptTipEstado       = document.getElementById("inputTipEstado");
            let inptTipPiso         = document.getElementById("inputTipPiso");

            if (deleteIt) {
                console.log("Aqui");
                tableRows.innerHTML = "";
                rows = [];
            }

            LIMIT_TYPO = tipoEdificio.value != 1;
            if (!LIMIT_TYPO) {
                inptEstado.value = 0;

                inptValor.disabled = true; 

                inptTipValorVenda.disabled   = false;
                inptTipValorAluguer.disabled = false;
                inptTipDescricao.disabled    = false;
                inptTipPiso.disabled         = false;
                inptTipEstado.disabled       = false;

                inptTipValorVenda.closest("div").hidden   = false;
                inptTipValorAluguer.closest("div").hidden = false;
                inptTipDescricao.closest("div").hidden    = false;
                inptTipPiso.closest("div").hidden         = false;
                inptTipEstado.closest("div").hidden       = false;

                tipologiaTable.hidden = false;
                tipologiaForm.classList.remove("col-lg-12");
                tipologiaForm.classList.add("col-lg-6");
            } else {
                inptValor.disabled = false;

                inptEstado.value = 1;

                inptTipValorVenda.disabled   = true;
                inptTipValorAluguer.disabled = true;
                inptTipDescricao.disabled    = true;
                inptTipPiso.disabled         = true;
                inptTipEstado.disabled       = true;

                inptTipValorVenda.closest("div").hidden   = true;
                inptTipValorAluguer.closest("div").hidden = true;
                inptTipDescricao.closest("div").hidden    = true;
                inptTipPiso.closest("div").hidden         = true;
                inptTipEstado.closest("div").hidden       = true;

                tipologiaTable.hidden = true;
                tipologiaForm.classList.remove("col-lg-6");
                tipologiaForm.classList.add("col-lg-12");
            }
        }

        finalizarBtn.addEventListener("click", wasValidated);
        tipoEdificio.addEventListener("change", management);
        document.addEventListener("DOMContentLoaded", () => {
            let tipoEdificio = document.getElementById("inputTipoEdificio");

            let area = document.getElementById("inputTipArea");
            let categ = document.getElementById("inputTipCategEnergia");
            let tipologia = document.getElementById("inputTipTipologia");
            let estado = document.getElementById("inputTipEstado");
            let wcs = document.getElementById("inputTipWCQuantidade");
            let piso = document.getElementById("inputTipPiso");
            let garagem = document.getElementById("inputTipGaragem");
            let parking = document.getElementById("inputTipEstacionamento");
            let descricao = document.getElementById("inputTipDescricao");
            let venda = document.getElementById("inputTipValorVenda");
            let aluguer = document.getElementById("inputTipValorAluguer");

            if (rows.length !== 0) {
                inputImagens.removeAttribute("required");

                if (tipoEdificio.value !== "1") {
                    let tip = auxArr[rows.length - 1].toObj();
                    
                    area.value = tip.area;
                    categ.value = tip.categoriaEnergetica;
                    tipologia.value = tip.tipologia;
                    estado.value = tip.estado;
                    wcs.value = tip.wcs;
                    piso.value = tip.piso;
                    garagem.checked = tip.hasGaragem;
                    parking.checked = tip.hasParking;
                    descricao.value = tip.descricao;
                    venda.value = tip.venda;
                    aluguer.value = tip.aluguer;
                }
            }

            management(false);
        });
            
        </script>
</body>

</html>