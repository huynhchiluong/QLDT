<?php
/**
* Format Class
*/
class Format{
public function formatDate($date){
return date('F j, Y, g:i a', strtotime($date));
}

public function textShorten($text, $limit = 400){
$text = $text." ";
$text = substr($text, 0, $limit);// sẽ trích xuất một phần của chuỗi, phần chuỗi được trích xuất sẽ tùy thuộc vào tham số truyền vào.
$text = substr($text, 0, strrpos($text, ' '));
$text = $text."...";
return $text;
}

public function validation($data){
$data = trim($data);//sẽ loại bỏ khoẳng trắng( hoặc bất kì kí tự nào được cung cấp) dư thừa ở đầu và cuối chuỗi.
$data = stripcslashes($data);// nếu trong chuỗi có các kí tự đặc biệt( \n, \r .vv.) hàm stripcslashes() sẽ loại bỏ tất cả kí tự đặc biệt đó
$data = htmlspecialchars($data);//Chuyển đổi các ký tự được xác định trước "<" (nhỏ hơn) và ">" (lớn hơn) thành các thực thể HTML:
return $data;
}

public function title(){
$path = $_SERVER['SCRIPT_FILENAME'];
$title = basename($path, '.php');
//$title = str_replace(&#39;_&#39;, &#39; &#39;, $title);
if ($title == 'index&') {
$title = 'home';
}elseif ($title == 'contact') {
$title = 'contact';
}
return $title = ucfirst($title);
}
}
?>