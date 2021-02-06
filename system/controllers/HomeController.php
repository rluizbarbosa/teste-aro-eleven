<?php
namespace Teste\Controllers;

use Rain\Tpl;
use Teste\Schedule;

class HomeController 
{
	private $tpl;
	
	function __construct()
	{

		$config = array(
			"base_url"      => __DIR_PRINCIPAL__,
		    "tpl_dir"       => $_SERVER['DOCUMENT_ROOT'].__DIR_PRINCIPAL__."/system/views/",
		    "cache_dir"     => $_SERVER['DOCUMENT_ROOT'].__DIR_PRINCIPAL__."/views-cache/",
		    'tpl_ext'		=> 'php'
		);

		Tpl::configure( $config );

		$this->tpl = new Tpl;
		$this->setTpl("header", array('__DIR_PRINCIPAL__' => __DIR_PRINCIPAL__));
	}

	public function __destruct()
	{
		$this->setTpl("footer", array('__DIR_PRINCIPAL__' => __DIR_PRINCIPAL__));
	}

	public function setTpl($tplname, $data = array(), $returnHTML = false)
	{

		$this->setData($data);

		return $this->tpl->draw($tplname, $returnHTML);

	}

	private function setData($data = array())
	{

		foreach($data as $key => $val)
		{

			$this->tpl->assign($key, $val);

		}

	}
	
	public function see($request, $response, $args)
	{

		$limit = (int)$request->getQueryParams()['limit'] ?: 3;

		$scheldule = new Schedule();


		if ((int)$request->getQueryParams()['page'] && (int)$request->getQueryParams()['page'] > 1) {
			$init = ((int)$request->getQueryParams()['page']-1)*$limit;
			$prevPage = (int)$request->getQueryParams()['page']-1;
		}else{
			$init = 0;
			$prevPage = false;
		}
		$listContacts = $scheldule->list($init,$limit);

		$nextPage = (count($listContacts['contacts']) < $limit) ? false : (int)$request->getQueryParams()['page']+1;

		if (!(int)$request->getQueryParams()['page'] && $nextPage) {
			$nextPage = 2;
		}
		if ($listContacts['count'] <= ((int)$request->getQueryParams()['page']*$limit)) {
			$nextPage = false;
		}

		$this->setTpl("index", array('listContacts' => $listContacts['contacts'], 'nextPage' => $nextPage, 'prevPage' => $prevPage, 'limit' => $limit));
	}

	public function create($request, $response, $args)
	{
		$this->tpl->draw("create");
	}

	public function edit($request, $response, $args)
	{
		
		$contact = \Teste\Contact::find((int)$request->getQueryParams()['id']);
		
		$this->setTpl("edit", array('contact' => $contact));
	}

}