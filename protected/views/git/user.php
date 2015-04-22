<?
$this->breadcrumbs=array(
    'User'
);
?>
<div class="container">
    <div class="git-wrap">
        <div class="git-img-wrap pull-left">
            <div class="git-img">
                <img src="<?= $user['avatar_url']; ?>" alt="">
            </div>
            <div class="like-user">
                <? if(empty($user['model'])): ?>
                <button type="button" class="usr btn git-btn" id="<?= $user['login']; ?>">Like</button>
                <? else: ?>
                <button type="button" class="usr btn git-btn" id="<?= $user['login']; ?>">Unlike</button>
                <? endif; ?>
            </div>
        </div>
        <div class="git-user-info pull-left">
            <h4><?= $user['name']; ?></h4>
            <p>Nickname: <?= $user['login']; ?></p>
            <p>Company: <?= $user['company']; ?></p>
            <p>Blog: <a href="<?= $user['blog']; ?>" target="_blank"><?= $user['blog']; ?></a></p>
            <p>Followers: <?= $user['followers']; ?></p>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

