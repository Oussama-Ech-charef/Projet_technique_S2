

<?php


class categoriy {

    private int $id_category;
    private string $nom_category;
    private string $description;
    

    
    public function __construct(string $nom_category = "", string $description = "") {
        $this->nom_category = $nom_category;
        $this->description = $description;
    }



    public function getNom() : string {
        return $this->nom_category;
    }


    public function setNom(string $nom_category) : void {
        if (strlen($nom_category) >= 2) {
            $this->nom_category = $nom_category;
        }
    }


    public function getDiscription() : string {
        return $this->description;
    }



    public function setDiscription(string $description) : void {
        if (strlen($description) >= 10) {
            $this->description = $description;
        }
    }




}
