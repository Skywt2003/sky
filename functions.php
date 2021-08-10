<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

define('__TYPECHO_GRAVATAR_PREFIX__', 'https://cdn.v2ex.com/gravatar/');

function themeConfig($form) {
    echo $siteUrl;
    
    $logoUrl = new Typecho_Widget_Helper_Form_Element_Text('logoUrl', NULL, NULL, _t('站点 LOGO 地址'), _t('在这里填入一个图片 URL 地址, 以在网站标题前加上一个 LOGO'));
    $form->addInput($logoUrl);
    
    $icpInfo = new Typecho_Widget_Helper_Form_Element_Text('icpInfo', NULL, NULL, _t('ICP 备案号'), _t('显示在底部，留空则不显示'));
    $form->addInput($icpInfo->addRule('xssCheck', _t('请不要使用特殊字符')));

    $nisInfo = new Typecho_Widget_Helper_Form_Element_Text('nisInfo', NULL, NULL, _t('网安备案号'), _t('显示在底部，留空则不显示'));
    $form->addInput($nisInfo->addRule('xssCheck', _t('请不要使用特殊字符')));

    $notification = new Typecho_Widget_Helper_Form_Element_Text('notification', NULL, NULL, _t('网站公告'), _t('显示在首页，留空则不显示'));
    $form->addInput($notification);

    $bottomLinks = new Typecho_Widget_Helper_Form_Element_Text('bottomLinks', NULL, NULL, _t('底部链接'), _t('（需要配合<a href="http://www.imhan.com/archives/typecho-links/" target="_blank">友情链接插件</a>使用）网站底部的链接分类名称'));
    $form->addInput($bottomLinks);

    $oldPosts = new Typecho_Widget_Helper_Form_Element_Radio('oldPosts',
        array('able' => _t('启用'),
              'disable' => _t('禁用'),
        ),
        'disable', _t('是否显示旧文提示'), _t('启用则会在一年前发布的文章页面显示“这是一篇旧文”'));
    $form->addInput($oldPosts);
}

function themeFields($layout) {
    $headPic = new Typecho_Widget_Helper_Form_Element_Text('headPic', NULL, NULL, _t('文章头图地址'), _t('在这里填入一个图片 URL 地址, 就可以让文章加上头图。'));
    $layout->addItem($headPic);
    
    $pageIcon = new Typecho_Widget_Helper_Form_Element_Text('pageIcon', NULL, NULL, _t('页面 icon'), _t('在这里为页面填入一个 fontawesome icon 代码，在菜单栏链接前会显示 icon。为页面填入一个 fontawesome icon 代码，在菜单栏链接前会显示 icon。对文章无效。Fontawesome 是 5.15 版本，参见：https://fontawesome.com/v5.15/icons'));
    $layout->addItem($pageIcon);

    $linkTo = new Typecho_Widget_Helper_Form_Element_Text('linkTo', NULL, NULL, _t('重定向至'), _t('在这里输入一个 URL，打开页面时会自动重定向到这个 URL，用于定制菜单栏。对文章无效'));
    $layout->addItem($linkTo);
}


// 来自插件 https://github.com/elatisy/Typecho_WordsCounter
function allOfCharacters() {
    $chars = 0;
    $db = Typecho_Db::get();
    $select = $db ->select('text')
                  ->from('table.contents')
                  ->where('table.contents.status = ?','publish');

    $rows = $db->fetchAll($select);
    foreach ($rows as $row){
        $chars += mb_strlen($row['text'], 'UTF-8');
    }

    $unit = '';
    if($chars >= 10000) {
        $chars /= 10000;
        $unit = 'W';
    } else if($chars >= 1000) {
        $chars /= 1000;
        $unit = 'K';
    }

    $out = sprintf('%.2lf%s',$chars, $unit);

    echo $out;
}