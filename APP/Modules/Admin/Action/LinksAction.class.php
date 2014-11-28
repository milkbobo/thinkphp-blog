<?php
class LinksAction extends Action{
	//显示友情链接列表
	public function index(){
		$this->links=M('links')->select();
		$this->display();
	}
	
	//添加列表
	public function addLinks(){
		$this->display();
	}
	
	//进行添加 或 修改
	public function runLinks(){
		$data['id']=I('id',0);
		$data['name']=I('name');
		$data['link']=I('link');
		$data['time']=time();
		//如果ID不存在，表示是修改列表
		if (isset($data['id'])){
			if (M('links')->save($data)){
				$this->success('网址修改成功',U(GROUP_NAME.'/Links/index'));
			}else {
				$this->success('网址修改失败');
			}
		}else {
		
		if (M('links')->add($data)){
			$this->success('网址添加成功',U(GROUP_NAME.'/Links/index'));
		}else {
			$this->success('网址添加失败');
		}
		}
	}
	
	//显示修改列表
	public function undata(){
		$this->id=$id=I('id');
		$links=M('links')->where(array(id=>$id))->select();
		extract($links[0]);
		$this->name=$name;
		$this->link=$link;
		$this->display('addLinks');
	}
	
	//进行修改
	public function runUpdateLinks(){
		
	}
	
}


?>