<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title">All Badges</h4>
</div>

<div class="modal-body">

    <?php foreach($badges as $row):?>
        <div class="badge-div">
            <img src="<?php echo base_url();?>/Images/<?php echo $row['filename'];?>" alt="badge">
            <h5>Category <b><?php echo $row["category"];?></b></h5>
            <h5>Score needed: <b><?php echo $row["score"];?></b></h5>
            <h5>Points gained: <b><?php echo $row["points"];?></b></h5>
        </div>

    <?php endforeach;?>

</div>