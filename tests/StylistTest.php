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
           $result = $test_name->getName();

           //Assert
           $this->assertEquals($name,$result);
        }
        function test_setName()
        {
            //Arrange
            $name = "Heather";
            $test_name = new Stylist($name);
            $new_name = "Sophia";

            //Act
            $test_name->setname($new_name);
            $result = $test_name->getname();

            //Assert
            $this->assertEquals($new_name, $result);
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
        function test_find()
        {
            //Arrange
            $name = 'Jesse';
            $test_find = new Stylist($name);
            $test_find->save();
            $name2 = 'Jesse';
            $test_find2 = new Stylist($name2);
            $test_find2->save();
            //Act
            $result = Stylist::find($test_find->getId());
            //Assert
            $this->assertEquals($test_find, $result);
        }
        function testUpdate()
        {
            //Arrange
            $name = "Upala";
            $id = 1;
            $test_update = new Stylist($name, $id);
            $test_update->save();

            $new_name = "Lapiz";

            //Act
            $test_update->update($new_name);

            //Assert
            $this->assertEquals($new_name, $test_update->getName());
        }

    }




?>
