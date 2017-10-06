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
