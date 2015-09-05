<html>
    <head>
        <title></title>
    </head>
    <body>
        <div class="container">
            <div class="feed">

            </div>

            <?php echo form_open("controller/location"); ?>
                <select class="select" name="filterLoc">
                    <option value="">Filter Location</option>
                    <?php foreach($locations as $row):?>
                        <option value="<?php echo $row["id"];?>"><?php echo $row["id"]; ?></option>
                    <?php endforeach;?>
                </select>
            <?php echo form_close(); ?>
            <input type="button" onclick="add_post()" value="Post"><br/><br/>
            <input type="button" onclick="view_badges()" value="View Badges"><br/><br/>
            <input type="button" onclick="view_coupons()" value="View Coupons"><br/><br/>
        </div>


        <script>
            function add_post(){
                window.location.replace("<?php echo base_url(); ?>controller/page_addpost");
            }
            function view_badges(){
                window.location.replace("<?php echo base_url(); ?>controller/page_viewbadges");
            }
            function view_coupons(){
                window.location.replace("<?php echo base_url(); ?>controller/page_viewcoupons");
            }
        </script>
    </body>
</html>