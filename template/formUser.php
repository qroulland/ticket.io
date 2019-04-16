<form action="?do=createUser" method="POST">
  <div class="form-group">
    <div class="row">
      <div class="col">
        <input type="text" class="form-control" placeholder="Nom" name="user_nom" required>
      </div>
      <div class="col">
        <input type="text" class="form-control" placeholder="Prénom" name="user_prenom" required>
      </div>
    </div>
  </div>
  <div class="form-group">
    <input type="email" class="form-control" id="user_email" name="user_email" required placeholder="Email">
  </div>
  <div class="form-group">
    <div class="row">
      <div class="col">
        <input type="text" class="form-control" placeholder="Login" name="user_login" required>
      </div>
      <div class="col">
        <input type="password" class="form-control" placeholder="Mot de passe" name="user_password" required>
      </div>
    </div>
  </div>
  <div class="form-group">
    <label for="ticket_type">Rôle</label>
    <select class="form-control" id="user_role" name="user_role" required>
      <?php for ($p=0; $p<count($roles); $p++) { ?>
      <option value="<?=$roles[$p]['rol_num'];?>"><?=$roles[$p]['rol_type'];?></option>
      <?php } ?>
    </select>
  </div>
  <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
  <button type="submit" class="btn btn-primary btn-sm">Save</button>
</form>