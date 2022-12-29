<?php
	
    
	function removeSpace($data){
	return number_format((float)round(preg_replace("/\s/", "", $data)/1000, 2), 2, '.', '');
	}

	function formatDatetime($data){
		return preg_replace("/CET/", "", $data);
	}

?>