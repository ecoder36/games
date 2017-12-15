<script type="text/javascript" class="init">
$(document).ready(function() {
       $('.categoryTable').DataTable( {
         pageLength: 2,
        "order": [[ 0, "desc" ]],
        responsive: {details: { display: $.fn.dataTable.Responsive.display.childRowImmediate}}     
    } );
      $('.gamesTable').DataTable( {
        "order": [[ 0, "desc" ]],
         // Internationalisation. For more info refer to http://datatables.net/manual/i18n
        "columnDefs": [
            {
              //  "targets": [ 4 ],
              //  "visible": false,
              //  "searchable": false
            },
            ],
        responsive: {
        details: {
            display: $.fn.dataTable.Responsive.display.childRowImmediate
        }
    }
            
    } );

} );
</script>
<style type="text/css">
    th, td { text-align: center; }
</style>
<a class="btn btn-success" href="<?php echo base_url(); ?>games/add">Add New Game</a>
     <div class="well content">
        <div class="row">
<?php echo form_open_multipart('games/addcategory'); date_default_timezone_set('Asia/Riyadh'); ?>
   
            <div class="col-md-6"> <h3>Add New Category</h3>
    	    <input type="hidden" name="gameid" value="0">
        		<div class="form-group">
        			<label>   category</label>
        			<input type="text" class="form-control" value="<?php echo set_value('category'); ?>" name="category" placeholder="category">
        		</div>
        		<div class="form-group">
        			<label>   url</label>
        			<input type="text" class="form-control" value="<?php echo set_value('url'); ?>" name="url" placeholder="url">
        		</div>
        	    <div class="text-center">
        	         <button type="submit" class="btn btn-primary btn-block1 ">Submit</button>
        	    </div>
            </div>
<?php echo form_close(); ?>
  <div class="col-md-6"> 
    <h3>Category</h3>
    <table class="display categoryTable" cellspacing="0" width="100%" dir="rtl">
        <thead>
            <tr>
                <th> Category</th>
                <th>link</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($categories as $category) : ?>
            <tr>
                <td><?php echo $category['keyword']; ?> </td>
                <td><a href="<?php echo base_url('category/'.$category['url_title']); ?>"><?php echo $category['url_title']; ?></a> </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
  </div>
</div>
	</div>
<div class="well content">
    <div id="div_print">
    <table class="gamesTable display" cellspacing="0" width="100%" dir="rtl">
        <thead>
            <tr>
                <th> id</th>
                <th> link</th>
                <th> name</th>
                <th> keyword</th>
                <th> img </th>
                <th> open  </th>
                <th> delete  </th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($games as $game) : ?>
            <tr>
                <td><?php echo $game['gameid']; ?> </td>
                <td><?php echo $game['link']; ?> </td>
                <td><?php echo $game['name']; ?> </td>
                <td><?php echo $game['keyword']; ?> </td>
                <td width="121"><img height="122" class="post-thumb" src="<?php echo base_url(); ?>assets/images/games/<?php if($game['img']!=NULL){ echo $game['img']; }else{echo 'noimage.jpg'; } ?>"></td>
                <td><a class="btn btn-default btn-sm" href="<?php echo base_url($game['url_title']); ?>">  open </a></td>
                <td class="dontprint">
                <a class="btn-link text-danger" onclick="return confirm(' <?php echo $game['name']; ?>')" href="<?php echo base_url(); ?>games/delete/<?php echo $game['gameid']; ?>"> Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    </div>
</div>