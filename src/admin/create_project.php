<!DOCTYPE html>
<html lang="pt">

<!-- 
    This contains the head part of the file.
    To set the page name change the $PAGE_NAME variable
-->
<?php 
    $PAGE_NAME = "Criar Projeto";
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
                            <h1 class="pb-2">Criar Projeto</h1>
                            <p class="mb-0">Aqui podem preencher o seguinte formulario para criar um projeto.</p>
                            <p class="mb-1">No campo <a href="#inputDescricao">descrição</a> tem a capacidade de
                                interpretar markdown. Seguindo estas <a
                                    href="https://www.markdownguide.org/basic-syntax/">regras</a>.</p>
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
                                            <div class="form-group col-lg-4">
                                                <label for="inputZona">Zona</label>
                                                <input id="inputZona" class="form-control" type="text"
                                                    placeholder="Insira a zona" required>

                                                <div class="valid-feedback">Valido.</div>
                                                <div class="invalid-feedback">Por favor, preencher este campo.</div>
                                            </div>
                                            <div class="form-group col-lg-4">
                                                <label for="inputConcelho">Concelho</label>
                                                <input id="inputConcelho" class="form-control" type="text"
                                                    placeholder="Insira o concelho" required>

                                                <div class="valid-feedback">Valido.</div>
                                                <div class="invalid-feedback">Por favor, preencher este campo.</div>
                                            </div>
                                            <div class="form-group col-lg-4">
                                                <label for="inputFreguesia">Freguesia</label>
                                                <input id="inputFreguesia" class="form-control" type="text"
                                                    placeholder="Insira a freguesia" required>
                                                
                                                <div class="valid-feedback">Valido.</div>
                                                <div class="invalid-feedback">Por favor, preencher este campo.</div>
                                            </div>
                                            <div class="form-group col-lg-3">
                                                <label for="inputTipoEdificio">Tipo de Edificio</label>
                                                <select id="inputTipoEdificio" class="form-control" type=""
                                                    placeholder="Tipo de Edificio" required>
                                                    <option selected value style="display:none">Escolha o tipo de Edificio</option>
                                                    <option value="1">Prédio</option>
                                                    <option value="2">Moradia Isolada</option>
                                                    <option value="3">Moradia Germinada</option>
                                                    <option value="4">Loja</option>
                                                </select>

                                                <div class="valid-feedback">Valido.</div>
                                                <div class="invalid-feedback">Por favor, preencher este campo.</div>
                                            </div>
                                            <div class="form-group col-lg-3">
                                                <label for="inputNApartamentos">Nº de Apartamentos</label>
                                                <input id="inputNApartamentos" class="form-control" type="number"
                                                    min="0" placeholder="Insira o Nº de Apartamentos" required>

                                                <div class="valid-feedback">Valido.</div>
                                                <div class="invalid-feedback">Por favor, preencher este campo.</div>
                                            </div>
                                            <div class="form-group col-lg-3">
                                                <label for="inputNApartamentosDisponiveis">Nº de Apartamentos
                                                    Disponiveis</label>
                                                <input id="inputNApartamentosDisponiveis" class="form-control"
                                                    type="number" min="0"
                                                    placeholder="Insira o Nº de Apartamentos Disponiveis" required>
                                                
                                                <div class="valid-feedback">Valido.</div>
                                                <div class="invalid-feedback">Por favor, preencher este campo.</div>
                                            </div>
                                            <div class="form-group col-lg-3">
                                                <label for="inputNPisos">Nº de Pisos</label>
                                                <input id="inputNPisos" class="form-control" type="number" min="0"
                                                    placeholder="Insira o Nº de Pisos" required>
                                                
                                                <div class="valid-feedback">Valido.</div>
                                                <div class="invalid-feedback">Por favor, preencher este campo.</div>
                                            </div>
                                            <div class="form-group col-lg-12">
                                                <label for="inputDescricao">Descrição</label>
                                                <textarea id="inputDescricao" class="form-control" type="text"
                                                    placeholder="Descreva o projeto"
                                                    style="min-height:12rem" required></textarea>

                                                <div class="valid-feedback">Valido.</div>
                                                <div class="invalid-feedback">Por favor, preencher este campo.</div>
                                            </div>
                                            <div class="form-group col-lg-5">
                                                <label for="inputEstado">Estado</label>
                                                <select id="inputEstado" class="form-control" type="text"
                                                    placeholder="Selecione o estado" required>
                                                    <option selected value style="display:none">Selecione o estado</option>
                                                    <option value="0">-</option>
                                                    <option value="1">Vende-se</option>
                                                    <option value="2">Aluga-se</option>
                                                    <option value="3">Vendido</option>
                                                </select>

                                                <div class="valid-feedback">Valido.</div>
                                                <div class="invalid-feedback">Por favor, preencher este campo.</div>
                                            </div>
                                            <div class="form-group col-lg-5">
                                                <label for="inputValor">Valor (€)</label>
                                                <input id="inputValor" class="form-control" type="number" min="0"
                                                    step="0.01" placeholder="Insira o Valor (€)" required>

                                                <div class="valid-feedback">Valido.</div>
                                                <div class="invalid-feedback">Por favor, preencher este campo.</div>
                                            </div>
                                            <div class=" col-lg-2 d-flex flex-row justify-content-center">
                                                <div class="form-check d-flex align-self-center justify-content-center"
                                                    title="Inclui Elevador">
                                                    <label for="inputElevador" class="mr-2"><i
                                                            class="fa-solid fa-2x fa-elevator"></i></label>
                                                    <input id="inputElevador" type="checkbox"
                                                        placeholder="Inclui Elevador">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer w-100 d-flex justify-content-end">
                                        <button href="#" class="btn btn-default mx-2" id="visualizar-btn">Visualizar</button>
                                        <button type="submit" href="#" class="btn btn-primary" id="finalizar-btn">Finalizar</button>
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
                                            <label for="inputTipArea">Area (m<sup>2</sup>)</label>
                                            <input id="inputTipArea" class="form-control" type="number"
                                                placeholder="Insira a Area">
                                        </div>
                                        <div class="form-group col-lg-3">
                                            <label for="inputTipCategEnergia">Categoria Energética</label>
                                            <input id="inputTipCategEnergia" class="form-control" type="text"
                                                placeholder="Insira a Categoria">
                                        </div>
                                        <div class="form-group col-lg-3">
                                            <label for="inputTipTipologia">Tipologia</label>
                                            <input id="inputTipTipologia" class="form-control" type="text"
                                                placeholder="Insira a Tipologia">
                                        </div>
                                        <div class="form-group col-lg-3">
                                            <label for="inputTipEstado">Estado</label>
                                            <select id="inputTipEstado" class="form-control"
                                                placeholder="Selecione o estado">
                                                <option selected>Selecione o estado</option>
                                                <option value="1">Vende-se</option>
                                                <option value="2">Aluga-se</option>
                                                <option value="3">Vende-se e Aluga-se</option>
                                                <option value="4">Vendido</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-lg-4">
                                            <label for="inputTipWCQuantidade">WCs</label>
                                            <input id="inputTipWCQuantidade" class="form-control" type="number"
                                                placeholder="Insira quantas WCs">
                                        </div>
                                        <div class="form-group col-lg-4">
                                            <label for="inputTipPiso">Piso</label>
                                            <input id="inputTipPiso" class="form-control" type="number"
                                                placeholder="Insira o Piso">
                                        </div>
                                        <div class="col-md-2 d-flex flex-row justify-content-start">
                                            <div class="form-check d-flex align-self-center justify-content-center"
                                                title="Inclui Garagem">
                                                <label for="inputTipGaragem" class="mr-2"><i
                                                        class="fa-solid fa-2x fa-warehouse"></i></label>
                                                <input id="inputTipGaragem" type="checkbox"
                                                    placeholder="Inclui Garagem">
                                            </div>
                                        </div>
                                        <div class="col-md-2 d-flex flex-row justify-content-start">
                                            <div class="form-check d-flex align-self-center justify-content-center"
                                                title="Inclui Estacionamento">
                                                <label for="inputTipEstacionamento" class="mr-2"><i
                                                        class="fa-solid fa-2x fa-square-parking"></i></label>
                                                <input id="inputTipEstacionamento" type="checkbox"
                                                    placeholder="Inclui Estacionamento">
                                            </div>
                                        </div>
                                        <div class="form-group col-lg-12">
                                            <label for="inputTipDescricao">Descrição</label>
                                            <textarea id="inputTipDescricao" class="form-control" type="text"
                                                placeholder="Descreva o projeto" style="min-height:12rem"></textarea>
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label for="inputTipValorVenda">Valor Venda (€)</label>
                                            <input id="inputTipValorVenda" class="form-control" type="number" min="0"
                                                step="0.01" placeholder="Insira o Valor (€)">
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label for="inputTipValorAluguer">Valor Aluguer (€/mês)</label>
                                            <input id="inputTipValorAluguer" class="form-control" type="number" min="0"
                                                step="0.01" placeholder="Insira o Valor (€/mês)">
                                        </div>
                                    </div>
                                    <div class="card-footer w-100 d-flex justify-content-end">
                                        <a  class="btn btn-primary" id="adicionar-btn">Adicionar</a>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <script>
                            let tipoEdificio             = document.getElementById("inputTipoEdificio");
                            let nApartamentos            = document.getElementById("inputNApartamentos");
                            let nApartamentosDisponiveis = document.getElementById("inputNApartamentosDisponiveis");
                            
                            let visualizarBtn = document.getElementById("finalizar-btn");
                            let finalizarBtn  = document.getElementById("visualizar-btn");

                            nApartamentos.disabled = true;
                            nApartamentosDisponiveis.disabled = true;

                            let wasValidated = () => {
                                let x = document.getElementById("form-project")
                                if (x.classList.contains("needs-validation")) {
                                    x.classList.remove("needs-validation");
                                    x.classList.add("was-validated");
                                }
                            }

                            let management = () => {
                                let tipoEdificio   = document.getElementById("inputTipoEdificio");
                                let nApart         = document.getElementById("inputNApartamentos");
                                let nApartDisp     = document.getElementById("inputNApartamentosDisponiveis");
                                let tipologiaForm  = document.getElementById("tipologia-form");
                                let tipologiaTable = document.getElementById("tipologia-table");

                                if (tipoEdificio.value == 1) {
                                    nApart.disabled = false;
                                    nApartDisp.disabled = false;

                                    tipologiaTable.hidden = false;

                                    tipologiaForm.classList.remove("col-lg-12");
                                    tipologiaForm.classList.add("col-lg-6");
                                } else {
                                    nApart.disabled = true;
                                    nApartDisp.disabled = true;

                                    tipologiaTable.hidden = true;

                                    tipologiaForm.classList.remove("col-lg-6");
                                    tipologiaForm.classList.add("col-lg-12");
                                }
                            }
                            
                            visualizarBtn.addEventListener("click", wasValidated);
                            finalizarBtn.addEventListener("click", wasValidated);
                            tipoEdificio.addEventListener("change", management);
                        </script>
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
                                            <tbody id="tipology-table-body">
                                                <tr>
                                                    <td>22</td>
                                                    <td>A++</td>
                                                    <td>T1</td>
                                                    <td><span class="badge badge-success">Vende-se</span></td>
                                                    <td>2</td>
                                                    <td>3</td>
                                                    <td><i class="fa-solid text-success fa-check"></i></td>
                                                    <td><i class="fa-solid text-success fa-check"></i></td>
                                                    <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur sapiente sequi accusantium corrupti rem, </td>
                                                    <td>23.000€</td>
                                                    <td>300€</td>
                                                    <td>
                                                        <a class="badge bg-danger p-1 px-2 mr-1" title="Eliminar" href=""><i class="fa-solid fa-trash-can"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>22</td>
                                                    <td>A++</td>
                                                    <td>T1</td>
                                                    <td><span class="badge badge-warning">Aluga-se</span></td>
                                                    <td>2</td>
                                                    <td>3</td>
                                                    <td><i class="fa-solid text-success fa-check"></i></td>
                                                    <td><i class="fa-solid text-danger fa-close"></i></td>
                                                    <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur sapiente sequi accusantium corrupti rem, </td>
                                                    <td>23.000€</td>
                                                    <td>300€</td>
                                                    <td>
                                                        <a class="badge bg-danger p-1 px-2 mr-1" title="Eliminar" href=""><i class="fa-solid fa-trash-can"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>22</td>
                                                    <td>A++</td>
                                                    <td>T1</td>
                                                    <td><span class="badge badge-info">Vende-se e Aluga-se</span></td>
                                                    <td>2</td>
                                                    <td>3</td>
                                                    <td><i class="fa-solid text-danger fa-close"></i></td>
                                                    <td><i class="fa-solid text-success fa-check"></i></td>
                                                    <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur sapiente sequi accusantium corrupti rem, </td>
                                                    <td>23.000€</td>
                                                    <td>300€</td>
                                                    <td>
                                                        <a class="badge bg-danger p-1 px-2 mr-1" title="Eliminar" href=""><i class="fa-solid fa-trash-can"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>22</td>
                                                    <td>A++</td>
                                                    <td>T1</td>
                                                    <td><span class="badge badge-danger">Vendido</span></td>
                                                    <td>2</td>
                                                    <td>3</td>
                                                    <td><i class="fa-solid text-danger fa-close"></i></td>
                                                    <td><i class="fa-solid text-danger fa-close"></i></td>
                                                    <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur sapiente sequi accusantium corrupti rem, </td>
                                                    <td>23.000€</td>
                                                    <td>300€</td>
                                                    <td>
                                                        <a class="badge bg-danger p-1 px-2 mr-1" title="Eliminar" href=""><i class="fa-solid fa-trash-can"></i></a>
                                                    </td>
                                                </tr>
                                            </tbody>
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
    
    <script>
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
                    case "1":
                        return_value.appendChild(document.createTextNode("Vende-se"));
                        return_value.classList.add("badge-success");
                        break;
                
                    case "2":
                        return_value.appendChild(document.createTextNode("Aluga-se"));
                        return_value.classList.add("badge-warning");
                        break;

                    case "3":
                        return_value.appendChild(document.createTextNode("Vende-se e Aluga-se"));
                        return_value.classList.add("badge-info");
                        break;

                    case "4":
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

                this.#hasParking
                    ? return_value.classList.add("text-success", "fa-check") 
                    : return_value.classList.add("text-danger", "fa-close")
            
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
        }

        let adicionarBtn = document.getElementById("adicionar-btn");

        adicionarBtn.addEventListener("click", () => {
            let area      = document.getElementById("inputTipArea");
            let categ     = document.getElementById("inputTipCategEnergia");
            let tipologia = document.getElementById("inputTipTipologia");
            let estado    = document.getElementById("inputTipEstado");
            let wcs       = document.getElementById("inputTipWCQuantidade");
            let piso      = document.getElementById("inputTipPiso");
            let garagem   = document.getElementById("inputTipGaragem");
            let parking   = document.getElementById("inputTipEstacionamento");
            let descricao = document.getElementById("inputTipDescricao");
            let venda     = document.getElementById("inputTipValorVenda");
            let aluguer   = document.getElementById("inputTipValorAluguer");

            let tableBody = document.getElementById("tipology-table-body");

            // Insert a row at the end of table
            var newRow = tableBody.insertRow();

            let tip = new Tipologia(
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
            );

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
            
            let elim = document.createElement("a");
            elim.classList.add("badge", "bg-danger", "p-1", "px-2", "mr-1");
            elim.title = "Eliminar";
            elim.onclick = function deleteSelf() {
                this.closest("tr").remove();
            };

            let icon = document.createElement("i");
            icon.classList.add("fa-solid", "fa-trash-can");
            elim.appendChild(icon);

            newRow.insertCell().appendChild(elim);
        });
    </script>
</body>

</html>