<div class="card <?php echo cardColor(getUrgency($tickets[$key][$p]['tic_urgence']))?>">
    <strong><?php echo $tickets[$key][$p]['tic_titre'] ?></strong>
    <p><?php echo $tickets[$key][$p]['tic_description'] ?></p>
    <div class="d-flex">
        <span class="mini-label d-flex justify-content-center align-items-center">
            <i class="<?php echo getIconType($tickets[$key][$p]['tic_type']);?>"></i>
        </span>
        <?php if($tickets[$key][$p]['tic_projet'] != NULL){ ?>
            <span class="mini-label">
                <i class="fas fa-project-diagram text-secondary mr-1"></i>
                <?php echo getProject($tickets[$key][$p]['tic_projet']); ?>
            </span>
        <?php } ?>
        <?php if($value === "Todo" && getRole($_SESSION['login']) != 1){ ?>
        <form action="?do=start_intervention/<?php echo $tickets[$key][$p]['tic_num'];?>" method="POST" style="margin: 0px" class="ml-auto">
            <button type="submit" class="btn btn-secondary btn-sm" name="submit">Intervenir</button>
        </form>
        <?php } elseif($value === "In progress" && getIntervenant($tickets[$key][$p]['tic_num']) === $_SESSION['loginId']) { ?>
        <form action="?do=end_intervention/<?php echo $tickets[$key][$p]['tic_num'];?>" method="POST" style="margin: 0px" class="ml-auto">
            <button type="submit" class="btn btn-secondary btn-sm" name="submit">Terminer</button>
        </form>
        <?php } elseif($value === "Done" && getRole($_SESSION['login']) == 3) { ?>
        <form action="?do=close_ticket/<?php echo $tickets[$key][$p]['tic_num'];?>" method="POST" style="margin: 0px" class="ml-auto">
            <button type="submit" class="btn btn-secondary btn-sm" name="submit">Cloturer</button>
        </form>
        <?php } ?>
    </div>
</div>