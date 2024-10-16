<form action="index.php?page=loaisanpham&action=save" method="post" accept-charset="utf-8" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $loaisanpham['id'] ?? 0 ?>">
    <table class="table" style="width: 600px; margin: auto;">
        <tr>
            <th colspan="2" class="center"><?= isset($loaisanpham['id']) ? 'Cập nhật' : 'Thêm' ?> Hình ảnh</th>
        </tr>
        <tr>
            <th>Mã Loại  </th>
            <td>
                <input type="text" name="MaLoai" placeholder="Nhập Mã Loại" value="<?= $loaisanpham['MaLoai'] ?? '' ?>" >
            </td>
        </tr>
        <tr>
            <th>Tên Loại</th>
            <td>
                <input type="text" name="TenLoai" placeholder="Nhập tên loại" value="<?= $loaisanpham['TenLoai'] ?? '' ?>" oninput="checkUri(this.value);" required>
            </td>
        </tr>
        <tr>
            <th>Mô Tả</th>
            <td>
                <input type="text" name="MoTa" placeholder="Nhập Mô Tả" value="<?= $loaisanpham['MoTa'] ?? '' ?>" oninput="checkUri(this.value);" required>
            </td>
        </tr>
        
        <tr>
            <th>Danh Mục Sản Phẩm</th>
            <td>
                <select name="DanhMucSanPham">
                    <option value="">-- Chọn  --</option>
                    <?php $danhSachKhoi = selectAll("select * from loaisanpham where DanhMucSanPham is null ") ?>
                    <?php
                    foreach ($danhSachKhoi as $key => $value) {
                        $selected = $value['MaLoai'] == $sanpham['DanhMucSanPham'];
                        ?>
                        <option value="<?= $value['MaLoai'] ?>" <?= $selected ? "selected" : "" ?>>
                            <?= $value['TenLoai'] ?>
                        </option>
                    <?php } ?>
                </select>
            </td>
        </tr>
        <tr>
            <td colspan="2" class="center">
                <button class="submit-btn a" type="submit">Lưu</button>
                <a href = "index.php?page=loaisanpham&action=list">Quay lại</a>
            </td>
        </tr>
    </table>
    <script>
        function checkUri(name) {
            const inputUri = document.getElementById('input-uri');
            inputUri.value = utf8ToAscii(name);
        }
    </script>
</form>
