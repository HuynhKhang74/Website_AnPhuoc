<table class="table bordered" style="width:100%">
    <tr>
        <th>STT</th>
        <th width="100" class="center">URL</th>
        <th colspan="3" class="center">Thao tác</th>
    </tr>
    <?php foreach ($images as $key => $image) { ?>
        <tr>
            <td class="center"><?= $key + 1 ?></td>
            <td><img style="max-width:200px; max-height:200px" src="../<?= $image['url'] ?>"></td>
            <td  class="center">
                <?php if(intval($image['enable'])) { ?>
                    <a href="index.php?page=gallery&product_id=<?= $_GET['product_id'] ?>&action=hide&id=<?= $image['id'] ?>"  >Ẩn Đi</a>
                <?php } else { ?>
                    <a href="index.php?page=gallery&product_id=<?= $_GET['product_id'] ?>&action=show&id=<?= $image['id'] ?>"  >Hiện Ngay</a>
                <?php } ?>
            </td>
            <td width="50" class="center"><a href="index.php?page=gallery&product_id=<?= $_GET['product_id'] ?>&action=edit&id=<?= $image['id'] ?>">Sửa</a></td>
            <td width="50" class="center"><a href="index.php?page=gallery&product_id=<?= $_GET['product_id'] ?>&action=remove&id=<?= $image['id'] ?>">Xóa</a></td>
        </tr>
    <?php } ?>
    <tr>
        <td class="center" colspan="20"><a href="index.php?page=gallery&product_id=<?= $_GET['product_id'] ?>&action=edit">Thêm mới</a></td>
        <td class="center" colspan="20"><a href="index.php?page=sanpham&action=list">Quay lại</a></td>
    </tr>
</table>