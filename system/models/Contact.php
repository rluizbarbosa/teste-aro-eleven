<?php 

namespace Teste;

class Contact extends Schedule {

	private $phones;
	private $sql;

	protected $fields = [
		"idContact",
		"idSchedule",
		"nameContact",
		"emailContact",
		"addressContact",
		"createDate"
	];

	function __construct()
	{
		$this->sql = new Sql();
	}

	public static function find($idContact)
	{
		$sql = new Sql();

		$contact = $sql->select("SELECT c.* FROM contacts c WHERE c.idContact = :idContact", array(
			':idContact' => $idContact
		));

		if (count($contact) > 0) {
			$contact[0]['phones'] = Telephone::getPhones($sql, $idContact);
			return $contact[0];
		}
		return false;
	}

	public static function verifyEmailAll($emailContact)
	{
		$sql = new Sql();

		$data = $sql->select("SELECT c.* FROM contacts c WHERE c.emailContact = :emailContact", array(
			':emailContact' => $emailContact
		));

		if (count($data) > 0) {
			return true;
		}
		return false;
	}


	public static function verifyEmail($emailContact, $idContact)
	{
		$sql = new Sql();

		$data = $sql->select("SELECT c.* FROM contacts c WHERE c.emailContact = :emailContact AND c.idContact != :idContact", array(
			':emailContact' => $emailContact,
			':idContact' => (int)$idContact
		));

		if (count($data) > 0) {
			return true;
		}
		return false;
	}


	public function save()
	{

		$this->sql->query("INSERT INTO contacts (nameContact, emailContact, addressContact, idSchedule) VALUES (:nameContact, :emailContact, :addressContact, :idSchedule)", array(
			":nameContact"    =>	$this->getnameContact(),
			":emailContact"   =>	$this->getemailContact(),
			":addressContact" =>	$this->getaddressContact(),
			":idSchedule"	  =>	1
		));

		$contato = $this->sql->select("SELECT * FROM contacts ORDER BY idContact DESC LIMIT 1");
		
		return $this->setData($contato[0]);
	}

	public function update()
	{

		$this->sql->query("UPDATE contacts SET nameContact = :nameContact, emailContact = :emailContact, addressContact = :addressContact WHERE idContact = :idContact", array(
			":nameContact"    =>	$this->getnameContact(),
			":emailContact"   =>	$this->getemailContact(),
			":addressContact" =>	$this->getaddressContact(),
			":idContact" =>	$this->getidContact()
		));
	}

	public function delete()
	{
		$this->sql->query("DELETE FROM contacts WHERE idContact = :idContact", array(
			":idContact" 	=>	$this->getidContact()
		));
	}
}