<?php
if(isset($_SESSION) && !empty($_SESSION['amicale']['auth']))
{
    // Autorise uniquement le compte admin
    if($_SESSION['amicale']['auth']['slug'] == 'admin')
        {
        require_once "../model/post.php";
        require_once "../model/category.php";

        $idcategory = htmlspecialchars($_POST["category"]);
        $maCategory = new Category();
        $maCategory->retrieve($idcategory);

        $title = htmlspecialchars($_POST["title"]);
        $content = $_POST["content"];
        $datePost = htmlspecialchars($_POST["datepost"]);
        $pin = htmlspecialchars($_POST["pin"]);
        $pin = ($pin=="on")?(1):(0);

        $monObjet = new Post(0, $maCategory, $title, $content, $datePost, '', '', $pin);
        $monObjet->create();
        $id=$monObjet->getLastId();

    /*
    *=============================================================================
    *
    * Upload de de photo/image
    *
    *=============================================================================
    */
        $target_dir = "../assets/uploads/picture/";
        $target_file = $target_dir . basename($_FILES["picture"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        $pictureName=$id.'.'.$imageFileType;
        $target_file = $target_dir . $pictureName;

        // Check if image file is a actual image or fake image

        $check = getimagesize($_FILES["picture"]["tmp_name"]);

    if($check !== false) 
    {
        $picture = $_FILES["picture"]["name"];
        $uploadOk = 1;
        }
        else
        {
        $picture = '';
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["picture"]["size"] > 10000000) 
    {
        //echo "Attention, votre fichier est trop grand.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) 
    {
        //echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    if($uploadOk == 1)
    {
        // try to upload file
        if (move_uploaded_file($_FILES["picture"]["tmp_name"], $target_file)) 
        {
        chmod($target_file, 0755);
        chown($target_file, 'www-data');
        $uploadOk = 1;
        //echo "The file ". basename( $_FILES["picture"]["name"]). " has been uploaded.";
        }else 
        {
        $uploadOk = 0;
        //echo "Sorry, there was an error uploading your file.";
        }    

    /*
    *=============================================================================
    *
    * Upload de fichier
    *
    *=============================================================================
    */

        $target_dir_file = "../assets/uploads/file/";
        $target_file_file = $target_dir_file . basename($_FILES["file"]["name"]);
        $imageFileType_file = strtolower(pathinfo($target_file_file,PATHINFO_EXTENSION));
        $fileName=$id.'.'.$imageFileType_file;
        $target_file_file = $target_dir_file . $fileName;
        
        // Check if image file is a actual file or fake file
        if(!empty($_FILES["file"]["tmp_name"]))
        {
            $uploadOk_file = 1;
        }else{
            $uploadOk_file = 0;
        }

        $file = $_FILES["file"]["name"];

    // Check file size
    if ($_FILES["file"]["size"] > 10000000) 
    {
        //echo "Attention, votre fichier est trop grand.";
        $uploadOk_file = 0;
    }

    // Allow certain file formats
    if($imageFileType_file != "doc" && $imageFileType_file != "docx" && $imageFileType_file != "pdf") 
    {
        //echo "Sorry, only DOC, DOCX, PDF files are allowed.";
        $uploadOk_file = 0;
    }

    if($uploadOk_file == 1)
    {
        // try to upload file
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file_file)) 
        {
            chmod($target_file_file, 0755);
            chown($target_file_file, 'www-data');
            $uploadOk_file = 1;
            //echo "The file ". basename( $_FILES["file"]["name"]). " has been uploaded.";
        }else 
        {
            $uploadOk_file= 0;
            //echo "Sorry, there was an error uploading your file.";
        }
    }   
        $monObjet->updatePicture($pictureName, $id);
        $monObjet->updateFile($fileName, $id);

        header('Location: index.php?action=allpost&idcateg='.$idcategory);
        }
        else
        {
        header('Location: index.php?action=formaddpost&idcateg='.$idcategory);
        }

    }else
    {
        // si pas admin, redirige vers home
        header('Location: index.php?action=home');
    }
    }else
    {
        header('Location: ../index.php?action=formlogin');
}
?>