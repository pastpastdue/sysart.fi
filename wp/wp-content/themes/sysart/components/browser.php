<?php
/**
 * Detect the Browser
 */
function dlf_ie() {
	$ie_version = '';

	if ( strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE 6.') !== false ) {
		$ie_version = 'ie6';
	} elseif ( strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE 7.') !== false ) {
		$ie_version = 'ie7';
	} elseif ( strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE 8.') !== false ) {
		$ie_version = 'ie8';
	} elseif ( strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE 9.') !== false ) {
		$ie_version = 'ie9';
	} elseif ( strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE 10.') !== false ) {
		$ie_version = 'ie10';
	}

	return $ie_version;
}

function dlf_ltie10() {
	$ie_version = dlf_ie();
	$lt = '';
	if ( $ie_version == 'ie6' || $ie_version == 'ie7' || $ie_version == 'ie8' || $ie_version == 'ie9' ) {
		$lt = 'ltie10';
	} else {
		$lt = false;
	}
	return	$lt;
}

function dlf_ltie9() {
	$ie_version = dlf_ie();
	$lt = '';
	if ( $ie_version == 'ie6' || $ie_version == 'ie7' || $ie_version == 'ie8' ) {
		$lt = 'ltie9';
	} else {
		$lt = false;
	}
	return	$lt;
}

function dlf_ltie8() {
	$ie_version = dlf_ie();
	$lt = '';
	if ( $ie_version == 'ie6' || $ie_version == 'ie7' ) {
		$lt = true;
	} else {
		$lt = false;
	}
	return	$lt;
}

function dlf_ltie7() {
	$ie_version = dlf_ie();
	$lt = '';
	if ( $ie_version == 'ie6' ) {
		$lt = 'ltie7';
	} else {
		$lt = false;
	}
	return	$lt;
}


class Browser {
  public static function isIe() {
    return dlf_ie();
  }
}
