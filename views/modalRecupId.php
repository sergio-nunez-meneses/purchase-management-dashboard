<div id="modalHeader" class="modal-header">
    <h5 class="modal-title">Identifiant ou mot de passe oublié ?</h5>
</div>
<div id="modalBody" class="modal-body">
    <p>Renseignez votre e-mail ci-dessous.<br>
    Vous les recevrez d'ici quelques instants à l'adresse e-mail renseignée.</p>
    <form class="" action="index.php" method="post">
        <div class="form-group">
            <input name="mailRecupId" type="email" class="form-control" required="required" autocomplete="off" placeholder="Tapez votre e-mail" pattern=".*@.*[.].*">
        </div>
        <div id="modalFooter" class="modal-footer">
            <button id="close" type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button id="close" type="submit" name="sendMyId" class="btn btn-secondary">Send</button>
        </div>
    </form>
</div>
