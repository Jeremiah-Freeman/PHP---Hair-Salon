<?php
    class Client
    {
        private $name;
        private $id;

        function __construct($name,$id=null)
        {
            $this->name = $name;
            $this->id = $id;
        }
        function getNames()
        {
            return $this->name;
        }
        function getId()
        {
           return $this->id;
        }
        function save()
        {
           $GLOBALS['DB']->exec("INSERT INTO client (name) VALUES ('{$this->getNames()}')");
           $this->id = $GLOBALS['DB']->lastInsertId();

       }
        static function getAll()
        {
            $returned_clients = $GLOBALS['DB']->query("SELECT * FROM client;");
            $clients = array();
            foreach ($returned_clients as $client)
            {
                $client_name = $client['name'];
                $client_id = $client['id'];

                $new_client = new Client($client_name,$client_id);

                array_push($clients, $new_client);
            }var_dump($clients);
            return $clients;
        }
        
        static function deleteAll()
        {
            $GLOBALS['DB']->exec("DELETE FROM client;");
        }

    }





?>
