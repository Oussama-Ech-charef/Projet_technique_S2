

<?php


header("Content-Type: application/json");


require_once '../class/category.php';

class gestionCategoriy {

    private $path_file;

    public function __construct()
    {
        $this->path_file = '../../database/gesetionCategoriy.json';
    }


    public function getCategory() {

        $contenu = file_get_contents($this->path_file);

        $category = json_decode($contenu, true);

        echo json_encode($category);


    }

    public function ajoutcategory() {

        $contenu = file_get_contents($this->path_file);

        $category = json_decode($contenu, true);

        $data = json_decode(file_get_contents("php://input"), true);


        $nom_category = $data["nom_category"] ?? "";
        $description = $data["description"] ?? "";

        if (strlen($nom_category) < 0 || strlen($description) < 10) {
            echo json_encode(["message" => "verefi formelar"]);
            return;
        }

        $novelcategory = new category($nom_category, $description);
        $novelcategory->setIdcategory(count($category) + 1);
        $category[] = [
            "id_category" => $novelcategory->getIdcategory(),
            "nom_category" => $novelcategory->getNom(),
            "description" => $novelcategory->getDescription()
        ];


        file_put_contents($this->path_file, json_encode($category, JSON_PRETTY_PRINT));

        echo json_encode($category);

        

    }


    public function traitemenet() {
        $methode = $_SERVER["REQUEST_METHOD"];


        if ($methode === "GET") {
            $this->getCategory();
        }elseif ($methode === "POST") {
            $this->ajoutcategory();
        }
    }



}

 


$category = new gestionCategoriy();
$category->traitemenet();