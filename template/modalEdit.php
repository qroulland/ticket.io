<div class="modal fade" id="editModal<?php echo $tickets[$key][$p]['tic_num']?>" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Informations</h5>
            </div>

            <div class="modal-body">
                <strong><?php echo $tickets[$key][$p]['tic_titre'] ?></strong>
                <p><?php echo $tickets[$key][$p]['tic_description'] ?></p>
                <?php if($tickets[$key][$p]['tic_intervenant'] != NULL){ ?>
                <hr>
                <strong>Pris en charge le <?php echo date("d/m/Y", strtotime($tickets[$key][$p]['tic_date_prise_en_charge']))." à ".date("H:i", strtotime($tickets[$key][$p]['tic_date_prise_en_charge']))?> par <?php echo getUser($tickets[$key][$p]['tic_intervenant'])?></strong>
                <?php } ?>
                <?php if($tickets[$key][$p]['tic_date_fin_intervention'] != NULL) { ?>
                <hr>
                <strong>Fin d'intervention le  <?php echo date("d/m/Y", strtotime($tickets[$key][$p]['tic_date_fin_intervention']))." à ".date("H:i", strtotime($tickets[$key][$p]['tic_date_fin_intervention']))?></strong>
                <p><?php echo $tickets[$key][$p]['tic_description_intervention'] ?></p>
                <?php } ?>
                <?php if($tickets[$key][$p]['tic_date_cloture'] != NULL) { ?>
                <hr>
                <strong>Ticket cloturé le  <?php echo date("d/m/Y", strtotime($tickets[$key][$p]['tic_date_cloture']))." à ".date("H:i", strtotime($tickets[$key][$p]['tic_date_cloture']))?></strong>
                <?php } ?>
            </div>
        </div>
    </div>
</div>