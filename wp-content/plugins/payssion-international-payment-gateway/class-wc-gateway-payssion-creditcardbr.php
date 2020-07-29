<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require_once( 'class-wc-gateway-payssion.php' );

/**
 * Payssion 
 *
 * @class 		WC_Gateway_Payssion_CreditCardbr
 * @extends		WC_Payment_Gateway
 * @author 		Payssion
 */
class WC_Gateway_Payssion_CreditCardbr extends WC_Gateway_Payssion {
	public $title = 'Brasil Credit Card';
	protected $pm_id = 'creditcard_br';
}