<?php 
class Horaire {
    private $id;
    private $content;
    private $title;
    private $isactive;

    public function __construct($id='', $content='', $title='', $isactive='')
    {
        $this->id = $id;
        $this->content = $content;
        $this->title = $title;
        $this->isactive = $isactive;
    }

    public function create()
    {
        require 'db.php';

        $req = $db -> prepare("INSERT INTO horaire VALUES(null, ?, ?, ?)");
        $req->execute(array($this->content, $this->title, $this->isactive));
    }

    public function retrieve($id)
    {
        require 'db.php';

        $req = $db->prepare("SELECT * FROM horaire WHERE id = ?");
        $req->execute(array($id));
        $result = $req->fetch();
        
        $this->id = $result["id"];
        $this->content = $result["content"];
        $this->title = $result["title"];
        $this->isactive = $result["isactive"];
    }

    public function update()
    {
        require 'db.php';

        $req = $db->prepare("UPDATE horaire SET content = ?, title = ?, isactive = ? WHERE id =?");
        $req->execute(array($this->content, $this->title, $this->isactive, $this->id));
    }

    public function delete($id)
    {
        require 'db.php';
        $req = $db->prepare("DELETE FROM horaire WHERE id = ?");
        $req->execute(array($id));
    }

    public function findAll()
    {
        require 'db.php';

        $req = $db->prepare("SELECT * FROM horaire");
        $req->execute(array());

        $mesHoraires = array();

        while($result = $req->fetch())
        {
            $monHoraire = new Horaire($result['id'], $result['content'], $result['title'], $result['isactive']);
            array_push($mesHoraires, $monHoraire);
        }

        return $mesHoraires;

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