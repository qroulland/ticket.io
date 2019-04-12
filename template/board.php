<div class="board row">
        <div class="col">
            <h4>Todo</h4>
            <div>
                <?php for ($i = 1; $i <= 3; $i++) {
                    include('template/card.php');
                } ?>
            </div>
        </div>
        <div class="col">
            <h4>In progress</h4>
            <div>
                <?php for ($i = 1; $i <= 1; $i++) {
                    include('template/card.php');
                } ?>
            </div>
        </div>
        <div class="col">
            <h4>Done</h4>
            <div>
                <div class="card card-yellow">
                    <strong>Title</strong>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                    <div class="d-flex">
                        <span class="mini-label d-flex justify-content-center align-items-center">
                            <i class="fas fa-bug text-danger"></i>
                        </span>
                        <span class="mini-label">
                            <i class="fas fa-project-diagram text-secondary mr-1"></i>
                            Showcase
                        </span>
                    </div>
                </div>
                <div class="card card-green">
                    <strong>Title</strong>
                    <p>Lorem ipsum dolor sit amet, consectetur</p>
                    <div class="d-flex">
                        <span class="mini-label d-flex justify-content-center align-items-center">
                            <i class="fas fa-wrench text-info"></i>
                        </span>
                        <span class="mini-label">
                            <i class="fas fa-project-diagram text-secondary mr-1"></i>
                            Showcase
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <h4>Close</h4>
            <div>
                <div class="card card-red">
                    <strong>Title</strong>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam qui placeat</p>
                    <div class="d-flex">
                        <span class="mini-label d-flex justify-content-center align-items-center">
                            <i class="fas fa-wrench text-info"></i>
                        </span>
                        <span class="mini-label">
                            <i class="fas fa-project-diagram text-secondary mr-1"></i>
                            Showcase
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>