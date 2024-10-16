<?php
switch ($_GET['action']) {
    case 'list':
        $donhangs = selectAll('select * from donhang where NgayXoa is null');
        
        $template = 'donhang/list';
        break;
    case 'edit':
        if (isset($_GET['id'])) {
            $donhang = selectOne("select * from donhang where id='{$_GET['id']}'");
            if (!is_array($donhang) || empty($donhang)) {
                alert('Không tìm thấy sản phẩm', 'index.php?page=donhang&action=list');
            }
        }
        $chitietdonhang = selectAll('select * from chitietdonhang where MaDonHang = "'.$donhang['id'].'"');
        $template = 'donhang/edit';
        break;
    case 'remove':
        if (isset($_GET['id'])) {
            $num_rows = update("donhang", ['id' => $_GET['id'], 'NgayXoa' => date('d/m/Y')]);
            if ($num_rows) {
                alert("Đã xóa thành công !!", 'index.php?page=donhang&action=list');
            }
        }
        redirect('index.php?page=donhang&action=list');
        break;
    case 'confirm':
        if (isset($_GET['id'])) {
           update("donhang", ['id' => $_GET['id'], 'NgayXacNhan' => date('d/m/Y')]);
        }
        redirect('index.php?page=donhang&action=list');
        break;
    default:
        redirect('index.php');
}