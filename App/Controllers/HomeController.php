<?php

namespace App\Controllers;
use App\Model;

/**
 * Class HomeController
 *
 * @package \App\Controllers
 */
class HomeController extends Controller
{
    public function __construct(array $views)
    {
        parent::__construct($this->getHomePageData(), $views);
    }
    private function getHomePageData()
    {
        $data = ['data' => 'testData'];
        return $data;
    }
}
