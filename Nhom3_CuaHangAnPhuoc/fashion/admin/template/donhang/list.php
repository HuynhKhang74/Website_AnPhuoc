<table class="table bordered" style="width: 100%; max-width: 800px">
    <tr>
        <th>STT</th>
        <th width="100" class="center">Mã Khách Hàng</th>
        <th>Ngày Đặt </th>
        <th>Địa Chỉ</th>
        <th>Tổng Tiền</th>
        <th colspan="3" class="center">Thao Tác</th>
    </tr>
    <?php foreach ($donhangs as $key => $donhang) { ?>
        <tr>
            <td class="center"><?= $key + 1 ?></td>
            <td><?= $donhang['MaKhachHang'] ?></td>
            <td><?= $donhang['NgayDatHang'] ?></td>
            <td><?= $donhang['DiaChiShip'] ?></td>
            <td><?= $donhang['TongTien'] ?></td>
            <td  class="center"><a href="index.php?page=donhang&action=edit&id=<?= $donhang['id'] ?>">Xem Chi Tiết</a></td>
            <td  class="center">
                <?php if(isset($donhang['NgayXacNhan'])) { ?>
                    Đã Xác Nhận
                <?php } else { ?>
                    <a href="index.php?page=donhang&action=confirm&id=<?= $donhang['id'] ?>"  >Xác Nhận</a>
                <?php } ?>
            </td>
            <td  class="center"><a href="index.php?page=donhang&action=remove&id=<?= $donhang['id'] ?>">Xóa</a></td>
        </tr>
    <?php } ?>
    
</table>