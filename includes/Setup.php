<?php
/**
 *
 * @addtogroup Extensions
 * @author James Montalvo
 * @copyright © 2014 by James Montalvo
 * @licence GNU GPL v3+
 */

namespace MiscParserFunctions;

class Setup {

	/**
	* Handler for ParserFirstCallInit hook; sets up parser functions.
	* @see http://www.mediawiki.org/wiki/Manual:Hooks/ParserFirstCallInit
	* @param $parser Parser object
	* @return bool true in all cases
	*/
	static function setupParserFunctions ( &$parser ) {

		$trim = new Trim( $parser );
		$trim->setupParserFunction();

		$count = new Count( $parser );
		$count->setupParserFunction();

		$imageList = new ImageList( $parser );
		$imageList->setupParserFunction();

		$diff3 = new Diff3( $parser );
		$diff3->setupParserFunction();

		// always return true
		return true;

	}

}