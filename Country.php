<?php
Class Country {
    public $name;
    public $capital;
    public $population;
    public $continent;

    /*constructeur*/

    public function __construct($name, $capital, $population, $continent)
    {
        $this->name = $name;
        $this->capital = $capital;
        $this->population = $population;
        $this->continent = $continent;
    }
    /*getters*/
    public function getName(){
        return $this->name;
    }
    public function setName($name){
        $this->name = $name;
    }
    public function getCapital(){
        return $this->capital;
    }
    public function getPopulation(){
        return $this->population;
    }
    public function getContinent(){
        return $this->continent;
    }
    /*setters*/
    public function setCapital($capital){
        $this->capital = $capital;
    }
    public function setPopulation($population){
        $this->population = $population;
    }
    public function setContinent($continent){
        $this->continent = $continent;
    }

    public function getInfo()
    {
            return "<br>le pays ".$this->name." a pour capitale ".$this->capital." et une population de ".$this->population." et est sur le continent de ".$this->continent."<br>";
    }
}
