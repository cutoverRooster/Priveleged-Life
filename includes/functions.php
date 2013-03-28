<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if(!function_exists('directory_map')){
	function directory_map($source_dir, $top_level_only = FALSE){
		if($fp = @opendir($source_dir)){
			$source_dir = rtrim($source_dir, DIRECTORY_SEPARATOR).DIRECTORY_SEPARATOR;		
			$filedata = array();			
			while (FALSE !== ($file = readdir($fp))){
				if (strncmp($file, '.', 1) == 0){
					continue;
				}				
				if($top_level_only == FALSE && @is_dir($source_dir.$file)){
					$temp_array = array();				
					$temp_array = directory_map($source_dir.$file.DIRECTORY_SEPARATOR);				
					$filedata[$file] = $temp_array;
				}else{
					$filedata[] = $file;
				}
			}			
			closedir($fp);
			return $filedata;
		}
	}
}

if(!function_exists('dir_map')){
	function dir_map($source_dir, $top_level_only = FALSE){	
		if($fp = @opendir($source_dir)){
			$source_dir = rtrim($source_dir, DIRECTORY_SEPARATOR).DIRECTORY_SEPARATOR;		
			$filedata = array();			
			while (FALSE !== ($file = readdir($fp))){
				if (strncmp($file, '.', 1) == 0){
					continue;
				}				
				if($top_level_only == FALSE && @is_dir($source_dir.$file)){
					$temp_array = array();				
					$temp_array = dir_map($source_dir.$file.DIRECTORY_SEPARATOR);				
					$filedata[$file] = $temp_array;
				}else{
					$x = explode('.', $file);
					$ext = '.'.end($x);
					if($ext == EXT){
						$filedata[] = $file;
					}
				}
			}			
			closedir($fp);
			return $filedata;
		}
	}
}

function redirect($url){
	echo "<script type='text/javascript'>window.location.href='?".$url."'</script>\n";
	exit;
}

if(!function_exists('nbs')){
	function nbs($num = 1)	{
		return str_repeat("&nbsp;", $num);
	}
}

if(!function_exists('br')){
	function br($num = 1)	{
		return str_repeat("<br />", $num);
	}
}

function log_message($level = 'error', $message, $php_error = FALSE){	
	$log_path;
	$_threshold	= 1;
	$_date_fmt	= 'Y-m-d H:i:s';
	$_enabled	= TRUE;
	$_levels	= array('ERROR' => '1', 'DEBUG' => '2',  'INFO' => '3', 'ALL' => '4');

	if ($_enabled === FALSE){return FALSE;}

	$level = strtoupper($level);
	
	if ( ! isset($_levels[$level]) OR ($_levels[$level] > $_threshold)){return FALSE;}

	$filepath = $log_path.'log-'.date('Y-m-d').EXT;
	$message  = '';
	
	if ( ! file_exists($filepath)){$message .= "<"."?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?".">\n\n";}
		
	if ( ! $fp = @fopen($filepath, FOPEN_WRITE_CREATE)){return FALSE;}

	$message .= $level.' '.(($level == 'INFO') ? ' -' : '-').' '.date($_date_fmt). ' --> '.$msg."\n";
	
	flock($fp, LOCK_EX);	
	fwrite($fp, $message);
	flock($fp, LOCK_UN);
	fclose($fp);

	@chmod($filepath, FILE_WRITE_MODE); 		
	return TRUE;
}

function mk_drawCalendar(){
		if ((!$_GET[mon]) || (!$_GET[y])){
			$mon = date("m",mktime());
			$y = date("Y",mktime());
		}else{
			$mon = $_GET[mon];
			$y = $_GET[y];
		}

		/*== get what weekday the first is on ==*/
		$tmpd = getdate(mktime(0,0,0,$mon,1,$y));
		$month = $tmpd["month"];
		$firstwday= $tmpd["wday"];
		$lastday = mk_getLastDayofMonth($mon,$y);
	?>
	<table cellpadding="2" cellspacing="1" class="calender">
	<tr><td colspan="7" bgcolor="#B4101A" height="26">
		<table cellpadding="0" cellspacing="0" border="0" width="100%">
		<tr>
        <th width="20"><a href="javascript: fnGetCalender('<?=(($mon-1)<1) ? 12 : $mon-1 ?>','<?=(($mon-1)<1) ? $y-1 : $y ?>');"><img src="images/left_arrow.gif" border="0" width="9" height="9"></a></th>
		<th><font color="#FFFFFF"><?=$month.'&nbsp;&nbsp;&nbsp;'.$y?></font></th>
		<th width="20"><a href="javascript: fnGetCalender('<?=(($mon+1)>12) ? 1 : $mon+1 ?>','<?=(($mon+1)>12) ? $y+1 : $y ?>');"><img src="images/right_arrow.gif" border="0" width="9" height="9"></a></th>
		</tr>
        </table>
	</td></tr>
	<tr><td align='center' class="tcell">Su</td><td align='center' class="tcell">M</td>
		<td align='center' class="tcell">T </td><td align='center' class="tcell">W</td>
		<td align='center' class="tcell">Th</td><td align='center' class="tcell">F</td>
		<td align='center' class="tcell">Sa</td></tr>
	<?php $d = 1;
		$wday = $firstwday;
		$firstweek = true;

		/*== loop through all the days of the month ==*/
		while ( $d <= $lastday)
		{
			/*== set up blank days for first week ==*/
			if ($firstweek) {
				echo "<tr>";
				for ($i=1; $i<=$firstwday; $i++)
				{ echo "<td><font size=2>&nbsp;</font></td>"; }
				$firstweek = false;
			}

			/*== Sunday start week with <tr> ==*/
			if ($wday==0) { echo "<tr>"; }

			/*== check for event ==*/
			echo "<td class='tcell1' align='center'>";
			if(strtotime(date('Y-m-d')) <= strtotime($y.'-'.$mon.'-'.$d)){
				echo "<a href=\"javascript: fnViewTables('$y-$mon-$d')\">$d</a>";
			}else{
				echo "<span class='tcells'>".$d."</span>";
			}
			echo "</td>\n";
			/*== Saturday end week with </tr> ==*/
			if ($wday==6) { echo "</tr>\n"; }
			$wday++;
			$wday = $wday % 7;
			$d++;
		}
	?>
	</tr></table>
	<?php
	/*== end drawCalendar function ==*/
	}

	/*== get the last day of the month ==*/
	function mk_getLastDayofMonth($mon,$year)
	{
		for ($tday=28; $tday <= 31; $tday++)
		{
			$tdate = getdate(mktime(0,0,0,$mon,$tday,$year));
			if ($tdate["mon"] != $mon)
			{ break; }
		}
		$tday--;
		return $tday;
	}
?>