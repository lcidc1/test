<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>动态ID跳转页面</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
            color: #fff;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        
        .container {
            max-width: 800px;
            width: 100%;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
            text-align: center;
        }
        
        h1 {
            font-size: 2.5rem;
            margin-bottom: 10px;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        }
        
        .subtitle {
            font-size: 1.2rem;
            margin-bottom: 30px;
            opacity: 0.9;
        }
        
        .card {
            background: rgba(255, 255, 255, 0.15);
            border-radius: 15px;
            padding: 30px;
            margin: 20px 0;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }
        
        .id-display {
            font-size: 5rem;
            font-weight: bold;
            margin: 20px 0;
            text-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
            color: #ffeb3b;
        }
        
        .message {
            font-size: 1.3rem;
            margin-bottom: 30px;
            line-height: 1.6;
        }
        
        .btn {
            display: inline-block;
            background: #ff4081;
            color: white;
            padding: 15px 40px;
            border-radius: 50px;
            text-decoration: none;
            font-size: 1.2rem;
            font-weight: bold;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(255, 64, 129, 0.4);
            border: none;
            cursor: pointer;
        }
        
        .btn:hover {
            background: #f50057;
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(255, 64, 129, 0.6);
        }
        
        .btn:active {
            transform: translateY(1px);
        }
        
        .info {
            margin-top: 30px;
            font-size: 0.9rem;
            opacity: 0.7;
        }
        
        .nav {
            display: flex;
            justify-content: center;
            margin-top: 20px;
            gap: 15px;
        }
        
        .nav-link {
            color: rgba(255, 255, 255, 0.7);
            text-decoration: none;
            padding: 8px 15px;
            border-radius: 20px;
            transition: all 0.3s ease;
        }
        
        .nav-link:hover {
            color: white;
            background: rgba(255, 255, 255, 0.1);
        }
        
        @media (max-width: 600px) {
            .container {
                padding: 20px;
            }
            
            h1 {
                font-size: 2rem;
            }
            
            .id-display {
                font-size: 3.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>动态ID跳转页面</h1>
        <p class="subtitle">根据URL中的ID参数显示不同内容</p >
        
        <div class="card">
            <?php
            // 获取URL中的id参数
            $id = isset($_GET['id']) ? intval($_GET['id']) : 1;
            
            // 限制id范围在1-10之间
            if ($id < 1) $id = 1;
            if ($id > 10) $id = 10;
            
            // 根据ID显示不同消息
            $messages = [
                1 => "这是第一个ID页面，欢迎访问！",
                2 => "您正在查看第二个ID页面内容。",
                3 => "第三个ID页面，功能一切正常。",
                4 => "第四个ID页面，感谢您的访问。",
                5 => "第五个ID页面，祝您使用愉快！",
                6 => "第六个ID页面，内容丰富多样。",
                7 => "第七个ID页面，体验流畅顺滑。",
                8 => "第八个ID页面，设计精美大方。",
                9 => "第九个ID页面，功能强大实用。",
                10 => "第十个ID页面，完美收官之作。"
            ];
            
            $message = isset($messages[$id]) ? $messages[$id] : "欢迎访问ID {$id} 页面！";
            ?>
            
            <div class="id-display">ID: <?php echo $id; ?></div>
            <p class="message"><?php echo $message; ?></p >
            
            <form action="https://域名B/user" method="GET">
                <input type="hidden" name="mer_id" value="<?php echo $id; ?>">
                <button type="submit" class="btn">跳转到域名B (mer_id=<?php echo $id; ?>)</button>
            </form>
        </div>
        
        <p class="info">当前URL: <?php echo "https://域名A/id=" . $id; ?></p >
        <p class="info">点击按钮将跳转到: <?php echo "https://域名B/user?mer_id=" . $id; ?></p >
        
        <div class="nav">
            <?php if ($id > 1): ?>
                <a href=" >" class="nav-link">上一个ID</a >
            <?php endif; ?>
            
            <?php if ($id < 10): ?>
                <a href="?id=<?php echo $id+1; ?>" class="nav-link">下一个ID</a >
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
