<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
<!-- Refrence 
https://silviomoreto.github.io/bootstrap-select/examples/
Bootstrap-select example
https://codepen.io/Rio517/pen/NPLbpP/
-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>
<!--<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/i18n/defaults-*.min.js"></script>-->

<!-- BEGIN PAGE BREADCRUMBS -->
    <ul class="page-breadcrumb breadcrumb">
        <li>
            <a href="<?php echo base_url(); ?>worker/main">قائمة العاملين </a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <a href="<?php echo base_url('/worker/view/'.$post['id'].'/'.url_title(mb_substr($post['name'], 0, 12))); ?>"> <?php echo $post['name']?> </a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span> <?php echo $post['name']; ?> </span>
        </li>
    </ul>
<!-- END PAGE BREADCRUMBS -->

<div class="center">
<h2><?= $title ?></h2>
</div>
<?php echo form_open_multipart('worker/update'); date_default_timezone_set('Asia/Riyadh'); ?>
	<input type="hidden" name="id" value="<?php echo $post['id']; ?>">
    <div class="row">
      <div class="well content">
        <div class="col-md-12">
          
    		<div class="form-group">
    			<label>اسم العامل</label>
    			<input type="text" class="form-control" value="<?php echo $post['name']; ?>" name="name" placeholder="الاسم">
    		</div>
    		<div class="form-group">
    			<label>رقم البطاقة</label>
    			<input type="text" class="form-control" value="<?php echo $post['workerID']; ?>" name="workerID" placeholder="رقم البطاقة">
    		</div>
    		<div class="form-group">
    			<label>الجوال</label>
    			<input type="text" class="form-control" value="<?php echo $post['mobile']; ?>" name="mobile" placeholder="الجوال">
    		</div>
    		<div class="form-group">
    			<label> تاريخ الاقامة</label>
    			<input type="date" class="form-control" value="<?php echo $post['idDate']; ?>" name="idDate" placeholder="التاريخ"><?php echo $post['idDate']; ?>
    		</div>
    	</div>
    		<div class="form-group">
    			<label> رقم الجواز  </label>
    			<input type="text" class="form-control" value="<?php echo $post['passport_no']; ?>" name="passport_no" placeholder="رقم جواز السفر">
    		</div>
    		<div class="form-group">
    			<label> تاريخ الجواز</label>
    			<input type="date" class="form-control" value="<?php echo $post['passport_date']; ?>" name="passport_date" placeholder="تاريخ انتهاء جواز السفر">
    		</div>
	
    	<hr>
<h3>المرفقات</h3>
<?php  if($files) : ?>
<table class="table1">
	<tr>
		<?php foreach($files as $file) : ?>
		<!--<div class="well">-->
		<td>
		 	<?php if($file['file'] == 'noimage.jpg' && count($files) === 1): ?>
		 		<img width="128" height="128" src="<?php echo site_url(); ?>assets/images/posts/<?php echo $file['file']; ?>">
		 	<?php elseif($file['file'] != 'noimage.jpg'): ?>
		 		<img width="128" height="128" src="<?php echo site_url(); ?>assets/images/posts/<?php echo $file['file']; ?>">&nbsp &nbsp&nbsp&nbsp<br><br>
		 			<a onclick="return confirm('هل انت متأكد من حذف  <?php echo $file['file']; ?>')" href="<?php echo site_url(); ?>worker/delete_file/<?php echo $file['f_id']; ?>" class="btn-link text-danger">[X]</a>
			<?php endif; ?>
			 		</td>
		<!--</div>-->
		<?php endforeach; ?>
	</tr>
	<tr>
    	<td>
	    <br><br>
	</td>
    </tr>
	<tr><td>
	    <a  href="" data-toggle="modal" data-target="#ModalAtt">إضافة مرفقات جديدة</a>
	</td>
	</tr>
</table>
<?php else : ?>
	<p>No images To Display</p>
<?php endif; ?>

	<hr>
    	<div class="text-center">
    	     <button type="submit" class="btn btn-primary btn-block1 ">حفظ</button>
    
    	</div>
   	 </div> <!-- well content class -->
    </div>
</form>

<!-- Modal -->
        <div id="ModalAtt" class="modal fade" role="dialog">
          <div class="modal-dialog">
        
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close pull-left" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">إضافة صورة</h4></h4>
              </div>
                <?php echo form_open_multipart('worker/add_file'); date_default_timezone_set('Asia/Riyadh'); ?>
              <div class="modal-body">
                    <p>ملاحظة : </p>
                    <input type="hidden" name="id" value="<?php echo $post['id']; ?>">
                    <label for="exampleInputFile">يجب ان تكون الصورة بصيغة</label>
                    <small id="fileHelp" class="form-text text-muted">( gif | jpg | png )</small>
                    <input type="file" name="morefile" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp" onchange="loadFile(event)" accept="image/*"><br>
    	            <img style="display:inline;" width="128" height="128" id="output" src="#" alt="your image b"/><br>
    	            <script>
                      var loadFile = function(event) {
                        var output = document.getElementById('output');
                        output.src = URL.createObjectURL(event.target.files[0]);
                      };
                    </script>
	            
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary">حفظ</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
              </div>
              <?php echo form_close(); ?>
              
            </div>
          </div>
        </div>
        <!-- End Modal -->
 <script>
                CKEDITOR.replace( 'editor1' );
            </script>