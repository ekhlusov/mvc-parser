<?php

namespace App\Controllers;

use App\Model;
use App\Services\ParseService;
use voku\helper\HtmlDomParser;

/**
 * Class HomeController
 *
 * @package \App\Controllers
 */
class HomeController extends Controller
{
    /**
     * HomeController constructor.
     *
     * @param array $views
     */
    public function __construct(array $views)
    {
        parent::__construct($this->getHomePageData(), $views);
    }

    /**
     * @return mixed
     */
    private function getHomePageData()
    {
        if (isset($_GET['url'])) {
            $service = new ParseService(
                $_GET['url'],
                isset($_GET['tag']) ? $_GET['tag'] : null,
                isset($_GET['selector']) ? $_GET['selector'] : null);
            $parsed = $service->parseHTML();

            //var_dump($parsed);

            return ['data' => $parsed];
        }

        return ['data' => null];
    }
}
