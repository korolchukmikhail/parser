<?php


namespace Parser\Content;

use DOMDocument, DOMXPath;

class Image implements IContent
{
    public $xpath;

    public $src;
    public $name;

    /**
     * @param DOMDocument $html
     * @return iterable
     */
    public function get(DOMDocument $html): iterable
    {
        $xpath = new DOMXPath($html);
        $images = [];

        foreach ($xpath->query('//img') as $image) {
            $images[] = $image;
        }

        return $images;
    }

}