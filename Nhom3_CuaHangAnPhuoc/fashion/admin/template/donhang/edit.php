<form action="index.php?page=donhang&action=save" method="post" accept-charset="utf-8" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $donhang['id'] ?? 0 ?>">
    <table class="table" style="width: 600px; margin: auto;">
        <tr>
            <th colspan="2" class="center"><?= isset($donhang['id']) ? 'Cập nhật' : 'Thêm' ?> Sản Phẩm</th>
        </tr>
            <tr>
                <th>Mã Khách Hàng :</th>
                <td>
                    <input type="text" name="MaKhachHang" placeholder="Nhập mã Sản Phẩm" value="<?= $donhang['MaKhachHang'] ?? '' ?>" maxLength = "6" readonly >
                </td>
            </tr>
       
        
        <tr>
            <th>Ngày Đặt : </th>
            <td>
                <input type="text" name="NgayDatHang" placeholder="Nhập Mô Tả Ngắn" value="<?= $donhang['NgayDatHang'] ?? '' ?>" readonly >
            </td>
        </tr>
        <tr>
            <th>Địa Chỉ Ship :</th>
            <td>
                <input type="text" name="DiaChiShip" placeholder="Nhập Mô Tả Dài" value="<?= $donhang['DiaChiShip'] ?? '' ?>"  readonly >
            </td>
        </tr>
        <tr>
            <th>Tổng Tiền :</th>
            <td>
                <input type="text" name="TongTien" placeholder="Nhập Giá Gốc" value="<?= $donhang['TongTien'] ?? '' ?>"  readonly >
            </td>
        </tr>
        <tr><td colspan="2"></td></tr>
        <tr>
            <td colspan="2" class="center">
                <a href = "index.php?page=donhang&action=list">Quay lại</a>
            </td>
        </tr>
    </table>
<br>
    <table class="table" style="width: 600px; margin: auto;">
        <tr>
            <th>Mã Sản Phẩm</th>
            <th>Tên Sản Phẩm</th>
            <th>Đơn Giá</th>
            <th>Số Lượng</th>
            <th>Thành Tiền</th>
        </tr>
        <?php foreach($chitietdonhang as $key => $ctdh) { ?>
            <tr>
                <td><?= $ctdh['MaSanPham'] ?></td>
                <td><?= $ctdh['TenSanPham'] ?></td>
                <td><?= number_format($ctdh['DonGia']) ?></td>
                <td><?= $ctdh['SoLuong'] ?></td>
                <td><?= number_format($ctdh['DonGia'] * $ctdh['SoLuong']) ?></td>
            </tr>
        <?php } ?>
    </table>
    <script>
        function checkUri(name) {
            const inputUri = document.getElementById('input-uri');
            inputUri.value = utf8ToAscii(name);
        }
    </script>
</form>
