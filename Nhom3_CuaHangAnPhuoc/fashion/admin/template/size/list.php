<table class="table bordered" style="width:100%">
    <tr>
        <th>STT</th>
        <th width="100" class="center">Mã Size</th>
        <th>Tên Size</th>
        <th colspan="2" class="center">Thao tác</th>
    </tr>
    <?php foreach ($sizes as $key => $size) { ?>
        <tr>
            <td class="center"><?= $key + 1 ?></td>
            <td><?= $size['MaSize']?></td>
            <td><?= $size['TenSize'] ?></td>
            <td width="50" class="center"><a href="index.php?page=size&action=edit&id=<?= $size['id'] ?>">Sửa</a></td>
            <td width="50" class="center"><a href="index.php?page=size&action=remove&id=<?= $size['id'] ?>">Xóa</a></td>
        </tr>
    <?php } ?>
    <tr>
        <td class="center" colspan="20"><a href="index.php?page=size&action=edit">Thêm mới</a></td>
    </tr>
</table>