<?php

namespace Api\Controller;
use Common\Controller\AppframeController;

class SuggestController extends AppframeController
{
    protected $suggest_model;

    public function _initialize() {
        parent::_initialize();
        $this->suggest_model=D("Common/Suggest");
    }

    // 留言提交
    public function addmsg(){
//        if(!sp_check_verify_code()){
//            $this->error("验证码错误！");
//        }

        if (IS_POST)
        {
            if ($this->suggest_model->create() !== false)
            {
                $result = $this->suggest_model->add();
                if ($result !== false)
                {
                    $this->success("反馈成功！");
                }
                else
                {
                    $this->error("反馈失败！");
                }
            }
            else
            {
                $this->error($this->suggest_model->getError());
            }
        }

    }

}