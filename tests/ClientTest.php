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
           $result = $test_name->getName();

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
        function test_find()
        {
            //Arrange
            $name = 'Sonya';
            $test_find = new Client($name);
            $test_find->save();
            $name2 = 'Sonya';
            $test_find2 = new Client($name2);
            $test_find2->save();
            //Act
            $result = Client::find($test_find->getId());
            //Assert
            $this->assertEquals($test_find, $result);
        }
        function testUpdate()
        {
            //Arrange
            $name = "Sonya";
            $id = 1;
            $test_update = new Client($name, $id);
            $test_update->save();

            $new_name = "Upala";

            //Act
            $test_update->update($new_name);

            //Assert
            $this->assertEquals($new_name, $test_update->getName());
        }
        function test_setName()
        {
            //Arrange
            $name = "Randy";
            $test_name = new Client($name);
            $new_name = "Kathy";

            //Act
            $test_name->setname($new_name);
            $result = $test_name->getname();

            //Assert
            $this->assertEquals($new_name, $result);
        }


    }




?>
