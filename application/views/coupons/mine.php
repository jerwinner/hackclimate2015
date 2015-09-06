<br><br><br>

<h3 align="center">My Coupons</h3>

<?php
$counter = 0;
foreach($coupons as $row):
	$counter ++;?>
    <div class="coupon" id="" onclick="use_coupon('<?php echo $row["coupon_code"];?>')" value="Use">
        <h3><?php echo $row["company"];?></h3>
        <p><?php echo $row["text"];?></p>
        <h4><?php echo $row["coupon_code"];?></h4>
        <input type="button" class="btn btn-success input-sm" style="width: 80%; margin:5px 0;" value="Use Coupon">
    </div>
<?php endforeach;
if($counter == 0){
	echo "You currently have no coupon";
}
?>

<script>
    function use_coupon(code){
        window.location.replace("<?php echo base_url();?>user/use_coupon/" + code);
    }
</script>