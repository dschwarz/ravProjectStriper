<?php

//functions for getting data from ravelry

//pest is a rest client
require_once(dirname(__FILE__) . "/helpers/Pest.php");
require_once(dirname(__FILE__) . "/helpers/PestJSON.php");

function getProjectData($username, $oldApiKey){
	$pest = new PestJSON('http://api.ravelry.com/projects');
	$response = $pest->get('/'.$username.'/progress.json?key='.$oldApiKey.'&status=in-progress+finished');

	$projects = $response['projects'];
	return $projects;
}

?>