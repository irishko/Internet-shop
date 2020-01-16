<?php


class CabinetController
{

    public function actionIndex()
    {
        $userId = User::checkLogged();

        echo "USERID => " . $userId;

        require_once (ROOT . '/views/cabinet.php');

        return true;
    }

    public function actionEdit()
    {
        $userId = User::checkLogged();

        $user = User::checkUserById($userId);
        echo "NAME=> ".$user['name'];
        $password = $user['password'];
        $name = $user['name'];
        $secpas = '';
        $oldpas = '';

        $result = false;

        if (isset($_POST['submit'])) {
            $password = $_POST['password'];
            $secpas = $_POST['secpas'];
            $oldpas = $_POST['oldpas'];
            $name = $_POST['name'];

            $errors = false;

            if (!($oldpas == $user['password'])) {
                $errors[] = 'Неверный пароль';
            }

            if (!User::checkName($name)) {
                $errors[] = 'Имя не должно быть короче 2-х символов';
            }

            if (!User::checkPassword($password)) {
                $errors[] = 'Пароль не должен быть короче 6-ти символов';
            }

            if (!($secpas == $password)) {
                $errors[] = 'Разные пароли';
            }

            if ($errors == false) {
                $result = User::edit($userId, $name, $password);
            }
        }

        require_once(ROOT . '/views/edit.php');

        return true;
    }


}
