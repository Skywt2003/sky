<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

define('__TYPECHO_GRAVATAR_PREFIX__', 'https://gravatar.loli.net/avatar/');

function themeConfig($form) {
    echo '<h2>Sky 主题设置</h2>';

    $logoUrl = new Typecho_Widget_Helper_Form_Element_Text('logoUrl', NULL, NULL, _t('站点 LOGO 地址'), _t('在这里填入一个图片 URL 地址, 以在网站标题前加上一个 LOGO'));
    $form->addInput($logoUrl);
    
    $icpInfo = new Typecho_Widget_Helper_Form_Element_Text('icpInfo', NULL, NULL, _t('ICP 备案号'), _t('显示在底部，留空则不显示'));
    $form->addInput($icpInfo->addRule('xssCheck', _t('请不要使用特殊字符')));

    $nisInfo = new Typecho_Widget_Helper_Form_Element_Text('nisInfo', NULL, NULL, _t('网安备案号'), _t('显示在底部，留空则不显示'));
    $form->addInput($nisInfo->addRule('xssCheck', _t('请不要使用特殊字符')));

    $notification = new Typecho_Widget_Helper_Form_Element_Text('notification', NULL, NULL, _t('网站公告'), _t('显示在首页，留空则不显示'));
    $form->addInput($notification);

    $notificationIcon = new Typecho_Widget_Helper_Form_Element_Text('notificationIcon', NULL, NULL, _t('网站公告图标'), _t('显示在首页网站公告信息框前的 FontAwesome 图标代码，留空则不显示'));
    $form->addInput($notificationIcon);

    $comments_noti = new Typecho_Widget_Helper_Form_Element_Text('comments_noti', NULL, NULL, _t('评论区公告'), _t('显示在评论区，留空则不显示'));
    $form->addInput($comments_noti);

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
    $headPic = new Typecho_Widget_Helper_Form_Element_Text('headPic', NULL, NULL, _t('文章头图地址'), _t('仅对文章有效。在这里填入一个图片 URL 地址, 就可以让文章加上头图。留空则不显示头图。'));
    $layout->addItem($headPic);

    $pubPlace = new Typecho_Widget_Helper_Form_Element_Text('pubPlace', NULL, NULL, _t('文章发布地点'), _t('仅对文章有效。在这里输入一个地点的名字，文章头部会显示。留空则不显示发布地点。'));
    $layout->addItem($pubPlace);

    $pageIcon = new Typecho_Widget_Helper_Form_Element_Text('pageIcon', NULL, NULL, _t('页面图标'), _t('仅对非隐藏页面有效。在这里为页面填入一个 fontawesome icon 代码，在菜单栏链接前会显示图标。Fontawesome 是 5.15 版本，参见 <a href="https://fontawesome.com/v5.15/icons" target="_blank">FontAwesome 图标库</a>。留空则不显示图标。'));
    $layout->addItem($pageIcon);

    $linkTo = new Typecho_Widget_Helper_Form_Element_Text('linkTo', NULL, NULL, _t('页面重定向至'), _t('仅对页面有效。在这里输入一个 URL，打开该页面时会自动重定向到这个 URL，用于定制菜单栏。留空则不重定向。'));
    $layout->addItem($linkTo);
}

function exContent($content){
    // 短代码提示框，期望用数组的办法一次性实现，但是正则表达式太难了
    // $alertIcons = array('primary' => 'fas fa-info-circle',
    //                     'success' => 'fas fa-info-circle',
    //                     'info' => 'fas fa-info-circle',
    //                     'warning' => 'fa-exclamation-circle',
    //                     'danger' => 'fas fa-skull-crossbones',
    //                     'default' => 'fas fa-info-circle',
    //                     'secondary' => 'fas fa-info-circle');

    $pattern = '/\[(primary)\](.*?)\[\s*\/\1\s*\]/';
    $replacement = '
    <div class="alert alert-primary fade show shadow" role="alert">
        <span class="alert-inner--icon"><i class="fas fa-info-circle"></i></span>
        <span class="alert-inner--text">$2</span>
    </div>';
    $content = preg_replace($pattern, $replacement, $content);

    $pattern = '/\[(default)\](.*?)\[\s*\/\1\s*\]/';
    $replacement = '
    <div class="alert alert-default fade show shadow" role="alert">
        <span class="alert-inner--icon"><i class="fas fa-info-circle"></i></span>
        <span class="alert-inner--text">$2</span>
    </div>';
    $content = preg_replace($pattern, $replacement, $content);

    $pattern = '/\[(secondary)\](.*?)\[\s*\/\1\s*\]/';
    $replacement = '
    <div class="alert alert-secondary fade show shadow" role="alert">
        <span class="alert-inner--icon text-default"><i class="fas fa-info-circle"></i></span>
        <span class="alert-inner--text text-default">$2</span>
    </div>';
    $content = preg_replace($pattern, $replacement, $content);

    $pattern = '/\[(success)\](.*?)\[\s*\/\1\s*\]/';
    $replacement = '
    <div class="alert alert-success fade show shadow" role="alert">
        <span class="alert-inner--icon"><i class="fas fa-info-circle"></i></span>
        <span class="alert-inner--text">$2</span>
    </div>';
    $content = preg_replace($pattern, $replacement, $content);

    $pattern = '/\[(info)\](.*?)\[\s*\/\1\s*\]/';
    $replacement = '
    <div class="alert alert-info fade show shadow" role="alert">
        <span class="alert-inner--icon"><i class="fas fa-info-circle"></i></span>
        <span class="alert-inner--text">$2</span>
    </div>';
    $content = preg_replace($pattern, $replacement, $content);

    $pattern = '/\[(warning)\](.*?)\[\s*\/\1\s*\]/';
    $replacement = '
    <div class="alert alert-warning fade show shadow" role="alert">
        <span class="alert-inner--icon"><i class="fas fa-exclamation-circle"></i></span>
        <span class="alert-inner--text">$2</span>
    </div>';
    $content = preg_replace($pattern, $replacement, $content);

    $pattern = '/\[(danger)\](.*?)\[\s*\/\1\s*\]/';
    $replacement = '
    <div class="alert alert-danger fade show shadow" role="alert">
        <span class="alert-inner--icon"><i class="fas fa-skull-crossbones"></i></span>
        <span class="alert-inner--text">$2</span>
    </div>';
    $content = preg_replace($pattern, $replacement, $content);

    // $pattern = '/\[(alert-(.*?))\](.*?)\[\s*\/\1\s*\]/';
    // $replacement = '
    // <div class="alert alert-$2 fade show shadow" role="alert">
    //     <span class="alert-inner--icon"><i class="$alertIcons[$2]"></i></span>
    //     <span class="alert-inner--text">$3</span>
    // </div>';
    // $content = preg_replace($pattern, $replacement, $content);

    // 正则表达式也太难了 。・゜・(ノД`)・゜・。
    // $pattern = '/\[link (.*)\](.*)\[link\]/';
    // $replacement = '
    // <a class="btn btn-secondary" role="button" href="$1" target="_blank">$2</a>';
    // $content = preg_replace($pattern, $replacement, $content);

    // 文章 TOC 功能
    // [0]: 完整的匹配 <h2>conTent</h2>
    // [1]: 匹配中的数字 2
    // [2]: 匹配中的内容 conTent
    if (preg_match_all('/<h(\d)>(.*)<\/h\d>/isU', $content, $outarr)){
        $toc_out = "";
        $minlevel = 6;
        for ($key=0; $key<count($outarr[2]); $key++) $minlevel = min($minlevel, $outarr[1][$key]);

        $curlevel = $minlevel-1;
        for ($key=0; $key<count($outarr[2]); $key++) {
            $ta = $content;
            $tb = strpos($ta, $outarr[0][$key]);
            $level = $outarr[1][$key];
            // $content = substr($ta, 0, $tb). "<h{$level} id=\"toc_title{$key}\">{$outarr[2][$key]}</h{$level}>". substr($ta, strlen($outarr[0][$key])+$tb);
            $content = substr($ta, 0, $tb). "<a id=\"toc_title{$key}\" style=\"position:relative; top:-50px\"></a>". substr($ta, $tb);
            // 用伪锚点实现链接偏移。Safari 居然不支持！！
            if ($level > $curlevel) $toc_out.=str_repeat("<ol>\n", $level-$curlevel);
            elseif ($level < $curlevel) $toc_out.=str_repeat("</ol>\n", $curlevel-$level);
            $curlevel = $level;
            $toc_out .= "<li><a href=\"#toc_title{$key}\">{$outarr[2][$key]}</a></li>\n";
        }
        
        $content = "<div id=\"tableOfContents\">{$toc_out}</div>". $content;
    }

    return $content;
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