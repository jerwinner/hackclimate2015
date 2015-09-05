<input type="button" onclick="showDefaultModal('posts/load_view_add')" value="Add Post">

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
</script>