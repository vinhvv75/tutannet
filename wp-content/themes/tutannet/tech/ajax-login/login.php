<?php 

    if(is_user_logged_in()) {
	    include "in.php";		
	} else {
        include "out.php";
	}

?>