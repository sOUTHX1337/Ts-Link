<?php require_once('ts/libraries/TeamSpeak3/TeamSpeak3.php');
// Textfeld = $_POST["Inhalt"]
// In Zeile 17 Die Gruppe anpassen!
	$server = array( 
		"tsip" => "TSIP",
		"tsport" => "TSPORT",
		"ts_query_admin" => "Benutzername",
		"ts_query_password" => "Password",
		"ts_query_port" => "10011",
		"ts_query_user_nick" => "BotName"
	);
	try {
		TeamSpeak3::init();
		$ts3_VirtualServer = TeamSpeak3::factory("serverquery://".$server["ts_query_admin"].":".$server["ts_query_password"]."@".$server["tsip"].":".$server["ts_query_port"]."/?server_port=".$server["tsport"]."&nickname=".$server["ts_query_user_nick"]."");
		
		$client = $ts3_VirtualServer->clientFindDb($_POST["Inhalt"], true);
		if( $ts3_VirtualServer->serverGroupClientAdd(Gruppe, $client[0]) )
			echo "Dein Rank wurde erfolgreich geändert!";
		
	} catch(Exception $e) {
		echo "Fehler!<br/>ErrorID: <b>". $e->getCode() ."</b>; Error Message: <b>". $e->getMessage() ."</b>;";
	}
?>
