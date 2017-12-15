


<!-- BEGIN PAGE BREADCRUMBS -->
    <ul class="page-breadcrumb breadcrumb">
        <li>
            <a href="<?php echo base_url(); ?>games/main"> main </a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span> <?php echo $post['name']; ?> </span>
        </li>
    </ul>
<!-- END PAGE BREADCRUMBS -->

<style type="text/css">
    .sixteen-nine {
    position: relative;
}

.frame-wrap {
    width: 100%;
}


.game-frame {
    width: 90%;
    height: 90%;
    border: none;
}




</style>
<div class="main">
<div class="row content">
    
    <div id="playwire-pre-content" class="frame-wrap sixteen-nine"> 
    <!--<iframe id="gameFrame" class="game-frame ar-content" src="https://gartic.io"></iframe>-->
    <iframe id="gameFrame" class="game-frame ar-content" src="<?php echo $post['link']; ?>"></iframe>
    </div>





    <table class="table">
        <thead>
            <tr>
                <th class="centere">id</th>
                <th >link</th>
                <th>name </th>
                <th> img</th>
                <th> keyword</th>
            </tr>
        </thead>
        <tbody>
        	<tr>
                <td><?php echo $post['gameid']; ?></td>
                <td><?php echo $post['link']; ?></td>
                <td><?php echo $post['name']; ?></td>
                <td><?php echo $post['img']; ?></td>
                <td><?php echo $post['keyword']; ?></td>
            </tr>
        </tbody>
    </table>
   
<hr>	    
     <div class="well content"><h3>Keywords</h3>
        <div class="row">
    		<?php foreach($keywords as $key) : ?>
    		<?php if($key['level']!=3) : ?>
    		 <div class="col-md-6"> 
    		    <a class="btn btn-default btn-sm" href="<?php echo base_url(url_title(mb_substr($key['url_title'], 0, 120))); ?>"> <?php echo $key['keyword']; ?> </a>
    	        <br><br>
              </div>
    		<?php endif ?>
    		<?php endforeach; ?>
    	<hr>
        </div>
    </div>
    
    
    
    
    <div class="well content"><h3>category</h3>
       <div class="row">
            <?php foreach($keywords as $key) : ?>
    		<?php if($key['level']==3) : ?>
               <div class="col-md-6"> 
    	        <a class="btn btn-default btn-sm" href="<?php echo base_url("category/".$key['url_title']); ?>"> <?php echo $key['keyword']; ?> </a>
    	        <br><br>
               </div>
            <?php endif ?>
    		<?php endforeach; ?>
      </div>
    </div>
   <div class="well content">
         <div class="row">
<?php echo form_open_multipart('games/addkeyword'); date_default_timezone_set('Asia/Riyadh'); ?>
    
  
            <div class="col-md-6">
            	<input type="hidden" name="gameid" value="<?php echo @$post['gameid']; ?>">
                <input type="hidden" name="name" value="<?php echo @$post['name']; ?>">	
                <input type="hidden" name="url" value="<?php echo @$post['url_title']; ?>">	
        	    <div class="form-group">
        		    <label> keyword</label>
        	    	<input type="text" class="form-control" value="<?php echo set_value('keyword'); ?>" name="keyword" placeholder="keyword">
        	    </div>	
            	<div class="text-center">
        	        <button type="submit" class="btn btn-primary btn-block1 ">Add</button>
        	    </div>
       	    </div>
    
<?php echo form_close(); ?>

<?php echo form_open_multipart('games/add_more_category'); date_default_timezone_set('Asia/Riyadh'); ?>
    
  
            <div class="col-md-6">
    	        <input type="hidden" name="gameid" value="<?php echo @$post['gameid']; ?>">
        		<div class="form-group">
        			<label>   category</label>
        			<select name="category">
        			    <option value="">select</option>
        			    <?php foreach($categories as $category) : ?>
                        <option value="<?php echo $category['keyid']; ?>"><?php echo $category['keyword']; ?></option>
                        <?php endforeach; ?>
        			</select>
        		</div>
            	<div class="text-center">
        	     <button type="submit" class="btn btn-primary btn-block1 ">Add</button>
                </div>
        	</div>

<?php echo form_close(); ?>

       	</div>
    </div>
</div>
</div>

