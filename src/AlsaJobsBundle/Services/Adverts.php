<?php

namespace AlsaJobsBundle\Services;


use AlsaJobsBundle\Entity\JobAdvert;
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

    
    public function getData()
    {
        $rss = new Rss();
        $items = $rss->feed($this->url);
        return $items->articles;
    }
}