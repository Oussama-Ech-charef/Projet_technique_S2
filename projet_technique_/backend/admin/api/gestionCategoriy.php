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



        $nom_category = trim($data["nom_category"] ?? "");
        $description = trim($data["description"] ?? "");


        if (strlen($nom_category) < 2 || strlen($description) < 10) {
            echo json_encode(["message" => "Verefie"]);
            return;
        }

        $nouvelleCategory = new categoriy($nom_category,$description );
        $nouvelleCategory->setIdCategory(count($categoriy) + 1);

         $categoriy[] = [
        "id_category" => $nouvelleCategory->getIdCategory(),
        "nom_category" => $nouvelleCategory->getNom(),
        "description" => $nouvelleCategory->getDiscription()
        ];

        file_put_contents(
            $this->path_file,
            json_encode($categoriy, JSON_PRETTY_PRINT)
        );

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
