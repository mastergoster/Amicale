<?php
    class Categorydiffusion
    {
        private $diffusion;
        private $category;

        public function __construct($diffusion='', $category='')
        {
            $this->diffusion = $diffusion;
            $this->category = $category;
        }

        public function create (){
            require 'db.php';
            
            $req = $db->prepare("INSERT INTO categorydiffusion(?, ?);");
            $req->execute(array($this->diffusion->getId(), $this->category->getId())); 
        }

        public function retrieve($iddiffusion, $idcategory){
            require 'db.php';
            require 'diffusion.php';
            require 'category.php';
    
            $req = $db->prepare("SELECT * FROM categorydiffusion WHERE idiffusion = ? AND idcategory = ?"); // clés composés.
            $req->execute(array($iddiffusion, $idcategory));
            $result = $req->fetch();
    
            $maDiffusion = new Diffusion(); // nouvelle objet alerte
            $maDiffusion->retrieve($result["iddiffusion"]); //Remplissage de l'objet
            $this->diffusion = $maDiffusion;

            $maCategory = new Category(); // nouvelle objet alerte
            $maCategory->retrieve($result["idcategory"]); //Remplissage de l'objet
            $this->category = $maCategory;
        }

        public function update(){
            require 'db.php';

            $req = $db->prepare("UPDATE categorydiffusion SET idiffusion = ?, idcategory = ? WHERE idiffusion = ? AND idcategory = ?");
            $req->execute(array($this->idiffusion->getId(), $this->horaire->getId()));
        }

        public function delete($iddiffusion, $idcategory){
            require 'db.php';
            $req = $db->prepare("DELETE FROM categorydiffusion WHERE idiffusion = ? AND idcategory = ?");
            $req->execute(array($iddiffusion, $idcategory));
        }
        public function findAll(){
            require 'db.php';
            require 'diffusion.php';
            require 'category.php';

            $req = $db->prepare("SELECT * from categorydiffusion");
            $req->execute(array());
            $mesCategoryDiffusions = array();

            // pour chaque ligne de la table.
            while($result = $req->fetch()){
                $maDiffusion = new Diffusion();
                $maDiffusion->retrieve($result["idiffusion"]);

                $maCategory = new Category();
                $maCategory->retrieve($result["idcategory"]);

                $maCategoryDiffusion = new Categorydiffusion($maDiffusion, $maCategory);
                array_push($mesCategoryDiffusions, $maCategoryDiffusion);
            }
            return $mesCategoryDiffusions;
        }

        public function findAllByDiffusion($iddiffusion){
            require 'db.php';
            require 'diffusion.php';
            require 'category.php';

            $req = $db->prepare("SELECT * from categorydiffusion WHERE idiffusion = ?");
            $req->execute(array($iddiffusion));
            $mesCategoryDiffusions = array();

            // pour chaque ligne de la table.
            while($result = $req->fetch()){


                $maCategory = new Category();
                $maCategory->retrieve($result["idcategory"]);

                array_push($mesCategoryDiffusions, $maCategory);
            }
            return $mesCategoryDiffusions;
        }

        /**
         * Get the value of diffusion
         */ 
        public function getDiffusion()
        {
                return $this->diffusion;
        }

        /**
         * Set the value of diffusion
         *
         * @return  self
         */ 
        public function setDiffusion($diffusion)
        {
                $this->diffusion = $diffusion;

                return $this;
        }

        /**
         * Get the value of category
         */ 
        public function getCategory()
        {
                return $this->category;
        }

        /**
         * Set the value of category
         *
         * @return  self
         */ 
        public function setCategory($category)
        {
                $this->category = $category;

                return $this;
        }
    }
?>