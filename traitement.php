<?php
//recuperation des infos
//nom , email ,sujet, message4
$nom =$_POST['name'];
$email=$_POST['email'];
$sujet=$_POST['sujet'];
$message=$_POST['message'];
if (isset($nom) && isset($email) && isset($sujet) && isset($message)) {
    //je verifie si elle ne sont pas vide
    if (empty($nom)){
        echo "le nom est vide";
    }
    if (empty($email)){
        echo "le email est vide";
    }
    if (empty($sujet)){
        echo "le sujet est vide";
    }
    if (empty($message)){
        echo "le message est vide";
    }
}

echo "je m'appelle ".$nom." mon email est ".$email.". Ma plainte porte sur ".$sujet."<br> Contenu: <br> ".$message;