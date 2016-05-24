<?php
	if(file_exists(MC_ROOT.'/parts/breadcrumb/breadcrumb-'.$page.'.php')){
		echo '<div class="animate-dropdown">';
		require MC_ROOT.'/parts/breadcrumb/breadcrumb-'.$page.'.php';
		echo '</div>';
	}
?>