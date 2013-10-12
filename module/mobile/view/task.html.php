<!DOCTYPE html>
<html>
<head>
    <title>任务 #<?php echo $task->id ?></title>
    <meta charset="UTF-8"/>
</head>
<body>
<header>
    <a id="backButton" class='button' style='left:0px;left:auto;overflow:hidden'>返回</a>
    <h1>任务 #<?php echo $task->id ?></h1>
</header>
<div class="story_detail">
    <div class="s_title"><?php echo $task->name ?></div>
    <div class="s_info"><?php echo $task->spec ?></div>
</div>
<footer>
    <a href='#home' class='icon home selected'>主页</a>
    <a href='#story' class='icon picture'>需求</a>
</footer>
</body>
</html>