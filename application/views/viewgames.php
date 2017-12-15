<div class="well content">
    <table  class="display table" cellspacing="0" width="100%" dir="rtl">
        <thead>
            <tr>
                <th>id</th>
                <th>link</th>
                <th> name</th>
                <th> category</th>
                <th>img </th>
                <th>  open  </th>
               
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
                <td><a class="btn btn-default btn-sm" href="<?php echo base_url(url_title($game['name'])); ?>">  open </a></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
</div>