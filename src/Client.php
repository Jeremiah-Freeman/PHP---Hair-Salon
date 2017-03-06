<?php
    class Client
    {
        private $name;
        private $id;
        private $stylist_id;

        function __construct($name,$stylist_id, $id=null)
        {
            $this->name = $name;
            $this->id = $id;
            $this->stylist_id = $stylist_id;
        }
        function getName()
        {
            return $this->name;
        }
        function setName($new_name)
        {
            $this->name = (string) $new_name;
        }
        function getStylistId()
        {
            return $this->stylist_id;
        }
        function setStylistId($new_stylist_id)
        {
            $this->new_stylist_id = (int) $new_stylist_id;
        }
        function getId()
        {
           return $this->id;
        }

        function save()
        {
           $GLOBALS['DB']->exec("INSERT INTO clients (name, stylist_id) VALUES ('{$this->getName()}',{$this->getStylistID()})");
           $this->id = $GLOBALS['DB']->lastInsertId();

       }
        static function getAll()
        {
            $returned_clients = $GLOBALS['DB']->query("SELECT * FROM clients;");
            $clients = array();
            foreach ($returned_clients as $client)
            {
                $client_name = $client['name'];
                $client_id = $client['id'];
                $stylist_id = $client['stylist_id'];

                $new_client = new Client($client_name, $stylist_id,$client_id);

                array_push($clients, $new_client);
            }
            return $clients;
        }
        static function find($search_id)
        {
            $found_name = null;
            $names = Client::getAll();
            foreach ($names as $name)
            {
                if ($search_id == $name->getId())
                {
                    $found_name = $name;
                }
            }
            return $found_name;
        }

        static function deleteAll()
        {
            $GLOBALS['DB']->exec("DELETE FROM clients;");
        }

        function delete()
        {
            $GLOBALS['DB']->exec("DELETE FROM clients WHERE id = {$this->getId()};");
            $GLOBALS['DB']->exec("DELETE FROM clients WHERE stylist_id = {$this->getId()};");
        }
        
        function update($new_name)
        {
            $GLOBALS['DB']->exec("UPDATE clients SET name = '{$new_name}' WHERE id = {$this->getId()};");
            $this->setName($new_name);
        }


    }


?>
