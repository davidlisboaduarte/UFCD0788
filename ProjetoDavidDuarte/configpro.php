<?php
$servidor="localhost"; //servidor da base de dados
$utilizador="root"; //utilizador da base de dados
$password=""; //password do utilizador da base de dados
$nomeBd="projecto1"; //nome da base de dados


$ligacao = mysqli_connect($servidor, $utilizador, $password, $nomeBd);// estou a ligar ao meu servidor de base de dados e à base de dados que eu criei

if(!$ligacao){
    die("A ligação falhou: " . mysqli_connect_error());
}

?>