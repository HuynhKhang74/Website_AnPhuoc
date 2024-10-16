<form action="index.php?page=gallery&product_id=<?= $_GET['product_id'] ?>&action=save" method="post" accept-charset="utf-8" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $image['id'] ?? 0 ?>">
    <table class="table" style="width: 600px; margin: auto;">
        <tr>
            <th colspan="2" class="center"><?= isset($image['id']) ? 'Cập nhật' : 'Thêm' ?> Hình ảnh</th>
        </tr>
        
        <tr>
            <th>Ảnh Hiện Tại : </th>
            <td>
                <img id="imgTag" style="max-height:100px; margin-bottom : 10px; display: block;" src="../<?= $image['url'] ?? '' ?>" alt="Chưa chọn ảnh" >
            </td>
        </tr>
        <tr>
            <th>Chọn ảnh</th>
            <td>
                <input type="file" name="file" class="imgInp" data-target="#imgTag">
                <input type="hidden" class="currInp" name="file_curr" value="<?= $image['url'] ?? '' ?>" >
            </td>
        </tr>
        <tr>
            <td colspan="2" class="center">
                <button class="submit-btn a" type="submit">Lưu</button>
                <a href = "index.php?page=gallery&product_id=<?= $_GET['product_id'] ?>&action=list">Quay lại</a>
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
