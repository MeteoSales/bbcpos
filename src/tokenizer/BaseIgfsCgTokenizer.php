<?php

namespace bbcpos\tokenizer;

use bbcpos\Exception;
use bbcpos\IgfsUtils;
use bbcpos\BaseIgfsCg;

abstract class BaseIgfsCgTokenizer extends BaseIgfsCg {

	public $shopID; // chiave messaggio

	function __construct() {
		parent::__construct();
	}

	protected function resetFields() {
		parent::resetFields();
		$this->shopID = NULL;
	}

	protected function checkFields() {
		parent::checkFields();
		if ($this->shopID == NULL || "" == $this->shopID)
			throw new IgfsMissingParException("Missing shopID");
	}

	protected function buildRequest() {
		$request = parent::buildRequest();
		$request = $this->replaceRequest($request, "{shopID}", $this->shopID);
		return $request;
	}

	protected function getServicePort() {
		return "TokenizerGatewayPort";
	}

}

?>
