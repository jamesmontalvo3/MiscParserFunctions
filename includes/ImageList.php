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

class ImageList extends ParserFunctionHelper {


	public function __construct ( \Parser &$parser ) {

		parent::__construct(
			$parser,
			'image_list',
			array( 'images' => '' ),
			array( 'max height' => '' )
		);

	}

	public function render ( \Parser &$parser, $params ) {

		$imageLines = explode( "\n", $params['images'] );

		$maxHeight = $params['max height'];
		if ( $maxHeight === '' ) {
			$mwImageSize = "150x150px";
			$extImageHeight = '';
			$thumbHeight = 150;
		}
		else {
			$mwImageSize = "x{$maxHeight}px";
			$extImageHeight = "style='height:{$maxHeight}px;'";
			$thumbHeight = $maxHeight;
		}

		$output = '<ul class="gallery">';

		$ioIDs = array();

		foreach( $imageLines as $imageLine ) {

			$imgArr = explode( '##', $imageLine );

			$img = trim( $imgArr[0] );
			if ( count($imgArr) > 1 ) {
				$caption = trim( $imgArr[1] );
			}

			$output .= '<li class="gallerybox" style="background-color:transparent;border-color:transparent;">'
				. '<div class="io-thumb io-thumb-left">'
					. '<table style="background-color:#f9f9f9;">'
						. '<tr><td style="text-align:center;">';

			if ( strpos( $img, 'File:') === 0 ) {
				
				$filepath = '{{filepath:' . str_replace('File:', '', $img) . '}}';

				$output .= "[[$img|frameless|border|$mwImageSize|link=$filepath]]"
					. "<br />"
					. "[[:$img|Info Page]]";
		
			}
			else {

				$ioHiRes = self::ioLink( $img );
				$ioThumb = self::ioLink( $img, $thumbHeight );
				$ioIDs[] = $img;

				$output .= "<span class='plainlinks'>[$ioHiRes <img src='$ioThumb' class='thumbimage' $extImageHeight/>]</span>"
					. "<br />[$ioHiRes $img]";

			}

			$output .= "</td></tr><tr><td style='text-align:center'>$caption</td></tr></table></div></li>";

		}

		$output .= '</ul>';

		return $output;

	}

	public function ioLink ( $ioID, $size=false ) {
		$size = $size ? intval( $size ) : 10000;

		if ( $size < 151 ) {
			$quality = 'thum';
		}
		else if ( $size < 435 ) {
			$quality = 'lores';
		}
		else {
			$quality = 'hires';
		}

		return "http://io.jsc.nasa.gov/photos/10032/$quality/$ioID.jpg";
	}

// 	public function getHeightParams ( $maxHeight ) {

// 		global $egImageListUrlQualities;

// 		if ( $maxHeight === '' ) {
// 			$mwImageSize = "150x150px";
// 			$extImageHeight = "";
// 		else {
// 			$mwImageSize = "x{$maxHeight}px";
// 			$extImageHeight = "style='height:{$maxHeight}px;'";
// 		}


// $GLOBALS['egImageListUrlPattern'] = 'http://io.jsc.nasa.gov/photos/10032/$2/$1.jpg';
// $GLOBALS['egImageListUrlQualities'] = array(
// 	150 => 'thum',
// 	435 => 'lores',
// 	2000 => 'hires',
// );


// 	}

}