<?php
    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Stylist.php";
    require_once "src/Client.php";

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

        function testDeleteAll()
        {
            //Arrange
            $name = "Dannyitoers";
            $stylist_id = 4;
            $test_client = new Client($name,$stylist_id);
            $test_client->save();
            $stylist_id = $test_client->getId();


            $stylist_name = "Sandita";
            $stylist_name2 = "Mara";
            $test_stylist = new Stylist($stylist_name, $stylist_id);
            $test_stylist->save();
            $test_stylist2 = new Stylist($stylist_name2, $stylist_id);
            $test_stylist2->save();

            //Act
            Client::deleteAll();
            $result = Client::getAll();

            //Assert
            $this->assertEquals([], $result);
        }

        function testGetClient()
        {
            //Arrange
            $name = "Sarunta Kiliaksterns";
            $id = null;
            $test_stylist = new Stylist($name, $id);
            $test_stylist->save();

            $test_stylist_id = $test_stylist->getId();

            $name = "Ranter Balandibaudt";
            $new_client = new Client($name, $id, $test_stylist_id );
            $new_client->save();

            $name2 = "Yelata Seet Maruactabate";
            $new_client2 = new Client($name2, $id, $test_stylist_id );
            $new_client2->save();

var_dump($new_client2);
var_dump($new_client);
            //Act
            $result = $test_stylist->getClient();

            //Assert
            $this->assertEquals([$new_client, $new_client2], $result);
        }

    }




?>
