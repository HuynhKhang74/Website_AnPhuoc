<?php
function redirect($url)
{
    header("Location: {$url}");
    exit(1);
}

function getUrl($uri)
{
    return $uri . '.html';
}

function alert($message, $url = null)
{
    echo "<meta charset='utf-8'><script  language='javascript'>alert('{$message}');</script>";
    if (isset($url)) {
        echo "<script language='javascript'>window.location = '{$url}';</script>";
        exit(1);
    }
}


function back($n = 1)
{
    echo "<script language='javascript'>history.go(-".$n.");</script>";
    exit(1);
   
}
function checkURI($table, $uri, $id)
{
    $tableList = ['tre', 'image', 'khoi'];
    foreach ($tableList as $value){
        if($table == $value){
            $checkURI = selectOne("select URI from {$value} where URI = '{$uri}' and ID <> '{$id}'");
        }
        else{
            $checkURI = selectOne("select URI from {$value} where URI = '{$uri}'");
        }
        if(is_array($checkURI) && !empty($checkURI)){
            return false;
        }
    }
    return true;
}
function dump($data){
    if(!is_array($data)){
        var_dump($data);
        return;
    }
    echo '<pre>';
    print_r($data);
    echo '</pre>';
}
function uploadFile($inputName){

        $ext = preg_replace('/^.+\.([^\.]+)$/', '$1', $_FILES[$inputName]['name']);
        $fileName = preg_replace('/^(.+)\.[^\.]+$/', '$1', $_FILES[$inputName]['name']);
        $fileName = utf8ToAscii($fileName).'.'.$ext;
        $fileName = "upload/{$fileName}";
        if(move_uploaded_file($_FILES[$inputName]['tmp_name'], '../'.$fileName)){
            return $fileName;
        }
        else{
            alert("Error : Không thể lưu file");
            exit;
        }
}
function utf8ToAscii($name){
    $map = [
        'u'=> [
            'ú', 'ù', 'ủ', 'ũ', 'ụ', 'ư', 'ứ', 'ừ', 'ử', 'ữ', 'ự',
            'Ú', 'Ù', 'Ủ', 'Ũ', 'Ụ', 'Ư', 'Ứ', 'Ừ', 'Ử', 'Ữ', 'Ự',
        ],
        'e'=> [
            'é', 'è', 'ẻ', 'ẽ', 'ẹ', 'ê', 'ế', 'ề', 'ể', 'ễ', 'ệ',
            'É', 'È', 'Ẻ', 'Ẽ', 'Ẹ', 'Ê', 'Ế', 'Ề', 'Ể', 'Ễ', 'Ệ',
        ],
        'o'=> [
            'ó', 'ò', 'ỏ', 'õ', 'ọ', 'ô', 'ố', 'ồ', 'ổ', 'ỗ', 'ộ', 'ơ', 'ớ', 'ờ', 'ở', 'ỡ', 'ợ',
            'Ó', 'Ò', 'Ỏ', 'Õ', 'Ọ', 'Ô', 'Ố', 'Ồ', 'Ổ', 'Ỗ', 'Ộ', 'Ơ', 'Ớ', 'Ờ', 'Ở', 'Ỡ', 'Ợ',
        ],
        'a'=> [
            'á', 'à', 'ả', 'ã', 'ạ', 'â', 'ấ', 'ầ', 'ẩ', 'ẫ', 'ậ', 'ă', 'ắ', 'ằ', 'ẳ', 'ẵ', 'ặ',
            'Á', 'À', 'Ả', 'Ã', 'Ạ', 'Â', 'Ấ', 'Ầ', 'Ẩ', 'Ẫ', 'Ậ', 'Ă', 'Ắ', 'Ằ', 'Ẳ', 'Ẵ', 'Ặ',
        ],
        'i'=> [
            'í', 'ì', 'ỉ', 'ĩ', 'ị',
            'Í', 'Ì', 'Ỉ', 'Ĩ', 'Ị',
        ],
        'd'=> ['đ', 'Đ'],
    ];
    $uri = trim($name);
    foreach($map as $ascii=>$utf8){
        foreach($utf8 as $k){
            $uri = str_replace($k, $ascii, $uri);
        }
    }
    return trim(preg_replace('/[^0-9a-z]+/i', '-', mb_strtolower($uri, 'UTF-8')), '-');
}
