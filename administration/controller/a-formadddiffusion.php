<?php 

        if(isset($_SESSION) && !empty($_SESSION['amicale']['auth']))
                {
                require '../model/horaire.php';
                        //instanciation de l'objet
                        $monHoraire = new Horaire();

                $mesHoraires = $monHoraire->findAll();

                $view = "formadddiffusion";
                }else{
                header('Location: ../index.php?action=formlogin');
                }

?>