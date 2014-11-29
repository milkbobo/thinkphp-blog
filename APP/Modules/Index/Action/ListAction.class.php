<?php
class ListAction extends Action{
	public function index(){
		import('Class.Category',APP_PATH);
		import('ORG.Util.Page');// 导入分页类
		$id= I('id');
		$cate=M('cate')->order('sort')->select();
		
		$cids=Category::getChildsId($cate, $id);//一级分类获得二级分类的ID
		$cids[]=$id;//加上自己一级分类的ID,这个数组就会有一二级分类的ID
		$where=array('cid'=>array('IN',$cids));
		
		//limit方法
// 		$count = M('blog')->where($where)->count();
// 		$page=new Page($count,15);//一共$count，每页显示15条。
// 		$limit = $page->firstRow.','.$page->listRows;
// 		$this->page=$page->show();
// 		$this->blog=D('BlogView')->getAll($where,$limit);

		//page方法
		// 进行分页数据查询 注意page方法的参数的前面部分是当前的页数使用 $_GET[p]获取
		$p=I('p',1);
		$this->blog = D('BlogView')->where($where)->order('time desc')->page($p.',25')->select();
		$count      = M('blog')->where('status=1')->count();// 查询满足要求的总记录数
		$Page       = new Page($count,25);// 实例化分页类 传入总记录数和每页显示的记录数
		$this->page= $Page->show();// 分页显示输出
		
		//$this->blog=D('BlogView')->->where($where)->limit($limit)->select();

		$this->display();
	}
} 


?>