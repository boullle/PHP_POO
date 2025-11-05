<?php
Class Country {
    private $name;
    private $capital;
    private $population;
    private $continent;

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
        if($population>0){
            $this->population = $population;
        }

    }
    public function setContinent($continent){
        $this->continent = $continent;
    }

    public function getInfo()
    {
            return "<br>le pays ".$this->getName()." a pour capitale ".$this->getCapital()." et une population de ".$this->getPopulation()." et est sur le continent de ".$this->getContinent()."<br>";
    }
    public function isPopulous(){
        if ($this->getPopulation() > 100000000){
            return true;
        }
        else{
            return false;
        }
    }
}
Class DeveloppedCountry extends Country{
    private $gdp;

    public function __construct($name, $capital, $population, $continent, $gdp){
        parent::__construct($name, $capital, $population, $continent);
        $this->gdp = $gdp;
    }
    public function getGdp(){
        return $this->gdp;
    }
    public function setGdp($gdp){
        $this->gdp = $gdp;
    }
    public function getInfo()
    {
        return parent::getInfo()." et son PIB est de ".$this->getGdp()." milliard de dollars <br>";

    }

}
function affichePaysTresPeuples(array $tabs){
    foreach ($tabs as $tab){
        if ($tab->isPopulous()){
            echo "<br>".$tab->getInfo()."<br>";
        }
    }
}