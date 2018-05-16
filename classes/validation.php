<?php
/**
 * Created by PhpStorm.
 * User: Gaby
 * Date: 12/05/2018
 * Time: 17:39
 */

class Validation
{
	public function check_empty($data, $fields)
	{
		$msg = null;
		foreach ($fields as $value) {
			if (empty($data[$value])) {
				$msg .= "$value field empty <br />";
			}
		}
		return $msg;
	}

}

