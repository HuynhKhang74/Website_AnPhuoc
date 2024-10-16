<?php
switch ($_GET['action']) {
    case 'list':
        $quanlysoluongs = selectAll('select * from quanlysoluong');
        $template = 'quanlysoluong/list';
        break;
    case 'edit':
        if (isset($_GET['id'])) {
            $quanlysoluong = selectOne("select * from quanlysoluong where id='{$_GET['id']}'");
            if (!is_array($quanlysoluong) || empty($quanlysoluong)) {
                alert('Không tìm thấy sản phẩm', 'index.php?page=quanlysoluong&action=list');
            }
        }
        $template = 'quanlysoluong/edit';
        break;
    case 'save':
        $checkMaSP = selectOne("select MaSanPham from quanlysoluong where MaSanPham = '{$_POST['MaSanPham']}' and id <> '{$_POST['id']}' ");
        if(is_array($checkMaSP) && !empty($checkMaSP)){
            alert('Mã sản phẩm đã tồn tại!', 'index.php?page=quanlysoluong&action=list');
            var_dump(is_array($checkMaSP) && !empty($checkMaSP));
            exit;
        }
        if (intval($_POST['id'])) {
            if (!update('quanlysoluong', [
            'id' => $_POST['id'],
            'MaSanPham' => $_POST['MaSanPham'],
            'MaSize' => $_POST['MaSize'], 
            'SoLuong' => $_POST['SoLuong']
            ])) {
                alert('Đã có lỗi xảy ra!', 'index.php?page=quanlysoluong&action=list');
            }
        } else {
            if (!insert('quanlysoluong', [
            'MaSize' => $_POST['MaSize'],
            'SoLuong' => $_POST['SoLuong']
            ])) {
                alert('Đã có lỗi xảy ra!', 'index.php?page=quanlysoluong&action=list');
            }
        }
        redirect('index.php?page=quanlysoluong&action=list');
        break;  
    case 'remove':
        if (isset($_GET['id'])) {
            $num_rows = delete("quanlysoluong", "where id='{$_GET['id']}'");
            if ($num_rows) {
                alert("Đã xóa thành công !!", 'index.php?page=quanlysoluong&action=list');
            }
        }
        redirect('index.php?page=quanlysoluong&action=list');
        break;
    default:
        redirect('index.php');
}