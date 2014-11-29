<?php if (!defined('THINK_PATH')) exit();?><?xml version='1.0' encoding='' ?>
<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Strict//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>

<head>
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
    <link rel="stylesheet" href="__PUBLIC__/Css/public.css" />
    <title>Insert title here</title>
</head>

<body>
    <table class="table">
        <tr>
            <th>ID</th>
            <th>标题</th>
            <th>所属分类</th>
            <th>点击次数</th>
            <th>发布时间</th>
            <th>操作</th>
        </tr>


        <?php if(is_array($blog)): foreach($blog as $key=>$v): ?><tr>
                <td width='8%'><?php echo ($v["id"]); ?></td>
                <td><?php echo ($v["title"]); ?>
                    <?php if(is_array($v["attr"])): foreach($v["attr"] as $key=>$value): ?><strong style="color:<?php echo ($value["color"]); ?>">[<?php echo ($value["name"]); ?>]</strong><?php endforeach; endif; ?>
                </td>
                <td><?php echo ($v["cate"]); ?></td>
                <td width='12%'><?php echo ($v["click"]); ?></td>
                <td width='12%'><?php echo (date('Y-m-d h:i:s',$v["time"])); ?></td>

                <?php if(ACTION_NAME == "index"): ?><td width='20%'>[<a href="">修改</a>] [
                        <a href="<?php echo U(GROUP_NAME.'/Blog/toTrach',array('id'=>$v['id'],'type'=>1));?>">删除</a>]
                    </td>
                    <?php else: ?>
                    <td width='20%'>[<a href="<?php echo U(GROUP_NAME.'/Blog/trach',array('id'=>$v['id'],'type'=>0));?>">还原</a>]
                    [<a href="<?php echo U(GROUP_NAME.'/Blog/delete',array('id'=>$v['id']));?>">彻底删除</a>]</td><?php endif; ?>
            </tr><?php endforeach; endif; ?>
                        <?php if(ACTION_NAME == "trach"): ?><tr>
                         <td colspan="6" align="center">
                           [ <a href="<?php echo U(GROUP_NAME.'/Blog/deleteAll');?>">全部删除</a>]
                        </td>
                    </tr><?php endif; ?>
    </table>
</body>

</html>