<?php

namespace User\Controller;

use Common\Controller\HomebaseController;

class StudentRegisterController extends HomebaseController{

    // 前台用户注册
    public function index(){
        if(sp_is_user_login()){ //已经登录时直接跳到首页
            redirect(__ROOT__."/");
        }else{
            $this->display(":student_register");
        }
    }





}
