<?php
require_once 'Country.php';
$France=new Country("France","Paris",70000000,"europe");
$Algerie= new Country("Algerie","Alger",20000000,"afrique");
$Belgique= new Country("Belgique","Bruxelles",60000000,"europe");
echo $France->getInfo();
echo $Algerie->getInfo();
echo $Belgique->getInfo();

echo "<br>".$France->getCapital();
echo "<br>".$Algerie->getContinent();
echo "<br>".$Belgique->getContinent();

$France->setCapital("Toulouse");
echo $France->getInfo();

echo "mon tableau";
$countries = [$France,$Algerie,$Belgique];
foreach ($countries as $country) {
    echo $country->getInfo();
}
