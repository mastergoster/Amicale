<?php 
class Category {
    private $id;
    private $codef;
    private $alerte;
    private $name;


    public function __construct($id='', $codef='', $alerte='', $name=''){
        $this->id = $id;
        $this->codef= $codef;
        $this->alerte = $alerte;
        $this->name= $name;
    }


    public function create(){
        require 'db.php';
        
        $req = $db->prepare("INSERT INTO X'category' VALUES(null, ?, ?, ?);");
        
        // $alerte = ($this->alerte !='')?($this->alerte->getId()):(NULL); est équivalent au if ci-après

        if($this->alerte !=''){
            $alerte = $this->alerte->getId();
        }else{
            $alerte = NULL;
        }
        $req->execute(array($this->codef->getId(), $alerte, $this->name));
    }

    public function retrieve($id){
        
        require 'db.php';
        require_once 'alerte.php';
        require_once 'icons.php';

        $req = $db->prepare("SELECT * FROM category WHERE id = ?");
        $req->execute(array($id));
        $result = $req->fetch();

        $this->id = $result["id"];

        $monAlerte = new Alerte(); // nouvelle objet alerte
        $monAlerte->retrieve($result["idalerte"]); //Remplissage de l'objet        
        $this->alerte = $monAlerte;

        $monIcone = new Icone(); // nouvelle objet icone
        $monIcone->retrieve($result["idicon"]); //Remplissage de l'objet
        $this->codef = $monIcone;

        $this->name = $result['name'];

    }
    
    public function update(){
        require 'db.php';

        $req = $db->prepare("UPDATE category SET codef = ?, idalerte = ?, name = ?  WHERE id = ?");
        if($this->alerte !=''){
            $alerte = $this->alerte->getId();
        }else{
            $alerte = NULL;
        }
        $req->execute(array($this->codef->getId(), $alerte, $this->name, $this->id));
    }

    public function delete($id){
        require 'db.php';

        $req = $db->prepare("DELETE FROM category WHERE id = ?");
        $req->execute(array($id));
    }

    public function findAll(){
        require 'db.php';
        require_once 'alerte.php';
        require_once 'icons.php';

        $req = $db->prepare("SELECT * from category");
        $req->execute(array());
        $mesCategory = array();
        
        // pour chaque ligne de la table.
        while($result = $req->fetch()){
            $monAlerte = new Alerte();
            $monAlerte->retrieve($result["idalerte"]);

            $monIcone = new Icone();
            $monIcone->retrieve($result['idicon']);

            $maCategory = new Category($result['id'], $monIcone, $monAlerte, $result['name']);
            array_push($mesCategory, $maCategory);
        }
        return $mesCategory;
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
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }
    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;
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