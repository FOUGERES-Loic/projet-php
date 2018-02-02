<?php

namespace Service;

use \Entity\User;
use \Repository\RepositoryFactory;

class UserService
{
    protected $listeUsers = [];
    /**
     * UserService constructor.
     */
    public function __construct()
    {
        $userRepo = RepositoryFactory::buildRepository(RepositoryFactory::USER);

        $this->listeUsers = $userRepo->getAll();
    }

    public function validateUser($listeUsers, User $user){
        /** @var User $test */
        foreach ($listeUsers as $test) {
            if ($test->getLogin() == $user->getLogin()
                && $test->getPassword() == $user->getPassword()) {
                $_SESSION['user'] = $user;
                return true;
            }
        }
        return false;
    }

    public function loginUser($login, $password)
    {
        foreach ($this->listeUsers as $test) {
            if ($test->getLogin() == $login
                && $test->getPassword() == $password) {
                $_SESSION['user'] = $test;
                return true;
            }
        }
        return false;
    }

    public function logoutUser(){
        if (isset($_SESSION['user'])) {
            unset($_SESSION['user']);
        }
    }

    public function isConnected(){
        return isset($_SESSION['user']);
    }
}