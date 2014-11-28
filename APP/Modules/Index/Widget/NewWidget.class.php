<?php
class NewWidget extends Widget{
	public function render($data){
		//最新发布
		$limit=$data['limit'];
		$field=array('id','title','click','time');
		$data['news']=M('blog')->field($field)->order('time DESC')->limit($limit)->select();
		return $this->renderFile('',$data);
	}
}


?>