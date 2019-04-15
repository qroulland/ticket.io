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
            <label><?=$urgencies[$u]['urg_type'];?></label>
        </div>
        <?php } ?>
        <button type="submit" class="btn btn-success btn-sm w-100">Apply</button>
    </form>