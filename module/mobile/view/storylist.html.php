<div class="story_detail">
    <ul class="mobile_list">
        <?php foreach($stories as $story):?>
            <li>
                <a href="mobile-story-<?php echo $story->id;?>.html" title="需求 #<?php echo $story->id ?>">
                    <div class="s_id"><?php echo $story->id;?></div><div class="s_title"><?php echo $story->title;?></div>
                    <div class="story_info">
                        <span>创建人:<?php echo $users[$story->openedBy];?></span><span class="c_time"><?php echo $story->openedDate;?></span>
                    </div>
                </a>
            </li>
        <?php endforeach;?>
    </ul>
</div>
