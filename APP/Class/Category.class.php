<?php
//组合一维数组
class Category{
	static public function unlimitedForLever($cate,$html='--',$pid=0,$level=0){
		$arr=array();
		foreach ($cate as $v){
			if ($v['pid']==$pid){
				$v['level']= $level+1;
				$v['html']=str_repeat($html,$level);
				$arr[]=$v;
				$arr=array_merge($arr,self::unlimitedForLever($cate,$html,$v['id'],$level+1));
			}
		}
		return $arr;
	}
	//无限极类目分类(组合多维数组)
	static public function unlimitedForLayer($cate,$name='child',$pid=0){
		$arr = array();
		foreach ($cate as $v){
			if ($v['pid']==$pid){
				$v[$name]=self::unlimitedForLayer($cate,$name,$v['id']);
				$arr[]=$v;
			}
		}
		return $arr;
	}
	//传递一个子分类ID返回所有的父级分类
	static public function getParents($cate,$id){
		$arr=array();
		foreach ($cate as $v){
			if ($v['id']==$id){
				$arr[]=$v;
				$arr=array_merge(self::getParents($cate, $v['pid']),$arr);
			}
		}
		return $arr;
	} 
	//传递一个父级分类ID返回所有子分类ID
	static public function getChildsId($cate,$pid){
		$arr=array();
		foreach($cate as $v){
			if ($v['pid']==$pid){
				$arr[]=$v['id'];
				$arr=array_merge($arr,self::getChildsId($cate, $v['id']));
			}
		}
		return $arr;
	}
	//传递一个父级分类ID返回所有子级分类
	static public function getChilds($cate,$pid){
		$arr=array();
		foreach ($cate as $v){
			if ($v['pid'] == $pid){
				$arr[]=$v;
				$arr=array_merge($arr,self::getChilds($cate, $v['id']));
			}
		}
		return $arr;
	}
	
}


?>