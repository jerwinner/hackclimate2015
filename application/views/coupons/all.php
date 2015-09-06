<br><br><br>

<h3 align="center">All Coupons</h3>

<?php foreach($coupons as $row):?>
    <div class="coupon">
        <h3>Company: <?php echo $row["company"];?></h3>
        <p>Description: <?php echo $row["text"];?></p>
        <h5>Points needed: <?php echo $row["points_needed"];?></h5>
        <input type="button" class="btn btn-success input-sm" style="width: 80%; margin:5px 0;" onclick="get_coupon(<?php echo $row["id"];?>)" value="Get">
    </div>
<?php endforeach;?>

<script>
    function get_coupon(id){
        window.location.replace("<?php echo base_url();?>user/exchange_point/" + id);
    }
</script>