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
        protected function tearDown()
        {
           Client::deleteAll();
           Stylist::deleteAll();
        }


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
        function test_save()
        {
           //Arrange
           $name = 'Jesse';
           $test_save_all = new Stylist($name);
           $test_save_all->save();

           //Act
           $result = Stylist::getAll();

           //Assert
           $this->assertEquals($test_save_all,$result[0]);
        }
        function test_getAll()
        {
           //Arrange
           $name = 'Jesse';
           $test_save_all = new Stylist($name);
           $test_save_all->save();
           $name2 = 'Jesse';
           $test_save_all2 = new Stylist($name2);
           $test_save_all2->save();
           //Act
           $result = Stylist::getAll();
           //Assert
           $this->assertEquals([$test_save_all,$test_save_all2], $result);
        }

    }




?>
