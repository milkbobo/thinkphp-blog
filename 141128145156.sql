/*
MySQL Backup
Source Server Version: 5.6.17
Source Database: blog
Date: 2014/11/28 14:51:56
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
--  Table structure for `hd_attr`
-- ----------------------------
DROP TABLE IF EXISTS `hd_attr`;
CREATE TABLE `hd_attr` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(10) NOT NULL,
  `color` char(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `hd_blog`
-- ----------------------------
DROP TABLE IF EXISTS `hd_blog`;
CREATE TABLE `hd_blog` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(30) NOT NULL,
  `content` text,
  `summary` varchar(255) DEFAULT NULL,
  `time` int(10) unsigned NOT NULL DEFAULT '0',
  `click` smallint(6) NOT NULL,
  `cid` int(10) unsigned NOT NULL,
  `del` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `hd_blog_attr`
-- ----------------------------
DROP TABLE IF EXISTS `hd_blog_attr`;
CREATE TABLE `hd_blog_attr` (
  `bid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `aid` int(10) NOT NULL,
  PRIMARY KEY (`bid`,`aid`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `hd_cate`
-- ----------------------------
DROP TABLE IF EXISTS `hd_cate`;
CREATE TABLE `hd_cate` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(15) DEFAULT NULL,
  `pid` int(10) unsigned NOT NULL DEFAULT '0',
  `sort` smallint(6) DEFAULT '100',
  PRIMARY KEY (`id`),
  KEY `pid` (`pid`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `hd_links`
-- ----------------------------
DROP TABLE IF EXISTS `hd_links`;
CREATE TABLE `hd_links` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  `link` varchar(50) NOT NULL,
  `time` int(12) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `hd_user`
-- ----------------------------
DROP TABLE IF EXISTS `hd_user`;
CREATE TABLE `hd_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` char(20) NOT NULL,
  `password` char(32) NOT NULL,
  `logintime` int(10) unsigned NOT NULL,
  `loginip` char(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records 
-- ----------------------------
INSERT INTO `hd_attr` VALUES ('1','置顶','#f00f00'), ('2','推荐','green'), ('3','精华','blue');
INSERT INTO `hd_blog` VALUES ('13','23452345','&lt;p&gt;2345234&lt;/p&gt;',NULL,'1416818885','100','10','0'), ('14','5234523','&lt;p&gt;4523452345&lt;/p&gt;',NULL,'1416818903','100','1','0'), ('15','44444444444444444','&lt;p&gt;4444444444444444444414444&lt;/p&gt;',NULL,'1416986717','234','17','0'), ('16','1111111','&lt;p&gt;3333333333333&lt;/p&gt;',NULL,'1416986763','12','12','0'), ('17','asdfasd23','&lt;p&gt;&amp;lt;?php&lt;br/&gt;class BlogAction extends CommonAction{&lt;br/&gt;&amp;nbsp;//博文列表&lt;br/&gt;&amp;nbsp;public function index(){&lt;br/&gt;&amp;nbsp;&amp;nbsp;//$field=array(&amp;#39;id&amp;#39;,&amp;#39;title&amp;#39;,&amp;#39;content&amp;#39;,&amp;#39;time&amp;#39;,&amp;#39;click&amp;#39;);//field($field)需要的字段&lt;br/&gt;// &amp;nbsp;&amp;nbsp;$field=array(&amp;#39;del&amp;#39;);//field($field,true)不需要的字段&lt;br/&gt;// &amp;nbsp;&amp;nbsp;$where=array(&amp;#39;del&amp;#39;=&amp;gt;0);&lt;br/&gt;// &amp;nbsp;&amp;nbsp;$this-&amp;gt;blog=D(&amp;#39;BlogRelation&amp;#39;)-&amp;gt;field($field,true)-&amp;gt;where($where)-&amp;gt;relation(true)-&amp;gt;select();&lt;br/&gt;&amp;nbsp;&amp;nbsp;$this-&amp;gt;blog=D(&amp;#39;BlogRelation&amp;#39;)-&amp;gt;getBlogs();&lt;br/&gt;&amp;nbsp;&amp;nbsp;$this-&amp;gt;display();&lt;br/&gt;&amp;nbsp;}&lt;br/&gt;&amp;nbsp;&lt;br/&gt;&amp;nbsp;//删除到回收站或还原&lt;br/&gt;&amp;nbsp;public function toTrach(){&lt;br/&gt;&amp;nbsp;&amp;nbsp;$type=I(&amp;#39;type&amp;#39;);&lt;br/&gt;&amp;nbsp;&amp;nbsp;$update=array(&amp;#39;id&amp;#39;=&amp;gt;I(&amp;#39;id&amp;#39;),&amp;#39;del&amp;#39;=&amp;gt;$type);&lt;br/&gt;&amp;nbsp;&amp;nbsp;$msg=$type?&amp;#39;删除&amp;#39;:&amp;#39;还原&amp;#39;;&lt;br/&gt;&amp;nbsp;&amp;nbsp;//M(&amp;#39;blog&amp;#39;)-&amp;gt;where(array(&amp;#39;id&amp;#39;=&amp;gt;I(&amp;#39;id&amp;#39;)))-&amp;gt;save($update);&lt;br/&gt;&amp;nbsp;&amp;nbsp;//M(&amp;#39;blog&amp;#39;)-&amp;gt;where(array(&amp;#39;id&amp;#39;=&amp;gt;I(&amp;#39;id&amp;#39;)))-&amp;gt;setField(&amp;#39;del&amp;#39;,1);//单独修改&lt;br/&gt;&amp;nbsp;&amp;nbsp;if (M(&amp;#39;blog&amp;#39;)-&amp;gt;save($update)){&lt;br/&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;$this-&amp;gt;success($msg.&amp;#39;成功&amp;#39;,U(GROUP_NAME.&amp;#39;/Blog/index&amp;#39;));&lt;br/&gt;&amp;nbsp;&amp;nbsp;}else {&lt;br/&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;$this-&amp;gt;error($msg.&amp;#39;失败&amp;#39;);&lt;br/&gt;&amp;nbsp;&amp;nbsp;}&lt;br/&gt;&amp;nbsp;&amp;nbsp;&lt;br/&gt;&amp;nbsp;}&lt;br/&gt;&amp;nbsp;&lt;br/&gt;&amp;nbsp;//回收站&lt;br/&gt;&amp;nbsp;public function trach(){&lt;br/&gt;&amp;nbsp;&amp;nbsp;$this-&amp;gt;blog=D(&amp;#39;BlogRelation&amp;#39;)-&amp;gt;getBlogs(1);&lt;br/&gt;&amp;nbsp;&amp;nbsp;$this-&amp;gt;display(&amp;#39;index&amp;#39;);&lt;br/&gt;&amp;nbsp;}&lt;br/&gt;&amp;nbsp;&lt;br/&gt;&amp;nbsp;public function delete(){&lt;br/&gt;&amp;nbsp;&amp;nbsp;$id=I(&amp;#39;id&amp;#39;);&lt;br/&gt;&amp;nbsp;&amp;nbsp;//D(&amp;#39;BlogRelation&amp;#39;)-&amp;gt;relation(&amp;#39;attr&amp;#39;)-&amp;gt;delete($id);//D方法删除出现bug,把中间表全部内容也删除了。&lt;br/&gt;&amp;nbsp;&amp;nbsp;if (M(&amp;#39;blog&amp;#39;)-&amp;gt;delete($id)){&lt;br/&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;M(&amp;#39;blog_attr&amp;#39;)-&amp;gt;where(array(&amp;#39;bid&amp;#39;=&amp;gt;$id))-&amp;gt;delete();&lt;br/&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;$this-&amp;gt;success(&amp;#39;删除成功&amp;#39;,U(GROUP_NAME.&amp;#39;/Blog/trach&amp;#39;));&lt;br/&gt;&amp;nbsp;&amp;nbsp;}else {&lt;br/&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;$this-&amp;gt;error(&amp;#39;删除失败&amp;#39;);&lt;br/&gt;&amp;nbsp;&amp;nbsp;}&lt;br/&gt;&amp;nbsp;&amp;nbsp;//$this-&amp;gt;display(index);//调试模式要调出模板才可以使用&lt;br/&gt;&amp;nbsp;}&lt;br/&gt;&amp;nbsp;&lt;br/&gt;&amp;nbsp;//清空回收站全部文章&lt;br/&gt;&amp;nbsp;public function deleteAll(){&lt;br/&gt;&amp;nbsp;&amp;nbsp;$del=M(&amp;#39;blog&amp;#39;)-&amp;gt;where(&amp;#39;del=1&amp;#39;)-&amp;gt;getField(&amp;#39;id&amp;#39;,true);&lt;br/&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;if ($del){&lt;br/&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;foreach ($del as $v){&lt;br/&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;M(&amp;#39;blog&amp;#39;)-&amp;gt;delete($v);&lt;br/&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;M(&amp;#39;blog_attr&amp;#39;)-&amp;gt;where(array(bid=&amp;gt;$v))-&amp;gt;delete();&amp;nbsp;&lt;br/&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;}&lt;br/&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;$this-&amp;gt;success(&amp;#39;删除成功&amp;#39;,U(GROUP_NAME.&amp;#39;/Blog/trach&amp;#39;));&lt;br/&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;}else {&lt;br/&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;$this-&amp;gt;error(&amp;#39;删除失败&amp;#39;);&lt;br/&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;}&lt;br/&gt;&amp;nbsp;}&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;br/&gt;&amp;nbsp;//添加博文&lt;br/&gt;&amp;nbsp;public function blog(){&lt;br/&gt;&amp;nbsp;&amp;nbsp;import(&amp;#39;Class.Category&amp;#39;,APP_PATH);&lt;br/&gt;&amp;nbsp;&amp;nbsp;$cate=M(&amp;#39;cate&amp;#39;)-&amp;gt;order(&amp;#39;sort&amp;#39;)-&amp;gt;select();&lt;br/&gt;&amp;nbsp;&amp;nbsp;$this-&amp;gt;cate=Category::unlimitedForLever($cate);&lt;br/&gt;&amp;nbsp;&amp;nbsp;//博文属性&lt;br/&gt;&amp;nbsp;&amp;nbsp;$this-&amp;gt;attr=M(&amp;#39;attr&amp;#39;)-&amp;gt;select();&lt;br/&gt;&amp;nbsp;&amp;nbsp;$this-&amp;gt;display();&lt;br/&gt;&amp;nbsp;}&lt;br/&gt;&amp;nbsp;//添加博文表单处理&lt;br/&gt;&amp;nbsp;public function addBlog(){&lt;br/&gt;&amp;nbsp;&amp;nbsp;//D(&amp;#39;BlogRelation&amp;#39;);//D方法添加，中介表出问题（全部删除再添加），暂时不能用。&lt;br/&gt;&amp;nbsp;&amp;nbsp;//p($_POST);&lt;br/&gt;&amp;nbsp;&amp;nbsp;$data=array(&lt;br/&gt;&amp;nbsp;&amp;nbsp;&amp;#39;title&amp;#39;=&amp;gt;I(&amp;#39;title&amp;#39;),&lt;br/&gt;&amp;nbsp;&amp;nbsp;//&amp;#39;content&amp;#39;=&amp;gt;$_POST[&amp;#39;content&amp;#39;],&lt;br/&gt;&amp;nbsp;&amp;nbsp;&amp;#39;content&amp;#39;=&amp;gt;I(&amp;#39;content&amp;#39;),&lt;br/&gt;&amp;nbsp;&amp;nbsp;&amp;#39;time&amp;#39;=&amp;gt;time(),&lt;br/&gt;&amp;nbsp;&amp;nbsp;//&amp;#39;click&amp;#39;=&amp;gt;(int)$_POST[&amp;#39;click&amp;#39;],&lt;br/&gt;&amp;nbsp;&amp;nbsp;&amp;#39;click&amp;#39;=&amp;gt;I(&amp;#39;click&amp;#39;),&lt;br/&gt;&amp;nbsp;&amp;nbsp;//&amp;#39;cid&amp;#39;=&amp;gt;(int)$_POST[&amp;#39;cid&amp;#39;],&lt;br/&gt;&amp;nbsp;&amp;nbsp;&amp;#39;cid&amp;#39;=&amp;gt;I(&amp;#39;cid&amp;#39;),&lt;br/&gt;&amp;nbsp;&amp;nbsp;);&lt;br/&gt;// &amp;nbsp;&amp;nbsp;if (isset($_POST[&amp;#39;aid&amp;#39;])){&lt;br/&gt;// &amp;nbsp;&amp;nbsp;&amp;nbsp;foreach ($_POST[&amp;#39;aid&amp;#39;] as $v){&lt;br/&gt;// &amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;$data[&amp;#39;attr&amp;#39;][]=$v;&lt;br/&gt;// &amp;nbsp;&amp;nbsp;&amp;nbsp;}&lt;br/&gt;// &amp;nbsp;&amp;nbsp;}&lt;br/&gt;// &amp;nbsp;&amp;nbsp;D(&amp;#39;BlogRelation&amp;#39;)-&amp;gt;relation(true)-&amp;gt;add($data);&lt;/p&gt;&lt;p&gt;//用sql来实现增加blog_attr信息&lt;br/&gt;// &amp;nbsp;&amp;nbsp;if($bid = M(&amp;#39;blog&amp;#39;) -&amp;gt; add($data) ){&lt;br/&gt;// &amp;nbsp;&amp;nbsp;&amp;nbsp;if (isset($_POST[&amp;#39;aid&amp;#39;])){&lt;br/&gt;// &amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;$sql = &amp;#39;INSERT INTO `&amp;#39;.C(&amp;#39;DB_PREFIX&amp;#39;).&amp;#39;blog_attr` (bid,aid) VALUES&amp;#39;;&lt;br/&gt;// &amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;foreach ($_POST[&amp;#39;aid&amp;#39;] as $v){&lt;br/&gt;// &amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;$sql.=&amp;#39;(&amp;#39;.$bid.&amp;#39;,&amp;#39;.$v.&amp;#39;),&amp;#39;;&lt;br/&gt;// &amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;}&lt;br/&gt;// &amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;$sql=rtrim($sql,&amp;#39;,&amp;#39;);&lt;br/&gt;// &amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;M(&amp;#39;blog_attr&amp;#39;)-&amp;gt;query($sql);&lt;br/&gt;// &amp;nbsp;&amp;nbsp;&amp;nbsp;}$this-&amp;gt;success(&amp;#39;提交成功&amp;#39;,U(GROUP_NAME.&amp;#39;/Blog/index&amp;#39;));&lt;br/&gt;// &amp;nbsp;&amp;nbsp;}else {&lt;br/&gt;// &amp;nbsp;&amp;nbsp;&amp;nbsp;$this-&amp;gt;error(&amp;#39;添加失败&amp;#39;);&lt;br/&gt;// &amp;nbsp;&amp;nbsp;}&lt;/p&gt;&lt;p&gt;&amp;nbsp;&amp;nbsp;//think方法多维提交（自己编写的）&lt;br/&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;if($bid = M(&amp;#39;blog&amp;#39;) -&amp;gt; add($data) ){&lt;br/&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;if (isset($_POST[&amp;#39;aid&amp;#39;])){&lt;br/&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;$sql=array();&lt;br/&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;foreach ($_POST[&amp;#39;aid&amp;#39;] as $v){&lt;br/&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;$sql[]=array(&amp;#39;bid&amp;#39;=&amp;gt;$bid,&amp;#39;aid&amp;#39;=&amp;gt;$v);&lt;br/&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;}&lt;br/&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;M(&amp;#39;blog_attr&amp;#39;)-&amp;gt;addAll($sql);&lt;br/&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;}$this-&amp;gt;success(&amp;#39;提交成功&amp;#39;,U(GROUP_NAME.&amp;#39;/Blog/index&amp;#39;));&lt;br/&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;}else {&lt;br/&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;$this-&amp;gt;error(&amp;#39;添加失败&amp;#39;);&lt;br/&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;}&lt;br/&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;br/&gt;&amp;nbsp;}&lt;br/&gt;&amp;nbsp;&lt;/p&gt;&lt;p&gt;}&lt;/p&gt;&lt;p&gt;&lt;br/&gt;?&amp;gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;',NULL,'1417077977','100','11','0'), ('18','12341','&lt;p&gt;1324123412342314&lt;/p&gt;','2134','1417078119','100','11','0');
INSERT INTO `hd_blog_attr` VALUES ('14','1'), ('14','2'), ('15','1'), ('15','2'), ('16','1'), ('16','2'), ('16','3'), ('17','1'), ('17','2'), ('18','2');
INSERT INTO `hd_cate` VALUES ('1','HTML','0','1'), ('2','DIV+CSS','0','2'), ('3','JavaScript','0','3'), ('4','PHP','0','4'), ('5','MySQL','0','5'), ('6','Linux','0','6'), ('7','其他','0','7'), ('8','JQuery','3','1'), ('9','Ajax','3','2'), ('10','字符串','4','1'), ('11','数组','4','2'), ('12','对象','4','3'), ('13','存储引擎','5','4'), ('14','事务','5','2'), ('15','视图','5','3'), ('16','存储引擎','5','1'), ('17','基本命令','6','1'), ('18','网络配置','6','2');
INSERT INTO `hd_links` VALUES ('1','Edward2','http://www.weiyd.cn','1416995618'), ('2','weiyd3','http://www.weiyd.cn3','1416995628');
INSERT INTO `hd_user` VALUES ('1','admin','21232f297a57a5a743894a0e4a801fc3','1417074414','127.0.0.1');
