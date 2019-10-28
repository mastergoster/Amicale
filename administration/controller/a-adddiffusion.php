<?php 

        if(isset($_SESSION) && !empty($_SESSION['amicale']['auth']))
        {
                require_once "../model/diffusion.php";
                require_once "../model/horaire.php";

                $idhoraire = htmlspecialchars($_POST["horaire"]);
                $monHoraire = new Horaire();
                $monHoraire->retrieve($idhoraire);

                $month = htmlspecialchars($_POST["month"]);
                
                $monObjet = new Diffusion(0, $alerte, $monHoraire, $month);
                $monObjet->create();

                header('Location: index.php?action=alldiffusion&idhor='.$idhoraire);
        }else{
                header('Location: ../index.php?action=formlogin');
                }
                
?>