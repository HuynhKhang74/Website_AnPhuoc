<form action="index.php?page=tintuc&action=save" method="post" accept-charset="utf-8" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $tintuc['id'] ?? 0 ?>">
    <table class="table" style="width: 600px; margin: auto;">
        <tr>
            <th colspan="2" class="center"><?= isset($tintuc['id']) ? 'Cập nhật' : 'Thêm' ?> Tin Tức</th>
        </tr>
            <tr>
                <th>Mã Tin Tức</th>
                <td>
                    <input type="text" name="MaTinTuc" placeholder="Nhập mã Tin Tức" value="<?= $tintuc['MaTinTuc'] ?? '' ?>" maxLength = "6" >
                </td>
            </tr>
        <tr>
            <th>Tên Tin Tức:</th>
            <td>
                <input type="text" name="TenTinTuc" placeholder="Nhập tên Tin Tức" value="<?= $tintuc['TenTinTuc'] ?? '' ?>" oninput="checkUri(this.value);" required>
            </td>
        </tr>
        <tr>
            <th>Ảnh Hiện Tại : </th>
            <td>
                <img id="imgTag" style="max-height:100px; margin-bottom : 10px; display: block;" src="../<?= $tintuc['HinhAnhDaiDien'] ?? '' ?>" alt="Chưa chọn ảnh" >
                <input type="button" value='Xóa Ảnh' onclick='$(this).prev().attr("src", ""); $(".imgInp").val(""); $(".currInp").val("")'>
            </td>
        </tr>
        <tr>
            <th>Chọn ảnh</th>
            <td>
                <input type="hidden" class="currInp" name="file_curr" value="<?= $tintuc['HinhAnhDaiDien'] ?? '' ?>" >
                <input type="file" class="imgInp" data-target="#imgTag" name="file" placeholder="Nhập Hình Ảnh"  >
            </td>
        </tr>
        <tr>
            <th>Nội dung :</th>
            <td>
                <input type="text" name="NoiDung" placeholder="Nhập Nội dung" value="<?= $tintuc['NoiDung'] ?? '' ?>" >
            </td>
        </tr>
        <tr>
            <td colspan="2" class="center">
                <button class="submit-btn a" type="submit">Lưu</button>
                <a href = "index.php?page=tintuc&action=list">Quay lại</a>
            </td>
        </tr>
    </table>
</form>
