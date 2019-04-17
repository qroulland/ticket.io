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
        <span class="ml-auto">
            <a href="?do=return_to_TD/<?php echo $tickets[$key][$p]['tic_num'];?>" class="btn btn-danger btn-sm mr-1"> < </a>
            <a href="?do=end_intervention/<?php echo $tickets[$key][$p]['tic_num'];?>" class="btn btn-secondary btn-sm">Terminer</a>
        </span>
        <?php } elseif($value === "Done" && getRole($_SESSION['login']) == 3) { ?>
            <span class="ml-auto">
                <a href="?do=return_to_SI/<?php echo $tickets[$key][$p]['tic_num'];?>" class="btn btn-danger btn-sm mr-1"> < </a>
                <a href="?do=close_ticket/<?php echo $tickets[$key][$p]['tic_num'];?>" class="btn btn-secondary btn-sm" >Cloturer</a>
            </span>
        <?php } ?>
    </div>
</div>