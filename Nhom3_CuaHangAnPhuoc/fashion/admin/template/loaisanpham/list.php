<table class="table bordered" style="width:100%">
    <tr>
        <th>STT</th>
        <th width="100" class="center">Mã Loại</th>
        <th>Tên Loại</th>
        <th>Mô Tả</th>
        <th>Danh Mục Sản Phẩm</th>
        <th colspan="2" class="center">Thao tác</th>
    </tr>
    <?php foreach ($loaisanphams as $key => $loaisanpham) { ?>
        <tr>
            <td class="center"><?= $key + 1 ?></td>
            <td><?= $loaisanpham['MaLoai']?></td>
            <td><?= $loaisanpham['TenLoai'] ?></td>
            <td><?= $loaisanpham['MoTa'] ?></td>
            <td><?= $loaisanpham['DanhMucSanPham'] ?></td>
            <td width="50" class="center"><a href="index.php?page=loaisanpham&action=edit&id=<?= $loaisanpham['id'] ?>">Sửa</a></td>
            <td width="50" class="center"><a href="index.php?page=loaisanpham&action=remove&id=<?= $loaisanpham['id'] ?>">Xóa</a></td>
        </tr>
    <?php } ?>
    <tr>
        <td class="center" colspan="20"><a href="index.php?page=loaisanpham&action=edit">Thêm mới</a></td>
    </tr>
</table>