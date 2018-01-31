<?php

namespace Service;

use \Entity\User;

class UserService
{
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

    public function logoutUser(){
        session_destroy();
    }

    public function isConnected(){
        if (isset($_SESSION['user'])) {
            return true;
        } else {
            return false;
        }
    }
}