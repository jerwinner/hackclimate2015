<html>
    <head>
        <title></title>
    </head>
    <body>
        <?php echo form_open("posts/add_post"); ?>
            <textarea rows="4" cols="50" name="texts"></textarea><br/>

            <select class="select" name="category">
                <option value="">Choose Category</option>
                <?php foreach($categories as $row):?>
                    <option value="<?php echo $row["id"];?>"><?php echo $row["id"]; ?></option>
                <?php endforeach;?>
            </select>

            <select class="select" name="location">
                <option value="">Choose Location</option>
                <?php foreach($locations as $row):?>
                    <option value="<?php echo $row["id"];?>"><?php echo $row["id"]; ?></option>
                <?php endforeach;?>
            </select>
             <br/>
            <input type="submit" value="Submit"/>
        <?php echo form_close(); ?>
    </body>
</html>