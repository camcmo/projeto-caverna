<?php

namespace CavernaGames;

class Model
{

	private $values = [];

	public function setData($data)
	{
		//vai receber os valores do value
// Depuração para verificar os dados recebidos
	
		foreach ($data as $key => $value) {

			$this->{"set" . $key}($value);

		}

	}
	// Cria o setter dinamicamente de acordo com o método, gerando um setter para cada método
	public function __call($name, $args)
	{
		// inteligencia para verificar se é um getter ou setter, para isso usa-se o métodos de string
		$method = substr($name, 0, 3);
		$fieldName = substr($name, 3, strlen($name));


			switch ($method) {

				case "get":
					return (isset($this->values[$fieldName])) ? $this->values[$fieldName] : NULL ; ///retorna o fieldname
					break;

				case "set": //os valores que foram passados no atributo irão entrar no fieldname
					$this->values[$fieldName] = $args[0];
					break;

			}

		

	}

	public function getValues()
	{

		return $this->values;

	}

}
?>