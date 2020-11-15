<?php require 'header.php' ?>

<div class="container inside">
    <div class="form_content2">
        <form method="POST" action="index.php?controller=eleve&action=eleveinscription">
            <div class="form-group">
                <label for="inputAddress">Votre nom :</label>
                <input name="nom" type="text" class="form-control" id="nom" placeholder="nom">
            </div>
            <div class="form-group">
                <label for="inputAddress">Votre prénom :</label>
                <input name="prenom" type="text" class="form-control" id="prenom" placeholder="prenom">
            </div>           
            <div class="form-group">
                <label for="civilite">Civilité :</label>
                <select name="civilite" class="form-check">
                    <option value="femme" class="form-check-input" id="femme">Femme</option>
                    <option value="homme" class="form-check-input"  id="homme">Homme</option>           
                </select>
            </div>          
            <div class="form-group">
                <label for="inputEmail4">Votre mail :</label>
                <input name="mail" type="email" class="form-control" id="mail" placeholder="mail">
            </div>           
            <div class="form-group">
                <label for="inputAddress">Votre langue materenelle :</label>
                <input name="langue" type="text" class="form-control" id="langue" placeholder="langue maternelle">
            </div>       
            <div class="mb-3">
                <label for="validationTextarea">Textarea</label>
                    <textarea name="message" class="form-control is-invalid" id="validationTextarea" placeholder="Votre message" required></textarea>
                    <div class="invalid-feedback">
                        Votre message
                    </div>
                </div>   
            <button type="submit" class="btn btn-primary">Envoi</button>
        </form>
    </div>
</div>

