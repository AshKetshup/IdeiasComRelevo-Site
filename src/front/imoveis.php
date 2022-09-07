<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/backend/app.php';
$app_instance = new IdeiasComRelevo();

$projects = $app_instance->ProjectsManagement->admin_get_projects();
$filter_values = $app_instance->ProjectsManagement->get_project_filters();
?>
<!DOCTYPE html>
<html lang="pt">

<?php include_once '../includes/site/head.php'; ?>

<style>
    *,
    *::before,
    *::after {
        scroll-behavior: smooth;
    }
</style>

<body class="index-page sidebar-collapse">
    <!-- Navbar -->
    <?php
    $PAGE_ID = "imoveis";
    include_once $_SERVER["DOCUMENT_ROOT"] . '/includes/site/nav.php';
    ?>

    <!-- End Navbar -->
    <hr class="container" style="margin-top: 90px;">
    <div class="container d-flex justify-content-start">
        <form id="searchAccordion" class="w-100 card-collapse pb-0" aria-multiselectable="true" onsubmit="return filterResults()">
            <div class="card card-plain shadow-lg bg-primary" style="margin-top: 30px;">
                <div class="card-header w-100 d-flex flex-row bg-white" role="tab" id="headingOne">
                    <button type="submit" class="btn btn-link col-1"><i class="fas fa-2x fa-search"></i></button>
                    <input type="text" name="searchField" class="col-10 form-text border-0" id="searchContent">
                    <a data-toggle="collapse" data-parent="#searchAccordion" href="#filter" aria-expanded="false" aria-controls="filter" class="btn btn-link col-1">
                        <i class="fas fa-2x fa-filter"></i>
                    </a>
                </div>
                <div id="filter" class="collapse" role="tabpanel" aria-labelledby="headingOne">
                    <div class="card-body m-2 mx-4 text-white">
                        <h4 class="m-0 mb-4">Filtro Avançado</h4>
                        <div class="row text-black d-flex">
                            <div class="col-4">
                                <div class="card bg-white shadow p-2 form-control">
                                    <fieldset class="d-flex m-1" id="state">
                                        <ul class="list-unstyled m-0">
                                            <legend style="font-size: 1rem;">Tipo de Venda</legend>
                                            <?php 
                                                foreach ($filter_values['state'] as $state)
                                                    echo '<li><input type="checkbox" name="state[]" value="'.$state.'" class="m-1">'.ProjectsManagement::state_id_to_string($state).'</li>';
                                            ?>
                                        </ul>
                                    </fieldset>
                                </div>

                                <div class="card bg-white shadow p-2 form-control">
                                    <fieldset class="d-flex m-1" id="typologies">
                                        <ul class="list-unstyled m-0">
                                            <legend style="font-size: 1rem;">Tipologia</legend>
                                            <?php 
                                                foreach ($filter_values['typologies'] as $typologies) 
                                                    echo '<li><input type="checkbox" name="state[]" value="'.$typologies.'" class="m-1">'.$typologies.'</li>';
                                            ?>
                                        </ul>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="card bg-white shadow p-2 form-control">
                                    <fieldset class="d-flex m-1" id="building_types">
                                        <ul class="list-unstyled m-0">
                                            <legend style="font-size: 1rem;">Tipo de Edificio</legend>
                                            <?php 
                                                foreach ($filter_values['building_types'] as $types)
                                                    echo '<li><input type="checkbox" name="building_types[]" value="'.$types.'" class="m-1">'.ProjectsManagement::building_type_id_to_string($types).'</li>';
                                            ?>
                                        </ul>
                                    </fieldset>
                                </div>

                                <div class="card bg-white shadow p-2 form-control">
                                    <fieldset class="d-flex m-1" id="floor_count">
                                        <ul class="list-unstyled m-0">
                                            <legend style="font-size: 1rem;">Nº de Pisos</legend>
                                            <?php 
                                                foreach ($filter_values['floor_count'] as $floor_count)
                                                    echo '<li><input type="checkbox" name="floor_count[]" value="'.$floor_count.'" class="m-1">'.$floor_count.'</li>';
                                            ?>
                                        </ul>
                                    </fieldset>
                                </div>

                                <div class="card bg-white shadow p-2 form-control">
                                    <fieldset class="d-flex m-1" id="floor">
                                        <ul class="list-unstyled m-0">
                                            <legend class="" style="font-size: 1rem;">Piso</legend>
                                            <?php 
                                                foreach ($filter_values['floor'] as $floor)
                                                    echo '<li><input type="checkbox" name="floor[]" value="'.$floor.'" class="m-1">'.$floor.'</li>';
                                            ?>
                                        </ul>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="card bg-white shadow p-2 form-control">
                                    <fieldset class="d-flex m-1" id="energetic_category">
                                        <ul class="list-unstyled m-0">
                                            <legend class="" style="font-size: 1rem;">Categoria Energética</legend>
                                            <?php 
                                                foreach ($filter_values['energetic_category'] as $energetic_category)
                                                    echo '<li><input type="checkbox" name="energetic_category[]" value="'.$energetic_category.'" class="m-1">'.$energetic_category.'</li>';
                                            ?>
                                        </ul>
                                    </fieldset>
                                </div>

                                <div class="card bg-white shadow p-2 form-control">
                                    <fieldset class="d-flex m-1" id="wc_count">
                                        <ul class="list-unstyled m-0">
                                            <legend class="" style="font-size: 1rem;">Nº de WCs</legend>
                                            <?php 
                                                foreach ($filter_values['wc_count'] as $wc_count)
                                                    echo '<li><input type="checkbox" name="wc_count[]" value="'.$wc_count.'" class="m-1">'.$wc_count.'</li>';
                                            ?>
                                        </ul>
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <hr class="container">
    <div class="container d-flex align-items-start flex-column">
        <h3 id="resultados">Resultados para ""</h3>
        <?php foreach ($projects as $project) : ?>
            <?php $project->reload_appartments(); ?>
            <div class="col-12 d-flex m-0 my-2 p-0 shopItem overflow-hidden card flex-row align-items-center" 
                json='<?= $project->get_json(); ?>' id="<?= $project->get_id() ?>" href="/produto?id=<?= $project->get_id() ?>" 
                style="height: 200px; cursor: pointer;">
                <div class="col-3 m-0 p-0 overflow-hidden">
                    <img class="" style="min-width: 100%; height: 200px; vertical-align: middle; object-fit: cover;" src="/uploads/<?= $project->get_main_photo() ?>" 
                        alt="<?= $project->get_title() ?>" srcset="">
                </div>
                <div class="col-9 m-0 px-3 py-0 h-100 d-flex flex-column">
                    <h4 class="col-12 m-0 p-0">
                        <?= $project->get_title() ?>
                    </h4>
                    <p class="col-12 m-0 p-0 text-truncate text-left">

                    <?php if ($project->get_building_type() == 1): ?>
                        <?= ProjectsManagement::state_id_to_string($project->get_sale_type()) ?>
                    <?php else: ?>
                        <?= ProjectsManagement::state_id_to_string($project->get_state()) ?>
                    <?php endif; ?> <?= ProjectsManagement::building_type_id_to_string($project->get_building_type()) ?>: <?= 
                    $project->get_zone() ?>, <?= $project->get_county() ?>, <?= $project->get_city() ?>
                    
                    </p>
                    <div class="col-12 my-1 m-0 p-0 d-flex justify-content-between">
                        <div class="col-8 m-0 p-0">
                            <ul class="col-12 list-unstyled my-1 m-0 p-0 text-muted text-left" style="gap: 1rem">
                                <li class="p">
                                    Área: <b><?php
                                        if ($project->get_building_type() == 1) {
                                            $minArea = min(
                                                array_map(function($x) { return $x->get_area(); }, $project->get_appartments())
                                            );

                                            echo "A partir de " . $minArea;
                                        } else {
                                            echo $minArea;
                                        }
                                    ?> m<sup>2</sup></b>
                                </li>
                                <?php if ($project->get_building_type() != 1): ?>
                                <li class="p">
                                    Tipologia: <b><?= $project->get_appartments()[0]->get_typology() ?></b>
                                </li>
                                <?php endif; ?>
                                <?php if ($project->get_building_type() != 1): ?>
                                <li class="p">
                                    Categoria Energética: <b><?php 
                                        echo $project->get_appartments()[0]->get_energy_category();
                                    ?></b>
                                </li>
                                <?php endif; ?>

                                <li class="p">
                                    Pisos: <b><?php echo $project->get_floor_count(); ?></b>
                                </li>
                                <?php
                                    $has_garage   = false;
                                    $has_parking  = false;
                                    $has_elevator = $project->get_has_elevator();
                                    foreach ($project->get_appartments() as $appart) {
                                        $has_garage += $appart->get_has_garage();
                                        $has_parking += $appart->get_has_parking();
                                    }
                                ?>

                                <?php if ($has_garage || $has_parking || $has_elevator): ?>
                                    <li class="col-12 m-0 p-0 text_caps-small">Inclui: <b><?php if ($has_parking): ?> Estacionamento<?php endif; ?><?php if ($has_garage) : ?> Garagem<?php endif; ?><?php if ($has_elevator) : ?> Elevador<?php endif; ?>
                                    </b></li>
                                <?php endif; ?>
                            </ul>
                        </div>
                        <div class="col-4 m-0 p-0 text-right">
                        
                        <?php $value = $project->get_value();?>
                        <?php if ($project->get_building_type() == 1): ?>
                            <p class="col-12 m-0 p-0">A partir de:</p>
                            <h3 class="col-12 m-0 p-0">
                            
                            <?php if (isset($value["rent"])): ?>
                                <?= $value["rent"] ?>€/mês
                            <?php endif; ?>
                            <?php if (isset($value["sell"])): ?>
                                <br>
                                <?= $value["sell"] ?>€
                            <?php endif; ?>
                            
                            </h3>
                        <?php else: ?>
                            <h3 class="col-12 m-0 p-0">
                                <?php if ($project->get_state() == 1): ?>
                                    <?= $value ?>€
                                <?php else: ?> 
                                    <?php if ($project->get_state() == 2): ?>
                                        <?= $value ?>€/mês
                                    <?php else: ?>
                                        <?= "" ?>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </h3>
                        <?php endif; ?>

                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <script>
        for (const item of document.getElementsByClassName("shopItem")) {
            item.addEventListener("click", () => {
                location.assign(item.getAttribute("href"));
            });
        }
    </script>

    <script>
        const fields = () => {
            return {
                "state":           document.querySelectorAll("#state input[type=checkbox]:checked"), 
                "typologies":      document.querySelectorAll("#typologies input[type=checkbox]:checked"), 
                "building_types":  document.querySelectorAll("#building_types input[type=checkbox]:checked"), 
                "floor_count":     document.querySelectorAll("#floor_count input[type=checkbox]:checked"), 
                "floor":           document.querySelectorAll("#floor input[type=checkbox]:checked"), 
                "energy_category": document.querySelectorAll("#energetic_category input[type=checkbox]:checked"), 
                "wc_count":        document.querySelectorAll("#wc_count input[type=checkbox]:checked")
            }
        };

        function filterResults() {
            let items = Array.from(document.getElementsByClassName("shopItem"));
            let itemCopy = Array.from(items);
            let search = document.getElementById("searchContent").value;

            items.forEach(el => {
                if (document.getElementById(el.getAttribute("id")).classList.contains("d-none")) {
                    document.getElementById(el.getAttribute("id")).classList.remove("d-none");
                    document.getElementById(el.getAttribute("id")).classList.add("d-flex");
                }
            });

            items = items.filter(el => {
                let content = search.toLowerCase().split(" ");

                let returnBool = true;

                for (const cont of content)
                    returnBool = returnBool && el.textContent.toLowerCase().includes(cont);

                return returnBool;
            });

            let object = fields();
            items = items.filter(el => {
                let json = el.getAttribute("json");
                let isShown = true;
                
                for (const field in object) {
                    let fieldBool = false;

                    if (object[field].length == 0)
                        continue

                    object[field].forEach(item => {
                        let strContent = '"' + field + '":"' + item.value + '"';

                        fieldBool = fieldBool || json.includes( strContent );
                        console.log(strContent + ' -> ' + json.includes( strContent ));
                    });

                    console.log("isShown => " + isShown + "fieldBool => " + fieldBool);
                    
                    isShown = isShown && fieldBool;
                }
            
                return isShown;
            });


            console.log("Items = " + items);


            itemCopy = itemCopy.filter( el => {
                return !items.includes(el);
            });


            itemCopy.forEach( el => {
                document.getElementById(el.getAttribute("id")).classList.remove("d-flex");
                document.getElementById(el.getAttribute("id")).classList.add("d-none");
            });

            return false;
        }
    </script>
    <!-- footer -->
    <?php include_once $_SERVER["DOCUMENT_ROOT"] . '/includes/site/footer.php'; ?>

    <!-- scripts -->
    <?php include_once $_SERVER["DOCUMENT_ROOT"] . '/includes/site/scripts.php'; ?>
    <style>
    </style>
</body>

</html>