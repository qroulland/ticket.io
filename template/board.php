<div class="board row">
    <?php foreach($col as $key=>$value){ ?>
        <div class="col">
            <h4><?php echo $value;?></h4>
            <div>
            <?php for ($p=0; $p<count($tickets[$key]); $p++) { 
                    include('Template/card.php');
                }
            ?>
            </div>
        </div>
    <?php } ?>
</div>

