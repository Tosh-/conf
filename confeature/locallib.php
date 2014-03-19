<?php
/**
 * \file locallib.php
 * \brief Internal library of functions for Confeature Moodle
 *
 * \details All the Confeature API specific functions are implemented here. For more details on API
 * see API specific documentation.
 * \author Gautier Gramage
 * \todo Never include this file from your lib.php!
 * 
 */

defined('MOODLE_INTERNAL') || die();

require_once($CFG->dirroot.'/mod/confeature/config.php');

/** \brief Constant defining the cookie file to be used */
define("COOKIE_FILE", $CFG->dirroot.'/mod/confeature/cookie.txt'); 

/**
 * \brief Login function to connect to Confeature API
 * \details Store cookies in cookie.txt to keep session logged.<br />
 * Use connection details stored in config.php
 * \return boolean Connection success (\a true) or failure (\a false)
 * \todo return conditions
 */
function confeature_api_login() {
	$url = constant('CONFEATURE_API_URL').'/user/login';
	
	// CURL
	$curl = curl_init();
	curl_setopt($curl, CURLOPT_POST, 1);
	
	curl_setopt($curl, CURLOPT_POSTFIELDS,"username=".constant('CONFEATURE_API_USERNAME')."&password=".constant('CONFEATURE_API_PASSWORD'));
	curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
	curl_setopt($curl, CURLOPT_URL, $url);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($curl, CURLOPT_HTTPHEADER, array(
													'Accept: application/json',
													'Content-Length: '.strlen("username=".constant('CONFEATURE_API_USERNAME')."&password=".constant('CONFEATURE_API_PASSWORD'))
												)
				);
	curl_setopt($curl, CURLOPT_COOKIESESSION, TRUE); //set on sessions
	curl_setopt ($curl, CURLOPT_COOKIEJAR, COOKIE_FILE); //open cookie in write mode
	
	 $json = curl_exec($curl);	
	 curl_close($curl);
	var_dump($json);
	 $result = json_decode($json);
	var_dump($result);
	
	
	return true;
}
/**
 * \brief Logout function to disconnect from Confeature API
 * \details Use cookies in cookie.txt.
 * \return boolean Disconnection success (\a true) or failure (\a false)
 * \todo return conditions
 */
function confeature_api_logout() {
	$url = constant('CONFEATURE_API_URL').'/user/logout';
	// CURL
	//$curl = curl_init();
	curl_setopt($curl, CURLOPT_POST, 1);
	
	
		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array(
														'Accept: application/json'
													)
					);
		curl_setopt ($ch, CURLOPT_COOKIEFILE, COOKIE_FILE);	//open cookie in read only mode	
		
	 $json = curl_exec($curl);	
	 curl_close($curl);
	var_dump($json);
	 $result = json_decode($json);
	var_dump($result);
	
	
	return true;
}

/**
 * \brief Create a conference via Confeature API
 * \details It creates a conference with the parameters of the formulary<br />
 * Use cookies in cookie.txt
 * \return API \a response in an array
 * \todo use formular to change values in the POSTFIELDS
 */
function confeature_api_create() {
	$url = constant('CONFEATURE_API_URL').'/conference/create'; //TODO Modify with real path
	// CURL
	$curl = curl_init();
	curl_setopt($curl, CURLOPT_POST, 1);
	
	curl_setopt($curl, CURLOPT_POSTFIELDS,"title=Title&".
											"description=Description&".
											"maxSpeakers=5&".
											"maxViewers=100&".
											"maxResolution=1080&".
											"timerToggle=0&".
											"inactivityToggle=1&".
											"endingHourToggle=0&".
											"noSpeakersToggle=0&".
											"timerDuration=120&".
											"inactivityDuration=20&".
											"privacy=public&".
											"endingHour=2014-12-31 00:00:00");
	curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
	curl_setopt($curl, CURLOPT_URL, $url);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt ($curl, CURLOPT_COOKIEFILE, COOKIE_FILE);	
	curl_setopt($curl, CURLOPT_HTTPHEADER, array(
													'Accept: application/json',
													'Content-Length: '.strlen("title=Title&".
																				"description=Description&".
																				"maxSpeakers=5&".
																				"maxViewers=100&".
																				"maxResolution=1080&".
																				"timerToggle=0&".
																				"inactivityToggle=1&".
																				"endingHourToggle=0&".
																				"noSpeakersToggle=0&".
																				"timerDuration=120&".
																				"inactivityDuration=20&".
																				"privacy=public&".
																				"endingHour=2014-12-31 00:00:00")
												)
				);
	
	 $json = curl_exec($curl);	
	 curl_close($curl);
	var_dump($json);
	 $result = json_decode($json);
	var_dump($result);
	return true;
}
