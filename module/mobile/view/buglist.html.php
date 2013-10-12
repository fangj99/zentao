<!DOCTYPE html>
<html>
<head>
    <title>缺陷列表</title>
    <meta charset="UTF-8"/>
</head>
<body>
<header>
    <a id="backButton"  class='button' style='left:0px;left:auto;overflow:hidden'>返回</a>
    <h1>缺陷列表</h1>
</header>
<div class="story_detail">
    <ul class="mobile_list">
        <?php foreach($bugs as $bug):?>
            <li>
                <a title='缺陷详情' href="mobile-bug-<?php echo $bug->id;?>.html">
                    <div class="s_id"><?php echo $bug->id;?></div><div class="s_title"><?php echo $bug->title;?></div>
                    <div class="story_info">
                        <span>创建人:<?php echo $users[$bug->openedBy];?></span><span class="c_time"><?php echo $bug->openedDate;?></span>
                    </div>
                </a>
            </li>
        <?php endforeach;?>
    </ul>
</div>
<!--<footer>-->
<!--    <a href='#home' class='icon home selected'>主页</a>-->
<!--    <a href='#story' class='icon picture'>需求</a>-->
<!--</footer>-->
</body>