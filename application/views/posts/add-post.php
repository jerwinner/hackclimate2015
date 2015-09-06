<?php echo form_open("posts/add_post", array("class" => "form-horizontal"));?>
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Add Post</h4>
    </div>

    <div class="modal-body">

        <div class="form-group form-group-sm">
            <label for="content" class="col-sm-3 control-label">Content</label>
            <div class="col-sm-9">
                <textarea name="content" class="form-control" required rows="3"></textarea>
            </div>
        </div>

        <div class="form-group form-group-sm">
            <label for="category" class="col-sm-3 control-label">Category</label>
            <div class="col-sm-9">
                <?php echo form_dropdown('category', $categories, '0' , "class='form-control'");?>
            </div>
        </div>

        <div class="form-group form-group-sm">
            <label for="location" class="col-sm-3 control-label">Location</label>
            <div class="col-sm-9">
                <?php echo form_dropdown('location', $locations, '0' , "class='form-control'");?>
            </div>
        </div>

    </div>

    <div class="modal-footer">
        <input type="submit" class="btn btn-success" id="submit" value="Post">
    </div>

<?php echo form_close();?>