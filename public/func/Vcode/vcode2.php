<div style="cursor:pointer;width:85px;height:28px;background:#999966;border:1px solid #eee;float:left;font-size:13px;color:#723;" onclick="window.location.href='<?php $_SERVER['REQUEST_URI']; ?>'">
	<span style="display:block;text-align:center;line-height:28px;"><?php echo $_SESSION['vcode'] = mt_rand(1000,9999); ?></span>
</div>