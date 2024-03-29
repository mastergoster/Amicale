<?php 
    class Icone {
        private $id;
        private $icons;

        public function __construct($id='', $icons='')
        {
            $this->id = $id;
            $this->icons = $icons;
        }

        //Create
        public function create(){
            require 'db.php';
            $req = $db->prepare("INSERT INTO icons VALUES(NULL, ?)");
            $req->execute(array($this->icons));
        }

        //Retrieve
        public function retrieve($id){
            require 'db.php';

            $req = $db->prepare("SELECT * FROM icons WHERE id = ?");
            $req->execute(array($id));
            $result = $req->fetch();

            $this->id= $result['id'];
            $this->icons= $result['icons'];
        }

        public function retrieveByIcons($icons){
            require 'db.php';

            $req = $db->prepare("SELECT * FROM icons WHERE icons = ?");
            $req->execute(array($icons));
            $result = $req->fetch();

            $this->id= $result['id'];
            $this->icons= $result['icons'];

        }

        public function update()
        {
            require 'db.php';
            $req = $db->prepare("UPDATE icons SET icons = ? WHERE id = ?");
            $req->execute(array($this->icons, $this->id));
        }

        public function delete($id){
            require 'db.php';
            $req = $db->prepare("DELETE FROM icons WHERE id = ?");
            $req->execute(array($id));
        }
        
        public function findAll(){
            require 'db.php';

            $req = $db->prepare("SELECT * from icons");
            $req->execute(array());
            $mesIcones = array();

            // pour chaque ligne de la table.
            while($result = $req->fetch()){
                $monIcone = new Icone();
                $monIcone->retrieve($result['id']);
                array_push($mesIcones, $monIcone);
            }
            return $mesIcones;

        }

        /**
         * Get the value of id
         */ 
        public function getId()
        {
                return $this->id;
        }

        /**
         * Set the value of id
         *
         * @return  self
         */ 
        public function setId($id)
        {
                $this->id = $id;

                return $this;
        }

        /**
         * Get the value of icons
         */ 
        public function getIcons()
        {
                return $this->icons;
        }

        /**
         * Set the value of icons
         *
         * @return  self
         */ 
        public function setIcons($icons)
        {
                $this->icons = $icons;

                return $this;
        }

        /**
         * Get the value of codef
         */ 
        public function getCodef()
        {
                return $this->codef;
        }

        /**
         * Set the value of codef
         *
         * @return  self
         */ 
        public function setCodef($codef)
        {
                $this->codef = $codef;

                return $this;
        }
    }
?>