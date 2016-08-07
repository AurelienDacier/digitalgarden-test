<?php

namespace AlsaJobsBundle\Services;

use AlsaJobsBundle\Entity\JobAdvert;
use Vinelab\Rss\ArticlesCollection;
use Vinelab\Rss\Rss;

class Adverts
{
    /**
     * @var string
     */
    private $url;

    /**
     * Adverts constructor.
     * @param string $url
     */
    public function __construct($url)
    {
        $this->url = $url;
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        try {
            $rss = new Rss();
            $items = $rss->feed($this->url);
            return $items->articles;
        } catch (\Exception $e) {
            return new ArticlesCollection();
        }
    }
}