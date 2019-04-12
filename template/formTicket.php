<form>
  <div class="form-group">
    <label for="ticket_title">Title</label>
    <input type="text" class="form-control" id="ticket_title">
  </div>
  <div class="form-group">
    <label for="ticket_description">Description</label>
    <textarea class="form-control" id="ticket_description"></textarea>
  </div>
  <div class="form-group">
    <label for="ticket_project">Project</label>
    <select class="form-control" id="ticket_project">
      <option>Kanban</option>
      <option>Showcase</option>
      <option>Aucun</option>
    </select>
  </div>
  <div class="form-group">
    <label for="ticket_type">Type</label>
    <select class="form-control" id="ticket_type">
      <option>Feature</option>
      <option>Bug</option>
      <option>Chore</option>
    </select>
  </div>
  <div class="form-group">
    <label for="ticket_urgency">Urgency</label>
    <select class="form-control" id="ticket_urgency">
      <option>Low</option>
      <option>Meduim</option>
      <option>Hight</option>
    </select>
  </div>
</form>