<div class="container p-5 text-center">
    <div class="rounded-circle bg-dark profil-icon d-flex justify-content-center align-items-center mb-3 mx-auto">
        <i class="fas fa-user fa-5x text-light"></i>
    </div>
    <h1 class="text-uppercase"><?php echo $_SESSION['login']; ?></h1>
    <p class="text-uppercase"><?php echo getRoleLibelle($_SESSION['loginRole']); ?></p>

    <?php if($_SESSION['loginRole'] != 1){ ?>
    <div class="d-flex row mt-5">
        <div class="col">
            <div class="nombreStats"><?php echo $NumberProjects ?></div>
            <p>Implications dans des projets</p>
        </div>
        <div class="col">
            <div class="nombreStats"><?php echo $NumberTicketsIntervention ?></div>
            <p>Prise en charge de ticket</p>
        </div>
        <div class="col">
            <div class="nombreStats"><?php echo $TimeIntervention[0]."h".$TimeIntervention[1] ?></div>
            <p>Durée d'implication</p>
        </div>
    </div>
    <?php } else { ?>
    <div class="d-flex row mt-5">
        <div class="col">
            <div class="nombreStats"><?php echo $NumberTicketsCreate ?></div>
            <p>Créations de ticket</p>
        </div>
        <div class="col">
            <div class="nombreStats"><?php echo $NumberTicketsPause ?></div>
            <p>Tickets en attente</p>
        </div>
        <div class="col">
            <div class="nombreStats"><?php echo $NumberTicketsClose ?></div>
            <p>Tickets résolus</p>
        </div>
    </div>
    <?php } ?>
</div>