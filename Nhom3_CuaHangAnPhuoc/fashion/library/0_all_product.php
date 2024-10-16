<?php 

if($conn!=null) {
	$pageurl = "http://fashion.test/danh-sach-san-pham";
	
	if(isset($_GET['soluong']) && is_numeric($_GET['soluong'])){
		$display = $_GET['soluong'];
	} else $display=6;
	$records_sanpham = $conn->query("select * from sanpham");
	$total_records_sanpham = $records_sanpham->rowcount();
	$numlinks=$total_records_sanpham/$display;
	if(isset($_GET['page']) && is_numeric($_GET['page'])){
		$curr_page = $_GET['page'];
		
	}else {
		$curr_page = 1;
	}

	if($curr_page<1) $curr_page=1;
		$position = (($curr_page-1)*$display);
		$total_pages = ceil($total_KH/$display);
		if($curr_page>$numlinks){
			$start = $curr_page - ($numlinks-1);
		} else $start = 1;
		if(($curr_page+$numlinks)<$total_pages){
			$end = $curr_page+$numlinks;
		}else $end = $total_pages;
		
			$records_sanpham = $conn->query("select * from sanpham order by MaSanPham limit $position , $display");
			$total_records_sanpham = $records_sanpham->rowcount();

}
	
?>