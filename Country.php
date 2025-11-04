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
    public function getInfo()
    {
            return "<br>le pays".$this->name." a pour capitale ".$this->capital." et une population de ".$this->population." et est sur le continent de ".$this->continent."<br>";
    }
}
