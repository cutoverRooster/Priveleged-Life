<?php

class Dbclass {

	var $result_id = NULL;
	var $result    = NULL;



	function query($query) {
	//echo $query;
		if (!$query = mysql_query($query)) echo mysql_error();
		return $query;
	}

	function insert($table, $fields)
	{
		//echo ("INSERT INTO ".DB_PREFIX.$table." (".implode(",", array_keys($fields)).") VALUES ("."'".implode("','", $fields)."'".")");
		return $this->query("INSERT INTO ".DB_PREFIX.$table." (".implode(",", array_keys($fields)).") VALUES ("."'".implode("','", $fields)."'".")");
	}

	function update($table, $values, $where){
		$where = ($where == '') ? 1 : $where;
		foreach($values as $keys => $value){
			$fields .= ", ".$keys."='".$value."'";
		}
        return $this->query("UPDATE ".DB_PREFIX.$table." SET ".substr($fields,1)." WHERE ".$where."");
	}

	function delete($table, $where){
		$where = ($where == '') ? 1 : $where;
        return $this->query("DELETE FROM ".DB_PREFIX.$table." WHERE ".$where."");
	}

	function count_all($table, $condition = ''){
	    if (!empty($table)) {
	        $condition_query = '';
            if (!empty($condition)) $condition_query = "WHERE ".$condition;
            $rowcount = mysql_fetch_object(mysql_query("SELECT COUNT(*) AS numrows FROM ".DB_PREFIX.$table." ".$condition_query));
	    } else {
            $rowcount->numrows = "Table name doesn't exitst";
	    }
		return $rowcount->numrows;
	}

	function row_count($table, $where){
		($table <> '') ? $rowcount = mysql_fetch_object(mysql_query("SELECT COUNT(*) AS numrows FROM ".DB_PREFIX.$table." WHERE ".$where."")) : $rowcount->numrows = "Table name doesn't exitst";
        return $rowcount->numrows;
	}

	function num_rows($result_id){
		if(!$result_id = mysql_num_rows($result_id)) echo mysql_error();
		return $result_id;
	}

	function data_seek($result_id,$n = 0){
		return mysql_data_seek($result_id, $n);
	}

	function fetch_assoc($result_id){
		return mysql_fetch_assoc($result_id);
	}

	function fetch_object($result_id){
		return mysql_fetch_object($result_id);
	}

	function num_fields($result_id){
		return @mysql_num_fields($result_id);
	}

	function row_object($table, $fields, $where){
		$arrfields = array();
		$result = $this->select($table, $fields, $where);
		if($row = $this->fetch_object($result)){
			foreach($fields as $value){
				$arrfields = array_merge($arrfields, explode(',', preg_replace('/([A-Z]|[a-z]|[0-9]_[_])(.*)([, ]|[,])(.*)[) ]/','', $value)));
			}
			foreach($arrfields as $val){
				$this->$val = $row->$val;
			}
		}
	}

	function row_array($table, $fields, $where){
		$arrfields = array();
		$result = $this->select($table, $fields, $where);
		if($row = $this->fetch_assoc($result)){
			foreach($fields as $value){
				$arrfields = array_merge($arrfields, explode(',', preg_replace('/([A-Z]|[a-z]|[0-9]_[_])(.*)([, ]|[,])(.*)[) ]/','', $value)));
			}
			foreach($arrfields as $val){
				$this->$val = $row[$val];
			}
		}
	}

		function select($table, $fields, $where){
		(!is_array($table) && !is_array($fields)) ? die("Incorrect format") : '';
		$this->cnt = count($table);
		while(++$i <= $this->cnt){
			$tablename = trim($table[($i-1)]);
			$arrfields = explode(',', $fields[($i-1)]);
			if(trim($fields[($i-1)]) <> ''){
				foreach($arrfields as $value){
					if(preg_match('/[^.]+\.[^.]+$/', $value)){
						$arrval = explode('.',$value);
						$fieldnames .= ",".$arrval[0].'.'.trim($arrval[1]);
					}else{
						$fieldnames .= ",".trim($value);
					}
				}
			}else{
				$fieldnames = ' * ';
			}
			$tables .= ",".$tablename;
		}
		$where = (trim($where) <> '') ? trim($where) : 1;
		 //echo ("SELECT ".substr($fieldnames,1)." FROM ".substr($tables,1)." WHERE ".$where."");
      		return $this->query("SELECT ".substr($fieldnames,1)." FROM ".substr($tables,1)." WHERE ".$where."");
	}

	function insert_id(){
		return @mysql_insert_id();
	}

	function affected_rows(){
		return @mysql_affected_rows();
	}

	function free_result($result_id){
		if(is_resource($result_id)){
			mysql_free_result($result_id);
			$result_id = FALSE;
		}
	}
    function fngetusername($user_email) {
        $this->user_name = '';
        $this->res = $this->db->select(Array('yp_registration'),Array('user_name'),"user_email='".$user_email."'");
        if($row = $this->db->fetch_object($this->res)) {
			$this->user_name = $this->strings->strip_slashes($row->user_name);
        }
        return $this->user_name;
    }


  function gettimediff()

  {
 $timezone = date_default_timezone_get();
$query="select created_on from yp_feed_detail";
$result=mysql_query($query);
while($row=mysql_fetch_array($result))
{
 $created_on=$row['created_on'];
 if (!empty($created_on)) {

        $seconds = abs(strtotime($timezone) - strtotime($created_on));
        $how_many = null;
        $of_what = null;

        // less than 1 minute
        if ($seconds < 60) {
            $how_many = $seconds;
            if ($seconds == 0) {
                $how_many = "just now";
            } else if ($seconds == 1) {
                $of_what = " S ago";
            } else {
                $of_what = " S ago";
            }
        // between one minute and one hour
        } elseif ($seconds > 60 && $seconds < 3600) {
            $how_many = floor($seconds/60);
            if ($how_many == 1) {
                $of_what = " Min ago";
            } else {
                $of_what = " Min ago";
            }
        // between one hour and 24 hours
        } elseif ($seconds > 3600 && $seconds < 86400) {
            $how_many = floor($seconds/3600);
            if ($how_many == 1) {
                $of_what = " H ago";
            } else {
                $of_what = " H ago";
            }
        // between 1 day and 1 week (7 days)
        } elseif ($seconds > 86400 && $seconds < 604800) {
            $how_many = floor($seconds/86400);
            if ($how_many == 1) {
                $of_what = " D ago";
            } else {
                $of_what = " D ago";
            }
        // betwen 1 week and 1 month approximately
        // taking there are 31,556,926 seconds in a year
        // divided by 12 months
        } elseif ($seconds > 604800 && $seconds < 2629743) {
            $how_many = floor($seconds/604800);
            if ($how_many == 1) {
                $of_what = " W ago";
            } else {
                $of_what = " W ago";
            }
        // betwen 1 month and 1 year (24 months)
        } elseif ($seconds > 2629743 && $seconds < 31556926) {
            $how_many = floor($seconds/2629743);
            if ($how_many == 1) {
                $of_what = " M ago";
            } else {
                $of_what = " M ago";
            }
        // from 1 year upwards
        } elseif ($seconds > 31556926) {
            $how_many = floor($seconds/31556926);
            if ($how_many == 1) {
                $of_what = " Yr ago";
            } else {
                $of_what = " Yrs ago";
            }
        }

        $time_diff = $how_many.'' .$of_what;
           return $time_diff;

    }
}
  }

	function getcurrenttime()
	{
	  	$query="select now() createdtime";
		$result=mysql_query($query);
		$row=mysql_fetch_row($result);

		$now=$row[0];
		return $now;
	}

}
$dbobject = new Dbclass();

class loginClass
 {
  private $dbobject;
  function __construct()
  {
  $this->dbobject = new Dbclass();
  }

 	function checklogin($user_email,$user_pwd)
	{

		if($user_email !="" and $user_pwd!="")
		{
				$user_pwd		=	md5($user_pwd);
				$this->TCN = $this->dbobject->count_all('registration','user_email="'.$user_email.'" and user_pwd="'.$user_pwd.'" ');

				if($this->TCN==0)
				{

				//login fails
				$stringData = array('Login_status'=>2);

				}
				else
				{
				//login successfull
				$stringData = array('Login_status'=>1);
				}
		}

		else
		{
		//Blank Data entered
		$stringData = array('Login_status'=>3);
		}

		return json_encode($stringData);
	}

  }

  $login=new loginClass();

  ?>