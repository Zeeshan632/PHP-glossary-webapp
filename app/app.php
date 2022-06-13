<?php

define('APP_PATH', dirname(__FILE__) . "/../");

require("config.php");
require("functions.php");
require("data/data.class.php");
require("data/filedataprovider.class.php");
require("data/mysqldataprovider.class.php");

Data::initialize(new MySqlDataProvider(CONFIG['db']));





 // $arr = [
        //     'term' => $term,
        //     'definition' => $definition
        // ];

        // // checking if the term already exists
        // foreach ($items as $item => $value) {
        //     if ($items[$item]->term === $arr['term']) {
        //         return;
        //     }
        // }

        // $obj = (object) $arr;