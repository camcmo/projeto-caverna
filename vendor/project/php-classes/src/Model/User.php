<?php


namespace CavernaGames;

use \CavernaGames\DB\Sql;
use \CavernaGames\Model;

class User extends Model{
    

    public static function login($login, $password)
    {
        $sql = new Sql();

        $results = $sql->select("SELECT * FROM tb_users WHERE deslogin = :LOGIN" , array (
            ":LOGIN" => $login
        ));

        if (count($results) === 0)
        {
            throw new \Exception("Usuário inexistente ou senha inválida.");
        }

        $data = $results[0]; //atribui o valor que achou no banco


        if (password_verify($password, $data["despassword"]) === true)

        {
            $user = new User(); //atribui o user se existir o usuario

            $user->setData($data);
            
        }else{
            throw new \Exception("Usuário inexistente ou senha inválida.");
        }
    }
}
?>