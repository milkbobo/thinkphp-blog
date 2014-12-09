<?php
return array(
	//'配置项'=>'配置值'
	//禁止模块访问
	//'MODULE_DENY_LIST'=>array('Common','Runtime','Admin'),
	//允许模块访问
	//'MODULE_ALLOW_LIST'=>array('Home'),
	//设置默认的加载模块
	//'DEFAULT_MODULE'=>'Admin',
	//只允许一个模块
	//'MULTI_MODULE'=>false,
	//设置PATHINFO的URL分隔符
	//'URL_PATHINFO_DEPR'=>'_',
	//修改键的名称
	//'VAR_MODULE'=>'mm',
	//'VAR_CONTROLLER'=>'cc',
	//'VAR_ACTION'=>'aa',
	
	//mysql全局定义
	/*
	'DB_TYPE'=>'mysql',
	'DB_HOST'=>'localhost',
	'DB_USER'=>'root',
	'DB_PWD'=>'123456',
	'DB_NAME'=>'thinkphp',
	'DB_PORT'=>3306,
	'DB_PREFIX'=>'think_',
	*/
	//PDO专用定义
	'DB_TYPE'=>'pdo',
	'DB_USER'=>'root',
	'DB_PWD'=>'123456',
	'DB_PREFIX'=>'think_',
	'DB_DSN'=>'mysql:host=localhost;dbname=thinkphp;charset=UTF8',
	
	//SQL解析缓存
	//'DB_SQL_BUILD_CACHE' => true,
	
	//页面Trace
	'SHOW_PAGE_TRACE' =>true,
		
	//设置要显示的调试模块
	'TRACE_PAGE_TABS'=>array(
			'base'=>'基本',
			'file'=>'文件',
			'think'=>'流程',
			'error'=>'错误',
			'sql'=>'SQL',
			'debug'=>'调试',
			'user'=>'用户'
	),
	
	//修改视图目录
	'DEFAULT_V_LAYER' =>'View',
	//修改模版文件的后缀
	'TMPL_TEMPLATE_SUFFIX'=>'.tpl',
	//用下划线修改目录层次
	//'TMPL_FILE_DEPR'=>'_',
	
	//修改模版目录
	//'VIEW_PATH'=>'./Public/',
	
	//设置默认主题
	'DEFAULT_THEME'=>'default',
		
	'VAR_PAGE'=>'page',
		
	//修改定界符
	//'TMPL_L_DELIM'=>'<{',
	//'TMPL_R_DELIM'=>'}>',
	
	//'LAYOUT_ON'=>true,
	//'LAYOUT_NAME'=>'Public/layout',
	//'TMPL_LAYOUT_ITEM' =>'{__REPLACE__}',
	
	//'TAGLIB_BUILD_IN' =>'cx,html',
	//'TAGLIB_PRE_LOAD'=>'html',
	//设置了内置标签，就不需要标签预加载了
	
	//设置可访问模块
	'MODULE_ALLOW_LIST'=>array('Home','Admin'),
	'DEFAULT_MODULE'=>'Home',// 默认模块，可以省去模块名输入
		
	//启用路由功能
	'URL_ROUTER_ON'=>true,
	//配置路由规则
	'URL_ROUTE_RULES'=>array(
		//'u'=>'User/index',
		//'u/:id'=>'User/index',
		//'u/:type/:attr/:list'=>'User/index',
		//':u/:id'=>'User/index',
		//'u/:id\d'=>'User/index',
		//'u/:id\d|md5'=>'User/index',
		//'u/[:id\d]'=>'User/index',
		//'u/:id\d$'=>'User/index',
		//'/^u_(\d{2})$/'=>'User/index?id=:1',
		//'/^u_(\d{2})$/'=>'User/index?id=:1|md5',
		//'u/:id'=>function ($id) {
		//	echo $id;
		//},
		//'/^u_(\d{2})$/'=>function ($id) {
		//	echo $id;
		//},
		//'m/:id\d'=>'Member/add',
		'/^m_(\d+)$/'=>'Member/add?id=:1',
	),

	//配置静态路由
	'URL_MAP_RULES'=>array(
		//'u_i'=>'User/index',
	),
		
	//URL可以不区分大小写
	//'URL_CASE_INSENSITIVE' =>true	
	
	//设置伪静态后缀，默认为html
	//'URL_HTML_SUFFIX'=>'shtml',
	//'URL_HTML_SUFFIX'=>'',
	'URL_HTML_SUFFIX'=>'html|shtml|xml',
		
	//禁止访问的后缀
	'URL_DENY_SUFFIX' => 'pdf|ico|png|gif|jpg',
		
	
	//'URL_MODEL'=>0,		//普通模式
	//'URL_MODEL'=>1,
	'URL_MODEL'=>2,		

	//配置控制器方法后缀
	//'ACTION_SUFFIX'=>'Action',

		
	//允许二级控制器
	//'CONTROLLER_LEVEL'=>2,
	
	//启用Action参数绑定，默认为true，可以不写
	//'URL_PARAMS_BIND'=>true,

	//定义按顺序传参绑定
	//'URL_PARAMS_BIND_TYPE'=>1,
	
	//自定义成功和错误提示模版页面
	//'TMPL_ACTION_SUCCESS'=>'Public/success',
	//'TMPL_ACTION_ERROR'=>'Public/error',
		
	//'DEFAULT_FILTER'=>'htmlspecialchars',
		
	//设置操作绑定到类
	//'ACTION_BIND_CLASS'=>True,

	//不启动sesssion
	//'SESSION_AUTO_START' =>false,
	
	//'SESSION_PREFIX'=>'think_',
	//'COOKIE_PREFIX'=>'abc_',
	
	//开启语言包功能
	//'LANG_SWITCH_ON' => true,
	//自动侦测语言 开启多语言功能后有效
	//'LANG_AUTO_DETECT' => true,
	//允许切换的语言列表 用逗号分隔
	//'LANG_LIST' => 'zh-cn,en-us',
	//默认语言切换变量
	//'VAR_LANGUAGE' => 'lang',
	
	//开启静态缓存
	//'HTML_CACHE_ON'=>true,
	//全局缓存的过期时间
	//'HTML_CACHE_TIME'=>60,
	//缓存的后缀
	//'HTML_CACHE_SUFFIX'=>'.html',
	//缓存的规则
	//'HTML_CACHE_RULES'=>array(
		//'User:index'=>array('{:module}_{:controller}_{:action}_{id}', 60),
		//'User:index'=>array('{:module}/{:controller}/{:action}/{id}', 60),
		//'index'=>array('{id}'),
	//	'*'=>array('{$_SERVER.REQUEST_URI|md5}'),
	//),
		
		
	//运行的日志记录级别
	//'LOG_LEVEL'=>'EMERG,ALERT,CRIT,ERR',
		
);






























