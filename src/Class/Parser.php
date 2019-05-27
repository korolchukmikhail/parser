<?php


namespace Parser;


use Parser\Content\Text;

class Parser
{
    const ONLY_CONTENT = true;
    const NOT_CONTENT_TAGS = "head,script,style,link,meta";

    public function parse($url)
    {
        $html = $this->getHtml($url);
        $html = $this->separate($html);

        return $html;

    }

    public function separate($html)
    {
        libxml_use_internal_errors(false);
        $html = preg_replace('~<(?:!DOCTYPE|/?(?:html|body))[^>]*>\s*~i', '', $html);
        $doc = new \DOMDocument();
        $doc->preserveWhiteSpace = false;

        @$doc->loadHTML($html, LIBXML_HTML_NODEFDTD);

        if (!self::ONLY_CONTENT) {
            return $doc;
        }

        $xpath = new \DOMXPath($doc);

        $restrictTags = explode(',', self::NOT_CONTENT_TAGS);

        foreach ($restrictTags as $restrictTag) {
            foreach ($xpath->query('//' . $restrictTag) as $tag) {
                $tag->parentNode->removeChild($tag);
            }
        }

        foreach ($xpath->query('//comment()') as $comment) {
            $comment->parentNode->removeChild($comment);
        }

        include "Content/Text.php";

        $text = new Text();

        $nodes = $text->get($doc);

        libxml_use_internal_errors(true);

        return $doc;
    }

    public function getHtml($url)
    {
        $html = '';

        $html = file_get_contents($url);

        return $html;
    }

}