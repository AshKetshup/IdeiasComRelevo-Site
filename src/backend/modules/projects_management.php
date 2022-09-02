<?php

    /**
     * @package IdeiasComRelevo
     * @subpackage modules
     * 
     * Contains all the methods to handle the Projects entities
     * Version: 2.0.1
     * 
     * @developer Pedro Cavaleiro
     * @created Aug 29, 2022
     * @lastedit Sep 2, 2022
     * 
     * @issues no issues linked to this file
     * @todo no tasks pending
     * 
     */

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


        function get_project($id) {
            return RealEstateEntity::fromId($id);
        }

        /**
         * Deletes a project given an id
         * @param String $id the id of the project to delete
         */
        function delete_project($id) {
            $project = RealEstateEntity::fromId($id);
            $project->delete_entry();
        }

        function create_project($images, $post, $typologies) {
            $projectEntity = new RealEstateEntity();

            $projectEntity->set_zone($_POST['zona']);
            $projectEntity->set_county($_POST['concelho']);
            $projectEntity->set_city($_POST['freguesia']);
            $projectEntity->set_building_type($_POST['tipoEdificio']);
            $projectEntity->set_floor_count($_POST['nPisos']);
            $projectEntity->set_description($_POST['descricao']);
            $projectEntity->set_state($_POST['estado']);

            if (isset($_POST['valor']))
                $projectEntity->set_value($_POST['valor']);
            else
                $projectEntity->set_value(0);

            if (isset($_POST['elevador']))
                $projectEntity->set_has_elevator($_POST['elevador'] == 'on');
            else
                $projectEntity->set_has_elevator(false);

            $projectEntity->set_title($_POST['titulo']);

            $projectEntity->set_photos($images);
            $projectEntity->set_main_photo($images[0]);

            $projectEntity->insert();


            foreach($typologies as $typology) {
                $typologyEntity = new TypologyEntity();

                $typologyEntity->set_area($typology['area']);
                $typologyEntity->set_energy_category($typology['categoriaEnergetica']);
                $typologyEntity->set_typology($typology['tipologia']);

                if (isset($typology['estado']) && $typology['estado'] != 0 && $typology['estado'] != -1)                    
                    $typologyEntity->set_state($typology['estado']);
                else
                    $typologyEntity->set_state(0);

                $typologyEntity->set_wc_count($typology['wcs']);

                if (isset($typology['hasGaragem']))
                    $typologyEntity->set_has_garage($typology['hasGaragem'] == "true");
                else
                    $typologyEntity->set_has_garage(false);

                if (isset($typology['hasParking']))
                    $typologyEntity->set_has_parking($typology['hasParking'] == "true");
                else
                    $typologyEntity->set_has_parking(false);

                $typologyEntity->set_description($typology['descricao']);

                if(isset($typology['venda']) && $typology['venda'] != "")
                    $typologyEntity->set_sell_price($typology['venda']);
                else
                    $typologyEntity->set_sell_price(0);

                if(isset($typology['aluguer']) && $typology['aluguer'] != "")
                    $typologyEntity->set_rent_price($typology['aluguer']);
                else
                    $typologyEntity->set_rent_price(0);

                if (isset($typology['piso']))
                    $typologyEntity->set_floor($typology['piso']);
                else
                    $typologyEntity->set_floor(0);
                    
                $typologyEntity->set_building($projectEntity);                

                // this should change
                $typologyEntity->set_photos(array());

                $typologyEntity->insert();

            }
            
        }

        function edit_project($images, $imagesToRemove, $post, $typologies) {            
            $projectEntity = new RealEstateEntity();

            $projectEntity->set_zone($_POST['zona']);
            $projectEntity->set_county($_POST['concelho']);
            $projectEntity->set_city($_POST['freguesia']);
            $projectEntity->set_building_type($_POST['tipoEdificio']);
            $projectEntity->set_floor_count($_POST['nPisos']);
            $projectEntity->set_description($_POST['descricao']);
            $projectEntity->set_state($_POST['estado']);

            if (isset($_POST['valor']))
                $projectEntity->set_value($_POST['valor']);
            else
                $projectEntity->set_value(0);

            if (isset($_POST['elevador']))
                $projectEntity->set_has_elevator($_POST['elevador'] == 'on');
            else
                $projectEntity->set_has_elevator(false);

            $projectEntity->set_title($_POST['titulo']);

            $projectEntity->set_photos($images);
            $projectEntity->set_main_photo($images[0]);

            $projectEntity->update_changes();
            $projectEntity->clear_typologies();


            foreach($typologies as $typology) {
                $typologyEntity = new TypologyEntity();

                $typologyEntity->set_area($typology['area']);
                $typologyEntity->set_energy_category($typology['categoriaEnergetica']);
                $typologyEntity->set_typology($typology['tipologia']);

                if (isset($typology['estado']) && $typology['estado'] != 0 && $typology['estado'] != -1)                    
                    $typologyEntity->set_state($typology['estado']);
                else
                    $typologyEntity->set_state(0);

                $typologyEntity->set_wc_count($typology['wcs']);

                if (isset($typology['hasGaragem']))
                    $typologyEntity->set_has_garage($typology['hasGaragem'] == "true");
                else
                    $typologyEntity->set_has_garage(false);

                if (isset($typology['hasParking']))
                    $typologyEntity->set_has_parking($typology['hasParking'] == "true");
                else
                    $typologyEntity->set_has_parking(false);

                $typologyEntity->set_description($typology['descricao']);

                if(isset($typology['venda']) && $typology['venda'] != "")
                    $typologyEntity->set_sell_price($typology['venda']);
                else
                    $typologyEntity->set_sell_price(0);

                if(isset($typology['aluguer']) && $typology['aluguer'] != "")
                    $typologyEntity->set_rent_price($typology['aluguer']);
                else
                    $typologyEntity->set_rent_price(0);

                if (isset($typology['piso']))
                    $typologyEntity->set_floor($typology['piso']);
                else
                    $typologyEntity->set_floor(0);
                    
                $typologyEntity->set_building($projectEntity);                

                // this should change
                $typologyEntity->set_photos(array());

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

        /**
         * Converts the typology state id (int) to the matching string
         * @param $id the typology state as string
         */
        public static function typology_state_id_to_string($id) {
            $building_states = array(
                0 => "-",
                1 => "Vende-se",
                2 => "Aluga-se",
                3 => "Vende-se e Aluga-se",
                4 => "Vendido"
            );
            return $building_states[$id];
        }

    }

?>