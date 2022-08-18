<?php
	use Alura\Contato;
	use Alura\Usuario;

	require_once 'usuario.php';

	$usuario = new Usuario($_POST['nome'], $_POST['senha'], $_POST['genero']);
	$contato = new Contato($_POST['email'], $_POST['endereco'], $_POST['cep']);

	$telefone = $_POST['telefone'];
	$nasc = explode('-', $_POST['nasc']);
	$idade = date('Y') - $nasc[0];
	$votar = '';
?>

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
		<div class="mx-5 my-5">
			<h1>Cadastro feito com sucesso.</h1>
			<p><?= $usuario->gettratamento() ?> Segue os dados de sua conta:</p>

			<ul class="list-group">
				<li class="list-group-item"><?= $usuario->getNome() ?> </li>
				<li class="list-group-item"><?= $usuario->getSobrenome() ?> </li>
				<li class="list-group-item"><?= $contato->getContato() ?> </li>
				<li class="list-group-item"><?= $usuario->getSenha() ?> </li>
				<li class="list-group-item"><?= $telefone ?> </li>
				<li class="list-group-item"><?= $contato->GetEmail() ?></li>
				<li class="list-group-item"><?= $contato->getEnderecocompleto() ?> </li>
				<li class="list-group-item"><?= $idade ?> </li>

				<br />

				<a>
					<?php 
						if ($idade >= 16) :
							if ($idade >= 16 && $idade <= 18 || $idade >= 65) :
								echo 'Por esse motivo você pode Votar mas não é obrigatório';
								$votar = 'telapop.php';
							elseif ($idade >= 18 && $idade <= 66) :
								echo 'Por esse motivo seu voto é obrigatório';
								$votar = 'telapop.php';
							endif;
						else:
							echo 'não pode votar';
							$votar = 'form_cadastrar.php';
						endif;
					?> 
				</a>

				<br />
				<br />

				<fieldset>
					<legend>Deseja votar agora?</legend>
					<a href="form_cadastrar.php">Voltar</a>
					<a href=<?= $votar ?>>Votar</a>
				</fieldset>
			</ul>
		</div>
	</body>
</html>