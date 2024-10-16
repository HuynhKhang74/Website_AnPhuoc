<form action="index.php?page=size&action=save" method="post" accept-charset="utf-8" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $size['id'] ?? 0 ?>">
    <table class="table" style="width: 600px; margin: auto;">
        <tr>
            <th colspan="2" class="center"><?= isset($size['id']) ? 'Cập nhật' : 'Thêm' ?> Hình ảnh</th>
        </tr>
        <tr>
            <th>Mã Size</th>
            <td>
                <input type="text" name="MaSize" placeholder="Nhập tên khu vực" value="<?= $size['MaSize'] ?? '' ?>" required>
            </td>
        </tr>
        <tr>
            <th>Tên Size</th>
            <td>
                <input type="text" name="TenSize" placeholder="Nhập tên khu vực" value="<?= $size['TenSize'] ?? '' ?>" required>
            </td>
        </tr>
        <tr>
            <td colspan="2" class="center">
                <button class="submit-btn a" type="submit">Lưu</button>
                <a href = "index.php?page=size&action=list">Quay lại</a>
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
