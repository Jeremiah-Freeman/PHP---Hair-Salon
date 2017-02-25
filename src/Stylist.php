<?php
    class Stylist
    {
        private $name;
        private $id;

        function  __construct($name,$id=null)
        {
            $this->name = $name;
            $this->id = $id;
        }

        //getters

        function getNames()
        {
            return $this->name;
        }
        function getId()
        {
           return $this->id;
        }

        //setters

        function setNames($new_name)
        {
           $this->name = (string) $new_name;
        }
        function setId($new_id)
        {
           $this->id = (string) $new_id;
        }

        function save()
        {
           $GLOBALS['DB']->exec("INSERT INTO stylist (name) VALUES ('{$this->getNames()}')");
           $this->id = $GLOBALS['DB']->lastInsertId();

        }
        static function getAll()
        {
            $returned_stylists = $GLOBALS['DB']->query("SELECT * FROM stylist;");
            $stylists = array();
            foreach ($returned_stylists as $stylist)
            {
                $stylist_name = $stylist['name'];
                $stylist_id = $stylist['id'];

                $new_stylist = new Stylist($stylist_name,$stylist_id);

                array_push($stylists, $new_stylist);
            }
            return $stylists;
        }
        static function deleteAll()
        {
            $GLOBALS['DB']->exec("DELETE FROM stylist;");
        }
        static function find($search_id)
        {
            $found_stylist = null;
            $stylists = Stylist::getAll();
            foreach ($stylists as $stylist)
            {
                if ($search_id == $stylist->getId())
                {
                    $found_stylist = $stylist;
                }
            }
            return $found_stylist;
        }
        


    }





 ?>
