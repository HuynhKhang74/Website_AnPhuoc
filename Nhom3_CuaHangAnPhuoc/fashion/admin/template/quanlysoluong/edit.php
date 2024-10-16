<form action="index.php?page=quanlysoluong&action=save" method="post" accept-charset="utf-8" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $quanlysoluong['id'] ?? 0 ?>">
    <table class="table" style="width: 600px; margin: auto;">
        <tr>
            <th colspan="2" class="center"><?= isset($quanlysoluong['id']) ? 'Cập nhật' : 'Thêm' ?> Hình ảnh</th>
        </tr>
        <tr>
            <th>Mã Sản Phẩm  </th>
            <td>
                <select name="MaSanPham">
                    <option value="">-- Chọn  --</option>
                    <?php $danhSachKhoi = selectAll("select * from sanpham") ?>
                    <?php
                    foreach ($danhSachKhoi as $key => $value) {
                        $selected = $value['MaSanPham'] == $sanpham['MaSanPham'];
                        ?>
                        <option value="<?= $value['MaSanPham'] ?>" <?= $selected ? "selected" : "" ?>>
                            <?= $value['MaSanPham'] ?>
                        </option>
                    <?php } ?>
                </select>
            </td>
        </tr>
        <tr>
            <th>Mã Size </th>
            <td>
                <select name="MaSize">
                    <option value="">-- Chọn  --</option>
                    <?php $danhSachKhoi = selectAll("select * from size") ?>
                    <?php
                    foreach ($danhSachKhoi as $key => $value) {
                        $selected = $value['MaSize'] == $sanpham['MaSize'];
                        ?>
                        <option value="<?= $value['MaSize'] ?>" <?= $selected ? "selected" : "" ?>>
                            <?= $value['TenSize'] ?>
                        </option>
                    <?php } ?>
                </select>
            </td>
        </tr>
        <tr>
            <th>Số Lượng </th>
            <td>
                <input type="text" name="SoLuong" placeholder="Nhập Mã Loại" value="<?= $quanlysoluong['SoLuong'] ?? '' ?>" >
            </td>
        </tr>
        <tr>
            <td colspan="2" class="center">
                <button class="submit-btn a" type="submit">Lưu</button>
                <a href = "index.php?page=quanlysoluong&action=list">Quay lại</a>
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
