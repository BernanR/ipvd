<?php 

include_once('app/helpers/base.php');

class Csv  extends Base
{
	public function ler($arquivo=NULL)
	{

		if ($arquivo != null) {
			
			$delimitador = ';';
			$cerca = '"';
			 
			// Abrir arquivo para leitura
			$f = fopen($arquivo, 'r');

			if ($f) {
			 
			    // Ler cabecalho do arquivo
			    $cabecalho = fgetcsv($f, 0, $delimitador, $cerca);

			   //$this->log($cabecalho);
			    // Enquanto nao terminar o arquivo  

			   while (!feof($f)) {
			 
			        // Ler uma linha do arquivo
			        $linha = fgetcsv($f, 0, $delimitador, $cerca); 

			        if ($linha) {
			        	$i = 0;
				        foreach ($linha as $v) {
				        	$campo[$cabecalho[$i]] = $v;

				        	$i++;
				        }

				        $array[] = $campo;
			        }
			    }

			   // fclose($f);			   
			}

			return $array;
		}

		return false;
	}	

	function upload()
	{	
        //if there was an error uploading the file
        if ($_FILES["file"]["error"] > 0) {
            $msg =  "Ocorreu um erro: " . $_FILES["file"]["error"] . "<br />";
            $this->set_msg('error',$msg);

        }else{

             //tipo do arquivo
             $tipo = substr($_FILES["file"]["name"], -4);

            //if file already exists
            if (file_exists("uploads/" . $_FILES["file"]["name"])) {

            	$msg = "O arquivo <b>".$_FILES["file"]["name"]."</b> já existe. <a href='lista.php'>Ver dados</a>";
            	$this->set_msg('error',$msg);
            	return false;

            }elseif($tipo != ".csv"){

            	$msg = "O tipo do arquivo é inválido!";
            	$this->set_msg('error',$msg);
            	
            	return false;

            }else{

	            $storagename = $_FILES['file']['name'];

	            if (is_uploaded_file($_FILES['file']['tmp_name'])) {           
	            	move_uploaded_file($_FILES["file"]["tmp_name"], "uploads/" . $storagename);

	            	return true;
	            	//ler o arquivo csv
	            	//readfile($storagename);
	            }
	        }
        }	   
	}
}
