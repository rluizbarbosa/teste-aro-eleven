<?php 

namespace Teste;

class Schedule extends Model {

	private $sql;

	protected $fields = [
		"idSchedule",
		"nameSchedule",
		"createDate"
	];

	function __construct()
	{
		$this->sql = new Sql();
	}

	public function list($init, $limit)
	{

		$data = $this->sql->select("SELECT c.* FROM contacts c ORDER BY nameContact ASC LIMIT $init, $limit");
		
		$contacts = [];

		foreach ($data as $c) {
			
			$contact = new Contact();

			$c['phones'] = Telephone::getPhones($this->sql, $c['idContact']);

			$contact->setData($c);

			$contacts[] = $contact->getValues();
		}

		$data = $this->sql->select("SELECT c.* FROM contacts c ORDER BY nameContact ASC");

		$retorno['contacts'] = $contacts;
		$retorno['count'] = count($data);
		return $retorno;

	}

}