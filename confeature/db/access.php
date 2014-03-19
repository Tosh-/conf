<?php
/**
 * \file access.php
 * \brief Capability definitions for the confeature module
 *
 * \details The capabilities are loaded into the database table when the module is
 * installed or updated. Whenever the capability definitions are updated,
 * the module version number should be bumped up.
 *
 * The system has four possible values for a capability:
 * CAP_ALLOW, CAP_PREVENT, CAP_PROHIBIT, and inherit (not set).
 *
 *
 * The variable name for the capability definitions array is $capabilities
 */

defined('MOODLE_INTERNAL') || die();

/**
 * \brief Array of Confeature capabilities
 * \details Confeature module uses 3 capabilities :<br />
 * <ul>
 * <li>mod/confeature:addinstance : describe who is allowed to add an instance and so to create a conference.</li>
 * <li>mod/confeature:stream : describe who is allowed to stream in a conference.</li>
 * <li>mod/confeature:watch : describe who is allowed to watch a conference.</li>
 * </ul>
 */
$capabilities = array(

	'mod/confeature:addinstance' => array(
			'riskbitmask' => RISK_CONFIG,
	
			'captype' => 'write',
			'contextlevel' => CONTEXT_COURSE,
			'archetypes' => array(
				'editingteacher' => CAP_ALLOW,
				'manager' => CAP_ALLOW,
				'coursecreator' => CAP_ALLOW,
				'manager' => CAP_ALLOW
			),
	),

    'mod/confeature:stream' => array(
        'captype' => 'read',
        'contextlevel' => CONTEXT_COURSE,
        'archetypes' => array(
            'teacher' => CAP_ALLOW,
            'editingteacher' => CAP_ALLOW,
			'manager' => CAP_ALLOW,
			'coursecreator' => CAP_ALLOW,
            'manager' => CAP_ALLOW
        )
    ),

    'mod/confeature:watch' => array(
        'captype' => 'read',
        'contextlevel' => CONTEXT_COURSE,
        'archetypes' => array(
            'student' => CAP_ALLOW,
			'teacher' => CAP_ALLOW,
            'editingteacher' => CAP_ALLOW,
			'manager' => CAP_ALLOW,
			'coursecreator' => CAP_ALLOW,
            'manager' => CAP_ALLOW
        )
    ),
);

