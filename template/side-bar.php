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
        <form action="">
            <button class="btn btn-success btn-sm w-100 mb-2">Create a ticket</button>
        </form>
    </div>

    <form action="?do=update" method="post">
        <p>PROJECT</p>
        <?php 
        for ($p=0; $p<count($projects); $p++) { ?>
        <div class="form-group">
            <input type="checkbox">
            <label><?=$projects[$p]['pro_nom'];?></label>
        </div>
        <?php } ?>
        <p>TYPE</p>
        <?php 
        for ($t=0; $t<count($types); $t++) { ?>
        <div class="form-group">
            <input type="checkbox">
            <label><?=$types[$t]['typ_nom'];?><i class="<?=$types[$t]['typ_icone']?> ml-2"></i></label>
        </div>
        <?php } ?>
        <p>URGENCY</p>
        <?php 
        for ($u=0; $u<count($urgencies); $u++) { ?>
        <div class="form-group">
            <input type="checkbox">
            <label><?=$urgencies[$u]['urgent_type'];?></label>
        </div>
        <?php } ?>
        <button type="submit" class="btn btn-success btn-sm w-100">Apply</button>
    </form>
</div>