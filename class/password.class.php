<?php

/**
*        Класс генерации хэша и проверки пароля
*
*        $get_pass - Переменная пароля (данные от пользователя)
*        $hash - Сгенерированный хэш
*
*        $pw = new password();
*
*        $hash = $pw->gen($get_pass); // Генерация хэша (hash/false)
*
*        $check = $pw->check("123543",$hash); // Сверка хэша (true/false)
*
*/

class password
{

    function check($password,$hash,$salt)
    {
        //$result = password_verify($password, $hash);
        
        $result = false;
        //$cryptPass = md5(md5($salt).md5($postPass)
        $pw = md5(md5($salt).md5($password));
        if ($pw == $hash) {
            $result = true;
        }

        return $result;
    }
}