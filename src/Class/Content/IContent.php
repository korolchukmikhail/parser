<?php


namespace Parser\Content;

use DOMDocument;


interface IContent
{
    /**
     * @param DOMDocument $html
     * @return IContent[]
     */
    public function get(DOMDocument $html): iterable;
}