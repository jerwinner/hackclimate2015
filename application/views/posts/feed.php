
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
            <h2><?php echo $row["name"];?></h2>
            <p><?php echo $row["text"];?></p>
            Location: <?php echo $row["descriptions"];?><br>
            Category: <?php echo $row["description"];?>
            <input type="button" onclick="add_up(<?php echo $row["id"];?>)" value="UP(<?php echo $row['ups'];?>)">
            <input type="button" onclick="add_down(<?php echo $row["id"];?>)" value="DOWN(<?php echo $row['downs'];?>)">
        </div>
    <?php endforeach;?>

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

</div>