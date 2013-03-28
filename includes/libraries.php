<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MainClass {
	public $c, $m, $p;

	function __construct(){
		$this->load = new load($this);
		if($libraries_fp = @opendir(LIBRARIES)){
			$libraries_dir = rtrim(LIBRARIES, DIRECTORY_SEPARATOR);
			while (FALSE !== ($file = readdir($libraries_fp))){
				if (strncmp($file, '.', 1) == 0){
					continue;
				}
				if(!@is_dir($libraries_dir.$file)){
					$filename = explode('.', $file);
					$name = current($filename);
					$sname = strtolower($name);
					$ext = '.'.end($filename);
					if($ext == EXT){
						$this->load->libraries( $file );
						if(!class_exists($name)){
							die("undefined class name");
						}
						//$this->$sname =& new $name($this);
                        $this->$sname = new $name($this);
					}
				}
			}
			closedir($libraries_fp);
		}

			if($view_fp = @opendir(VIEW)){
			$view_dir = rtrim(VIEW, DIRECTORY_SEPARATOR);
			while (FALSE !== ($file = readdir($view_fp))){
				if (strncmp($file, '.', 1) == 0){
					continue;
				}
				if($top_level_only == FALSE && @is_dir($view_dir.'/'.$file)){
					if(class_exists($file)){
						die("Cannot redeclare class ".$file." in ".$file.EXT);
					}
					$this->load->view ( $file.'/'.$file );
					if(!class_exists($file)){
						die("undefined class name");
					}
					$this->$file = new $file($this);
				}
			}
			closedir($view_fp);

			if(file_exists(VIEW.'common'.EXT)){
				$this->load->view ( 'common' );
				if(!class_exists('common')){
					die("undefined class name");
				}
				$this->common = new common($this);
			}
		}
	}

	function load($page){
	    if(!file_exists($page)){
    	    echo $page."<br>";
			die("unable to load the requested file");
		}
		return include_once($page);
	}

	/*function load_page(){
		$this->parent->db->connect();

		$x = explode('/', key($_GET));


		if(count($x) == 1){

			if(file_exists(VIEW.$x[0].EXT)){
				$p = $x[0];

			}else{
				foreach(array_keys(get_object_vars($this->parent)) as $key){
					if(method_exists($key, $x[0])){
						$m = $x[0];
						$c = $key;
					}
				}
			}
		}else{
			if((class_exists($x[0]) && (is_dir(VIEW.$x[0])))){
				$c = $x[0];
			}else{
				$p = $x[0];
			}
			foreach(array_keys(get_object_vars($this->parent)) as $key){
				if(method_exists($key, $x[1])){
					$m = $x[1];
				}
			}
			if($m <> ''){
				$m = $m;
			}else{
				$m = 'load';
				$p = $x[1];
			}
			if($p <> ''){
				$p = $p;
			}else{
				$p = $x[2];
			}
		}
		if(($m == 'load') && ($c <> '')){
			$_GET[c] = $c;$_GET[m] = $m;$_GET[p] = $p;
			return $this->parent->$m->view ( $c.'/'.$p );
		}else if(($m <> 'load') && ($c <> '')){
			$_GET[c] = $c;$_GET[m] = $m;$_GET[p] = $p;
			return $this->parent->$c->$m();
		}else if(($m == '') && ($c == '')){

			$p = ($p <> '') ? $p : $this->parent->files->get_name( SELF );

			$_GET[c] = $c;$_GET[m] = $m;$_GET[p] = $p;
			return $this->parent->load->view ( $p );
		}
	}
}
    */
class __construct extends MainClass{
	public $parent;

	function __construct($object){
		$this->parent = $object;

		foreach(array_keys(get_object_vars($object)) as $key){
			$this->$key = $this->parent->$key;
		}
	}
}

class load extends __construct{
	function libraries($page){
		return $this->parent->load(LIBRARIES.$page);
	}

	function view($page){

	   return $this->parent->load(VIEW.$page.EXT);
	}

	function includes($Page){
		return $this->parent->load(INCLUDES.$Page.EXT);
	}
}

$class = new MainClass();
?>