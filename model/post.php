<?php
class Post{
    private $id;
    private $category;   //Objet category donc pas idcategory
    private $title;
    private $content;
    private $datePost;
    private $picture;
    private $file;
    private $pin;

    public function __construct($id='', $category='', $title='', $content='', $datePost='', $picture='', $file='',$pin=''){
        $this->id = $id;
        $this->category = $category;
        $this->title= $title;
        $this->content= $content;
        $this->datePost = $datePost;
        $this->picture = $picture;
        $this->file = $file;
        $this->pin = $pin;
    }
    //Create
    public function create(){
        require 'db.php';
        $req = $db->prepare("INSERT INTO post VALUES (NULL, ?, ?, ?, ?, ?, ?, ?)");
        $req->execute(array($this->category->getId(), $this->title, $this->content, $this->datePost, $this->picture, $this->file, $this->pin));
    }

    //Retrieve
    public function retrieve($id){
        require 'db.php';
        require_once 'category.php';
        
        $req = $db->prepare("SELECT * FROM post WHERE id = ?");
        $req->execute(array($id));
        $result = $req->fetch();

        $maCategory = new Category();
        $maCategory->retrieve($result['idcategory']);
        
        $this->category = $maCategory;
        $this->id= $result['id'];
        $this->title = $result['title'];
        $this->content = $result['content'];
        $this->datePost = $result['datepost'];
        $this->picture = $result['picture'];
        $this->file = $result['file'];
        $this->pin = $result['pin'];
    }

    //Update

    public function update() 
    {
        require 'db.php';
        $req = $db->prepare("UPDATE post SET idcategory = ?, title = ?, content = ?, datepost = ?, picture = ?, file = ?, pin = ? WHERE id = ?");
        $req->execute(array($this->category->getId(), $this->title, $this->content, $this->datePost, $this->picture, $this->file, $this->pin, $this->id));
    }
    
    //Delete

    public function delete($id)
    {
        require 'db.php';
        $req = $db->prepare("DELETE FROM post WHERE id = ?");
        $req->execute(array($id));
    }
    
    //FindAll
    public static function findAll(){
        require 'db.php';
        require 'category.php';
        $req = $db->prepare("SELECT * FROM post");
        $req->execute(array());
        $mesPosts = array();
        while($result = $req->fetch()){
            $maCategory = new Category();
            $maCategory->retrieve($result['idcategory']);
            $monPost = new Post($result['id'], $maCategory, $result['title'], $result['content'], $result['datepost'], $result['picture'], $result['file'], $result['pin']);
            array_push($mesPosts, $monPost);
        }
        return $mesPosts;
    }

    public function findAllPaginate($limite, $offset){
        require 'db.php';
        require_once 'category.php';
        
        $req = $db->prepare("SELECT * FROM post WHERE pin = 0 LIMIT ".$limite." OFFSET ".$offset);
        $req->execute(array());
        $mesPosts = array();
        while($result = $req->fetch()){
            $maCategory = new Category();
            $maCategory->retrieve($result['idcategory']);
            $monPost = new Post($result['id'], $maCategory, $result['title'], $result['content'], $result['datepost'], $result['picture'], $result['file'], $result['pin']);
            array_push($mesPosts, $monPost);
        }
        return $mesPosts;
    }

    //FindAllByCategory()
        public function findAllByCategory($idcateg){
            require 'db.php';
            require 'category.php';
            $req = $db->prepare("SELECT * FROM post WHERE idcategory = ?");
            $req->execute(array($idcateg));
            $mesPosts = array();
            while($result = $req->fetch()){
                $maCategory = new Category();
                $maCategory->retrieve($result['idcategory']);
                $monPost = new Post($result['id'], $maCategory, $result['title'], $result['content'], $result['datepost'], $result['picture'], $result['file'], $result['pin']);
                array_push($mesPosts, $monPost);
            }
            return $mesPosts;
        }

            //FindAllPaginateByCategory
        public function findAllPaginateByCategory($idCategory, $limite, $offset){
        require 'db.php';
        require_once 'category.php';
        
        $req = $db->prepare("SELECT * FROM post WHERE pin = 0 AND idcategory =". $idCategory ." LIMIT ".$limite." OFFSET ".$offset);
        $req->execute(array());
        $mesPosts = array();
        while($result = $req->fetch()){
            $maCategory = new Category();
            $maCategory->retrieve($result['idcategory']);
            $monPost = new Post($result['id'], $maCategory, $result['title'], $result['content'], $result['datepost'], $result['picture'], $result['file'], $result['pin']);
            array_push($mesPosts, $monPost);
        }
        return $mesPosts;
    }

        public function getLastId()
        {
            require 'db.php';
            $req = $db->prepare("SELECT MAX(id) as id FROM post");
            $req->execute([]);
            $result=$req->fetch();
            return $result['id'];
        }

        public function getNbPost()
        {
            require 'db.php';
            // Compte le nb de posts qui ne sont pas épinglés.
            $req = $db->prepare("SELECT COUNT(*) as nb FROM post WHERE pin = 0");
            $req->execute([]);

            $result=$req->fetch();
            return $result['nb'];
        }

        public function getNbPostByCategory($idCategory)
        {
            require 'db.php';

            $req = $db->prepare("SELECT COUNT(*) as nb FROM post WHERE idcategory = ? AND pin = 0");
            $req->execute([$idCategory]);

            $result=$req->fetch();
            return $result['nb'];
        }

        public function updatePicture($picture, $id) 
        {
            require 'db.php';
            $req = $db->prepare("UPDATE post SET picture = ? WHERE id = ?");
            $req->execute(array($picture, $id));
        }

        public function updateFile($file, $id) 
        {
            require 'db.php';
            $req = $db->prepare("UPDATE post SET file = ? WHERE id = ?");
            $req->execute(array($file, $id));
        }
        

    //FindAllByPin
    public static function findAllByPin()
    {
        require 'db.php';
        require_once 'category.php';
        $req = $db->prepare("SELECT * FROM post WHERE pin = 1");
        $req->execute(array());
        $mesPosts = array();
        while($result = $req->fetch()){
            $maCategory = new Category();
            $maCategory->retrieve($result['idcategory']);
            $monPost = new Post($result['id'], $maCategory, $result['title'], $result['content'], $result['datepost'], $result['picture'], $result['file'], $result['pin']);
            array_push($mesPosts, $monPost);
    }
    return $mesPosts;
}



    //GETTERS & SETTERS

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
     * Get the value of content
     */ 
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set the value of content
     *
     * @return  self
     */ 
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get the value of datePost
     */ 
    public function getDatePost()
    {
        return $this->datePost;
    }

    /**
     * Set the value of datePost
     *
     * @return  self
     */ 
    public function setDatePost($datePost)
    {
        $this->datePost = $datePost;

        return $this;
    }

    /**
     * Get the value of picture
     */ 
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * Set the value of picture
     *
     * @return  self
     */ 
    public function setPicture($picture)
    {
        $this->picture = $picture;

        return $this;
    }

    /**
     * Get the value of file
     */ 
    public function getFile()
    {
        return $this->file;
    }

    /**
     * Set the value of file
     *
     * @return  self
     */ 
    public function setFile($file)
    {
        $this->file = $file;

        return $this;
    }

    /**
     * Get the value of pin
     */ 
    public function getPin()
    {
        return $this->pin;
    }

    /**
     * Set the value of pin
     *
     * @return  self
     */ 
    public function setPin($pin)
    {
        $this->pin = $pin;

        return $this;
    }
}
?>
