<?php
    // Erreur 404 dans la console network
    http_response_code(404);
?>

<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="error-template">
                <h1>
                    Oops!</h1>
                <h2>
                    404 Not Found / 404 Page non trouvé</h2>
                <div class="error-details">
                    Désolé une erreur s'est produite, la page demandé n'existe pas ! / Sorry, an error has occured, Requested page not found! 
                </div>
                <div class="error-actions">
                    <a href="/" class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-home"></span>
                        Page précèdente / Return to home</a>
                </div>
            </div>
        </div>
    </div>
</div>