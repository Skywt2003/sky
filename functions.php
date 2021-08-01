<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

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
    
    $travelling = new Typecho_Widget_Helper_Form_Element_Radio('travelling',
        array('able' => _t('启用'),
            'disable' => _t('禁止'),
        ),
        'disable', _t('是否开启 Travelling 友链接力'), _t('默认禁止，启用则显示 travelling，可见 https://github.com/volfclub/travellings'));
    $form->addInput($travelling);
}

function themeFields($layout) {
    $headPic = new Typecho_Widget_Helper_Form_Element_Text('headPic', NULL, NULL, _t('文章头图地址'), _t('在这里填入一个图片 URL 地址, 就可以让文章加上头图'));
    $layout->addItem($headPic);
    
    $pageIcon = new Typecho_Widget_Helper_Form_Element_Text('pageIcon', NULL, NULL, _t('页面 icon'), _t('在这里为页面填入一个 icon 代码，在菜单栏链接前会显示 icon'));
    $layout->addItem($pageIcon);
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