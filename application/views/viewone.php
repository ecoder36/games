
   <script type="text/javascript">

   $(document).ready(function(){

     $('.iframe').responsiveIframes({ openMessage: "Full screen", closeMessage: "Close full screen" });

   });

   /**
   * jQuery Responsive IFrames
   * @author Armin Solecki
   * @source https://github.com/arminsolecki/responsive-iframes/
   * Licensed under the MIT License (http://creativecommons.org/licenses/MIT/)
   *
   **/
   (function($){
     $.responsiveIframes = function(el, options){
         var self = this;

         // Access to jQuery and DOM versions of element
         self.$el = $(el);
         self.el = el;

         // Add a reverse reference to the DOM object
         self.$el.data("responsiveIframes", self);

         self.init = function () {
             self.options = $.extend({}, $.responsiveIframes.defaultOptions, options);

             // wrap iframe
             var iframeSrc = self.$el.find('iframe').wrap('<div class="iframe-content" />').attr('src');

             //generate header
             var header = '<div class="iframe-header">' +
                               '<a href="'+ iframeSrc +'" class="iframe-trigger">'+ self.options.openMessage +'</a>' +
                           '</div>';

             var trigger = self.$el.prepend(header).find('.iframe-trigger');

             // click event
             $(trigger).click(function (e) {
                 e.preventDefault();

                 var $this = $(this),
                     $html = $('html'),
                     isFullScreen = $html.hasClass("iframe-full-screen"),
                     message = isFullScreen ? self.options.openMessage : self.options.closeMessage;

                 $this.text(message);

                 if (isFullScreen) {
           self.$el.removeClass("iframe-active");
                     $html.removeClass("iframe-full-screen");
                     setTimeout(function () {
                         $(window).scrollTop($this.data('iframe-scroll-position'));
                     }, 1);
                 } else {
                     $this.data('iframe-scroll-position', $(window).scrollTop());
           self.$el.addClass("iframe-active");
                     $html.addClass("iframe-full-screen");
                 }

             });
         };

         // Run initializer
         self.init();
     };

     $.responsiveIframes.defaultOptions = {
         openMessage: "Full screen",
         closeMessage: "Close"
     };

     $.fn.responsiveIframes = function(options){
         return this.each(function(){
             (new $.responsiveIframes(this, options));
         });
     };

   })(jQuery);

   </script>

   <style media="screen">
   .center {
   text-align: center;
   }


   /* iframe */

   .iframe {
   border: 3px solid #131C28;
   overflow: hidden;
   background: #fff;
   }

   .iframe iframe {
   width: 100%;
   height: 500px;
   border: 0;
   display: block;
   }

   .iframe-header {
   display: none;
   }

   .js .iframe-header {
   display: block;
   }

   .iframe-content {
   /* ipad iframe hack */
   height: 500px;
   overflow: auto;
   -webkit-overflow-scrolling: touch;
   }

   .iframe-header a {
   font-size: 15px;
   color: white;
   background: #3B4658;
   display: block;
   padding: 15px;
   text-align: center;
   border-bottom: 3px solid #131C28;
   }

   .iframe-header a:hover,
   .iframe-header a:focus {
   background: #6A798E;
   }

   .iframe-full-screen .iframe-header {
   display: block;
   position: absolute;
   height: 50px;
   width: 100%;
   }

   .iframe-full-screen .iframe-content {
   /*position: absolute;*/
   top: 50px;
   bottom: 0;
   width: 100%;
   height: auto;
   }

   .iframe-full-screen .iframe-header a {
   padding: 0;
   height: 44px;
   line-height: 44px;
   text-align: center;
   border: 3px solid #131C28;
   }

   .iframe-full-screen body {
   width: 100%;
   height: 100%;
   overflow: hidden;
   }

   .iframe-full-screen .iframe.iframe-active{
   width: 100%;
   height: 100%;
   position: fixed;
   left: 0;
   top: 0;
   bottom: 0;
   right: 0;
   z-index: 9999;
   border: none;
   }

   .iframe-full-screen .iframe iframe {
   position: absolute;
   height: 100%;
   width: 100%;
   border: none;
   }

   .wrapper {
   max-width: 1000px;
   margin: 20px auto;
   padding: 0 20px;
   }

   @media all and (max-height: 400px){
   .iframe {
   height: 300px;
   }
   }
   </style>

    <script>
//     function makeFullScreen() {
//     document.getElementsByTagName("iframe")[0].className = "fullScreen";
//     var elem = document.body;
//     requestFullScreen(elem);
// }
        document.getElementsByTagName("html")[0].className = "js";

    </script>


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


    <!-- Page Content -->
    <div class="container">

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
            <div class="col-md-10 col-md-offset-1 portfolio-item">
                <div class="shadow ">
                    <div class="well white">

                      <div class="iframe">
                  	    <iframe src="<?php echo $post['link']; ?>" /></iframe>
                  	  </div>
                        <h3 class="inline">
                            <a href="#">Game Name</a>
                        </h3>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->

        <hr>

        <!-- Pagination -->


<div class="main">
<div class="row content">
    





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

