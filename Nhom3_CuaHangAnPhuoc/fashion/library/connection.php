<?php
$conn = mysqli_connect("localhost","root","123123","fashion");

// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

function selectAll($query)
{
    global $conn;
    $q = mysqli_query($conn, $query);
    if ($q) {
        return mysqli_fetch_all($q, MYSQLI_ASSOC);
    }
    return false;
}

function selectOne($query)
{
    global $conn;
    $q = mysqli_query($conn, $query);
    if ($q) {
        return mysqli_fetch_assoc($q);
    }
    return false;
}

function delete($table, $where)
{
    global $conn;
    return mysqli_query($conn, "delete from {$table} {$where}");
}

function insert($table, $item) {
    global $conn;
    if (empty($item)) {
        return false;
    }

    if (!isset($item['id'])) {
        $maxId = selectOne("select max(id) as maxid from {$table}");
        $maxId = intval($maxId['maxid'] ?? 0) + 1;
        $item['id'] = $maxId;
    }
    $columns = [];
    $values = [];
    foreach ($item as $column => $value) {
        $columns[] = "`" . mysqli_escape_string($conn, $column) . "`";
        if (isset($value)) {
            $values[] = "'" . mysqli_escape_string($conn, $value) . "'";
        } else {
            $values[] = 'NULL';
        }
    }
    return mysqli_query($conn, "insert into {$table} (" . implode(",", $columns) . ") values (" . implode(",", $values) . ")");
}

function addItem($table, $item) {
    global $conn;
    if (empty($item)) {
        return false;
    }
    $columns = [];
    $values = [];
    foreach ($item as $column => $value) {
        $columns[] = "`" . mysqli_escape_string($conn, $column) . "`";
        if (isset($value)) {
            $values[] = "'" . mysqli_escape_string($conn, $value) . "'";
        } else {
            $values[] = 'NULL';
        }
    }
    return mysqli_query($conn, "insert into {$table} (" . implode(",", $columns) . ") values (" . implode(",", $values) . ")");
}
function update($table, $item) {
    global $conn;
    if (empty($item)) {
        return false;
    }

    $checkItem = selectOne("select id from {$table} where id='" . mysqli_escape_string($conn, $item['id']) . "'");

    if (!is_array($checkItem) || empty($checkItem)) {
        alert('Không tìm thấy dữ liệu!');
    }
    $columns = [];
    $values = [];
    foreach ($item as $column => $value) {
        if (isset($value)) {
            $values[] = "`" . mysqli_escape_string($conn, $column) . "`='" . mysqli_escape_string($conn, $value) . "'";
        } else {
            $values[] = "`" . mysqli_escape_string($conn, $column) . "`=NULL";
        }

    }
    return mysqli_query($conn, "update {$table} set " . implode(',', $values) . " where id='{$checkItem['id']}'");
}
function query($sql) {
    global $conn;
    if ($sql == "") {
        return false;
    }
    return mysqli_query($conn, $sql);
}
function escape_string($str){
    global $conn;
    return mysqli_escape_string($conn, $str);
}
