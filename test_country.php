<?php
require_once 'Country.php';
$France=new Country("France","Paris",70000000,"europe");
$Algerie= new Country("Algerie","Alger",20000000,"afrique");
$Belgique= new Country("Belgique","Bruxelles",60000000,"europe");
echo $France->getInfo();
echo $Algerie->getInfo();
echo $Belgique->getInfo();

