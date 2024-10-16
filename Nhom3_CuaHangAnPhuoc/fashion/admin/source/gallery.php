<?php
if(!isset($_GET['product_id'])){
    back();
}

$template = 'gallery';
switch ($_GET['action']) {
    case 'list':
        $images = selectAll('select * from image where type = "product" and product_id = "'.$_GET['product_id'].'"');
        $template = 'gallery/list';
        break;
    case 'edit':
        if (isset($_GET['id'])) {
            $image = selectOne("select * from image where id='{$_GET['id']}' and type = 'product'");
            if (!is_array($image) || empty($image)) {
                alert('Không tìm thấy dữ liệu', 'index.php?page=gallery&action=list');
            }
        }
        $template = 'gallery/edit';
        break;
    case 'save':
        if(intval($_POST['id'])){
            $gallery =  selectOne('select * from image where id ="'.$_POST['id'].'" and type = "product"');
            if(!is_array($gallery)){
                alert("Không tìm thấy dữ liệu !");
                back();
            }
        }
        if($_FILES['file']['name'] != ''){
            $file = uploadFile('file');
        }
        elseif($_POST['file_curr'] != '') {
            $file = $_POST['file_curr'];
        }
        if (intval($_POST['id'])) {
            if (!update('image', ['id' => $_POST['id'],'url' => $file, 'type' => "product", 'product_id' => $_GET['product_id']])) {
                alert('Đã có lỗi xảy ra!', 'index.php?page=gallery&action=list');
            }
        } else {
            if (!insert('image', ['url' => $file, 'type' => "product", 'product_id' => $_GET['product_id']])) {
                alert('Đã có lỗi xảy ra!', 'index.php?page=gallery&action=list');
            }
        }
        redirect('index.php?page=gallery&product_id='.$_GET['product_id'].'&action=list');
        break;
    case 'remove':
        if (isset($_GET['id'])) {
            $num_rows = delete("image", "where id='{$_GET['id']}' and type = 'product'");
            if (!$num_rows) {
                alert("Đã xóa thành công !!", 'index.php?page=gallery&action=list');
            }
        }
        redirect('index.php?page=gallery&product_id='.$_GET['product_id'].'&action=list');
        break;
    case 'show':
        $gallery =  selectOne('select * from image where id ="'.$_GET['id'].'" and type = "product"');
        if(!is_array($gallery)){
            alert("Không tìm thấy dữ liệu !");
            back();
        }
        if (isset($_GET['id'])) {
            update("image", ['id' => $_GET['id'], 'enable' => 1]);
        }
        redirect('index.php?page=gallery&product_id='.$_GET['product_id'].'&action=list');
        break;
    case 'hide':
        $gallery =  selectOne('select * from image where id ="'.$_GET['id'].'" and type = "product"');
        if(!is_array($gallery)){
            alert("Không tìm thấy dữ liệu !");
            back();
        }
        if (isset($_GET['id'])) {
            update("image", ['id' => $_GET['id'], 'enable' => 0]);
        }
        redirect('index.php?page=gallery&product_id='.$_GET['product_id'].'&action=list');
        break;
    default:
        redirect('index.php');
}
