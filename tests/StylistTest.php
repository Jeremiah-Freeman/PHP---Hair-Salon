<?php
    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Stylist.php";
    require_once "src/Stylist.php";

    $server= 'mysql:host=localhost:8889;dbname=hair_salon_test';
    $username= 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class StylistTest extends PHPUnit_Framework_TestCase
    {

        function test_get_name()
        {
            //Arrange
           $name = "Jesse G";
           $test_name = new Stylist($name);

           //Act
           $result = $test_name->getNames();

           //Assert
           $this->assertEquals($name,$result);
        }
        function test_get_id()
        {
            //Arrange
           $name = "Jesse G";
           $id = 500;
           $test_id = new Stylist($name, $id);

           //Act
           $result = $test_id->getId();

           //Assert
           $this->assertEquals($id,$result);
        }

    }




?>
