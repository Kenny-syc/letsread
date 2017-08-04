<?php

namespace Common\Model;
use Common\Model\CommonModel;

class SuggestModel extends CommonModel
{
    //自动验证
    protected $_validate = array(
        //array(验证字段,验证规则,错误提示,验证条件,附加规则,验证时间)
        array('suggest_text', 'require', '反馈内容不能为空！', 1, 'regex', 3 ),
        array('suggest_address', 'require', '联系方式不能为空！', 1, 'regex', 3 ),
    );


    //以下是仿照的
    protected $_auto = array (
        array('createtime','mDate',1,'callback'), // 对msg字段在新增的时候回调htmlspecialchars方法
    );

    function mDate(){
        return date("Y-m-d H:i:s");
    }

    protected function _before_write(&$data) {
        parent::_before_write($data);
    }
}

