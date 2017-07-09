<?php
/**
 * Created by PhpStorm.
 * User: hezenggeng
 * Date: 2017/7/9
 * Time: 下午3:30
 */
namespace Admin\Controller;
use Think\Controller;


class LoginController extends Controller
{
    public function login()
    {
        $this->display();
    }

    /***
     * 检验用户名密码是否正确
     * @param $username
     * @param $password
     * @return
     */
    public function cheaklogin()
    {
        $username = I("username","", "trim");
        $password = I("password","", "md5");

        $map['username'] = $username;
        $admin = M('stu')->where($map)->find();
        if (admin['password'] === $password) {
            echo '登录成功';
        } else {
            echo '登录失败';
        }

    }
}





?>