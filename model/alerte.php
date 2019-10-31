<?php
    class Alerte {
        private $id;
        private $title;
        private $message;
        private $isactive;

        public function __construct($id='', $title='', $message='', $isactive='' )
        {
            $this->id = $id;
            $this->title = $title;
            $this->message = $message;
            $this->isactive = $isactive;
        }

        //Create
        public function create(){
            require 'db.php';
            $req = $db->prepare("INSERT INTO alert VALUES(NULL, ?, ?, ?)");
            $req->execute(array($this->title, $this->message, $this->isactive));
        }

        //Retrieve
        public function retrieve($id){
            require 'db.php';

            $req = $db->prepare("SELECT * FROM alert WHERE id = ?");
            $req->execute(array($id));

            $result = $req->fetch();

            $this->id= $result['id'];
            $this->title= $result['title'];
            $this->message= $result['message'];
            $this->isactive = $result['isactive'];
        }

        public function update()
        {
            require 'db.php';
            $req = $db->prepare("UPDATE alert SET title = ?, message = ?, isactive = ? WHERE id = ?");
            $req->execute(array($this->title, $this->message, $this->isactive, $this->id));
        }

        public function delete($id){
            require 'db.php';

            $req = $db->prepare("DELETE FROM alert WHERE id = ?");
            $req->execute(array($id));
        }
        
        public function findAll()
        {
            require 'db.php';

            $req = $db->prepare("SELECT * from alert");
            $req->execute(array());
            

            $mesAlertes = array();

            // pour chaque ligne de la table.
            while($result = $req->fetch()){
                $monAlerte = new Alerte();
                $monAlerte->retrieve($result['id'], $result['title'], $result['message'], $result['isactive']);
                array_push($mesAlertes, $monAlerte);
            }
            return $mesAlertes;

        }

        public function showAlert()
        {
            require 'db.php';

            $req = $db->prepare("SELECT message from alert WHERE isactive = 1");
            $req->execute(array());
            
            $afficheAlert = '';

            // pour chaque ligne du tableau tu stockes une ligne dans $result
            while($result = $req->fetch()){
                $afficheAlert .= $result['message'].' - ';
                // $afficheAlert = $afficheAlert.$result['message'].'-';
            }
            return $afficheAlert;

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
     * Get the value of title
     */ 
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the value of title
     *
     * @return  self
     */ 
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the value of message
     */ 
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set the value of message
     *
     * @return  self
     */ 
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Get the value of isactive
     */ 
    public function getIsactive()
    {
        return $this->isactive;
    }

    /**
     * Set the value of isactive
     *
     * @return  self
     */ 
    public function setIsactive($isactive)
    {
        $this->isactive = $isactive;

        return $this;
    }
}
?>