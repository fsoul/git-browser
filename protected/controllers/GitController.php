<?php

/**
 * Created by PhpStorm.
 * User: fsoul
 * Date: 19.04.2015
 * Time: 15:26
 */
class GitController extends Controller
{
    public $breadcrumbs = array();
    
    public function actionIndex($username = 'yiisoft', $repository = 'yii')
    {
        $client = new \Github\Client();
        $data['item'] = $client->api('repo')->show($username, $repository);
        $data['item']['contributors'] = $client->api('repo')->contributors($username, $repository);
        foreach ($data['item']['contributors'] as $k => $person) {
            $model = Users_likes::model()->find('user_login=:user_login', array(':user_login' => $person['login']));
            $data['item']['contributors'][$k]['model'] = $model;
        }

        $this->render('index', $data);
    }

    public function actionSearch()
    {
        $client = new \Github\Client();
        $page = $_GET['page'] || 1;
        $data['query'] = $_GET['q'];
        if (!empty($data['query'])) {
            $data['result'] = $client->api('search')->repositories($data['query'], 'stars', 'desc', $page);
            foreach ($data['result']['items'] as $k => $item) {
                $model = Project_likes::model()->find('project_name=:project_name', array(':project_name' => $item['owner']['login'] . '_' . $item['name']));
                $data['result']['items'][$k]['model'] = $model;
            }
            $data['pages'] = new CPagination($data['result']['total_count']);
            $data['pages']->pageSize = 10;

            $this->render('search', $data);
        } else {
            $this->redirect('/');
        }
    }

    public function actionUser($login)
    {
        $client = new \Github\Client();
        $data['user'] = $client->api('user')->show($login);
        $data['user']['model'] = Users_likes::model()->find('user_login=:user_login', array(':user_login' => $login));

        $this->render('user', $data);
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