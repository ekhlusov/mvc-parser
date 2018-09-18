<?php

namespace App\Services;

class ParseService
{
    public $url;
    public $tag;
    public $selector;

    /**
     * ParseService constructor.
     *
     * @param $url
     * @param $tag
     * @param $selector
     */
    public function __construct($url, $tag, $selector)
    {
        $this->url = $url;
        $this->tag = $tag;
        $this->selector = $selector;
    }

    /**
     * Получение HTML
     * @return string
     */
    public function getHTML()
    {
        return trim(file_get_contents($this->url));
    }

    /**
     * Парсер параметров из HTML
     * @return array|bool
     */
    public function parseHTML()
    {
        $doc = new \DOMDocument();
        libxml_use_internal_errors(true);
        $doc->loadHTML($this->getHTML());

        $xpath = new \DOMXPath($doc);

        $selector = '//';
        if ($this->tag || $this->tag === '') {
            $selector .= $this->tag;
        }
        if ($this->selector || $this->selector === '') {
            if (strpos($this->selector, '#')) {
                $selector .= "[@id='{$this->selector}']";
            } else {
                $selector .= "[@class='{$this->selector}']";
            }
        }

        if ($selector === '//') {
            return false;
        }

        $prices = $xpath->query($selector);

        $newPrices = [];
        foreach ($prices as $price) {
            $newPrices[] = clean($price->textContent);
        }

        return $newPrices;
    }
}
