<?php


namespace CavernaGames\Model;

use \CavernaGames\DB\Sql;
use \CavernaGames\Model;
use \CavernaGames\Mailer;

class User extends Model {

	const SESSION = "User";
	const SECRET = "CavernaGamesLPSecret";

	protected $fields = [
		"iduser", "idperson", "deslogin", "despassword", "inadmin", "dtergister", "desperson", "desemail", "nrphone"
	];

	public static function login($login, $password):User
	{

		$db = new Sql();

		$results = $db->select("SELECT * FROM tb_users WHERE deslogin = :LOGIN", array(
			":LOGIN"=>$login
		));

		if (count($results) === 0) {
			throw new \Exception("Não foi possível fazer login.");
		}

		$data = $results[0];

		if (password_verify($password, $data["despassword"])) {

			$user = new User();
			$user->setData($data);

			$_SESSION[User::SESSION] = $user->getValues();

			return $user;

		} else {

			throw new \Exception("Não foi possível fazer login.");

		}

	}

	public static function logout()
	{

		$_SESSION[User::SESSION] = NULL;

	}

	public static function verifyLogin($inadmin = true)
	{

		if (
			!isset($_SESSION[User::SESSION])
			|| 
			!$_SESSION[User::SESSION]
			||
			!(int)$_SESSION[User::SESSION]["iduser"] > 0
			||
			(bool)$_SESSION[User::SESSION]["iduser"] !== $inadmin
		) {
			
			header("Location: /admin/login");
			exit;

		}

	}
	public static function listAll()
	{
		$sql = new Sql();
		
		return $sql->select('SELECT * FROM tb_users');

	}

	public function save(){
		$sql = new Sql();

		$results = $sql->select('CALL sp_users_save(:desperson, :deslogin, :despassword, :desemail, :nrphone, :inadmin)', array(
			":desperson" => $this->getdesperson(),
			":deslogin" => $this->getdeslogin(),
			":despassword" => $this->getdespassword(),
			":desemail" => $this->getdesemail(),
			":nrphone" => $this->getnrphone(),
			":inadmin" => $this->getinadmin(),

		));

		$this->setData($results[0]);

	}

	public function delete()
	{
		$sql = new Sql();

		$sql->query("CALL sp_users_delete(:iduser)", array(
			":iduser" => $this->getiduser()
		));
	}

	public function get($iduser)
	{
			$sql = new Sql();
			$results = $sql->select("SELECT * 
			FROM tb_users 
			WHERE iduser = :iduser;
		", array(
			":iduser"=>$iduser
		));
		
;		$this->setData($results[0]);
	}

	public function update()
	{
		$sql = new Sql();

		$results = $sql->select('CALL sp_usersupdate_save(:iduser, :desperson, :deslogin, :despassword, :desemail, :nrphone, :inadmin)', array(
			":iduser" => $this->getiduser(),
			":desperson" => $this->getdesperson(),
			":deslogin" => $this->getdeslogin(),
			":despassword" => $this->getdespassword(),
			":desemail" => $this->getdesemail(),
			":nrphone" => $this->getnrphone(),
			":inadmin" => $this->getinadmin(),

		));
		
		$this->setData($results[0]);

	}

	public static function getForgot($email)
	{
		$sql = new Sql();

		$results = $sql->select("SELECT * FROM db_ecommerce.tb_users WHERE desemail=:email", array(
			":email" => $email
		));
		
		if(count($results)=== 0)
		{
			throw new \Exception("Não foi possível recuperar a senha");
		}else{

			$data = $results[0];
			$results2 = $sql->select("CALL sp_userspasswordsrecoveries_create(:iduser, :desip)", array(
				":iduser" => $data['iduser'],
				":desip"=> $_SERVER["REMOTE_ADDR"]

			));
			
			if (count($results2)===0){
				throw new \Exception("Não foi possível recuperar a senha");
			}else{
				$dataRecovery = $results2[0];
				$code = base64_encode(openssl_encrypt($dataRecovery['idrecovery'], 'aes-128-ecb', User::SECRET, OPENSSL_RAW_DATA));

			

				$link = "http://local.cavernagames.com.br/admin/forgot/reset?code=$code"; /*alterar depois*/
			
				$mailer = new Mailer($data["desemail"], $data["desperson"], "Redefinir senha da Caverna Games","forgot", array(
					"name" => $data["desperson"],
					"link" => $link
				));

				$mailer->send();

				return $data;

			}
		}
	}
	}
	

 ?>