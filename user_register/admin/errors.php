<?php if(count($errors) > 0): ?>
<div class="error">
    <?php foreach ($errors as $error): {
           
        } ?>
    <p><?php echo $error;?></p>
    <?php endforeach;?>  
</div>
<?php endif; ?>
<?php if(count($okay) > 0): ?>


<div class="okay">
    <?php foreach ($okay as $okay): {
           
        } ?>
    <p><?php echo $okay;?></p>
    <?php endforeach;?>
</div>
<?php endif; ?>