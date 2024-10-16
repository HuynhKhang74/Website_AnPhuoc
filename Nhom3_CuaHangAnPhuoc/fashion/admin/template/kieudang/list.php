<table class="table bordered" style="width:100%">
    <tr>
        <th>STT</th>
        <th width="100" class="center">Mã Kiểu Dáng</th>
        <th>Tên Kiểu Dáng</th>
        <th colspan="2" class="center">Thao tác</th>
    </tr>
    <?php foreach ($kieudangs as $key => $kieudang) { ?>
        <tr>
            <td class="center"><?= $key + 1 ?></td>
            <td><?= $kieudang['MaKieuDang'] ?></td>
            <td><?= $kieudang['TenKieuDang'] ?></td>
            <td width="50" class="center"><a href="index.php?page=kieudang&action=edit&id=<?= $kieudang['id'] ?>">Sửa</a></td>
            <td width="50" class="center"><a href="index.php?page=kieudang&action=remove&id=<?= $kieudang['id'] ?>">Xóa</a></td>
        </tr>
    <?php } ?>
    <tr>
        <td class="center" colspan="20"><a href="index.php?page=kieudang&action=edit">Thêm mới</a></td>
    </tr>
</table>