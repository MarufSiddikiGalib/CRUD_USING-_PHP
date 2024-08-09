<?php
     
    //   define("HOSTNAME", "localhost");
    //   define("USERNAME", "root");
    //   define("PASSWORD", "");
    //   define("DATABASE", "crud_operations");


      if (!defined('HOSTNAME')) {
        define('HOSTNAME', 'localhost'); // Replace with your actual database host
    }
    
    if (!defined('USERNAME')) {
        define('USERNAME', 'root'); // Replace with your actual database username
    }
    
    if (!defined('PASSWORD')) {
        define('PASSWORD', 'root'); // Replace with your actual database password
    }
    
    if (!defined('DATABASE')) {
        define('DATABASE', 'crud_operations'); // Replace with your actual database name
    }

      $con = mysqli_connect('127.0.0.1', USERNAME, PASSWORD, DATABASE,3306);

    if(!$con){
        die("Connection failed");
    }
