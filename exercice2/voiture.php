<?php
class Voiture{
    /*attributs
    */
    public $marque;
    public $anneeDeFabrication;
    public $couleur;

    /*constructeur*/
    public function __construct($marque_param, $anneeDeFabrication_param, $couleur_param){
        $this->marque = $marque_param;
        $this->anneeDeFabrication = $anneeDeFabrication_param;
        $this->couleur = $couleur_param;
    }

    public function afficherCaracteristiques(){
        echo $this->marque."<br>".$this->anneeDeFabrication."<br>".$this->couleur;
    }


}
class VoitureVIP extends Voiture{
    public $nbreDeRoue;
    public function __construct($marque, $annee, $couleur, $nbreDeRoue)
    {
        Parent::__construct($marque, $annee, $couleur);
        $this->nbreDeRoue = $nbreDeRoue;
    }
    public function afficherNbreDeRoue(){
        echo $this->nbreDeRoue;
    }
}
/*$Voiture = new Voiture();
$Voiture->marque="Renault";
$Voiture->anneeDeFabrication="1990";
$Voiture->couleur="Bleu";
$Voiture->afficherCaracteristiques();*/
$voiture2 = new Voiture("Peugeot",2008,"Verte");
$voiture2->afficherCaracteristiques();
$V2=new VoitureVIP("Mercedes",2008,"Verte", 6);
$V2->afficherCaracteristiques();
$V2->afficherNbreDeRoue();
