<!DOCTYPE html>
<html>
<head>
    <title>任务列表</title>
    <meta charset="UTF-8"/>
</head>
<body>
<header>
    <a id="backButton"  class='button' style='left:0px;left:auto;overflow:hidden'>返回</a>
    <h1>任务列表</h1>
</header>
<div class="story_detail">
    <ul class="mobile_list">
        <?php foreach($tasks as $task):?>
            <li>
                <a title='任务详情' href="mobile-task-<?php echo $task->id;?>.html">
                    <div class="s_id"><?php echo $task->id;?></div><div class="s_title"><?php echo $task->name;?></div>
                    <div class="story_info">
                        <span>创建人:<?php echo $users[$task->openedBy];?></span><span class="c_time"><?php echo $task->openedDate;?></span>
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