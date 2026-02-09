<?php

abstract class BaseComponent {

    protected App      $app;
	protected Database $db;
    protected Request  $request;
    
    public function __construct() {
        $this->app = Container::App();
		$this->db = Container::Database();
        $this->request = Container::Request();
    }

}