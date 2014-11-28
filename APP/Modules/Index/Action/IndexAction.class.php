<?php
class IndexAction extends Action{
	//首页
	public function index(){
		
		if(!$list=S('index_list')){
			$list=M('cate')->where(array('pid'=>0))->order('sort')->select();
			import('Class.Category',APP_PATH);
			
			$cate=M('cate')->order('sort')->select();
			$db=M('blog');
			
			$field=array('id','title','time');
			//文章分类
			foreach ($list as $k => $v){
				$cids=Category::getChildsId($cate,$v['id']);//一级分类获得二级分类的ID
				$cids[]=$v['id'];//加上自己一级分类的ID,这个数组就会有一二级分类的ID
				$where=array('cid'=>array('IN',$cids));//where出有该一二级分类ID的文章
				$list[$k]['blog']=$db->field($field)->where($where)->select();
			}
			S('index_list',$list,10);
		}


		$this->cate=$list;
		$this->display();
	}
	
	
	
}


?>