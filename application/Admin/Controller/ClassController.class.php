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
        parent::_initialize(array());
        $this->class_model = D("Common/Class");
    }

    /**
     * 入口+处理搜索
     */
    public function index() {
        $this->_lists();

        $this->display();
    }

    /**
     *
     */
    public function add(){
        $this->display();
    }

    /**
     * 文章列表处理方法,根据不同条件显示不同的列表
     * @param array $where 查询条件
     *
     * 处理列表（非公有方法，一般'_'开头。）
     * 用assign的方式传了"page","formget""posts"
     */
    private function _lists($where=array())
    {
        $id=I('request.school_name',0);
        if(!empty($school_name)){
            $where['school_name']=array('like',"%$school_name%");
        }

        $school_name = I('request.school_name');

        if(!empty($school_name)){
            $where['b.term_id']=$term_id;
            $term=$this->terms_model->where(array('term_id'=>$term_id))->find();
            $this->assign("term",$term);
        }

        $grade_name  = I('request.grade_name');
        $class_name  = I('request.class_name',0,'intval');



    }

    /**
     *
     */

}