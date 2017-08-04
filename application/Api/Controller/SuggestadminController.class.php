<?php

namespace Api\Controller;
use Common\Controller\AdminbaseController;

class SuggestadminController extends AdminbaseController
{
    protected $suggest_model;

    public function _initialize()
    {
        parent::_initialize();
        $this->suggest_model=D("Common/Suggest");
    }

    // 后台留言列表
    public function index(){

        $count=$this->suggest_model->count();
        $page = $this->page($count, 20);

        $suggestmsgs=$this->suggest_model->order(array("createtime"=>"DESC"))->limit($page->firstRow . ',' . $page->listRows)->select();

        $this->assign("page", $page->show());
        $this->assign("suggestmsgs",$suggestmsgs);
        $this->display();
    }

    // 删除留言
    public function delete(){
        $id=I("get.id",0,'intval');
        $result=$this->suggest_model->where(array("id"=>$id))->delete();
        if($result!==false){
            $this->success("删除成功！", U("Suggestadmin/index"));
        }else{
            $this->error('删除失败！');
        }
    }

}