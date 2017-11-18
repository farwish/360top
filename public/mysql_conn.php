<?php
    /* 注:在其他页面载入此连接文件前，需要先载入数据库配置文件 */    

    //1.连接数据库
    $link = @mysql_connect(HOST, USER, PASSWORD) or die('数据库连接失败');

    //2.选择数据库
    mysql_select_db(DATABASE);

    //3.设置字符集
    mysql_set_charset(CHARSET);

