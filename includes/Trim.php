<?php
/**
 *
 * @addtogroup Extensions
 * @author James Montalvo
 * @copyright © 2014 by James Montalvo
 * @licence GNU GPL v3+
 */

namespace MiscParserFunctions;
use ParserFunctionHelper\ParserFunctionHelper;

class Trim extends ParserFunctionHelper {


	public function __construct ( \Parser &$parser ) {

		parent::__construct(
			$parser,
			'trim',
			array( 'content' => '' ),
			array()
		);

	}

	public function render ( \Parser &$parser, $params ) {
		return trim( $params[ 'content' ] );
	}

}