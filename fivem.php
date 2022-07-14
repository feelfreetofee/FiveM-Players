<?php
  // Start Config
	$ip = 'timerp.eu.org'; // Server IP
	$locale1 = 'Jugadores conectados'; // Text displayed if no users to list
  // End Config

	// Downloads status

	$url = 'https://fivem.fail/server/server.php?ip='.$ip;

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);

	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

	// Blindly accept the certificate
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);

	$response = curl_exec($ch);
	curl_close($ch);
	
	// Print result
	
	preg_match_all('/right">(.*?)<\/div/s', $response, $count);
	preg_match('/<div class="tree_item"(.*?)<div class="header_footer"/s', $response, $players);
	
	$mana = preg_replace('/No Players Online/', '', $players[1]);

	echo('<div class="players_item">'.$locale1.$count[1][3].'</div><div class="tree_item"' . $mana);
	?>
