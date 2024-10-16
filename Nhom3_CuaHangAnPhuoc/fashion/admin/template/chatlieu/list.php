<table class="table bordered" style="width:100%">
    <tr>
        <th>STT</th>
        <th width="100" class="center">Mã Chất Liệu</th>
        <th>Tên Chất Liệu</th>
        <th colspan="2" class="center">Thao tác</th>
    </tr>
    <?php foreach ($chatlieus as $key => $chatlieu) { ?>
        <tr>
            <td class="center"><?= $key + 1 ?></td>
            <td><?= $chatlieu['MaChatLieu'] ?></td>
            <td><?= $chatlieu['TenChatLieu'] ?></td>
            <td width="50" class="center"><a href="index.php?page=chatlieu&action=edit&id=<?= $chatlieu['id'] ?>">Sửa</a></td>
            <td width="50" class="center"><a href="index.php?page=chatlieu&action=remove&id=<?= $chatlieu['id'] ?>">Xóa</a></td>
        </tr>
    <?php } ?>
    <tr>
        <td class="center" colspan="20"><a href="index.php?page=chatlieu&action=edit">Thêm mới</a></td>
    </tr>
</table>