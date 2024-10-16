<table class="table bordered">
    <tr>
        <th>STT</th>
        <th width="100" class="center">Mã Tin Tức</th>
        <th>Tên Tin Tức</th>
        <th>Nội Dung</th>
        <th>Ngày Đăng</th>
        <th>Hình Ảnh</th>
        <th colspan="4" class="center">Thao tác</th>
    </tr>
    <?php foreach ($tintucs as $key => $tintuc) { ?>
        <tr>
            <td class="center"><?= $key + 1 ?></td>
            <td><?= $tintuc['MaTinTuc'] ?></td>
            <td><?= $tintuc['TenTinTuc'] ?></td>
            <td><?= $tintuc['NoiDung'] ?></td>
            <td><?= date('d/m/Y H:m:y', $tintuc['NgayDang']) ?></td>
            <td><img style="max-width:200px; max-height:200px" src="../<?= $tintuc['HinhAnhDaiDien'] ?>"></td>
            <td  class="center">
                <?php if(intval($tintuc['enable'])) { ?>
                    <a href="index.php?page=tintuc&action=hide&id=<?= $tintuc['id'] ?>"  >Ẩn Đi</a>
                <?php } else { ?>
                    <a href="index.php?page=tintuc&action=show&id=<?= $tintuc['id'] ?>"  >Hiện Ngay</a>
                <?php } ?>
            </td>
            <td  class="center">
                <?php if(intval($tintuc['popular'])) { ?>
                    <a href="index.php?page=tintuc&action=unpopular&id=<?= $tintuc['id'] ?>"  >Bỏ nổi bật</a>
                <?php } else { ?>
                    <a href="index.php?page=tintuc&action=popular&id=<?= $tintuc['id'] ?>"  > Nổi bật</a>
                <?php } ?>
            </td>
            <td width="50" class="center"><a href="index.php?page=tintuc&action=edit&id=<?= $tintuc['id'] ?>">Sửa</a></td>
            <td width="50" class="center"><a href="index.php?page=tintuc&action=remove&id=<?= $tintuc['id'] ?>">Xóa</a></td>
        </tr>
    <?php } ?>
    <tr>
        <td class="center" colspan="20"><a href="index.php?page=tintuc&action=edit">Thêm mới</a></td>
    </tr>
</table>