<?php
// User.php

class User
{
    private $username;
    private $email;

    public function __construct($username, $email)
    {
        $this->username = $username;
        $this->email = $email;
    }

    public function getContactInfo()
    {
        return "User {$this->username} can be contacted at {$this->email}.";
    }
}
