<?php
class CategoryAction extends CommonAction{
	//分类列表视图
	public function index(){
		import('Class.Category',APP_PATH);
		$cate=M('cate')->order('sort ASC')->select();
		//$cate=Category::unlimitedForLayer($cate,'cate');
		//$cate=Category::getChilds($cate,4);
		//p($cate);
		$this->cate=Category::unlimitedForLever($cate,'&nbsp;&nbsp;--');
		$this->display();
	}
	//添加分类视图
	public function addCate(){
		$this->pid=I('pid',0,'intval');
		$this->display();
	}
	//添加分类表达
	public function runAddCate(){  
		if (M('cate')->add($_POST)){
			$this->success('添加成功',U(GROUP_NAME.'/Category/index'));
		}else {
			$this->error('添加失败');
		}
	}
	//排序
	public function sortCate(){
		$db=M('cate');
		foreach ($_POST as $id=>$sort){
			$db->where(array('id'=>$id))->setField('sort',$sort);
		}
		$this->redirect(GROUP_NAME.'/Category/index');
	}
}


?>