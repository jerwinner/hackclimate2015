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
                    case "Land Pollution":
                        echo base_url() . "/images/category/land_icon.png";
                        break;
                    case "Wildlife Protection":
                        echo base_url() . "/images/category/wildlife_icon.png";
                        break;

                }
            ?>' height="60%" />
            <br>
            <div style="display:block; margin: -14px 0 0 22px">
                <span class="btn input-sm btn-success glyphicon glyphicon-arrow-up "
                    onclick="add_up(<?php echo $row["id"];?>)"> </span>
                     <?php echo $row['ups'];?>
                <span class="btn input-sm btn-danger glyphicon glyphicon-arrow-down"
                    onclick="add_down(<?php echo $row["id"];?>)"> </span>
                    <?php echo $row['downs'];?>
            </div>
        </div>
    </div>
        
<?php endforeach; ?>

</div>

<div class="profile">
    <h4>John Smith</h4>
    <hr>
    <h3 align="center">Badges</h3>
    <?php foreach($badges as $row):?>
        <div >
            <img class="profile-badge" src="<?php echo base_url();?>/Images/<?php echo $row['filename'];?>" alt="badge">
        </div>
    <?php endforeach;?>
    <input type="button" value="View All Badges" onclick="showLargeModal('user/view_all_badges')" class="btn btn-success profile-btn">
    <input type="button" value="View Coupons" onclick="all_coupons()" class="btn btn-success profile-btn">
</div>


<script>
    function add_up(id){
        window.location.replace("<?php echo base_url();?>posts/add_up/"+id);
    }

    function add_down(id){
        window.location.replace("<?php echo base_url();?>posts/add_down/"+id);
    }

    function filter(filt){
        window.location.replace("<?php echo base_url();?>posts/filter_by_category/"+filt);
    }

</script>

