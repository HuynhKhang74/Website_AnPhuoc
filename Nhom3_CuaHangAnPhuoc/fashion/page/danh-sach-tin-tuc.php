<div class="post-list-new">
    <?php foreach($news as $item) { ?>
        <a href="/tin-tuc/<?= $item["MaTinTuc"] ?>" class="post-item-new" -style="opacity: 0;" style="opacity: 1;">
        <div class="item-thumbnail" style="height: calc(212.25px);">
            <img src="<?= $item['HinhAnhDaiDien'] ?>" loaded="" alt="Tin tức | Rèm Cửa Nét Việt">
        </div>
        <div class="item-heading">
            <div class="item-title"><?= $item['TenTinTuc'] ?></div>
            <div class="item-date"><?= date("d/m/Y", $item['NgayDang']) ?></div>
            <div class="item-description"></div>
        </div>
    </a>
    <?php } ?>
</div>