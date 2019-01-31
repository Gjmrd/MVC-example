<?php

namespace Controllers;

class AdminController extends Controller
{
    const LOGIN = "admin";
    const PASSWORD = "123";

    public function login()
    {
        $this->view("/loginform");
        return true;
    }

    public function auth()
    {
        if ($_POST['login'] == self::LOGIN && $_POST['password'] == self::PASSWORD) {
            $_SESSION['isAdmin'] = true;
            $_SESSION['messages'] = ["you have logged in as admin"];
            $this->redirect("/");
        }
        else {
            $_SESSION['errors'] = ["wrong credentials"];
            $this->redirect("/login");
        }
    }

    public function logout()
    {
        unset($_SESSION['isAdmin']);
        $this->redirect("/");
    }
}