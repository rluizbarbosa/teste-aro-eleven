<?php 

namespace Teste;

class Telephone extends Contact {

	private $phones;
	private $sql;

	protected $fields = [
		"idPhone",
		"idContact",
		"numberPhone",
		"createDate"
	];

	function __construct()
	{
		$this->sql = new Sql();
	}

	public static function getPhones($sql, $idContact)
	{

		$data = $sql->select("SELECT p.* FROM phones p WHERE p.idContact = :idContact", array(
			':idContact' => $idContact
		));

		$phones = [];

		foreach ($data as $p) {

			if ($p !== NULL && $p !== '') {
				$phone = new Telephone();
				$phone->setData($p);
				$phones[] = $phone->getValues();
			}
		}

		return $phones;
	}

	public function save()
	{

		$this->sql->query("INSERT INTO phones (numberPhone, idContact) VALUES (:numberPhone, :idContact)", array(
			":numberPhone" 	=>	$this->getnumberPhone(),
			":idContact"	=>	$this->getidContact()
		));

		return true;
	}

	public function deleteAll()
	{

		$this->sql->query("DELETE FROM phones WHERE idContact = :idContact", array(
			":idContact" 	=>	$this->getidContact()
		));
	}
}