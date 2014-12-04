<?php
namespace Home\Model;
use Think\Model;

class UserModel extends Model {
	protected $patchValidate = true;
	protected $_validate = array(
		//array('user', 'require', '用户名不得为空！', 0, 'regex',3),
		//array('user', 'email', '邮箱格式不正确！'),
		//array('user', 'url', 'URL格式不合法！'),
		//array('user', 'currency', '货币格式不正确！'),
		//array('user', 'zip', '邮政编码必须是六位正整数！'),
		//array('user', 'number', '必须是正整数！'),
		//array('user', 'integer', '必须是整数！'),
		//array('user', 'double', '必须是浮点数！'),
		//array('user', 'english', '必须是纯英文！'),
		//array('user', '/^\d{3,6}$/', '必须是3-6位纯数字', 0, 'regex'),
		//array('user', '李炎恢', '传递过来的值不相等', 0, 'equal'),
		//array('user', '李炎恢', '传递过来的必须不相等', 0, 'notequal'),
		//array('user','name', '两个值不相等', 0, 'confirm'),
		//array('user', array(1,3,5), '不在指定范围内的某个值', 0, 'in'),
		//array('user', array(1,3,5), '不得在指定范围内的某个值', 0, 'notin'),
		//array('user', '张三,李四,王五', '找不到指定的内置的值', 0, 'in'),
		//array('user', '张三,李四,王五', '找不到指定的内置的值', 0, 'notin'),
		//array('user', '3', '不得小于3位', 0, 'length'),
		//array('user', '3,6', '不得小于3位，不得大于6位', 0, 'length'),
		//array('user', array(3,5), '必须是3-5之间的数字', 0, 'between'),
		//array('user', array(3,5), '不得是3-5之间的数字', 0, 'notbetween'),
		//array('user', '2015-1-1,2016-1-1', '不在有效期内', 0, 'expire'),
		//array('user', '127.0.0.1', '您的IP被禁止', 0, 'ip_deny'),
		//array('user', '128.0.0.1', '您的IP没有被允许', 0, 'ip_allow'),
		
		array('user', 'checkLength', '用户名必须在3-5位之间', 0, 'function', 3, array(3,5)),
		array('email', 'email', '邮箱格式不正确！'),
	);
	
	protected function checkLength($str, $min, $max) {
		preg_match_all('/./u', $str, $matches);
		$len = count($matches[0]);
		if ($len < $min || $len > $max) {
			return false;
		} else {
			return true;
		}
	}
}








