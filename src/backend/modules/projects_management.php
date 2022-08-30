<?php

    $APP_PATHS = array(
        "entities" => $_SERVER["DOCUMENT_ROOT"] . "/backend/entities",
        "database" => $_SERVER["DOCUMENT_ROOT"] . "/backend/database",
        "helpers" => $_SERVER["DOCUMENT_ROOT"] . "/backend/helpers",
        "modules" => $_SERVER["DOCUMENT_ROOT"] . "/backend/modules",
    );

    require_once $APP_PATHS["database"] . '/dbconnection.php';

    class ProjectsManagement {

        /** External Modules */
        private $db_context;

        /** Constructor, initializes the DbContext */
        function __construct() { 
            $this->db_context = new DbContext();
        }

        /**
         * Gets an array with all project entities
         */
        function admin_get_projects() {

            $connection = $this->db_context->initialize_connection();
            if ($connection == NULL) {
                $connection->close();
                return array();
            }

            $sql = "SELECT * FROM realestate";
            $result = $connection->query($sql);

            $results = array();

            while($row = $result->fetch_assoc()) {
                array_push($results, RealEstateEntity::fromRow($row));
            }

            return $results;

        }

        /**
         * Deletes a project given an id
         * @param String $id the id of the project to delete
         */
        function delete_project($id) {
            $project = RealEstateEntity::fromId($id);
            $project->delete_entry();
        }

        function create_project($json) {            
            $project = $json->projeto;
            $typologies = $json->tipologies;
            $projectEntity = new RealEstateEntity();

            $projectEntity->set_zone($project->zona);
            $projectEntity->set_county($project->concelho);
            $projectEntity->set_city($project->freguesia);
            $projectEntity->set_building_type($project->tipoEdificio);
            $projectEntity->set_floor_count($project->nPisos);
            $projectEntity->set_description($project->descricao);
            $projectEntity->set_state($project->estado);
            $projectEntity->set_value($project->valor);
            $projectEntity->set_has_elevator($project->elevador);
            $projectEntity->set_title($project->titulo);

            // this should change
            $projectEntity->set_photos(NULL);

            $projectEntity->insert();


            foreach($typologies as $typology) {
                $typologyEntity = new TypologyEntity();

                $typologyEntity->set_area($typology->area);
                $typologyEntity->set_energy_category($typology->categoriaEnergetica);
                $typologyEntity->set_typology($typology->tipologia);
                $typologyEntity->set_state($typology->estado);
                $typologyEntity->set_wc_count($typology->wcs);
                $typologyEntity->set_has_garage($typology->hasGaragem);
                $typologyEntity->set_has_parking($typology->hasParking);
                $typologyEntity->set_description($typology->descricao);
                $typologyEntity->set_sell_price($typology->venda);
                $typologyEntity->set_rent_price($typology->aluguer);
                $typologyEntity->set_building($projectEntity);

                // this should change
                $typologyEntity->set_photos(NULL);

                $typologyEntity->insert();

            }
            
        }

        /**
         * Converts the building type id (int) to the matching string
         * @param $id the building type as string
         */
        public static function building_type_id_to_string($id) {
            $building_types = array(
                1 => "Prédio",
                2 => "Moradia Isolada",
                3 => "Moradia Germinada",
                4 => "Loja"
            );
            return $building_types[$id];
        }

        /**
         * Converts the building state id (int) to the matching string
         * @param $id the building state as string
         */
        public static function building_state_id_to_string($id) {
            $building_states = array(
                0 => "-",
                1 => "Vende-se",
                2 => "Aluga-se",
                3 => "Vendido"
            );
            return $building_states[$id];
        }

    }

?>