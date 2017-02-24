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
        protected function tearDown()
        {
           Client::deleteAll();
        }

        function test_get_name()
        {
            //Arrange
           $name = "Sonya Blade";
           $test_name = new Client($name);

           //Act
           $result = $test_name->getNames();

           //Assert
           $this->assertEquals($name,$result);
        }

        function test_getId()
        {
            //Arrange
           $name = "Sonya Blade";
           $id = 5;
           $test_id = new Client($name,$id);

           //Act
           $result = $test_id->getId();

           //Assert
           $this->assertEquals($id,$result);
        }
        function test_save()
        {
           //Arrange
           $name = 'Sonya';
           $test_save_all = new Client($name);
           $test_save_all->save();

           //Act
           $result = Client::getAll();

           //Assert
           $this->assertEquals($test_save_all,$result[0]);
        }
        function test_getAll()
        {
           //Arrange
           $name = 'Sonya';
           $test_save_all = new Client($name);
           $test_save_all->save();
           $name2 = 'Sonya';
           $test_save_all2 = new Client($name2);
           $test_save_all2->save();
           //Act
           $result = Client::getAll();
           //Assert
           $this->assertEquals([$test_save_all,$test_save_all2], $result);
        }


    }




?>
