<?php
$sliders = selectAll('select * from image where type = "slider" and enable > 0');
$video = selectOne('select * from image where type = "video" and enable > 0 limit 1 ' );
$popular = selectAll("select * from sanpham where  enable > 0 and popular > 0 order by id desc limit 4");
$brand = selectAll("select * from image where type = 'brand' and enable > 0");
$news = selectOne("select * from image where type = 'new' and enable > 0");
$template = 'index';
