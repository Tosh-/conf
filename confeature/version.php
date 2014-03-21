<?php
/**
 * Defines the version of Confeature
 *
 * This code fragment is called by moodle_needs_upgrading() and
 * /admin/index.php
 *
 */

defined('MOODLE_INTERNAL') || die();

/** \brief The current module version (Date: YYYYMMDDXX) */
$module->version   = 2013111301;

/** \brief Requires this Moodle version */
$module->requires  = 2010031900;

/** \brief Period for cron to check this module (secs) */
$module->cron      = 0;

/** \brief To check on upgrade, that module sits in correct place*/
$module->component = 'mod_confeature';
