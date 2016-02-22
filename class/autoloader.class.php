<?php
/**
 * Project: Repository
 * Created by: cyber01
 * Filename: config.php
 * Year: 2015
 */
class autoloader
{  
     public static function loadPackages($className) {
         require_once($_SERVER["DOCUMENT_ROOT"]."/class/" . $className . '.class.php');
     }

}
