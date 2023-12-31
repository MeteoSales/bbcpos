<?php

namespace BbcPos;

class Entry {

	public $key;
	public $value;
	
    function __construct() {
	}

	public static function fromXml($xml, $tname) {

		if ($xml=="" || $xml==NULL) {
			return;
		}

		$dom = new SimpleXMLElement($xml, LIBXML_NOERROR, false);
		if (count($dom)==0) {
			return;
		}

		$response = IgfsUtils::parseResponseFields($dom);
		$entry = NULL;
		if (isset($response) && count($response)>0) {
			$entry = new Entry();
			$entry->key = (IgfsUtils::getValue($response, "key"));
			$entry->value = (IgfsUtils::getValue($response, "value"));
		}
		return $entry;
	}

}
?>
