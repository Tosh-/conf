<?php
/**
 * \file view.php
 * \brief Main view of an instance of Confeature
 *
 * \details You can use capabilities to display specific code.
 * \author Gautier Gramage
 * \todo Integrate main JS
 */

/** @cond */ //hide to doxygen
require_once(dirname(dirname(dirname(__FILE__))).'/config.php');
require_once(dirname(__FILE__).'/lib.php');

$id = optional_param('id', 0, PARAM_INT); // course_module ID, or
$n  = optional_param('n', 0, PARAM_INT);  // confeature instance ID - it should be named as the first character of the module

if ($id) {
    $cm         = get_coursemodule_from_id('confeature', $id, 0, false, MUST_EXIST);
    $course     = $DB->get_record('course', array('id' => $cm->course), '*', MUST_EXIST);
    $confeature  = $DB->get_record('confeature', array('id' => $cm->instance), '*', MUST_EXIST);
} elseif ($n) {
    $confeature  = $DB->get_record('confeature', array('id' => $n), '*', MUST_EXIST);
    $course     = $DB->get_record('course', array('id' => $confeature->course), '*', MUST_EXIST);
    $cm         = get_coursemodule_from_instance('confeature', $confeature->id, $course->id, false, MUST_EXIST);
} else {
    error('You must specify a course_module ID or an instance ID');
}

require_login($course, true, $cm);
$context = context_module::instance($cm->id);

add_to_log($course->id, 'confeature', 'view', "view.php?id={$cm->id}", $confeature->name, $cm->id);

/// Print the page header

$PAGE->set_url('/mod/confeature/view.php', array('id' => $cm->id));
$PAGE->set_title(format_string($confeature->name));
$PAGE->set_heading(format_string($course->fullname));
$PAGE->set_context($context);

// Output starts here
echo $OUTPUT->header();


/**********************************************************/
// Replace the following lines with you own code
echo $OUTPUT->heading('Yay! It works!');
echo format_module_intro('confeature', $confeature, $cm->id);

//Streaming a conference
if(has_capability('mod/confeature:stream', $context)){
	echo $OUTPUT->box_start();
	echo "Stream a conference !";
	echo $OUTPUT->box_end();
}

//Viewing a conference
if(has_capability('mod/confeature:watch', $context)){
	echo $OUTPUT->box_start();
	echo '<iframe width="560" height="315" src="//www.youtube.com/embed/5WXqw4vmwzk" frameborder="0" allowfullscreen></iframe>';
	echo $OUTPUT->box_end();
}
/**********************************************************/
// Finish the page
echo $OUTPUT->footer();
/** @endcond */ 