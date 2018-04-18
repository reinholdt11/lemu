<?php
/*
   CreateToken.php
   Marketo REST API Sample Code
   Copyright (C) 2016 Marketo, Inc.
   This software may be modified and distributed under the terms
   of the MIT license.  See the LICENSE file for details.
*/
$create = new CreateToken();
$create->id = 1071;
$create->folderType = "Program";
$create->type = "text";
$create->name = "New Token - PHP";
$create->value = "This is a new token value";
print_r($create->postData());
class CreateToken{
	private $host = "https://568-CMK-482.mktorest.com";
	private $clientId = "a27d84b3-e09c-4662-9e18-37d2f7faac7d";
	private $clientSecret = "pbBMjFMFrxzIdG6khhgc6WPJhmMnpGno";
	//all params required
	public $id;//id of folder to create token in
	public $folderType;//type of folder targeted, Folder or Program
	public $type;//token type, see table in doc for acceptable types
	public $name;//name of new token
	public $value; //value of token
	
	public function postData(){
		$url = $this->host . "/rest/asset/v1/folder/" . $this->id . "/tokens.json?access_token=" . $this->getToken();
		$ch = curl_init($url);
		$requestBody = "&folderType=" . $this->folderType . "&type=" . $this->type . "&name=" . $this->name . "&value=" . $this->value;
		print_r($requestBody);
		curl_setopt($ch,  CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('accept: application/json'));
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $requestBody);
		curl_getinfo($ch);
		$response = curl_exec($ch);
		return $response;
	}
	
	private function getToken(){
		$ch = curl_init($this->host . "/identity/oauth/token?grant_type=client_credentials&client_id=" . $this->clientId . "&client_secret=" . $this->clientSecret);
		curl_setopt($ch,  CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('accept: application/json',));
		$response = json_decode(curl_exec($ch));
		curl_close($ch);
		$token = $response->access_token;
		return $token;
	}	
}