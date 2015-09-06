<html>
    <head>
        <title>EcoPatrol</title>
        <link rel="stylesheet" href="<?php echo base_url();?>lib/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url();?>css/styles.css">

        <script src = "<?php echo base_url();?>JS/jquery.js"></script>
        <script src = "<?php echo base_url();?>lib/bootstrap/js/bootstrap.min.js"></script>
    </head>

    <body>
        <div class="header">
            <a href="<?php echo base_url();?>/posts"><img src="<?php echo base_url();?>/images/white-logo.png" alt="logo" class="logo"></a>
            <input type="button" onclick="logOut()" value="Log Out" class="btn btn-danger add-post">
            <input type="button" onclick="showDefaultModal('posts/load_view_add')" value="Add Post" class="btn btn-success add-post">
        </div>

        <div class="user-profile">

        </div>

        <!--Small Modal Template-->
        <div class="modal fade bs-example-modal-sm" id="modal_small" tabindex="-1" role="dialog" aria-labelledby="modal_smallLabel">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content" id="modal_sm_contents">
                </div>
            </div>
        </div>

        <!--Large Modal Template-->
        <div class="modal fade bs-example-modal-lg" id="modal_large" tabindex="-1" role="dialog" aria-labelledby="modal_smallLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content" id="modal_lg_contents">
                </div>
            </div>
        </div>

        <!--Default Modal Template-->
        <div class="modal fade" id="modal_default" tabindex="-1" role="dialog" aria-labelledby="modal_smallLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content" id="modal_dt_contents">
                </div>
            </div>
        </div>

        <script>
            function showDefaultModal(url, id){
                $("#modal_dt_contents").html("");
                $("#modal_lg_contents").html("");
                $("#modal_sm_contents").html("");
                $("#modal_default").modal('show');
                $.ajax({
                    type: 'POST',
                    url: '<?php echo site_url();?>' + url,
                    data: {id:id},
                    success: function(msg){
                        $("#modal_dt_contents").html(msg);
                    }
                });
            }

            function showSmallModal(url, id){
                $("#modal_dt_contents").html("");
                $("#modal_lg_contents").html("");
                $("#modal_sm_contents").html("");
                $("#modal_small").modal('show');
                $.ajax({
                    type: 'POST',
                    url: '<?php echo site_url();?>' + url,
                    data: {id:id},
                    success: function(msg){
                        $("#modal_sm_contents").html(msg);
                    }
                });
            }

            function showLargeModal(url, id){
                $("#modal_lg_contents").html("");
                $("#modal_dt_contents").html("");
                $("#modal_sm_contents").html("");
                $("#modal_large").modal('show');
                $.ajax({
                    type: 'POST',
                    url: '<?php echo site_url();?>' + url,
                    data: {id:id},
                    success: function(msg){
                        $("#modal_lg_contents").html(msg);
                    }
                });
            }

            function logOut(){
                window.location.replace("<?php echo base_url();?>");
            }

        </script>