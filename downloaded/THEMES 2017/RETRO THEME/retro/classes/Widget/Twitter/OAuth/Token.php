<?php
class Widget_Twitter_OAuth_Token {
	// access tokens and request tokens
	public $key;
	public $secret;

	/**
	 * key = the token
	 * secret = the token secret
	 */
	function __construct( $key, $secret ) {
		$this->key = $key;
		$this->secret = $secret;
	}

	/**
	 * generates the basic string serialization of a token that a server
	 * would respond to request_token and access_token calls with
	 */
	function to_string() {
		return 'oauth_token=' .
		   Widget_Twitter_OAuth_Util::urlencode_rfc3986( $this->key ) .
		   '&oauth_token_secret=' .
		   Widget_Twitter_OAuth_Util::urlencode_rfc3986( $this->secret );
	}

	function __toString() {
		return $this->to_string();
	}
}
?>
