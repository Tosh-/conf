<?php
/**
 * \file mod_form.php
 * \brief File that defines the view to configure a Confeature instance.
 * \details This form is called when the user wants to create or update a conference.
 * It uses the standard core Moodle formslib. For more info about them, please
 * visit: http://docs.moodle.org/en/Development:lib/formslib.php
 * \sa confeature_add_instance() confeature_update_instance()
 * \todo Add parameters and learn how to get them in confeature_add_instance()
 */

defined('MOODLE_INTERNAL') || die();

require_once($CFG->dirroot.'/course/moodleform_mod.php');

/**
 * \class mod_confeature_mod_form
 * \brief This class defines the form for adding or editing a Confeature instance.
 * \sa To understand Moodle forms and to add options, you should visit http://docs.moodle.org/en/Development:lib/formslib.php
 */
class mod_confeature_mod_form extends moodleform_mod {

    /**
     * Defines forms elements
     */
    public function definition() {

        $mform = $this->_form;

        //-------------------------------------------------------------------------------
        // Adding the "general" fieldset, where all the common settings are showed
        $mform->addElement('header', 'general', get_string('general', 'form'));

        // Adding the standard "name" field
        $mform->addElement('text', 'name', get_string('confeaturename', 'confeature'), array('size'=>'64'));
        if (!empty($CFG->formatstringstriptags)) {
            $mform->setType('name', PARAM_TEXT);
        } else {
            $mform->setType('name', PARAM_CLEAN);
        }
        $mform->addRule('name', null, 'required', null, 'client');
        $mform->addRule('name', get_string('maximumchars', '', 255), 'maxlength', 255, 'client');
        $mform->addHelpButton('name', 'confeaturename', 'confeature');

        // Adding the standard "intro" and "introformat" fields
        $this->add_intro_editor();

        //-------------------------------------------------------------------------------
        // Adding the rest of confeature settings, spreeading all them into this fieldset
        // or adding more fieldsets ('header' elements) if needed for better logic
        //$mform->addElement('static', 'label1', 'confeaturesetting1', 'Your confeature fields go here. Replace me!');

        $mform->addElement('header', 'settings', 'Settings');
		$choices[0]=1080;
		$choices[1]=720;
		$choices[2]=480;
		$choices[3]=260;
        $mform->addElement('select', 'max_quality', 'Maximum quality', $choices);

        //-------------------------------------------------------------------------------
        // add standard elements, common to all modules
        $this->standard_coursemodule_elements();
        //-------------------------------------------------------------------------------
        // add standard buttons, common to all modules
        $this->add_action_buttons();
    }
}
