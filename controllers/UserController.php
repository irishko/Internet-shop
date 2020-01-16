<?php

class UserController
{

    public function actionRegister()
    {
        $name = '';
        $email = '';
        $password = '';
        $result = false;

        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            
            $errors = false;
            
            if (!User::checkName($name)) {
                $errors[] = 'Имя не должно быть короче 2-х символов';
            }
            
            if (!User::checkEmail($email)) {
                $errors[] = 'Неправильный email';
            }
            
            if (!User::checkPassword($password)) {
                $errors[] = 'Пароль не должен быть короче 6-ти символов';
            }
            
            if (User::checkEmailExists($email)) {
                $errors[] = 'Такой email уже используется';
            }
            
            if ($errors == false) {
                $result = User::register($name, $email, $password);
            }

        }


        require_once(ROOT . '/views/register.php');

        return true;
    }

    public function actionLogin()
    {
        $password = '';
        $name = '';

        if (isset($_POST['register'])) {
            header("Location: /user/register/");
        }

        if (isset($_POST['submit']))
        {
            $password = $_POST['password'];
            $name = $_POST['name'];

            $errors = false;

            if (!User::checkName($name)) {
                $errors[] = 'Имя не должно быть короче 2-х символов';
            }

            if (!User::checkPassword($password)) {
                $errors[] = 'Пароль не должен быть короче 6-ти символов';
            }

            $userId = User::checkUserData($name, $password);

            if ($userId == false) {
                $errors[] = 'User not exist';
            } else {
                User::auth($userId);

                header("Location: /cabinet/");
            }

        }

        require_once(ROOT . '/views/login.php');

        return true;
    }

    public function actionLogout() {

        unset($_SESSION['user']);
        header("Location: /");

    }
}
