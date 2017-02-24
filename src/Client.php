<?php
    class Client
    {
        private $name;
        private $unique_id;
        private $id;

        function __construct($name, $unique_id=null, $id=Null)
        {
            $this->name = $name;
            $this->unique_id = $unique_id;
            $this->id = $id;
        }
        function getName()
        {
            return $this->name;
        }
        function getUniqueId()
        {
            return $this->unique_id;
        }

    }





?>
