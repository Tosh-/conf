<?php

// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Internal library of functions for module confeature
 *
 * All the confeature specific functions, needed to implement the module
 * logic, should go here. Never include this file from your lib.php!
 *
 * @package    mod_confeature
 * @copyright  2011 Your Name
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

/**
 * Does something really useful with the passed things
 *
 * @param array $things
 * @return object
 */
function confeature_api_login() {
	$url = 'http://server.com/api/user/login'; //TODO Modify with real path
	$data = array('username' => '123dudu', 'password' => '123dudu');//TODO Modify with logs in an other conf file
	$options = array(
		'http' => array(
			'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
			'method'  => 'POST',
			'content' => http_build_query($data),
		),
	);
	$context  = stream_context_create($options);
	$json = file_get_contents($url, false, $context);
	$result = json_decode($json);
	var_dump($result);
    return true;
}

function confeature_api_logout() {
	$url = 'http://server.com/api/user/logout'; //TODO Modify with real path
	$data = array();
	$options = array(
		'http' => array(
			'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
			'method'  => 'POST',
			'content' => http_build_query($data),
		),
	);
	$context  = stream_context_create($options);
	$json = file_get_contents($url, false, $context);
	$result = json_decode($json);
	var_dump($result);
	return true;
}

function confeature_api_create() {
	$url = 'http://server.com/api/conference/create'; //TODO Modify with real path
	$data = array('title' => 'My title',//TODO Modify with parameters
				  'description' => 'My description',
				  'maxSpeakers' => '5',
				  'maxViewers' => '100',
				  'maxResolution' => '1080',
				  'timerToggle' => '0',//TODO choose ending toggle choice for Moodle
				  'inactivityToggle' => '1',
				  'endingHourToggle' => '0',
				  'noSpeakersToggle' => '0',
				  'timerDuration' => '120',
				  'inactivityDuration' => '20',
				  'privacy' => 'public',
				  'endingHour' => '2014-12-31 00:00:00');
	$options = array(
		'http' => array(
			'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
			'method'  => 'POST',
			'content' => http_build_query($data),
		),
	);
	$context  = stream_context_create($options);
	$json = file_get_contents($url, false, $context);
	$result = json_decode($json);
	var_dump($result);
    return true;
}
