<?php


/*echo '<pre>';
print_r($_POST);
echo '<pre>';*/


	require "../../agenda-controle/tarefa.model.php";
	require "../../agenda-controle/tarefa.service.php";
	require "../../agenda-controle/conexao.php";

	
	$acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;
	

	if($acao == 'inserir' ) {

		$tarefa = new Tarefa();
		$tarefa->__set('tarefa', $_POST['tarefa']);

		$conexao = new Conexao();

		$tarefaService = new TarefaService($conexao, $tarefa);
		$tarefaService->inserir();

		header('Location: nova_tarefa.php?inclusao=1');
	
	} else if ( $acao == 'recuperar'){
		echo 'chegamos ate aqui';

		$tarefa = new Tarefa();
		$conexao = new Conexao();

		$tarefaService = new TarefaService($conexao, $tarefa);
		$tarefas = $tarefaService->recuperar();

	}

?>