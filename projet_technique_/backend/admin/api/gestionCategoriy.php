<?php



header("Content-Type: application/json");


require_once '../class/categoriy.php';

class gestionCategoriy {

    private $path_file;

    public function __construct() {

        $this->path_file = "../../database/gesetionCategoriy.json";

    }
    


    public function getCategoriy() {

        $contenu = file_get_contents($this->path_file);

        $categoriy = json_decode($contenu, true);

        echo json_encode($categoriy);

    }



    public function ajouteCategoriy() {

        $contenu = file_get_contents($this->path_file);

        $categoriy = json_decode($contenu, true);

        $data = json_decode(file_get_contents("php://input"), true);



        $categoriy[] = [

            "id_category" => count($categoriy) + 1,
            "nom_category" => $data["nom_category"],
            "description" => $data["description"]
        ];



        file_put_contents($this->path_file, json_encode($categoriy, JSON_PRETTY_PRINT));


        echo json_encode($categoriy);


    }


    public function traiterRequete(){


        $method = $_SERVER["REQUEST_METHOD"];


        if ($method === "GET") {
            $this->getCategoriy();
        }elseif ($method === "POST") {
            $this->ajouteCategoriy();
        }
    }


}


$api = new gestionCategoriy();

$api->traiterRequete();
