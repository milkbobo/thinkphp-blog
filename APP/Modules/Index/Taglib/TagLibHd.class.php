<?php
//自定义标签库
class TagLibHd extends TagLib{
	protected $tags = array(
		'nav'=>array('attr'=>'limit,order','close'=>1),
		'hot'=>array('attr'=>'limit','close'=>1),
		'links'=>array('attr'=>'limit','close'=>1)	
	);
	
	public function _nav($attr,$content){
		$attr=$this->parseXmlAttr($attr);
		//$limit=$attr['limit'];
		$str=<<<str
<?php
	\$_nav_cate=M('cate')->order("{$attr['order']}")->limit({$attr['limit']})->select();
	import('Class.Category',APP_PATH); 
    \$_nav_cate=Category::unlimitedForLayer(\$_nav_cate); 
	foreach(\$_nav_cate as \$_nav_cate_v) :
		extract(\$_nav_cate_v);
		\$url=U('/c_'.\$id);
?>
str;
		$str .= $content;
		$str .='<?php endforeach;?>';
		return $str;
	}
	
	public function _hot($attr,$content){
		$attr=$this->parseXmlAttr($attr);
		$limit=$attr['limit'];
		$str='<?php ';
		$str.='$field=array("id,click,title");';
		$str.='$_hot_blog=M("blog")->field($field)->limit('.$limit.')->order("click DESC")->select();';
		$str.='foreach($_hot_blog as $_hot_value):';
		$str.='extract($_hot_value);';
		$str.='$url=U("/".$id);?>';
		$str.=$content;
		$str.='<?php endforeach;?>';
		return $str;
		
	}
	public function _links($attr,$content){
		$attr=$this->parseXmlAttr($attr);
		$limit=$attr['limit'];
		$str='<?php ';
		$str.='$field=array("name,link");';
		$str.='$_links_blog=M("links")->field($field)->limit('.$limit.')->select();';
		$str.='foreach($_links_blog as $_links_value):';
		$str.='extract($_links_value);?>';
		$str.=$content;
		$str.='<?php endforeach;?>';
		return $str;
		
	}
} 



?>