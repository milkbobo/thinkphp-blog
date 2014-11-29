<?php
return array(
	'APP_AUTOLOAD_PATH'=>'@.TagLib',
	'TAGLIB_BUILD_IN'=>'Cx,Hd',
	
		//开启静态缓存
		'HTML_CACHE_ON'=>true,// 开启静态缓存
		'HTML_CACHE_RULES'=>array(
				//'静态地址'=> array('静态规则', '有效期', '附加规则'),
				'Show:index'=>array('{:module}_{:action}_{id}','10'),
		),
		
);


?>