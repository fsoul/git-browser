<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/styles.css" />

    <link href="/images/git-browser.ico" rel="shortcut icon" type="image/x-icon" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>

	<?php Yii::app()->bootstrap->register(); ?>
</head>
<script>
    $( document ).ready(function() {
        $('.git-wrap .git-btn').click(function(e){
            e.preventDefault();
            var type = $(this).text();
            console.log(type);
            var action;
            type == 'Like' ? action = 'Unlike' : action = 'Like';
            var id = $(this).attr('id');
            var model;
            $(this).hasClass('usr') ? model = 'user' : model = 'project';

            $.ajax({
                url: '/git/likeBtn',
                method: 'POST',
                data: {"type" : type, "id" : id, "model" : model},
                complete: function () {
                    $('#'+id).text(action);
                }
            });
        });
    });
</script>
<body>
<div class="container" id="page">
    <div class="layout-top">
        <a href="/" class="brand-link">
            <?= Yii::app()->name; ?>
        </a>
        <form class="git-search form-search pull-right" method="post" action="/git/search">
            <input name="search-query" type="text" class="input-medium search-query" placeholder="Search">
            <button type="submit" class="btn git-btn">Search</button>
        </form>
    </div>

    <?php if(isset($this->breadcrumbs)):?>
        <?php
        $this->widget('zii.widgets.CBreadcrumbs', array(
            'links'=>$this->breadcrumbs,
            'homeLink'=>'<li>'.CHtml::link('Main', '/')
                .' <span class="divider">/</span></li>',
            'tagName'=>'ol',
            'separator'=>'',
            'activeLinkTemplate'=>'<li><a href="{url}">{label}</a> <span class="divider"></span></li>',
            'inactiveLinkTemplate'=>'<li><span>{label}</span></li>',
            'htmlOptions'=>array ('class'=>'breadcrumb')
        ));
        ?><!-- breadcrumbs -->
    <?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

</div><!-- page -->
<div id="footer">
    <div>
        <p>Test Task For MobiDev</p>
        <p>My Email: <a href="mailto:<?php echo Yii::app()->params['adminEmail']; ?>"><?php echo Yii::app()->params['adminEmail']; ?></a></p>
        <p>My Skype: <a href="skype:v.bilinskyi?call">v.bilinskyi</a></p>
        <p>My Resume: <a href="/images/resume.pdf" target="_blank">PDF</a></p>
    </div>
</div><!-- footer -->
</body>
</html>
