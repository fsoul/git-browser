<div class="container">
    <div class="git-wrap">
            <div class="git-info">
            <h1><?= $item['full_name']; ?></h1>
            <table class="table table-striped git-info-table">
                <tbody>
                <tr>
                    <td>
                        <span class="grey-text">Description:</span>
                        <?= $item['description']; ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <span class="grey-text">Watchers:</span>
                        <?= $item['watchers']; ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <span class="grey-text">Forks:</span>
                        <?= $item['forks']; ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <span class="grey-text">Open issues:</span>
                        <?= $item['open_issues']; ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <span class="grey-text">Homepage:</span>
                        <a href="<?= $item['homepage']; ?>" target="_blank"><?= $item['homepage']; ?></a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <span class="grey-text">GitHub repo:</span>
                        <a href="<?= $item['html_url']; ?>" target="_blank"><?= $item['html_url']; ?></a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <span class="grey-text">Created at:</span>
                        <?= preg_replace('/[^\0-9\-:]/', ' ', $item['created_at']); ?>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="git-users">
            <h3>Contributors:</h3>
            <table class="table git-users-table">
                <tbody>
                <? foreach($item['contributors'] as $person): ?>
                <tr>
                    <td>
                        <a href="/git/user/<?= $person['login']; ?>"><?= $person['login']; ?></a>
                    </td>
                    <td>
                        <? if(empty($person['model'])): ?>
                            <button type="button" class="usr btn git-btn" id="<?= $person['login']; ?>">Like</button>
                        <? else: ?>
                            <button type="button" class="usr btn git-btn" id="<?= $person['login']; ?>">Unlike</button>
                        <? endif; ?>
                    </td>
                </tr>
                <? endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>