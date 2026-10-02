<?php


class category {

    private int $id;
    private string $nom;
    private string $description;


    public function __construct(string $nom, string $description)
    {

    $this->nom = $nom;
    $this->description = $description;
        
    }

    public function getIdcategory () : int {
        return $this->id;
    }
    public function setIdcategory (int $id) : void {
        $this->id = $id;
    }


     public function getNom () : string {
         return $this->nom;
    }


    public function getDescription() : string {
        return $this->description;
    }




}