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
$Chine = new DeveloppedCountry("Chine","Pekin",1000000000,"europe",500);

$France->setCapital("Toulouse");
echo $France->getInfo();

echo "mon tableau :";
$countries = [$France,$Algerie,$Belgique,$Chine];
$Suisse = new DeveloppedCountry("Suisse","Berne",133900,"europe",900);
array_push($countries,$Suisse);
foreach ($countries as $country) {
    echo $country->getInfo();
}


echo $Chine->getInfo();
affichePaysTresPeuples($countries);
