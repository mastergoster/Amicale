<?php
    class Users
    {
        private $id;
        private $login;
        private $password;
        private $slug;

        public function __construct($id='', $login='', $password='', $slug=''){
            $this->id = $id;
            $this->login = $login;
            $this->password= $password;
            $this->slug= $slug;
        }

        public function create (){
            require 'db.php';
            
            $req = $db->prepare("INSERT INTO users VALUES (null, ?, ?, ?)");
            $req->execute(array($this->login, sha1($this->password), $this->slug)); // cryptage du mot de passe en bdd 
        }

        public function retrieve($id){
            require 'db.php';
    
            $req = $db->prepare("SELECT * FROM users WHERE id = ?");
            $req->execute(array($id));

            $result = $req->fetch();
    
            $this->id= $result['id'];
            $this->login= $result['login'];
            $this->password= $result['password'];
            $this->slug= $result['slug'];
        }

        public function retrieveByLogin($login){
            require 'db.php';
    
            $req = $db->prepare("SELECT * FROM users WHERE login = ?");
            $req->execute(array($login));

            $result = $req->fetch();
    
            $this->id= $result['id'];
            $this->login= $result['login'];
            $this->password= $result['password'];
            $this->slug= $result['slug'];
        }

        public function update(){
            require 'db.php';
            $req = $db->prepare("UPDATE users SET LOGIN = ?, PASSWORD = ?, slug = ? WHERE id = ?");
            $req->execute(array($this->login, sha1($this->password), $this->slug, $this->id));
        }

        public function delete($id){
            require 'db.php';
            $req = $db->prepare("DELETE FROM users WHERE id = ?");
            $req->execute(array($id));
        }
        public function findAll(){
            require 'db.php';

            $req = $db->prepare("SELECT * from users");
            $req->execute(array());

            $mesUsers = array();

            // pour chaque ligne de la table.
            while($result = $req->fetch()){
                $monUser = new Users();
                $monUser->retrieve($result['id'], $result['login'], $result['password'], $result['slug']);
                array_push($mesUsers, $monUser);
            }
            return $mesUsers;
        }

        public function canConnect($login, $password)
        {   
            require 'db.php';

            $req = $db->prepare("SELECT count(*) AS 'nb' FROM users WHERE login = ? AND password = ?");
            $req->execute(array($login, $password));

            $result = $req->fetch();
            //echo $result['nb'];
            if($result['nb'] == 1)
            {
                return true;
            }else{
                return false;
            }
        }

        // Vérifier si login et pwd est ok (retrieve where id = login). a form login.

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
         * Get the value of login
         */

        public function getLogin()
        {
            return $this->login;
        }

        /**
         * Set the value of login
         *
         * @return  self
         */

        public function setLogin($login)
        {
            $this->login = $login;

            return $this;
        }

        /**
         * Get the value of password
         */

        public function getPassword()
        {
            return $this->password;
        }

        /**
         * Set the value of password
         *
         * @return  self
         */

        public function setPassword($password)
        {
            $this->password = $password;

            return $this;
        }

        /**
         * Get the value of slug
         */ 
        public function getSlug()
        {
                return $this->slug;
        }

        /**
         * Set the value of slug
         *
         * @return  self
         */ 
        public function setSlug($slug)
        {
            $this->slug = $slug;

            return $this;
        }
    }