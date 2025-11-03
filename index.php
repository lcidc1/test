<?php
// 配置目标域名
$target_domain = "https://lcdi08.cn/mobile/pages/user";

// 获取当前请求的后缀
$request_uri = $_SERVER['REQUEST_URI'];
$path_parts = explode('/', trim($request_uri, '/'));
$current_suffix = $path_parts[0] ?? '';

// 检查后缀是否是数字形式（如：1, 2, 3...）
if (is_numeric($current_suffix)) {
    $mer_id = intval($current_suffix);
    $redirect_url = $target_domain . "user?mer_id=" . $mer_id;
    
    header('HTTP/1.1 301 Moved Permanently');
    header('Location: ' . $redirect_url);
    exit();
}

// 如果是英文后缀，使用映射表
$english_suffix_map = [
    'login' => 100,
    'register' => 101,
    'shop' => 102,
    'blog' => 103,
    'about' => 104
];

if (isset($english_suffix_map[$current_suffix])) {
    $mer_id = $english_suffix_map[$current_suffix];
    $redirect_url = $target_domain . "/user?mer_id=" . $mer_id;
    
    header('HTTP/1.1 301 Moved Permanently');
    header('Location: ' . $redirect_url);
    exit();
}

// 默认跳转
header('Location: ' . $target_domain . '/user?mer_id=0');
exit();
?>