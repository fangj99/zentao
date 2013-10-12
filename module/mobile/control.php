<?php
class mobile extends control
{
    /**
     * Construct function, load model of project and story modules.
     * 
     * @access public
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->loadModel('product');
        $this->loadModel('project');
        $this->loadModel('story');
        $this->loadModel('task');
        $this->loadModel('bug');
        $this->loadModel('action');


        $this->app->loadClass('pager', $static = true);
        $this->pager = new pager(0, 20, 1);
    }

	/**
     * Index page, to browse.
     * 
     * @access public
     * @return void
     */
    public function index()
    {
        $projectTree = $this->project->tree();
//        $stories = array();
//        $stories = $this->story->getProductStories(1, 0, 'all');
//        $tasks = $this->task->getProjectTasks(1, 'all');
//        $bugs  = $this->bug->getProjectBugs(1, 'status,id_desc');
        $action = $this->action->getRecentDynamic('date_desc', $this->pager);//getDynamic('all', 'latest3days', 'date_desc', $pager);

        $this->view->projectTree = $projectTree;
//        $this->view->stories = $stories;
//        $this->view->tasks = $tasks;
//        $this->view->bugs = $bugs;
        $this->view->actions       = $action;

        // $this->app->loadLang('my');
        // $this->view->productStats = $this->product->getStats();
        $this->display();
    }

    /**
     * @param int $productId
     */
    public function storylist($productId = 1)
    {
        $stories = $this->story->getProductStories($productId, 0, 'all', 'id_desc', $this->pager);
        $this->view->stories = $stories;
        $this->view->users = $this->loadModel('user')->getPairs('noletter');
        $this->display();
    }

    /**
     * @param int $projectId
     */
    public function tasklist($projectId = 1)
    {
        $tasks = $this->task->getProjectTasks($projectId, 'all');
        $this->view->tasks = $tasks;
        $this->view->users = $this->loadModel('user')->getPairs('noletter');
        $this->display();
    }

    /**
     * @param int $projectId
     */
    public function buglist($projectId = 1)
    {
        $bugs  = $this->bug->getProjectBugs($projectId, 'status,id_desc');
        $this->view->bugs = $bugs;
        $this->view->users = $this->loadModel('user')->getPairs('noletter');
        $this->display();
    }

    /**
     * 手机端显示需求
     * @param int $storyId
     * @param int $version
     */
    public function story($storyId, $version = 0)
    {
        $story   = $this->story->getById((int)$storyId, $version, true);
        if(!$story) die(js::error($this->lang->notFound) . js::locate('back'));

        $this->view->story = $story;
        $this->view->users = $this->loadModel('user')->getPairs('noletter');
        $this->view->actions = $this->action->getList('story', $storyId);
        $this->display();
    }

    /**
     * 手机端显示任务
     * @param int $taskId
     */
    public function task($taskId)
    {
        $task = $this->task->getById($taskId, true);
        if(!$task) die(js::error($this->lang->notFound) . js::locate('back'));

        $this->view->task = $task;
        $this->display();
    }

    /**
     * 手机端显示缺陷
     * @param int $bugId
     */
    public function bug($bugId)
    {
        if(!empty($_POST))
        {
            $this->bug->confirm($bugId);
            if(dao::isError()) die(js::error(dao::getError()));
            $actionID = $this->action->create('bug', $bugId, 'bugConfirmed', $this->post->comment);
            $this->sendmail($bugId, $actionID);
            die(js::locate($this->createLink('bug', 'view', "bugID=$bugId"), 'parent'));
        }

        $bug = $this->bug->getById($bugId, true);
        if(!$bug) die(js::error($this->lang->notFound) . js::locate('back'));

        $this->view->bug = $bug;
        $this->display();
    }

    /**
     * 备注需求
     * @param int $storyId
     * @access public
     * @return void
     */
    public function commentStory($storyId)
    {
        if(!empty($_POST))
        {
            $changes = $this->story->update($storyId);
            if(dao::isError()) die(js::error(dao::getError()));
            if($this->post->comment != '' or !empty($changes))
            {
                $action   = !empty($changes) ? 'Edited' : 'Commented';
                $actionID = $this->action->create('story', $storyId, $action, $this->post->comment);
                $this->action->logHistory($actionID, $changes);
                //$this->sendMail($storyId, $actionID);
            }
//            die(js::locate($this->createLink('mobile', 'story', "storyId=$storyId"), 'parent'));
        }
    }

    /**
     * 评审需求
     * @param int $storyId
     */
    public function reviewStory($storyId)
    {

    }


    /**
     * 备注任务
     * @param int $taskId
     */
    public function commentTask($taskId)
    {

    }

    /**
     * 指派任务
     * @param int $taskId
     */
    public function assignTask($taskId)
    {

    }

    /**
     * 备注缺陷
     * @param int $bugId
     */
    public function commentBug($bugId)
    {

    }

    /**
     * 指派缺陷
     * @param int $bugId
     */
    public function assignBug($bugId)
    {

    }
}