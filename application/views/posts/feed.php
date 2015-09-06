<div class="filters">
    <h2>Filter by Category</h2>
    <hr>
    <img class="img-filter" src="<?php echo base_url();?>/images/category/air_icon.png" style="cursor:pointer;" onclick="filter(4)">
    <img class="img-filter" src="<?php echo base_url();?>/images/category/land_icon.png" style="cursor:pointer;" onclick="filter(1)">
    <img class="img-filter" src="<?php echo base_url();?>/images/category/water_icon.png" style="cursor:pointer;" onclick="filter(3)">
    <img class="img-filter" src="<?php echo base_url();?>/images/category/wildlife_icon.png" style="cursor:pointer;" onclick="filter(2)">

    <?php echo form_open("posts/filter_by_loc");?>
        <h2>Filter by Location</h2>
        <hr>
        <?php echo form_dropdown("location", $locations, 0, "class='form-control input-sm'");?>
        <input class="btn btn-success pull-right input-sm" type="submit" value="Filter" style="margin: 5px 0px 0px;">
    <?php echo form_close();?>
</div>


<div class="feeds">

    <?php foreach($posts as $row):?>
    <div class="post">
        <div class="post-desc">
            <h2><?php echo $row["name"];?></h2>
            <span class="glyphicon glyphicon-map-marker"></span>
            <?php echo $row["descriptions"];?><br>
            <p><?php echo $row["text"];?></p>
        </div>
        <div class="post-btns">
            <img src='<?php
                switch($row["description"]){
                    case "Water Pollution":
                        echo base_url() . "/images/category/water_icon.png";
                        break;
                    case "Air Pollution":
                        echo base_url() . "/images/category/air_icon.png";
                        break;
                    case "Waste Management":
                        echo base_url() . "/images/category/land_icon.png";
                        break;
                    case "Wildlife Protection":
                        echo base_url() . "/images/category/wildlife_icon.png";
                        break;

                }
            ?>' height="60%" />
            <br>
            <span class="btn input-sm btn-success glyphicon glyphicon-arrow-up "
                onclick="add_up(<?php echo $row["id"];?>)"> </span>
                 <?php echo $row['ups'];?>
            <span class="btn input-sm btn-danger glyphicon glyphicon-arrow-down"
                onclick="add_down(<?php echo $row["id"];?>)"> </span>
                <?php echo $row['downs'];?>
        </div>
    </div>
<?php endforeach; ?>

</div>

<div class="profile">
    
</div>