<?php
$anneeDeNaissance = intval(readline("taper votre année de naissance"));
function age( $pAnneeDeNaissance){
    $anneeactuelle=intval(date('Y'));
    return ($anneeactuelle-$pAnneeDeNaissance);
}
function estMajeur($pAge){
    if ($pAge>=18){
        echo("vous êtes Majeur");
    }
    else{
        echo("vous êtes Mineur");
    }
}

$MonAge = intval(age($anneeDeNaissance));
echo($MonAge." ");
estMajeur($MonAge);
/* afficher la liste de dates de naissance contenu dans une variable Years:*/
$years = [1955,1999,2002,2008,2020];
foreach ($years as $value)
{
 echo "<br>".age($value);
}