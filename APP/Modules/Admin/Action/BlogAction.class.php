<?php
class BlogAction extends CommonAction{
	//博文列表
	public function index(){
		//$field=array('id','title','content','time','click');//field($field)需要的字段
// 		$field=array('del');//field($field,true)不需要的字段
// 		$where=array('del'=>0);
// 		$this->blog=D('BlogRelation')->field($field,true)->where($where)->relation(true)->select();
		$this->blog=D('BlogRelation')->getBlogs();
		$this->display();
	}
	
	//删除到回收站或还原
	public function toTrach(){
		$type=I('type');
		$update=array('id'=>I('id'),'del'=>$type);
		$msg=$type?'删除':'还原';
		//M('blog')->where(array('id'=>I('id')))->save($update);
		//M('blog')->where(array('id'=>I('id')))->setField('del',1);//单独修改
		if (M('blog')->save($update)){
			$this->success($msg.'成功',U(GROUP_NAME.'/Blog/index'));
		}else {
			$this->error($msg.'失败');
		}
		
	}
	
	//回收站
	public function trach(){
		$this->blog=D('BlogRelation')->getBlogs(1);
		$this->display('index');
	}
	
	public function delete(){
		$id=I('id');
		//D('BlogRelation')->relation('attr')->delete($id);//D方法删除出现bug,把中间表全部内容也删除了。
		if (M('blog')->delete($id)){
			M('blog_attr')->where(array('bid'=>$id))->delete();
			$this->success('删除成功',U(GROUP_NAME.'/Blog/trach'));
		}else {
			$this->error('删除失败');
		}
		//$this->display(index);//调试模式要调出模板才可以使用
	}
	
	//清空回收站全部文章
	public function deleteAll(){
		$del=M('blog')->where('del=1')->getField('id',true);
			if ($del){
				foreach ($del as $v){
					M('blog')->delete($v);
					M('blog_attr')->where(array(bid=>$v))->delete();	
				}
				$this->success('删除成功',U(GROUP_NAME.'/Blog/trach'));
			}else {
				$this->error('删除失败');
					}
	}

	
	//添加博文
	public function blog(){
		import('Class.Category',APP_PATH);
		$cate=M('cate')->order('sort')->select();
		$this->cate=Category::unlimitedForLever($cate);
		//博文属性
		$this->attr=M('attr')->select();
		$this->display();
	}
	//添加博文表单处理
	public function addBlog(){
		//D('BlogRelation');//D方法添加，中介表出问题（全部删除再添加），暂时不能用。
		//p($_POST);
		$data=array(
		'title'=>I('title'),
		//'content'=>$_POST['content'],
		'content'=>I('content'),
		'summary'=>I('summary'),
		'time'=>time(),
		//'click'=>(int)$_POST['click'],
		'click'=>I('click'),
		//'cid'=>(int)$_POST['cid'],
		'cid'=>I('cid'),
		);
// 		if (isset($_POST['aid'])){
// 			foreach ($_POST['aid'] as $v){
// 				$data['attr'][]=$v;
// 			}
// 		}
// 		D('BlogRelation')->relation(true)->add($data); 

//用sql来实现增加blog_attr信息
// 		if($bid = M('blog') -> add($data) ){
// 			if (isset($_POST['aid'])){
// 				$sql = 'INSERT INTO `'.C('DB_PREFIX').'blog_attr` (bid,aid) VALUES';
// 				foreach ($_POST['aid'] as $v){
// 					$sql.='('.$bid.','.$v.'),';
// 				}
// 				$sql=rtrim($sql,',');
// 				M('blog_attr')->query($sql);
// 			}$this->success('提交成功',U(GROUP_NAME.'/Blog/index'));
// 		}else {
// 			$this->error('添加失败');
// 		}

		//think方法多维提交（自己编写的）
				if($bid = M('blog') -> add($data) ){
					if (isset($_POST['aid'])){
						$sql=array();
						foreach ($_POST['aid'] as $v){
							$sql[]=array('bid'=>$bid,'aid'=>$v);
						}
						M('blog_attr')->addAll($sql);
						}$this->success('提交成功',U(GROUP_NAME.'/Blog/index'));
					}else {
						$this->error('添加失败');
				}
				
	}
	

}


?>