<?php
switch ($_GET['action']) {
    case 'list':
        $chatlieus = selectAll('select * from chatlieu');
        $template = 'chatlieu/list';
        break;
    case 'edit':
        if (isset($_GET['id'])) {
            $chatlieu = selectOne("select * from chatlieu where id='{$_GET['id']}'");
            if (!is_array($chatlieu) || empty($chatlieu)) {
                alert('Không tìm thấy sản phẩm', 'index.php?page=chatlieu&action=list');
            }
        }
        $template = 'chatlieu/edit';
        break;
    case 'save':
        if (intval($_POST['id'])) {
            if (!update('chatlieu', [ 'id' => $_POST['id'], 'MaChatLieu' => $_POST['MaChatLieu'], 'TenChatLieu' => $_POST['TenChatLieu']])) {
                alert('Đã có lỗi xảy ra!', 'index.php?page=chatlieu&action=list');
            }
        } else {
            if (!insert('chatlieu', ['MaChatLieu' => $_POST['MaChatLieu'],'TenChatLieu' => $_POST['TenChatLieu']])) {
                alert('Đã có lỗi xảy ra!', 'index.php?page=chatlieu&action=list');
            }
        }
        redirect('index.php?page=chatlieu&action=list');
        break;
    case 'remove':
        if (isset($_GET['id'])) {
            $num_rows = delete("chatlieu", "where id='{$_GET['id']}'");
            if (!$num_rows) {
                alert("Đã xóa thành công !!", 'index.php?page=chatlieu&action=list');
            }
        }
        redirect('index.php?page=chatlieu&action=list');
        break;
    default:
        redirect('index.php');
}