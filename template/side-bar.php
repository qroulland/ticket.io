<div class="side-bar">

    <div class="mb-4" style="border-bottom: 1px solid #b9b9b9">
        <?php if(getRole($_SESSION['login']) == 3) { ?>
        <label>NEW PROJECT</label>
        <form action="?do=createProject" method="POST">
            <div class="input-group">
                <input type="text" class="form-control form-control-sm" placeholder="Project Name" name="project_name">
                <div class="input-group-append">
                    <button class="btn btn-warning btn-sm" type="submit">New</button>
                </div>
            </div>
        </form>
        <?php } ?>
        
        <button class="btn btn-success btn-sm w-100 mb-2" data-toggle="modal" data-target="#cardModal">Create a ticket</button>
    </div>

    <?php include('Template/modal.php'); ?>

    <?php include('Template/formFilter.php'); ?>

</div>