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

     <div class="well content" hidden>
        <div class="row">

  <div class="col-md-12"> 
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
	
	   <div class="well content" hidden><h3>category</h3>
       <div class="row">
            <?php foreach($categories as $category) : ?>
               <div class="col-md-6"> 
    	        <a class="btn btn-default btn-sm" href="<?php echo base_url('category/'.$category['url_title']); ?>"> <?php echo $category['keyword']; ?> </a>
    	        <br><br>
               </div>
    		<?php endforeach; ?>
      </div>
    </div>
    
    
    
    

<div class="well container">
        <!-- Page Header -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">IO Games
                    <small>A Collection of The Best io games</small>
                </h1>
            </div>
        </div>
        <!-- /.row -->

   <!-- Projects Row -->

        <div class="row">
            <?php foreach($games as $game) : ?>
            <div class="col-md-4 portfolio-item">
                <div class="shadow ">
                    <div class="well white">
                        <a href="<?php echo base_url($game['url_title']); ?>">
                            <img class="img-responsive" src="<?php echo base_url(); ?>assets/images/games/<?php if($game['img']!=NULL){ echo $game['img']; }else{echo 'noimage.jpg'; } ?>" width="700px" height="400px" alt="">
                        </a>
                        <h3>
                            <a href="<?php echo base_url($game['url_title']); ?>"><?php echo $game['name']; ?></a>
                        </h3>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
         

        <hr>

     
    
    
    
</div>