<html>
    <head>
        <title><?= $title; ?></title>
        
        <link rel="shortcut icon" type="image/png" href="<?=  base_url('assets/images/posts/icong.jpg') ?>">
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <!--<link rel="stylesheet" href="https://bootswatch.com/flatly/bootstrap.min.css">-->
        <link rel="stylesheet" href="https://bootswatch.com/3/flatly/bootstrap.min.css">
        <!--<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>-->
        <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->
        
        
        
        
        
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
        
        
      	<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="http://www.datatables.net/rss.xml">
      	<script type="text/javascript" src="https://datatables.net/media/js/site.js?_=d78b222e2531b63c1f8683e47301add9"></script>
      	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
      	<script type="text/javascript" language="javascript" src="//code.jquery.com/jquery-1.12.4.js"></script>
      	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
      	<script src="https://cdn.datatables.net/responsive/2.1.0/js/dataTables.responsive.js"></script>
      	<link href="//cdn.datatables.net/responsive/2.1.1/css/dataTables.responsive.css"/>

      	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.4.2/js/dataTables.buttons.min.js"></script>
      	<script type="text/javascript" language="javascript" src="//cdn.datatables.net/buttons/1.4.2/js/buttons.print.min.js"></script>
        <link rel="stylesheet" href="<?=  base_url('assets/css/style.css') ?>" >
        <script type="text/javascript" src="<?=  base_url('assets/js/myscripts.js') ?>"></script>
         <style type="text/css">
            @font-face{
            font-family:'Regulara1';
            src: url('../assets/fonts/stoor.ttf'); /* here you go, IE */
          }                                                 
          @font-face {
            font-family: 'Regulara2';
            src:  url("<?=  base_url('assets/fonts/UniversNextArabic-Regular.ttf') ?>");
            font-weight: normal;
            font-style: normal;
          }
        </style>


   


    </head>
    
    <body style="font-family: 'Regulara2'; font-sizeq: 100%;" dir="1rtl">
    <!--Test JS File-->
    <!--<button onclick="myFunction()">Try it</button>-->
    <!-- Header -->
		<header id="header" class="alt">    
      <div class="navbar-wrapper">
          <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
              <div class="navbar-header navbar-right">
                <button type="button" class="navbar-toggle collapsed pull-left" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
              </div>
                  
              <div id="navbar" class="collapse navbar-collapse">
            
               
                  <ul class="nav navbar-nav navbar-right">
                    
                  <li><a href="<?php echo base_url(); ?>admin">  games </a></li>
                  <li><a href="<?php echo base_url(); ?>games/add"> Add New game  </a></li>
                  
              
          </ul>
              </div><!--/.nav-collapse -->
            </div>
          </nav>
      </div>
    </header> <!-- /.header -->
    
    

    <div class="container">
       
      <?php if(validation_errors()): ?>
     <?php echo '<div class="alert alert-danger">'.validation_errors().'</div>'; ?>
      <?php endif; ?>
        <!-- Flash messages -->
      <?php if($this->session->flashdata('danger')): ?>
        <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('danger').'</p>'; ?>
      <?php endif; ?>
      
      <?php if($this->session->flashdata('success')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('success').'</p>'; ?>
      <?php endif; ?>
      