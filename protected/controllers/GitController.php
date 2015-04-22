<?php

/**
 * Created by PhpStorm.
 * User: fsoul
 * Date: 19.04.2015
 * Time: 15:26
 */
class GitController extends Controller
{
    private $client;
    public $breadcrumbs = array();

    public function __construct()
    {
        $this->client = new \Github\Client();
        $this->client->authenticate('67a986bee9245844c299c317ee64f046beec7eb8', \Github\Client::AUTH_HTTP_TOKEN);
    }

    public function actionIndex($username = 'yiisoft', $repository = 'yii')
    {
        $data['item'] = $this->client->api('repo')->show($username, $repository);
        $data['item']['contributors'] = $this->client->api('repo')->contributors($username, $repository);
        foreach ($data['item']['contributors'] as $k => $person) {
            $model = Users_likes::model()->find('user_login=:user_login', array(':user_login' => $person['login']));
            $data['item']['contributors'][$k]['model'] = $model;
        }

        $this->render('git/index', $data);
    }

    public function actionSearch($page = null, $per_page = 10)
    {
        $data['query'] = $_POST['search-query'];
        if (!empty($data['query'])) {
            $data['result'] = $this->client->api('search')->repositories($data['query'], 'stars', 'desc', $page, $per_page);
            foreach ($data['result']['items'] as $k => $item) {
                $model = Project_likes::model()->find('project_name=:project_name', array(':project_name' => $item['owner']['login'] . '_' . $item['name']));
                $data['result']['items'][$k]['model'] = $model;
            }
            $this->render('git/search', $data);
        } else {
            $this->redirect('/');
        }
    }

    public function actionUser($login)
    {
        $data['user'] = $this->client->api('user')->show($login);
        $data['user']['model'] = Users_likes::model()->find('user_login=:user_login', array(':user_login' => $login));
        $this->render('git/user', $data);
    }

    public function actionLikeBtn()
    {
        if ($_REQUEST['model'] == 'user') {
            if ($_REQUEST['type'] == 'Like') {
                $model = new Users_likes();
                $model->user_login = $_REQUEST['id'];
                $model->save();
            } elseif ($_REQUEST['type'] == 'Unlike') {
                $model = Users_likes::model()->find('user_login=:user_login', array(':user_login' => $_REQUEST['id']));
                $model->delete();
            }
        } elseif ($_REQUEST['model'] == 'project') {
            if ($_REQUEST['type'] == 'Like') {
                $model = new Project_likes();
                $model->project_name = $_REQUEST['id'];
                $model->save();
            } elseif ($_REQUEST['type'] == 'Unlike') {
                $model = Project_likes::model()->find('project_name=:project_name', array(':project_name' => $_REQUEST['id']));
                $model->delete();
            }
        }
    }
}