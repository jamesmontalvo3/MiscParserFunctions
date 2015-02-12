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

class Count extends ParserFunctionHelper {


	public function __construct ( \Parser &$parser ) {

		parent::__construct(
			$parser,
			'count',
			array( 'subject' => '', 'substring' => '' ),
			array()
		);

	}

	public function render ( \Parser &$parser, $params ) {
		return substr_count( $params['subject'], $params['substring'] );
	}

}