<div class="side-bar">

    <div class="mb-4" style="border-bottom: 1px solid #b9b9b9">
        <form action="">
            <label>NEW PROJECT</label>
            <div class="input-group input-group-sm mb-3">
                <input type="text" class="form-control form-control-sm" placeholder="Project name">
                <div class="input-group-append">
                    <button class="btn btn-warning btn-sm" type="button">New</button>
                </div>
            </div>
        </form>
        <button class="btn btn-success btn-sm w-100 mb-2" data-toggle="modal" data-target="#cardModal">Create a ticket</button>
    </div>

    <?php include('template/modal.php'); ?>

    <?php include('template/formFilter.php'); ?>
    
</div>