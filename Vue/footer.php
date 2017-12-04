<?php
echo '<aside>';
echo '<h1>Glossaire</h1>';
echo '<dl>';
echo '<dt>Lorem</dt>';
echo '<dd>ipsum dolor sit amet</dd>';
echo '</dl>';
echo '</aside>';
echo '</section>';
echo '</main>';
echo '<footer>';
		echo '<address>Auteur: Anthony Cargnino</address>';
	    echo '<script>';
        echo '$(document).ready(function() {';
		echo '$(\'aside:first\')';
			echo '.hide(2000)';
        echo '});';
		echo 'setTimeout(function(){ $(\'.navbar\').slideUp(\'slow\') }, 500);';
		echo 'setTimeout(function(){ $(\'.navbar\').slideDown(\'slow\') }, 1000);';
		echo 'setTimeout(function(){ $(\'img\').fadeOut(\'slow\') }, 2500)';
    echo '</script>';
echo '</footer>';
echo '</main>';	
echo '</body>';
echo'</html>';
?>
