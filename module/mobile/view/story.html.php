<div id="story1" class="panel">
    <div id='storycontent' class="story_detail">
        <div class="s_title"><?php echo $story->title ?></div>
        <div class="story_info">
            <span>创建人:<?php echo $users[$story->openedBy];?></span><span class="c_time"><?php echo $story->openedDate;?></span>
        </div>
        <div id="s_spec">
            <h2>需求描述</h2>
            <div class="content">
                <?php echo $story->spec ?>
            </div>
        </div>
        <div id="s_verify">
            <h2>验收标准</h2>
            <div class="content">
                <?php echo $story->verify ?>
            </div>
        </div>
        <div id="s_action">
            <h2>备注</h2>
            <div class="content">
                <ol>
                    <?php foreach($actions as $action):?>
                        <li>
                            <span>
                                <?php echo $action->date .",<b>" . $users[$action->actor] . "</b>";
                                if($action->action=='opened'){echo "创建";}
                                elseif($action->action=='commented'){echo "添加备注";}
                                ?>
                            </span>
                            <?php if($action->action=='commented')echo "<div class='comment'>" . $action->comment . "</div>"; ?>
                        </li>
                    <?php endforeach;?>
                </ol>
            </div>
        </div>
    </div>
    <iframe name="actionframe" style="display: none"></iframe>
    <footer>
        <div class="foot_ctr">
            <form id="form1" method='post' target="actionframe" style="height: 100%;" action='<?php echo inlink('commentStory', "storyId=$story->id")?>'>
                <table style="height: 100%; width: 100%;">
                    <tr>
                        <td><?php echo html::textarea('comment', '',"rows='3' style='width:100%'");?></td>
                        <td width="50"><input type="submit" id="submit" value="备注" /></td>
                        <td width="50"><input type="button" value="评审" onclick="$.ui.loadContent('storycontent')" /></td>
                    </tr>
                </table>
            </form>
        </div>
    </footer>
</div>
