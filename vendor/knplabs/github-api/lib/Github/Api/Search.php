<?php

namespace Github\Api;

use Github\Api\Issue\Comments;
use Github\Api\Issue\Events;
use Github\Api\Issue\Labels;
use Github\Api\Issue\Milestones;
use Github\Exception\MissingArgumentException;

/**
 * Implement the Search API.
 *
 * @link   https://developer.github.com/v3/search/
 * @author Greg Payne <greg.payne@gmail.com>
 */
class Search extends AbstractApi
{

    /**
     * Search repositories by filter (q).
     *
     * @link https://developer.github.com/v3/search/#search-repositories
     *
     * @param string $q the filter
     * @param string $sort the sort field
     * @param string $order asc/desc
     * @param int $page
     * @return array list of repositories found
     */
    public function repositories($q, $sort = 'stars', $order = 'desc', $page = 1, $per_page = 10)
    {
        return $this->get('search/repositories', array('q' => $q, 'sort' => $sort, 'order' => $order, 'page' => $page, 'per_page' => $per_page));
    }

    /**
     * Search issues by filter (q).
     *
     * @link https://developer.github.com/v3/search/#search-issues
     *
     * @param string $q     the filter
     * @param string $sort  the sort field
     * @param string $order asc/desc
     *
     * @return array list of issues found
     */
    public function issues($q, $sort = 'updated', $order = 'desc')
    {
        return $this->get('search/issues', array('q' => $q, 'sort' => $sort, 'order' => $order));
    }

    /**
     * Search code by filter (q).
     *
     * @link https://developer.github.com/v3/search/#search-code
     *
     * @param string $q     the filter
     * @param string $sort  the sort field
     * @param string $order asc/desc
     *
     * @return array list of code found
     */
    public function code($q, $sort = 'updated', $order = 'desc')
    {
        return $this->get('search/code', array('q' => $q, 'sort' => $sort, 'order' => $order));
    }

    /**
     * Search users by filter (q).
     *
     * @link https://developer.github.com/v3/search/#search-users
     *
     * @param string $q     the filter
     * @param string $sort  the sort field
     * @param string $order asc/desc
     *
     * @return array list of users found
     */
    public function users($q, $sort = 'updated', $order = 'desc')
    {
        return $this->get('search/users', array('q' => $q, 'sort' => $sort, 'order' => $order));
    }
}
