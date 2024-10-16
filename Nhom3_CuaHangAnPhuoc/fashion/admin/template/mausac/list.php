<table class="table bordered" style="width:100%">
    <tr>
        <th>STT</th>
        <th width="100" class="center">Mã Màu</th>
        <th>Tên Màu</th>
        <th>Mã Hex</th>
        <th colspan="2" class="center">Thao tác</th>
    </tr>
    <?php foreach ($mausacs as $key => $mausac) { ?>
        <tr>
            <td class="center"><?= $key + 1 ?></td>
            <td><?= $mausac['MaMauSac'] ?></td>
            <td><?= $mausac['TenMauSac'] ?></td>
            <td style="background-color:<?=$mausac['HEXMauSac'] ?>"></td>
            <td width="50" class="center"><a href="index.php?page=mausac&action=edit&id=<?= $mausac['id'] ?>">Sửa</a></td>
            <td width="50" class="center"><a href="index.php?page=mausac&action=remove&id=<?= $mausac['id'] ?>">Xóa</a></td>
        </tr>
    <?php } ?>
    <tr>
        <td class="center" colspan="20"><a href="index.php?page=mausac&action=edit">Thêm mới</a></td>
    </tr>
</table>