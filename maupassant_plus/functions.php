<?php

function themeConfig($form) {

    $sidebarBlock = new Typecho_Widget_Helper_Form_Element_Checkbox('sidebarBlock', 
    array('ShowRecentPosts' => _t('显示最新文章'),
    'ShowRecentComments' => _t('显示最近回复'),
    'ShowCategory' => _t('显示分类'),
    'ShowArchive' => _t('显示归档'),
    'ShowOther' => _t('显示其它杂项')),
    array('ShowRecentPosts', 'ShowRecentComments', 'ShowCategory', 'ShowArchive', 'ShowOther'), _t('侧边栏显示'));
    //社交链接
	$socialvimeo = new Typecho_Widget_Helper_Form_Element_Text('socialvimeo', NULL, NULL, _t('输入Vimeo链接'), _t('在这里输入vimeo链接,带http://'));
	$form->addInput($socialvimeo);
	$socialgithub = new Typecho_Widget_Helper_Form_Element_Text('socialgithub', NULL, NULL, _t('输入GitHub链接'), _t('在这里输入GitHub链接,带http://'));
	$form->addInput($socialgithub);
	$socialflickr = new Typecho_Widget_Helper_Form_Element_Text('socialflickr', NULL, NULL, _t('输入Flickr链接'), _t('在这里输入Flickr链接,带http://'));
	$form->addInput($socialflickr);
	$sociallinkedin = new Typecho_Widget_Helper_Form_Element_Text('sociallinkedin', NULL, NULL, _t('输入Linkedin 链接'), _t('在这里输入Linkedin 链接,带http://'));
	$form->addInput($sociallinkedin);

    $form->addInput($sidebarBlock->multiMode());
}

//时间转换输出
function timesince($older_date,$comment_date = false) {
$chunks = array(
array(86400 , 'Day'),
array(3600 , 'Hour'),
array(60 , 'Minute'),
array(1 , 'Second'),
);
$newer_date = time();
$since = abs($newer_date - $older_date);

for ($i = 0, $j = count($chunks); $i < $j; $i++){
$seconds = $chunks[$i][0];
$name = $chunks[$i][1];
if (($count = floor($since / $seconds)) != 0) break;
}
if ($count == 1) {
$output = $count.' '.$name.' '.'ago';
}
else {$output = $count.' '.$name.'s'.' '.'ago'; }
return $output;
}

//获取评论的锚点链接
function get_comment_at($coid)
{
    $db   = Typecho_Db::get();
    $prow = $db->fetchRow($db->select('parent')->from('table.comments')
                                 ->where('coid = ? AND status = ?', $coid, 'approved'));
    $parent = $prow['parent'];
    if ($parent != "0") {
        $arow = $db->fetchRow($db->select('author')->from('table.comments')
                                     ->where('coid = ? AND status = ?', $parent, 'approved'));
        $author = $arow['author'];
        $href   = '<a href="#comment-' . $parent . '">@' . $author . '</a>';
        echo $href;
    } else {
        echo '';
    }
}
//输出评论内容
function get_filtered_comment($coid){
    $db   = Typecho_Db::get();
    $rs=$db->fetchRow($db->select('text')->from('table.comments')
                                 ->where('coid = ? AND status = ?', $coid, 'approved'));
    $content=$rs['text'];
    echo $content;
}
?>