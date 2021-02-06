<?php

function validarDados($campos, $request)
{
	$campos = is_array($campos) ? $campos : [$campos];

	foreach ($campos as $campo) {
		if (!isset($request[$campo])) {
			return false;
		}else{
			if ($request[$campo] == '' || $request[$campo] == NULL) {
				return false;
			}
		}
	}
	return true;
}