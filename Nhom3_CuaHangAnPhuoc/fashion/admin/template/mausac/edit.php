<form action="index.php?page=mausac&action=save" method="post" accept-charset="utf-8" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $mausac['id'] ?? 0 ?>">
    <table class="table" style="width: 600px; margin: auto;">
        <tr>
            <th colspan="2" class="center"><?= isset($mausac['id']) ? 'Cập nhật' : 'Thêm' ?> Màu Sắc</th>
        </tr>
        <tr>
            <th>Mã Màu Sắc : </th>
            <td>
                <input type="text" name="MaMauSac" placeholder="Nhập mã" value="<?= $mausac['MaMauSac'] ?? '' ?>"  required>
            </td>
        </tr>
        <tr>
            <th>Tên Màu Sắc :</th>
            <td>
                <input type="text" name="TenMauSac" placeholder="Nhập tên " value="<?= $mausac['TenMauSac'] ?? '' ?>"  required>
            </td>
        </tr>
        <tr>
            <th>Mã HEX :</th>
            <td>
                <input type="text" name="HEXMauSac" placeholder="Nhập tên " value="<?= $mausac['HEXMauSac'] ?? '' ?>"  required>
            </td>
        </tr>
        <tr>
            <td colspan="2" class="center">
                <button class="submit-btn a" type="submit">Lưu</button>
                <a href = "index.php?page=mausac&action=list">Quay lại</a>
            </td>
        </tr>
    </table>
</form>
