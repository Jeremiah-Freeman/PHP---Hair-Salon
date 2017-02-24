<?php
    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Client.php";

    $server= 'mysql:host=localhost:8889;dbname=hair_salon_test';
    $username= 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class ClientTest extends PHPUnit_Framework_TestCase
    {
        function test_get_name()
        {
            //Arrange
           $name = "Sonya Blade";
           $test_name = new Client($name);

           //Act
           $result = $test_name->getName();

           //Assert
           $this->assertEquals($name,$result);
        }

    }




?>
