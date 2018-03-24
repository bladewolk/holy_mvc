<?php

namespace application\Core;


class Paginator
{
    protected $per;
    protected $total;

    /**
     * Paginator constructor.
     * @param $per
     * @param $total
     */
    public function __construct($per, $total)
    {
        $this->per = $per;
        $this->total = $total;
    }

    /**
     * @return string
     */
    public function next()
    {
        $query = $_REQUEST;

        $currentUrl = $this->getCurrentUrl();
        $currentPage = $this->getCurrentPage();

        if ($currentPage < $this->total / $this->per) {
            $query['page'] = $currentPage + 1;
            return $currentUrl . '?' . http_build_query($query);
        }

        return '#';
    }

    /**
     * @return string
     */
    public function prev()
    {
        $query = $_REQUEST;
        $currentUrl = $this->getCurrentUrl();
        $currentPage = $this->getCurrentPage();

        if (+$currentPage > 2) {
            $query['page'] = $currentPage - 1;
            return $currentUrl . '?' . http_build_query($query);
        }

        if (+$currentPage === 2) {
            unset($query['page']);
            return $currentUrl . '?' . http_build_query($query);
        }

        return '#';
    }

    /**
     * @return string
     */
    public function getCurrentUrl()
    {
        preg_match('/^[^?]+/', $_SERVER['REQUEST_URI'], $uri);

        return $uri[0];
    }

    /**
     * @return int
     */
    public function getCurrentPage()
    {
        return isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
    }

    /**
     * @return float|int
     */
    public function total()
    {
        return $this->total / $this->per > 1;
    }
}