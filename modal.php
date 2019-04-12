<?php include('template/header.php');include('template/navbar.php');?>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#cardModal">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="cardModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ticket title</h5>
      </div>

      <div class="modal-body">
        
        <?php include('template/form.php'); ?>

      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary btn-sm">Save changes</button>
      </div>
    </div>
  </div>
</div>

<?php include('template/footer.php'); ?>