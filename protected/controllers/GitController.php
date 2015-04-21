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

    public function __construct()
    {
        $this->client = new \Github\Client();
    }

    public function actionIndex()
    {
        $a['b'] = 'ffff';
        $this->render('git/index', $a);
    }

    public function actionSearch($page)
    {
        echo '<pre>';
        print_r($this->search_repo('yii', $page));
        echo '</pre>';
    }

    public function actionUser($page)
    {
        echo '<pre>';
        print_r($this->user_info());
        echo '</pre>';
    }

    private function search_repo($query, $page)
    {
        return $this->client->api('search')->repositories($query, 'updated', 'desc', $page);
    }

    private function repo_details($login, $repo_name)
    {
        return $this->client->api('repo')->show($login, $repo_name);
    }

    private function get_contr($login, $repo_name)
    {
        return $this->client->api('repo')->contributors($login, $repo_name);
    }

    private function user_info($login)
    {
        return $this->client->api('user')->show($login);
    }

}