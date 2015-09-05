<?php foreach($badges as $row):?>
    <div>
        <img src="<?php echo base_url();?>/Images/<?php echo $row['filename'];?>" alt="badge">
        <h3>Description: <?php echo $row["description"];?></h3>
        <h5>Category <?php echo $row["category"];?></h5>
        <h5>Score needed: <?php echo $row["score"];?></h5>
        <h5>Points gained: <?php echo $row["points"];?></h5>
    </div>
<?php endforeach;?>