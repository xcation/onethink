<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<?php 
$getMenu = AdminbaseAction::getMenu(); 
if($getMenu) {
 ?>
<div class="nav">
  <ul class="cc">
    <?php
	foreach($getMenu as $r){
		$app = $r['app'];
		$model = $r['model'];
		$action = $r['action'];
	?>
    <li <?php echo $action==ACTION_NAME?'class="current"':""; ?>><a href="<?php echo U("".$app."/".$model."/".$action."",$r['data']);?>"><?php echo $r['name'];?></a></li>
    <?php
	}
	?>
  </ul>
</div>
<?php } ?>