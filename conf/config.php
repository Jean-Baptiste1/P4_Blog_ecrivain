<?php

class config {

    private $server = "mysql:host=localhost;dbname=p4_livre;charset=UTF8";
    private $user = "root";
    private $pass = "";

     /**
     * @return string
     */
    public function getServer(): string
    {
        return $this->server;
    }

    /**
     * @return string
     */
    public function getUser(): string
    {
        return $this->user;
    }

    /**
     * @return string
     */
    public function getPass(): string
    {
        return $this->pass;
    }
}

