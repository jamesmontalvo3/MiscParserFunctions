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

class Diff3 extends ParserFunctionHelper {


	public function __construct ( \Parser &$parser ) {

		parent::__construct(
			$parser,
			'diff3',
			array(
				'original' => '',
				'change1' => '',
				'change2' => '',
				'expected' => '',
			),
			array()
		);

	}

	public function render ( \Parser &$parser, $params ) {
		$ori = $params['original'];
		$ch1 = $params['change1'];
		$ch2 = $params['change2'];
		$exp = $params['expected'];


		$ok = \wfMerge( $ori, $ch1, $ch2, $result );

		if ( !$ok ) {
			return "<span style='color:red;'>FAIL</span>";
		}

		if ( !$result ) {
			return "<span style='color:red;'>FAIL</span>";
		}

		// removing whitespace at the beginning and end shouldn't matter
		$result = trim( $result );
		$exp = trim( $exp );

		if ( $result != $exp ) {
			// $out = 'Actual Result:<pre>' . self::var_dump( $result ) . '</pre>';
			// $out .= 'Expected Result:<pre>' . self::var_dump( $exp ) . '</pre>';
			$diff = wfDiff( $result, $exp );
			return "<span style='color:red;'>FAIL</span>\n\nDifference:<pre>$diff</pre>";
		}

		return "<span style='color:green;'>PASS</span>";

	}

}