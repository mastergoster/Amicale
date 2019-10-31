<?php 
    class Diffusion
    {
        private $id;
        private $alerte;
        private $horaire;
        private $month;

        public function __construct($id='', $alerte='', $horaire='', $month=''){
            $this->id = $id;
            $this->alerte = $alerte;
            $this->horaire = $horaire;
            $this->month = $month;
        }

        public function create (){
            require 'db.php';
            
            $req = $db->prepare("INSERT INTO diffusion VALUES(null, ?, ?, ?);");
            $alerte = ($this->alerte !='')?($this->alerte->getId()):(NULL);
            $req->execute(array($alerte, $this->horaire->getId(), $this->month)); 
        }

        public function retrieve($id){

            require 'db.php';
            require_once 'alerte.php';
            require_once 'horaire.php';
    
            $req = $db->prepare("SELECT * FROM diffusion WHERE id = ?");
            $req->execute(array($id));
            $result = $req->fetch();
    
            $this->id = $result["id"];
    
            $monAlerte = new Alerte(); // nouvelle objet Alerte
            $monAlerte->retrieve($result["idalerte"]); //Remplissage de l'objet
            $this->alerte = $monAlerte;

            $monHoraire = new Horaire(); // nouvelle objet horaire
            $monHoraire->retrieve($result["idhoraire"]); //Remplissage de l'objet
            $this->horaire = $monHoraire;

            $this->month = $result['month'];
        }

        public function update(){
            require 'db.php';

            $req = $db->prepare("UPDATE diffusion SET idalerte = ?, idhoraire = ?, month = ? WHERE id = ?");
            $alerte = ($this->alerte !=NULL)?($this->alerte->getId()):(NULL);
            $req->execute(array($alerte, $this->horaire->getId(), $this->month, $this->id));
        }

        public function delete($id){
            require 'db.php';
            $req = $db->prepare("DELETE FROM diffusion WHERE id = ?");
            $req->execute(array($id));
        }
        public function findAll(){
            require 'db.php';
            require 'alerte.php';
            require 'horaire.php';

            $req = $db->prepare("SELECT * from diffusion");
            $req->execute(array());
            $mesDiffusions = array();

            // pour chaque ligne de la table.
            while($result = $req->fetch()){
                $monAlerte = new Alerte();
                $monAlerte->retrieve($result["idalerte"]);

                $monHoraire = new Horaire();
                $monHoraire->retrieve($result["idhoraire"]);

                $maDiffusion = new Diffusion($result['id'], $monAlerte, $monHoraire ,$result['month']);
                array_push($mesDiffusions, $maDiffusion);
            }
            return $mesDiffusions;
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
         * Get the value of alerte
         */ 
        public function getAlerte()
        {
                return $this->alerte;
        }

        /**
         * Set the value of alerte
         *
         * @return  self
         */ 
        public function setAlerte($alerte)
        {
                $this->alerte = $alerte;

                return $this;
        }

        /**
         * Get the value of horaire
         */ 
        public function getHoraire()
        {
                return $this->horaire;
        }

        /**
         * Set the value of horaire
         *
         * @return  self
         */ 
        public function setHoraire($horaire)
        {
                $this->horaire = $horaire;

                return $this;
        }

        /**
         * Get the value of month
         */ 
        public function getMonth()
        {
                return $this->month;
        }

        /**
         * Set the value of month
         *
         * @return  self
         */ 
        public function setMonth($month)
        {
                $this->month = $month;

                return $this;
        }
    }