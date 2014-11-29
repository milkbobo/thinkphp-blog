<?php
class ShowAction extends Action{
	public function index(){
		$id=I('id');
		
		$field=array('id','title','time','click','content','cid');
		$this->blog=M('blog')->field($field)->find($id);
		
		$cid=$this->blog['cid'];
		//压路径条出来
		import('Class.Category',APP_PATH);
		$cate=M('cate')->order('sort')->select();
		$this->parent=Category::getParents($cate, $cid);
		$this->display();
		
	}
	//用JS显示点击次数
	public function clickNum(){
		$id=I('id');
		$where=array('id'=>$id);
		M('blog')->where($id)->setInc('click');
		$click=M('blog')->where($where)->getField('click');
		echo 'document.write('.$click.')';
	}
}


?>