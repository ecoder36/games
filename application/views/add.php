


<!-- BEGIN PAGE BREADCRUMBS -->
    <ul class="page-breadcrumb breadcrumb">
        <li>
            
<a  href="<?php echo base_url(); ?>games/main"> games</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span> <?= $title ?> </span>
        </li>
    </ul>
<!-- END PAGE BREADCRUMBS -->


<?php echo form_open_multipart('games/create'); date_default_timezone_set('Asia/Riyadh'); ?>
    <div class="row">
        <div class="well content">
            <div class="col-md-12">
    
        		<h1 class="text-center"><?= $title; ?></h1>
        		<div class="form-group">
        			<label>   link</label>
        			<input type="text" class="form-control" value="<?php echo set_value('link'); ?>" name="link" placeholder="link">
        		</div>
        		<div class="form-group">
        			<label> name</label>
        			<input type="text" class="form-control" value="<?php echo set_value('name'); ?>" name="name" placeholder="الاسم">
        		</div>
        	
        	
        		<div class="col-md-12">
                    <div class="form-group">
                        <label for="exampleInputFile">img</label>
                        <input type="file" accept="image/*"  name="f1" class="form-control-file" onchange="loadFile(event)">
                        <img style="display:inline;" width="128" height="128" id="output" src="#" alt="your image b"/><br>
                        <script>
                          var loadFile = function(event) {
                            var output = document.getElementById('output');
                            output.src = URL.createObjectURL(event.target.files[0]);
                          };
                        </script>
                    </div>
                </div>
        	</div>
        	<div class="text-center">
        	     <button type="submit" class="btn btn-primary btn-block1 ">Submit</button>
        
        	</div>
       	</div>
    </div>
<?php echo form_close(); ?>

