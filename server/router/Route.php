<?php

class Route {
  private $method;
  private $uri;
  private $response;
  private $routeType;

  function __construct(string $method, string $uri, string $response, string $routeType) {
    $this->method = $method;
    $this->uri = $uri;
    $this->response = $response;
    $this->routeType = $routeType;
	}

  public function getMethod() {
    return $this->method;
  }

  public function getURI() {
    return $this->uri;
  }

  public function getResponse() {
    return $this->response;
  }

  public function getRouteType() {
    return $this->routeType;
  }
}
