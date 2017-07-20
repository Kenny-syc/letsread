<?php
/**
 * Created by PhpStorm.
 * User: hezenggeng
 * Date: 2017/7/19
 * Time: 下午7:53
 */

namespace Common\Model;
use Common\Model\CommonModel;

class ClassModel extends CommonModel
{
    //自动验证
    //可能就是报错吧，管他先写着
    protected $_validate = array(
        //array(验证字段,验证规则,错误提示,验证条件,附加规则,验证时间)
        array('school_name', 'require', '学校不能为空！', 1, 'regex', 3),
        array('grade_name', 'require', '年级不能为空！', 1, 'regex', 3),
        array('class_name', 'require', '班级不能为空！', 1, 'regex', 3),

    );



}