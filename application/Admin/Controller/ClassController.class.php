<?php
/**
 * Created by PhpStorm.
 * User: hezenggeng
 * Date: 2017/7/19
 * Time: 上午8:30
 */

namespace Admin\Controller;
use Common\Controller\AdminbaseController;

class ClassController extends AdminbaseController
{
    protected $class_model;

    function _initialize() {
        parent::_initialize();
        $this->class_model = D("Common/Class");
    }

    /**
     * 入口+处理搜索
     */
    public function index(){
        $this->_lists(array());
        $this->display();
    }

    /**
     *添加入口
     */
    public function add(){
        $this->display();
    }

    /**
     * 编辑入口
     */
    public function edit()
    {
        $id=  I("get.id",0,'intval');

        $data = $this->class_model->where(array('id' => $id))->find();

        $this->assign('data',$data);
        $this->display();
    }

    /**
     * 删除操作
     */
    public function delete()
    {
        if(isset($_GET['id'])){
            $id = I("get.id",0,'intval');
            if ($this->class_model->where(array('id'=>$id))->delete()) {
                $this->success("删除成功！");
            } else {
                $this->error("删除失败！");
            }
        }
    }

    /**
     * 添加按钮操作
     */
    public function add_post()
    {
        if (IS_POST)
        {
            $data = I("post.");
            if($this->class_model->where($data)->find())
            {
                $this->error("存在相同的字段");
            }
            else
            {
                if ($this->class_model->create($data) !== false)
                {
                    if ($this->class_model->add() !== false)
                    {
                        $this->success("添加班级成功", U("class/index"));
                    }
                    else
                    {
                        $this->error("添加失败;(");
                    }
                }
                else
                {
                    $this->error($this->class_model->getError());
                }
            }
        }
    }

    /**
     * 编辑按钮操作
     */
    public function edit_post()
    {
        $data = array();
        $data['school_name'] = I("post.school_name");
        $data['grade_name'] = I("post.grade_name");
        $data['class_name'] = I("post.class_name");
        if($this->class_model->where($data)->find())
        {
            $this->error("存在相同的记录;(");
        }
        else
        {
            $data['class_status'] = (int)I("post.class_status");
            $data['remark'] = I("post.remark");

            $id = I("get.id");
            $id = (int)$id;
            $result = $this->class_model->where(array('id' => $id))->save($data);
            if ($result !== false)
            {
                $this->success("编辑班级成功", U("class/index"));
            }
            else
            {
                $this->error("编辑失败;(");
            }
        }
    }

    /**
     * 文章列表处理方法,根据不同条件显示不同的列表
     * @param array $where 查询条件
     *
     * 处理列表（非公有方法，一般'_'开头。）
     * 用assign的方式传了"page","posts"
     */
    private function _lists($where=array())
    {
        $school_name=I('request.school_name');
        if(!empty($school_name))
        {
            $where['school_name']=array('like',"%$school_name%");
        }

        $grade_name=I('request.grade_name');
        if(!empty($grade_name))
        {
            $where['grade_name']=array('like',"%$grade_name%");
        }

        $class_name=I('request.class_name');
        if(!empty($class_name))
        {
            $where['class_name']=array('like',"%$class_name%");
        }

        $class_status=I('request.class_status');
        if($class_status == 1 || $class_status == 2)
        {
            $where['class_status']=$class_status;
        }

        $class_model=M("Class");

        //分页
        $count= $class_model->where($where)->count();
        $page = $this->page($count, 20);

        $posts = $class_model
            ->where($where)
            ->order("id ASC")
            ->limit($page->firstRow . ',' . $page->listRows)
            ->select();

        //传值
        $this->assign("posts", $posts);
        $this->assign("page", $page->show('Class'));
    }

    /**
     *审核和取消审核按钮
     */
    public function check()
    {
        if(isset($_POST['ids']) && $_GET["check"]){
            $ids = I('post.ids/a');

            if ( $this->class_model->where(array('id'=>array('in',$ids)))->save(array('class_status'=>1)) !== false ) {
                $this->success("审核成功！");
            } else {
                $this->error("审核失败！");
            }
        }
        if(isset($_POST['ids']) && $_GET["uncheck"]){
            $ids = I('post.ids/a');

            if ( $this->class_model->where(array('id'=>array('in',$ids)))->save(array('class_status'=>2)) !== false) {
                $this->success("取消审核成功！");
            } else {
                $this->error("取消审核失败！");
            }
        }
    }

}