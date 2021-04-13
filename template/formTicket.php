<form action="?do=createTicket" method="POST">
  <div class="form-group">
    <label for="ticket_title">Title</label>
    <input type="text" class="form-control" id="ticket_title" name="ticket_title" required>
  </div>
  <div class="form-group">
    <label for="ticket_description">Description</label>
    <textarea class="form-control" id="ticket_description" name="ticket_description" required></textarea>
  </div>
  <div class="form-group">
    <label for="ticket_project">Project</label>
    <select class="form-control" id="ticket_project" name="ticket_project">
      <?php for ($p=0; $p<count($projects); $p++) { ?>
      <option value="<?=$projects[$p]['pro_num'];?>"><?=$projects[$p]['pro_nom'];?></option>
      <?php } ?>
      <option value="">Aucun</option>
    </select>
  </div>
  <div class="form-group">
    <label for="ticket_type">Type</label>
    <select class="form-control" id="ticket_type" name="ticket_type">
      <?php for ($p=0; $p<count($types); $p++) { ?>
      <option value="<?=$types[$p]['typ_num'];?>"><?=$types[$p]['typ_nom'];?></option>
      <?php } ?>
    </select>
  </div>
  <div class="form-group">
    <label for="ticket_urgency">Urgency</label>
    <select class="form-control" id="ticket_urgency" name="ticket_urgency">
      <?php for ($p=0; $p<count($urgencies); $p++) { ?>
      <option value="<?=$urgencies[$p]['urg_num'];?>"><?=$urgencies[$p]['urg_type'];?></option>
      <?php } ?>
    </select>
  </div>
  <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
  <button type="submit" class="btn btn-primary btn-sm">Save</button>
</form>