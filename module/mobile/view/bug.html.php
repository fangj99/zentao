<!DOCTYPE html>
<html>
<head>
    <title>缺陷 #<?php echo $bug->id ?></title>
    <meta charset="UTF-8"/>
</head>
<body>
<header>
    <a id="backButton" class='button' style='left:0px;left:auto;overflow:hidden'>返回</a>
    <h1>缺陷 #<?php echo $bug->id ?></h1>
</header>
<div class="story_detail">
    <div class="s_title"><?php echo $bug->title ?></div>
    <div class="s_info"><?php echo $bug->steps ?></div>
</div>
<footer>
    <a href='#home' class='icon home selected'>主页</a>
    <a href='#story' class='icon picture'>需求</a>
</footer>
</body>
</html>