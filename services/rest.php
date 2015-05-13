<?php
$target = "http://localhost/tvkabel";

class Rest {
  private $_url;
  private $_data;
  private $_method;
  private $_session;
  private $_httpHeader = array (
    "Accept: application/json",
    "Content-Type: application/json",
  );

  function __construct($url, $data, $method) {
    $this->set($url, $data, $method);
  }
  
  public function execute() {
    $response = curl_exec($this->_session);
    
    curl_close($this->_session);

    return $response;
  }
  
  public function set($url, $data, $method) {
    $this->_url = $url;
    $this->_data = $data;
    $this->_method = $method;

    $this->prepare();
  }
  
  private function prepare() {
    $this->_session = curl_init();
    
    $this->setUrl($this->_url, $this->_data, $this->_method);  
    $this->setCurlMethod($this->_method);
    
    curl_setopt($this->_session, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($this->_session, CURLOPT_HTTPHEADER, $this->_httpHeader);
  
    //set request body with json if $data is not null
    if ($this->_data != null) {
      curl_setopt($this->_session, CURLOPT_POSTFIELDS, $this->_data);
    }
  }
  
  private function setCurlMethod($method) {
    if (($method == "DELETE") || ($method == "delete")) {
      curl_setopt($this->_session, CURLOPT_CUSTOMREQUEST, $method);
    } else if (($method == "GET") || ($method == "get")) {
      curl_setopt($this->_session, CURLOPT_HTTPGET, true);
    } else if (($method == "POST") || ($method == "post")) {
     curl_setopt($this->_session, CURLOPT_POST, true);
    } else if (($method == "PUT") || ($method == "put")) {
      curl_setopt($this->_session, CURLOPT_PUT, true);
    }
  }

  private function setUrl($url, $data, $method) {
    curl_setopt($this->_session, CURLOPT_URL, $url);
    if ((($method == "GET") || ($method == "get")) && (($data != null) && ($data != ""))) {
      $url .= "?" . $data;
      curl_setopt($this->_session, CURLOPT_URL, $url);
    }
  }
}
?>
