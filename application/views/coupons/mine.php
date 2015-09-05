<?php foreach($coupons as $row):?>
    <div>
        <h3>Company: <?php echo $row["company"];?></h3>
        <p>Description: <?php echo $row["text"];?></p>
        <h4>Coupon Code: <?php echo $row["coupon_code"];?></h4>
        <input type="button" onclick="use_coupon('<?php echo $row["coupon_code"];?>')" value="Use">
    </div>
<?php endforeach;?>

<script>
    function use_coupon(code){
        window.location.replace("<?php echo base_url();?>user/use_coupon/" + code);
    }
</script>