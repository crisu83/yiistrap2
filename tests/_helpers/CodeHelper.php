<?php
namespace Codeception\Module;

class CodeHelper extends \Codeception\Module
{
    /**
     * @param \Symfony\Component\DomCrawler\Crawler $node
     * @param string $text
     */
    public function seeNodeContainsText($node, $text)
    {
        $this->assertTrue(strpos($node->text(), $text) !== false);
    }

    /**
     * @param \Symfony\Component\DomCrawler\Crawler $node
     * @param $pattern $text
     */
    public function seeNodeContainsPattern($node, $pattern)
    {
        $this->assertEquals(1, preg_match($pattern, $node->html()));
    }

    /**
     * @param \Symfony\Component\DomCrawler\Crawler $node
     */
    public function seeNodeIsEmpty($node)
    {
        $this->assertEquals('', $node->text());
    }

    /**
     * @param \Symfony\Component\DomCrawler\Crawler $node
     * @param mixed $cssClass
     */
    public function seeNodeHasCssClass($node, $cssClass)
    {
        if (is_string($cssClass)) {
            $cssClass = explode(' ', $cssClass);
        }
        foreach ($cssClass as $className) {
            $this->assertTrue(in_array($className, explode(' ', $node->attr('class'))));
        }
    }

    /**
     * @param \Symfony\Component\DomCrawler\Crawler $node
     * @param mixed $cssClass
     */
    public function dontSeeNodeHasCssClass($node, $cssClass)
    {
        if (is_string($cssClass)) {
            $cssClass = explode(' ', $cssClass);
        }
        foreach ($cssClass as $className) {
            $this->assertFalse(in_array($className, explode(' ', $node->attr('class'))));
        }
    }

    /**
     * @param \Symfony\Component\DomCrawler\Crawler $node
     * @param string $cssStyle
     */
    public function seeNodeHasCssStyle($node, $cssStyle)
    {
        if (is_string($cssStyle)) {
            $cssStyle = explode(';', rtrim($cssStyle, ';'));
        }
        $cssStyle = $this->normalizeCssStyle($cssStyle);
        foreach ($cssStyle as $style) {
            $this->assertTrue(strpos($node->attr('style'), $style) !== false);
        }
    }

    /**
     * @param \Symfony\Component\DomCrawler\Crawler $node
     * @param string $cssStyle
     */
    public function dontSeeNodeHasCssStyle($node, $cssStyle)
    {
        if (is_string($cssStyle)) {
            $cssStyle = explode(';', rtrim($cssStyle, ';'));
        }
        $cssStyle = $this->normalizeCssStyle($cssStyle);
        foreach ($cssStyle as $style) {
            $this->assertFalse(strpos($node->attr('style'), $style));
        }
    }

    /**
     * @param array $cssStyle
     * @return array
     */
    protected function normalizeCssStyle(array $cssStyle)
    {
        array_walk(
            $cssStyle,
            function (&$value) {
                $value = trim($value);
            }
        );
        return $cssStyle;
    }

    /**
     * @param \Symfony\Component\DomCrawler\Crawler $node
     * @param string $name
     * @param string $value
     */
    public function seeNodeHasAttribute($node, $name, $value = null)
    {
        $attr = $node->attr($name);
        $this->assertTrue($attr !== null);
        if ($value !== null) {
            $this->assertEquals($value, $attr);
        }
    }

    /**
     * @param \Symfony\Component\DomCrawler\Crawler $node
     * @param array $attributes
     */
    public function seeNodeHasAttributes($node, array $attributes)
    {
        foreach ($attributes as $name => $value) {
            $this->seeNodeHasAttribute($node, $name, $value);
        }
    }

    /**
     * @param \Symfony\Component\DomCrawler\Crawler $node
     * @param array $elements
     */
    public function seeNodeHasChildren($node, array $elements)
    {
        /** @var \DomElement $child */
        foreach ($node->children() as $i => $child) {
            $this->assertTrue($this->nodeMatchesCssSelector($child, $elements[$i]));
        }
    }

    /**
     * @param \Symfony\Component\DomCrawler\Crawler $node
     * @param array $elements
     */
    public function dontSeeNodeHasChildren($node, array $elements)
    {
        /** @var \DomElement $child */
        foreach ($node->children() as $i => $child) {
            $this->assertFalse($this->nodeMatchesCssSelector($child, $elements[$i]));
        }
    }

    /**
     * @param \DomElement $node
     * @param string $selector
     * @return boolean
     */
    protected function nodeMatchesCssSelector($node, $selector)
    {
        if ($node->parentNode === null) {
            return false;
        }
        $crawler = $this->createNode($node->parentNode);
        return count($crawler->filter($selector)) > 0;
    }

    /**
     * @param mixed $content
     * @param string $selector
     * @return \Symfony\Component\DomCrawler\Crawler
     */
    public function createNode($content, $selector = null)
    {
        $crawler = new \Symfony\Component\DomCrawler\Crawler;
        $crawler->add($content);
        if ($selector !== null) {
            $node = $crawler->filter($selector);
            $this->assertNotEquals(null, $node);
            return $node;
        }
        return $crawler;
    }
}
