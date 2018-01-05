

<!-- BEGIN PAGE BREADCRUMBS -->
    <ul class="page-breadcrumb breadcrumb">
        <li>
            <a href="<?php echo base_url(); ?>games/mainpage"> mainpage </a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span> <?php echo $cat ; ?> </span>
        </li>
    </ul>
<!-- END PAGE BREADCRUMBS -->

<div class="well content">
    <div class="row">
            <?php foreach($games as $game) : ?>
            <div class="col-md-4 portfolio-item">
                <div class="shadow ">
                    <div class="well white">
                        <a href="<?php echo base_url($game['url']); ?>">
                            <img class="img-responsive" src="<?php echo base_url(); ?>assets/images/games/<?php if($game['img']!=NULL){ echo $game['img']; }else{echo 'noimage.jpg'; } ?>" width="700px" height="400px" alt="">
                        </a>
                        <h3>
                            <a href="<?php echo base_url(url_title($game['url'])); ?>"><?php echo $game['name']; ?></a>
                        </h3>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
    </div>
</div>