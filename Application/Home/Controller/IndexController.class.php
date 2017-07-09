<?php
namespace Home\Controller;
use Think\Controller;


class IndexController extends Controller
{
    /***
     * 程序入口
     */
    public function index()
    {
        $this->display();
    }

    /***
     * 检验用户名密码是否正确
     * @param $username
     * @param $password
     * @return
     */
    public function login()
    {
        $username = I("username","trim");   //接收用户名并用trim函数除去首尾空格
        $password = I("password", "md5");   //接收密码并加密（数据库中是加密后的密码）

        $map['username'] = $username;
        $admin = M('stu')->where($map)->find(); //相当于select * from lsr_stu where username = '$username' limit 1;
        if($admin['password'] === $password)
        {
            echo '登录成功';
        }
        else
        {
            echo '账号密码错误';
        }

    }
}