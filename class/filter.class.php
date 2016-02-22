<?php
/**
 * Project: Repository
 * Created by: cyber01
 * Filename: config.php
 * Year: 2015
 */
	class filter
	{
		function check($name,$type,$filter,$options = null) {
			if ($type == 'get') {
				$type = INPUT_GET;
			} else if ($type == 'post') {
				$type = INPUT_POST;
			} else {
				return false;
			}
			if ($filter == 'email') {
				$filter = FILTER_VALIDATE_EMAIL;
				$options = null;
			} else if ($filter == 'float') {
				$filter = FILTER_VALIDATE_FLOAT;
				$options = null;
			} else if ($filter == 'int') {
				$filter = FILTER_VALIDATE_INT;
				if (isset($options['min']) and isset($options['max'])) {
					$options = array("options" => array("min_range" => $options['min'], "max_range" => $options['max']));
				} else {
					$options = null;
				}
			} else if ($filter == 'url') {
				$filter = FILTER_VALIDATE_URL;
				$options = null;
			} else if ($filter == 'regexp') {
				$filter = FILTER_VALIDATE_REGEXP;
				if (empty($options)) {
					return false;
				} else {
					$options = array("options" => array("regexp" => $options));
				}
			} else {
				return false;
			}
			$value = filter_input($type, $name, $filter, $options);
			return $value;
		}
		function sanitize($name,$type,$filter,$options = null) {
			if ($type == 'get') {
				$type = INPUT_GET;
			} else if ($type == 'post') {
				$type = INPUT_POST;
			} else {
				return false;
			}
			if ($filter == 'email' || $filter == 'float' || $filter == 'url') {
				$options = null;
			} else if ($filter == 'int') {
				if (isset($options['min']) and isset($options['max'])) {
					$options = array("options" => array("min_range" => $options['min'], "max_range" => $options['max']));
				} else {
					$options = null;
				}
			} else if ($filter == 'regexp') {
				if (empty($options)) {
					return false;
				} else {
					$options = array("options" => array("regexp" => $options));
				}
			} else {
				return false;
			}
			$options = null;
			$value = filter_input($type, $name, FILTER_SANITIZE_FULL_SPECIAL_CHARS, $options);
			return $value;
		}
	}