<?php


/*echo '<pre>';
print_r($_POST);
echo '<pre>';*/


	require "../../agenda-controle/tarefa.model.php";
	require "../../agenda-controle/tarefa.service.php";
	require "../../agenda-controle/conexao.php";

	
	$acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;
	//echo $acao;
	

	if($acao == 'inserir' ) {

		$tarefa = new Tarefa();
		$tarefa->__set('tarefa', $_POST['tarefa']);

		$conexao = new Conexao();

		$tarefaService = new TarefaService($conexao, $tarefa);
		$tarefaService->inserir();

		header('Location: nova_tarefa.php?tarefa=inserida');
	
	} else if ( $acao == 'recuperar'){

		/*echo 'chegamos ate aqui';*/

		$tarefa = new Tarefa();
		$conexao = new Conexao();

		$tarefaService = new TarefaService($conexao, $tarefa);
		$tarefas = $tarefaService->recuperar();

	} else if ($acao =='atualizar'){

		$tarefa = new Tarefa();
		$tarefa->__set('id', $_POST['id'])->__set('tarefa', $_POST['tarefa']);

		$conexao = new Conexao();

		$tarefaService = new TarefaService($conexao, $tarefa);
		if ( $tarefaService->atualizar()) {
			header('location: todas_tarefas.php');
		}
	} else if($acao == 'remover') {

		$tarefa = new Tarefa();
		$tarefa->__set('id', $_GET['id']);

		$conexao = new Conexao();
		$tarefaService = new TarefaService($conexao, $tarefa);
		$tarefaService->remover();
		header('location: todas_tarefas.php');

	} else if ($acao == 'marcarRealizada'){

		$tarefa = new Tarefa();
		$tarefa->__set('id', $_GET['id'])->__set('id_status', 2);

		$conexao = new Conexao();
		$tarefaService = new TarefaService($conexao, $tarefa);
		$tarefaService->marcarRealizada();

		header('location: todas_tarefas.php');


	}

?>