

<?php


class categoriy {

    private int $id_category = 0;
    private string $nom_category ;
    private string $description ;
    

    public function __construct(string $nom, string $description) {
        $this->nom_category = $nom;
        $this->description = $description;
    }


    public function getIdCategory() : int {
        return $this->id_category;
    }


    public function setIdCategory(int $id): void {
        $this->id_category = $id;
    }


    public function getNom() : string {
        return $this->nom_category;
    }



    public function getDiscription() : string {
        return $this->description;
    }







}
