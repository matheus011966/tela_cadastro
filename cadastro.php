<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="bootstrap.min.css">
    <title>Curso Strings</title>
</head>
<body>
<?php

use Alura\Contato;
use Alura\Usuario;

    require 'usuario.php';

    $usuario = new Usuario($_POST['nome'], $_POST['senha'], $_POST['genero']);
    $contato = new Contato($_POST['email'], $_POST['endereco'], $_POST['cep']);
    $telefone = $_POST['telefone'];
    $nasc = explode("-", $_POST['nasc']);
    $idade = date('Y') - $nasc[0];
    $votar = "";
   


?>
<div class="mx-5 my-5">
<h1>Cadastro feito com sucesso.</h1>
<p><?php echo $usuario->gettratamento()?> Segue os dados de sua conta:</p>
<ul class="list-group">
    <li class="list-group-item"><?php echo $usuario->getNome() ?> </li>
    <li class="list-group-item"><?php echo $usuario->getSobrenome()?> </li>
    <li class="list-group-item"><?php echo $contato->getContato() ?> </li>
    <li class="list-group-item"><?php echo $usuario->getSenha()?> </li>
    <li class="list-group-item"><?php echo $telefone ?> </li>
    <li class="list-group-item"><?php echo $contato->GetEmail() ?></li>
    <li class="list-group-item"><?php echo $contato ->getEnderecocompleto()?> </li>
    <li class="list-group-item"><?php echo $idade ?> </li>
    <br>
</br>

<a><?php  if ($idade >= 16){
        if($idade >= 16 && $idade <= 18 || $idade >= 65 ){
            echo "Por esse motivo você pode Votar mas não é obrigatório";
            $votar = 'telapop.php';
        }
        elseif($idade >= 18 && $idade <= 66){
            echo "Por esse motivo seu voto é obrigatório";
            $votar = 'telapop.php';

        }
        } 
        else{
          echo"não pode votar";
          $votar = 'form_cadastrar.php';
        }
        ?> </a>
    <br/>
    <br/>

    
    <fieldset><legend>Deseja votar agora?</legend>
    <a href = "form_cadastrar.php">Voltar</a>
    <a href = <?php $votar?>>Votar</a>
</ul>
</div>
</body>
</html>
