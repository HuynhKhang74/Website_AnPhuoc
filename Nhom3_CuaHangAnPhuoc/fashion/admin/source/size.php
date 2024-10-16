<?php
switch ($_GET['action']) {
    case 'list':
        $sizes = selectAll('select * from size');
        $template = 'size/list';
        break;
    case 'edit':
        if (isset($_GET['id'])) {
            $size = selectOne("select * from size where id='{$_GET['id']}'");
            if (!is_array($size) || empty($size)) {
                alert('Không tìm thấy sản phẩm', 'index.php?page=size&action=list');
            }
        }
        $template = 'size/edit';
        break;
    case 'save':
        if (intval($_POST['id'])) {
            if (!update('size', [ 'id' => $_POST['id'], 'MaSize' => $_POST['MaSize'], 'TenSize' => $_POST['TenSize']])) {
                alert('Đã có lỗi xảy ra!', 'index.php?page=size&action=list');
            }
        } else {
            if (!insert('size', ['MaSize' => $_POST['MaSize'],'TenSize' => $_POST['TenSize']])) {
                alert('Đã có lỗi xảy ra!', 'index.php?page=size&action=list');
            }
        }
        redirect('index.php?page=size&action=list');
        break;
    case 'remove':
        if (isset($_GET['id'])) {
            $num_rows = delete("size", "where id='{$_GET['id']}'");
            if (!$num_rows) {
                alert("Đã xóa thành công !!", 'index.php?page=size&action=list');
            }
        }
        redirect('index.php?page=size&action=list');
        break;
    default:
        redirect('index.php');
}