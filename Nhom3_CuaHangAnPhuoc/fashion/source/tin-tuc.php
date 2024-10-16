<?php
$news = selectAll("select * from tintuc where MaTinTuc <> '".$tintuc["MaTinTuc"]."' and enable > 0 and popular > 0");
$template = 'tin-tuc';