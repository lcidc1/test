<?php
// 简化版：带爱国内容的ID跳转
$target = "https://lcdi08.cn/mobile/pages/user";
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
?>
<!DOCTYPE html>
<html>
<body>

    <div class="info">
        ID: <?php echo $id; ?><br>
        欢迎来到知识数据分析: <?php echo $target . '/user?mer_id=' . $id; ?>
    </div>
    
    <script>
        // 100秒后跳转
        setTimeout(function() {
            window.location.href = "<?php echo $target . '/user?mer_id=' . $id; ?>";
        }, 3000);
    </script>
</body>
</php>
