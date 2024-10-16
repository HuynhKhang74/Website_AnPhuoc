<table class="table bordered" style="width:100%">
    <tr>
        <th>STT</th>
        <th width="100" class="center">Mã Sản Phẩm</th>
        <th>Mã Size</th>
        <th>Số Lượng</th>
        <th colspan="2" class="center">Thao tác</th>
    </tr>
    <?php foreach ($quanlysoluongs as $key => $quanlysoluong) { ?>
        <tr>
            <td class="center"><?= $key + 1 ?></td>
            <td><?= $quanlysoluong['MaSanPham']?></td>
            <td><?= $quanlysoluong['MaSize'] ?></td>
            <td><?= $quanlysoluong['SoLuong'] ?></td>
            <td width="50" class="center"><a href="index.php?page=quanlysoluong&action=edit&id=<?= $quanlysoluong['id'] ?>">Sửa</a></td>
            <td width="50" class="center"><a href="index.php?page=quanlysoluong&action=remove&id=<?= $quanlysoluong['id'] ?>">Xóa</a></td>
        </tr>
    <?php } ?>
    <tr>
        <td class="center" colspan="20"><a href="index.php?page=quanlysoluong&action=edit">Thêm mới</a></td>
    </tr>
</table>