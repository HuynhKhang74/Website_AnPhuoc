<form action="index.php?page=kieudang&action=save" method="post" accept-charset="utf-8" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $kieudang['id'] ?? 0 ?>">
    <table class="table" style="width: 600px; margin: auto;">
        <tr>
            <th colspan="2" class="center"><?= isset($kieudang['id']) ? 'Cập nhật' : 'Thêm' ?> Hình ảnh</th>
        </tr>
        <tr>
            <th>Mã Chất Liệu</th>
            <td>
                <input type="text" name="MaKieuDang" placeholder="Nhập tên khu vực" value="<?= $kieudang['MaKieuDang'] ?? '' ?>" required>
            </td>
        </tr>
        <tr>
            <th>Tên Chất Liệu</th>
            <td>
                <input type="text" name="TenKieuDang" placeholder="Nhập tên khu vực" value="<?= $kieudang['TenKieuDang'] ?? '' ?>" required>
            </td>
        </tr>
        <tr>
            <td colspan="2" class="center">
                <button class="submit-btn a" type="submit">Lưu</button>
                <a href = "index.php?page=kieudang&action=list">Quay lại</a>
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
