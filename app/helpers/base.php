<?php 


class Base 
{	
	
	public function load_helper($helper=NULL)
	{
		include_once('app/helpers/'.$helper.'.php');
	}

	public function load_model($model=NULL)
	{
		include_once('app/model/'.$model.'.php');
	}
	public function redir($url)
	{
		header("location:".$url.".php");
	}

	public function moeda($valor){
		$moeda=number_format($valor,2,",",".");
		return $moeda;
 	}

 	public function set_msg($id,$msg)
 	{ 		
 		$_SESSION[$id] = $msg;
 	}

 	public function get_msg($id=NULL,$tagi="<p>",$tagf="</p>")
 	{ 	

 		if (isset($_SESSION[$id])) {
 			echo "<div class='".$id."'>";
 			echo $tagi;
 			echo $_SESSION[$id];
 			echo $tagf;
 			echo "</div>";
 			unset($_SESSION[$id]);
 		}
 		
 	}

 	public function log($var)
 	{
 		echo "<pre>";
 		print_r($var);
 		echo "</pre>";
 	}
}
