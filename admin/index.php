<?php
	//导入验证登陆文件
	require('session.php');
?>
	<frameset cols="*" rows="136, *" id="frame_main" name="frame_main"  border="0">
		<frame src="header.php" noresize="noresize" name="header">
		<frameset cols="240, *">
			<frame src="menu.php" name="menu" />
			<frame src="main.php" name="main">
		</frameset>
	</frameset>
	<noframes>
		<body>
		</body>
	</noframes>
