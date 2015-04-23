<?
$this->breadcrumbs = array(
    'Search'
);
?>
<div class="container">
    <div class="git-wrap">
        <h4 class="git-search-query">For search term "<?= $query; ?>" found:</h4>
        <? foreach($result['items'] as $item): ?>
        <div class="item-wrap">
            <p class="row-1">
                <span>
                    <a href="/git/index/<?= $item['full_name']; ?>"><?= $item['name']; ?></a>
                </span>
                <span>
                    <a href="<?= $item['homepage']; ?>"><?= $item['homepage']; ?></a>
                </span>
                <span>
                    <a href="/git/user/<?= $item['owner']['login']; ?>"><?= $item['owner']['login']; ?></a>
                </span>
            </p>
            <p class="row-2"><?= $item['description']; ?></p>
            <p class="row-3">
                <span>Watchers: <?= $item['watchers']; ?></span>
                <span>Forks: <?= $item['forks']; ?></span>
                <? if(empty($item['model'])): ?>
                    <button class="prj btn pull-right git-btn" id="<?= $item['owner']['login'].'_'.$item['name'];?>">Like</button>
                <? else: ?>
                    <button class="prj btn pull-right git-btn" id="<?= $item['owner']['login'].'_'.$item['name'];?>">Unlike</button>
                <? endif; ?>
            </p>
        </div>
        <? endforeach; ?>
        <div class="pagination">
        <?php $this->widget('CLinkPager', array(
            'pages' => $pages,
            'header' => '',
            'selectedPageCssClass' => 'active',
            'hiddenPageCssClass' => 'disabled',
            'htmlOptions' => array(
                'class' => 'link-page',
            ),
        )) ?>
        </div>
    </div>
</div>