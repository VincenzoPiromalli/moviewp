<?php
/*
* ----------------------------------------------------
* @author: fr0zen
* @author URI: https://fr0zen.store
* @copyright: (c) 2022 Vincenzo Piromalli. All rights reserved
* ----------------------------------------------------
* @since 3.8.7
* 20 May 2022
*/

/*====================================*\
	HTML Minify
\*====================================*/

if ( !defined( 'ABSPATH' ) ) exit;
function moviewp_init_minify_html() {
    
	$moviewp_minify = get_option('moviewppanel_minify'); 
	if ($moviewp_minify == 1) ob_start('moviewp_minify_html_output');

}
if ( !is_admin() ) add_action( 'init', 'moviewp_init_minify_html', 1 );
function moviewp_minify_html_output($buffer) {
	if ( substr( ltrim( $buffer ), 0, 5) == '<?xml' ) return ( $buffer );
	$minify_html_comments = get_option( 'minify_html_comments' );
	$buffer = str_replace(array (chr(13) . chr(10), chr(9)), array (chr(10), ''), $buffer);
	$buffer = str_ireplace(array ('<script', '/script>', '<pre', '/pre>', '<textarea', '/textarea>', '<style', '/style>'), array ('M1N1FY-ST4RT<script', '/script>M1N1FY-3ND', 'M1N1FY-ST4RT<pre', '/pre>M1N1FY-3ND', 'M1N1FY-ST4RT<textarea', '/textarea>M1N1FY-3ND', 'M1N1FY-ST4RT<style', '/style>M1N1FY-3ND'), $buffer);
	$split = explode('M1N1FY-3ND', $buffer);
	$buffer = ''; 
	for ($i=0; $i<count($split); $i++) {
		$ii = strpos($split[$i], 'M1N1FY-ST4RT');
		if ($ii !== false) {
			$process = substr($split[$i], 0, $ii);
			$asis = substr($split[$i], $ii + 12);
			if (substr($asis, 0, 7) == '<script') {
				$split2 = explode(chr(10), $asis);
				$asis = '';
				for ($iii = 0; $iii < count($split2); $iii ++) {
					if ($split2[$iii]) $asis .= trim($split2[$iii]) . chr(10);
				}
				if ($asis) $asis = substr($asis, 0, -1);
				if ( $minify_html_comments != 'no' ) $asis = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $asis);
				$asis = str_replace(array (';' . chr(10), '>' . chr(10), '{' . chr(10), '}' . chr(10), ',' . chr(10)), array(';', '>', '{', '}', ','), $asis);
			} else if (substr($asis, 0, 6) == '<style') {
				$asis = preg_replace(array ('/\>[^\S ]+/s', '/[^\S ]+\</s', '/(\s)+/s'), array('>', '<', '\\1'), $asis);
				if ( $minify_html_comments != 'no' ) $asis = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $asis);
				$asis = str_replace(array (chr(10), ' {', '{ ', ' }', '} ', '( ', ' )', ' :', ': ', ' ;', '; ', ' ,', ', ', ';}'), array('', '{', '{', '}', '}', '(', ')', ':', ':', ';', ';', ',', ',', '}'), $asis);
			}
		} else {
			$process = $split[$i];
			$asis = '';
		}
		$process = preg_replace(array ('/\>[^\S ]+/s', '/[^\S ]+\</s', '/(\s)+/s'), array('>', '<', '\\1'), $process);
		if ( $minify_html_comments != 'no' ) $process = preg_replace('/<!--(?!\s*(?:\[if [^\]]+]|<!|>))(?:(?!-->).)*-->/s', '', $process);
		$buffer .= $process.$asis;
	}
	$buffer = str_replace(array (chr(10) . '<script', chr(10) . '<style', '*/' . chr(10), 'M1N1FY-ST4RT'), array('<script', '<style', '*/', ''), $buffer);
	return ($buffer);
}