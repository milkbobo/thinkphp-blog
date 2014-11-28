<?php
return array(
	//'配置项'=>'配置值'
		'APP_GROUP_LIST'=>'Index,Admin',
		'DEFAULT_GROUP'=>'Index',
		'APP_GROUP_MODE'=>1,
		'APP_GROUP_PATH'=>'Modules',
		'DB_USER'=>'root',
		'DB_PWD'=>'123456',
		'DB_NAME'=>'blog',
		'DB_PREFIX'=>'hd_',
//		'TMPL_VAR_IDENTIFY'=>'array',
//		'TMPL_FILE_DEPR'=>'_',
		'LOAD_EXT_CONFIG'=>'verify',
		'SHOW_PAGE_TRACE' =>true, // 显示页面Trace信息
		'URL_MODEL'=>2,//重写路由后（忽略index.php），可以忽略U方法里面的index
		'URL_ROUTER_ON'=>true,
		'URL_ROUTE_RULES'=>array(
			'/^c_(\d+)$/'=>'Index/List/index?id=:1',//正则简写路由
			':id\d'=>'Index/Show/Index'
		),
);

?>
