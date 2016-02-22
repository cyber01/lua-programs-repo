<?php
/**
 * Project: Repository
 * Created by: cyber01
 * Filename: config.php
 * Year: 2015
 */
	class menu
	{		
		function gen($array,$name) {
				$active_page = $_GET[$name];
				foreach ($array as $key => $value) {
					$return[$value['position']] = $value;
					if ($value['url'] == $active_page) {
						$return[$value['position']]['status'] = 'selected';
					} else {
						$return[$value['position']]['status'] = 'unselected';
					}
				}
				ksort($return);
				return $return;
		}
		
	}