<form action="index.php?page=sanpham&action=save" method="post" accept-charset="utf-8" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $sanpham['id'] ?? 0 ?>">
    <table class="table" style="width: 600px; margin: auto;">
        <tr>
            <th colspan="2" class="center"><?= isset($sanpham['id']) ? 'Cập nhật' : 'Thêm' ?> Sản Phẩm</th>
        </tr>
            <tr>
                <th>Mã Sản Phẩm</th>
                <td>
                    <input type="text" name="MaSanPham" placeholder="Nhập mã Sản Phẩm" value="<?= $sanpham['MaSanPham'] ?? '' ?>" maxLength = "6" >
                </td>
            </tr>
        <tr>
            <th>Tên Sản Phẩm:</th>
            <td>
                <input type="text" name="TenSanPham" placeholder="Nhập tên Sản Phẩm" value="<?= $sanpham['TenSanPham'] ?? '' ?>" oninput="checkUri(this.value);" required>
            </td>
        </tr>
        <tr>
            <th width="220">Tên không dấu (đường dẫn)</th>
            <td>
                <input id="input-uri" type="text" name="uri" placeholder="Tên không dấu (đường dẫn)" value="<?= $sanpham['uri'] ?? '' ?>" readonly>
            </td>
        </tr>
        <tr>
            <th>Ảnh Hiện Tại : </th>
            <td>
                <img id="imgTag" style="max-height:100px; margin-bottom : 10px; display: block;" src="../<?= $sanpham['HinhAnh'] ?? '' ?>" alt="Chưa chọn ảnh" >
                <input type="button" value='Xóa Ảnh' onclick='$(this).prev().attr("src", ""); $(".imgInp").val(""); $(".currInp").val("")'>
            </td>
        </tr>
        
        <tr>
            <th>Chọn ảnh</th>
            <td>
                <input type="hidden" class="currInp" name="file_curr" value="<?= $sanpham['HinhAnh'] ?? '' ?>" >
                <input type="file" class="imgInp" data-target="#imgTag" name="file" placeholder="Nhập Hình Ảnh"  >
            </td>
        </tr>
        <tr>
            <th>Mô Tả Ngắn:</th>
            <td>
                <input type="text" name="MoTaNgan" placeholder="Nhập Mô Tả Ngắn" value="<?= $sanpham['MoTaNgan'] ?? '' ?>" >
            </td>
        </tr>
        <tr>
            <th>Mô Tả Dài</th>
            <td>
                <input type="text" name="MotaDai" placeholder="Nhập Mô Tả Dài" value="<?= $sanpham['MotaDai'] ?? '' ?>"  >
            </td>
        </tr>
        <tr>
            <th>Giá Gốc:</th>
            <td>
                <input type="text" name="GiaGoc" placeholder="Nhập Giá Gốc" value="<?= $sanpham['GiaGoc'] ?? '' ?>"  >
            </td>
        </tr>
        <tr>
            <th>Giá Bán</th>
            <td>
                <input type="text" name="GiaBan" placeholder="Nhập Giá Bán" value="<?= $sanpham['GiaBan'] ?? '' ?>"  >
            </td>
        </tr>

        <tr>
            <th>Số Lượng :</th>
            <td>
                <input type="number" name="SoLuong" placeholder="Nhập Số Lượng" value="<?= $sanpham['SoLuong'] ?? '' ?>"  >
            </td>
        </tr>
        <tr>
            <th>Ngưng Hoạt Động</th>
            <td>
                <select name="NgungHoatDong">
                    <option value="">-- Chọn --</option>
                    <?php $danhSach = ['1', '0'] ?>
                    <?php
                    foreach ($danhSach as $key => $value) {
                        $selected = $value == $sanpham['NgungHoatDong'];
                        ?>
                        <option value="<?= $value ?>" <?= $selected ? "selected" : "" ?>>
                            <?= $value ?>
                        </option>
                    <?php } ?>
                </select>
            </td>
        </tr>
        <tr>
            <th>Mới Ra </th>
            <td>
                <select name="MoiRa">
                    <option value="">-- Chọn  --</option>
                    <?php $danhSach = ['1', '0'] ?>
                    <?php
                    foreach ($danhSach as $key => $value) {
                        $selected = $value == $sanpham['MoiRa'];
                        ?>
                        <option value="<?= $value ?>" <?= $selected ? "selected" : "" ?>>
                            <?= $value ?>
                        </option>
                    <?php } ?>
                </select>
            </td>
        </tr>
        <tr>
            <th>Đặc Sắc</th>
            <td>
                <select name="DacSac">
                    <option value="">-- Chọn  --</option>
                    <?php $danhSach = ['1', '0'] ?>
                    <?php
                    foreach ($danhSach as $key => $value) {
                        $selected = $value == $sanpham['DacSac'];
                        ?>
                        <option value="<?= $value ?>" <?= $selected ? "selected" : "" ?>>
                            <?= $value ?>
                        </option>
                    <?php } ?>
                </select>
            </td>
        </tr>
        <tr>
            <th>Loại Sản Phẩm</th>
            <td>
                <select name="MaLoai">
                    <option value="">-- Chọn Khối --</option>
                    <?php $danhSachKhoi = selectAll("select * from loaisanpham") ?>
                    <?php
                    foreach ($danhSachKhoi as $key => $value) {
                        $selected = $value['MaLoai'] == $sanpham['LoaiSanPham'];
                        ?>
                        <option value="<?= $value['MaLoai'] ?>" <?= $selected ? "selected" : "" ?>>
                            <?= $value['TenLoai'] ?>
                        </option>
                    <?php } ?>
                </select>
            </td>
        </tr>
        <tr>
            <th>Màu Sắc :</th>
            <td>
                <select name="MaMauSac">
                    <option value="">-- Chọn Khối --</option>
                    <?php $danhSachKhoi = selectAll("select * from mausac") ?>
                    <?php
                    foreach ($danhSachKhoi as $key => $value) { 
                        $selected = $value['MaMauSac'] == $sanpham['MauSac'];
                        ?>
                        <option value="<?= $value['MaMauSac'] ?>" <?= $selected ? "selected" : "" ?>>
                            <?= $value['TenMauSac'] ?>
                        </option>
                    <?php } ?>
                </select>
            </td>
        </tr>
        <tr>
            <th>Kích thước :</th>
            <td>
                <select name="MaSize">
                    <option value="">-- Chọn Kích Thước --</option>
                    <?php $danhSachKhoi = selectAll("select * from size") ?>
                    <?php
                    foreach ($danhSachKhoi as $key => $value) { 
                        $selected = $value['MaSize'] == $sanpham['Size'];
                        ?>
                        <option value="<?= $value['MaSize'] ?>" <?= $selected ? "selected" : "" ?>>
                            <?= $value['TenSize'] ?>
                        </option>
                    <?php } ?>
                </select>
            </td>
        </tr>
        <tr>
            <th>Chất Liệu :</th>
            <td>
                <select name="MaChatLieu">
                    <option value="">-- Chọn Khối --</option>
                    <?php $danhSachKhoi = selectAll("select * from chatlieu") ?>
                    <?php
                    foreach ($danhSachKhoi as $key => $value) {
                        $selected = $value['MaChatLieu'] == $sanpham['ChatLieu'];
                        ?>
                        <option value="<?= $value['MaChatLieu'] ?>" <?= $selected ? "selected" : "" ?>>
                            <?= $value['TenChatLieu'] ?>
                        </option>
                    <?php } ?>
                </select>
            </td>
        </tr>
        <tr>
            <th>Kiểu Dáng :</th>
            <td>
                <select name="MaKieuDang">
                    <option value="">-- Chọn Khối --</option>
                    <?php $danhSachKhoi = selectAll("select * from kieudang") ?>
                    <?php
                    foreach ($danhSachKhoi as $key => $value) {
                        $selected = $value['MaKieuDang'] == $sanpham['KieuDang'];
                        ?>
                        <option value="<?= $value['MaKieuDang'] ?>" <?= $selected ? "selected" : "" ?>>
                            <?= $value['TenKieuDang'] ?>
                        </option>
                    <?php } ?>
                </select>
            </td>
        </tr>
        <tr>
            <td colspan="2" class="center">
                <button class="submit-btn a" type="submit">Lưu</button>
                <a href = "index.php?page=sanpham&action=list">Quay lại</a>
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
