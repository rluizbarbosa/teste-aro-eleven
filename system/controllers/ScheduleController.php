<?php
namespace Teste\Controllers;

class ScheduleController 
{

	public function create($request, $response, $args)
	{
		if (!validarDados(['nameContact'], $request->getParsedBody())) {
			$json['status'] = '0';
			$json['msg'] = 'Há campos obrigários em branco';
			return $response->withJson($json);
		}

		if ($request->getParam('emailContact') !== '') {
			if (\Teste\Contact::verifyEmailAll($request->getParam('emailContact'))) {
				$json['status'] = '0';
				$json['msg'] = 'Já existe um outro contato com esse e-mail cadastrado';
				return $response->withJson($json);
			}
		}

		$contato = new \Teste\Contact();

		$contato->setData($request->getParams());

		$contato->save();

		$phones = is_array($request->getParam('phone')) ? $request->getParam('phone') : [$request->getParam('phone')];

		foreach ($phones as $p) {
			
			if ($p !== '' && $p !== NULL) {

				$phone = new \Teste\Telephone();

				$phone->setnumberPhone($p);
				$phone->setidContact($contato->getidContact());

				$phone->save();
			}
		}

		$json['status'] = '1';
		$json['redirecionar'] = __DIR_PRINCIPAL__.'/';
		$json['msg'] = 'Cadastro realizado com sucesso';
		return $response->withJson($json);
	}

	public function edit($request, $response, $args)
	{
		if (!validarDados(['nameContact'], $request->getParsedBody())) {
			$json['status'] = '0';
			$json['msg'] = 'Há campos obrigários em branco';
			return $response->withJson($json);
		}

		if ($request->getParam('emailContact') !== '') {
			if (\Teste\Contact::verifyEmail($request->getParam('emailContact'), $request->getParam('idContact'))) {
				$json['status'] = '0';
				$json['msg'] = 'Já existe um outro contato com esse e-mail cadastrado';
				return $response->withJson($json);
			}
		}

		$contato = new \Teste\Contact();

		$contato->setData($request->getParams());

		$contato->setidContact($request->getParam('idContact'));

		$contato->update();


		$telephone = new \Teste\Telephone();

		$telephone->setidContact($contato->getidContact());

		$telephone->deleteAll();

		$phones = is_array($request->getParam('phone')) ? $request->getParam('phone') : [$request->getParam('phone')];
		foreach ($phones as $p) {
			
			if ($p !== '' && $p !== NULL) {

				$phone = new \Teste\Telephone();

				$phone->setnumberPhone($p);
				$phone->setidContact($contato->getidContact());

				$phone->save();
			}
		}

		$json['status'] = '1';
		$json['redirecionar'] = __DIR_PRINCIPAL__.'/';
		$json['msg'] = 'Cadastro realizado com sucesso';
		return $response->withJson($json);
	}

	public function delete($request, $response, $args)
	{

		$contato = new \Teste\Contact();

		$contato->setidContact($request->getParam('idContact'));

		$telephone = new \Teste\Telephone();

		$telephone->setidContact($contato->getidContact());
		
		$telephone->deleteAll();

		$contato->delete();

		$json['status'] = '1';
		$json['redirecionar'] = __DIR_PRINCIPAL__.'/';
		$json['msg'] = 'Contato excluido com sucesso';
		return $response->withJson($json);
	}

}