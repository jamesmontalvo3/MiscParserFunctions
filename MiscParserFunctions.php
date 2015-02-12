<?php
/** 
 * The MeetingMinutes extension provides JS and CSS to enable recording meeting
 * minutes in SMW. See README.md.
 * 
 * Documentation: https://github.com/enterprisemediawiki/MeetingMinutes
 * Support:       https://github.com/enterprisemediawiki/MeetingMinutes
 * Source code:   https://github.com/enterprisemediawiki/MeetingMinutes
 *
 * @file MeetingMinutes.php
 * @addtogroup Extensions
 * @author James Montalvo
 * @copyright © 2014 by James Montalvo
 * @licence GNU GPL v3+
 */

# Not a valid entry point, skip unless MEDIAWIKI is defined
if ( ! defined( 'MEDIAWIKI' ) ) {
	die( 'MiscParserFunctions extension' );
}

$GLOBALS['wgExtensionCredits']['parserhook'][] = array(
	'path'           => __FILE__,
	'name'           => 'MiscParserFunctions',
	'namemsg'        => 'miscparserfunctions-name',
	'url'            => 'http://github.com/jamesmontalvo3/MiscParserFunctions',
	'author'         => 'James Montalvo',
	'descriptionmsg' => 'miscparserfunctions-desc',
	'version'        => '0.1.0'
);

$GLOBALS['wgMessagesDirs']['MiscParserFunctions'] = __DIR__ . '/i18n';
$GLOBALS['wgExtensionMessagesFiles']['MiscParserFunctionsMagic'] = __DIR__ . '/Magic.php';

// Autoload for setup
$GLOBALS['wgAutoloadClasses']['MiscParserFunctions\Setup'] = __DIR__ . '/includes/Setup.php';

// Autoload for each parser function
$GLOBALS['wgAutoloadClasses']['MiscParserFunctions\Trim'] = __DIR__ . '/includes/Trim.php';
$GLOBALS['wgAutoloadClasses']['MiscParserFunctions\Count'] = __DIR__ . '/includes/Count.php';

// Setup parser functions
$GLOBALS['wgHooks']['ParserFirstCallInit'][] = 'MiscParserFunctions\Setup::setupParserFunctions';



// $ExtensionMeetingMinutesResourceTemplate = array(
// 	'localBasePath' => __DIR__ . '/modules',
// 	'remoteExtPath' => 'MeetingMinutes/modules',
// );

// $GLOBALS['wgResourceModules'] += array(

// 	'ext.meetingminutes.form' => $ExtensionMeetingMinutesResourceTemplate + array(
// 		'styles' => 'form/meeting-minutes.css',
// 		'scripts' => array( 'form/SF_MultipleInstanceRefire.js', 'form/meeting-minutes.js' ),
// 		// 'dependencies' => array( 'mediawiki.Uri' ),
// 	),

// 	'ext.meetingminutes.template' => $ExtensionMeetingMinutesResourceTemplate + array(
// 		'styles' => 'template/template.css',
// 	),

// );