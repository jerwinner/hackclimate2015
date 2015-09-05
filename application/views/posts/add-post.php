<?php echo form_open("posts/add_post"); ?>
    <textarea rows="4" cols="50" name="content"></textarea><br/>

    <select class="select" placeholder="Category" name="category">
        <?php foreach($categories as $row):?>
            <option value="<?php echo $row["id"];?>"><?php echo $row["description"];?></option>
        <?php endforeach;?>
    </select>

    <select class="select" placeholder="Location" name="location">
        <?php foreach($locations as $row):?>
            <option value="<?php echo $row["id"];?>"><?php echo $row["descriptions"];?></option>
        <?php endforeach;?>
    </select>
     <br/>
    <input type="submit" value="Submit"/>

<?php echo form_close(); ?>
