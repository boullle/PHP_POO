<?php
$years = [1955,1999,2002,2008,2020];
$plusJeune = $years[0];
for ($i=1; $i < count($years); $i++) {
    if ($plusJeune < $years[$i]) {
        $plusJeune = $years[$i];
    }
}
echo("le plus jeune est née en ".$plusJeune);

$plusAgee = $years[0];
for ($i=1; $i < count($years); $i++) {
    if ($plusAgee > $years[$i]) {
        $plusAgee = $years[$i];
    }
}
echo("<br>le plus agée est née en ".$plusAgee);
$nombreDagePair=0;
for ($i=0; $i < count($years); $i++) {
    $ageTraitee = intval(age($years[$i]));
    echo"<br>".$ageTraitee;
    if ($ageTraitee%2==0) {
        $nombreDagePair=$nombreDagePair+1;
    }
}
echo "<br>il y a dans years[] ".$nombreDagePair." ages pairs";
function age( $pAnneeDeNaissance){
    $anneeactuelle=intval(date('Y'));
    return ($anneeactuelle-$pAnneeDeNaissance);
};
