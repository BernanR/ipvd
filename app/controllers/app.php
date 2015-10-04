<?php 

include_once('app/model/banco.php');
include_once('app/helpers/base.php');

class App extends Banco
{
	public $base;

	public function __construct()
	{	
		session_start();
		$this->base = new Base();		
		$this->conectar();

	}

	public function inserir($arquivo)
	{
		$this->base->load_helper('csv');

		$csv = new Csv();
		$dados = $csv->ler($arquivo);

		//insere os dados do csv
		$i=0;


		//LIMPA A TABELA 

		$this->clear_table('vendas');

		while ($i <= count($dados)) {			
			$rs[] = $this->insert($dados[$i],'vendas');						
			$i++;
		}
		
		$this->base->set_msg('sucess',"Arquivo importando com sucesso!");
		$this->base->redir('lista');
		//return $dados;
	}

	public function get_vendas()
	{	

		$dados = $this->select_all('vendas');
		//$this->base->log($dados);

		foreach ($dados as $k => $v) {
			//recebe como campo o id da loja
			$bandeiras[$v->id_loja] = $v->id_bandeira;
		}

		//excluir os valores duplicados;
		$id_bandeiras = array_unique($bandeiras);
		//pega as bandeiras iguais		
		
		//tras os dados das bandeiras
		foreach ($id_bandeiras as $id) {

			$bandeiras[$id] = $this->select_where('vendas',"id_bandeira='".$id."'");
			
		}

		//$this->base->log($bandeiras);
		foreach ($bandeiras as $k => $v) {
			if(is_array($v)){
				$venda_total =0;
				$desconto_total =0;

				foreach ($v as $preco) {
					$venda_total += $preco->venda;
					$desconto_total += $preco->desconto;
				}	

				$bandeiras[$k]['total_venda_bandeira'] = $this->base->moeda($venda_total);
				$bandeiras[$k]['desconto_total'] = $desconto_total;
				$bandeiras[$k]['total_venda_desconto'] = $this->base->moeda($venda_total - $desconto_total);
				$bandeiras[$k]['qtd_vendida'] = count($v);
				$bandeiras[$preco->desc_bandeira]=$bandeiras[$k];
				unset($bandeiras[$k]);
			}else{
				unset($bandeiras[$k]);
			}				
		}

		

		return $bandeiras;
	}


	public function upload_arquivo()
	{

		if ( isset($_POST["submit"]) ) 
		{
			$file = $_FILES;


			if($file['file']['name'] == '')
			{
				$this->base->set_msg('error',"Selecione um arquivo csv");

			}else{

				$this->base->load_helper('csv');
				$csv = new Csv();
				
				if($csv->upload()){
					$this->inserir($file['file']['name']);
				}

				
			}
		}
	}
}
