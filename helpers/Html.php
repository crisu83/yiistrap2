<?php
/*
 * This file is part of Yiistrap.
 *
 * (c) 2014 Christoffer Niska
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace yiistrap\helpers;

use yii\helpers\Html as BaseHtml;
use yiistrap\components\HtmlRenderer;
use yiistrap\enums\Alert;
use yiistrap\enums\Button;
use yiistrap\enums\Label;
use yiistrap\enums\Nav;

/**
 * @author Christoffer Niska <christoffer.niska@gmail.com>
 * @author Christoffer Lindqvist <christoffer.lindqvist@nordsoftware.com>
 * @since 2.0.0
 */
class Html extends BaseHtml
{
    /**
     * @param string $label
     * @param array $options
     * - tag: string
     * - type: string
     * - context: string
     * - size: string
     * - block: bool
     * - active: bool
     * - disabled: bool
     *
     * @return string
     */
    public static function btn($label, array $options = [])
    {
        if (ArrayHelper::popValue($options, 'active')) {
            static::addCssClass($options, 'active');
        } else if (ArrayHelper::popValue($options, 'disabled')) {
            $options['disabled'] = 'disabled';
        }

        static::addCssClass($options, 'btn');
        static::addCssClassWithSuffix(
            $options,
            'btn',
            ArrayHelper::popValue($options, 'context', Button::CONTEXT_DEFAULT)
        );
        static::addCssClassWithSuffix($options, 'btn', ArrayHelper::popValue($options, 'size'));
        static::addCssClassWithSuffix($options, 'btn', ArrayHelper::popValue($options, 'block') ? 'block' : '');

        $tag = ArrayHelper::popValue($options, 'tag', 'button');
        switch ($tag) {
            case 'button':
                ArrayHelper::defaultValue($options, 'type', 'button');
                break;
            case 'input':
                $options['value'] = $label;
                $label = '';
                break;
            default:
            case 'a':
                if (ArrayHelper::popValue($options, 'disabled')) {
                    static::addCssClass($options, 'disabled');
                }
        }

        return static::tag($tag, $label, $options);
    }

    /**
     * @param string $glyph
     * @param array $options
     *
     * @return string
     */
    public static function icon($glyph, array $options = [])
    {
        static::addCssClass($options, 'glyphicon glyphicon-' . $glyph);
        return static::tag(ArrayHelper::popValue($options, 'tag', 'span'), '', $options);
    }

    /**
     * @param string|array $content
     * @param array $options
     *
     * @return string
     */
    public static function dropdown($content, array $options = [])
    {
        if (is_array($content)) {
            $content = self::getRenderer()->parseContent(
                $content,
                [
                    'toggle' => [
                        'append' => [
                            'caret' => [
                                'tag' => 'span',
                                'options' => ['class' => 'caret'],
                            ]
                        ],
                        'formatter' => function ($content, $element) {
                            return static::dropdownToggle($element['content'], $element['options']);
                        },
                    ],
                    'menu' => [
                        'items' => [],
                        'formatter' => function ($content, $element) {
                            ArrayHelper::defaultValue($element, 'items', []);
                            return static::dropdownMenu($element['items'], $element['options']);
                        }
                    ]
                ]
            );

            static::addCssClass($content['menu']['options'], 'dropdown-menu');
            $content = self::getRenderer()->renderContent($content);
        }

        static::addCssClass($options, 'dropdown');
        return static::tag(ArrayHelper::popValue($options, 'tag', 'div'), $content, $options);
    }

    /**
     * @param $content
     * @param array $options
     *
     * @return string
     */
    public static function dropdownToggle($content, array $options = [])
    {
        $content .= ' <span class="caret"></span>';

        $options['data-toggle'] = 'dropdown';
        static::addCssClass($options, 'dropdown-toggle');
        return static::tag(ArrayHelper::popValue($options, 'tag', 'a'), $content, $options);
    }

    /**
     * @param array $items
     * @param array $options
     *
     * @return string
     */
    public static function nav(array $items, array $options = [])
    {
        $options['item'] = function($item, $index) {
            if (!isset($item['label'])) {
                // todo: throw exception ?
            }
            if (isset($item['items'])) {
                ArrayHelper::defaultValue($item, 'content', []);
                $item['content'] = self::getRenderer()->parseContent(
                    $item['content'],
                    [
                        'toggle' => [
                            'content' => $item['label'],
                        ],
                        'menu' => [
                            'items' => $item['items'],
                        ],
                    ]
                );

                ArrayHelper::defaultValue($item, 'options', []);
                $item['options']['tag'] = 'li';
                return static::dropdown($item['content'], $item['options']);
            } else {
                return static::menuItem($item, $index);
            }
        };

        static::addCssClass($options, 'nav');
        static::addCssClassWithSuffix($options, 'nav', ArrayHelper::popValue($options, 'type'));
        static::addCssClassWithSuffix($options, 'nav', ArrayHelper::popValue($options, 'justified') ? 'justified' : '');
        return static::ul($items, $options);
    }

    /**
     * @param array $items
     * @param array $options
     *
     * @return string
     */
    public static function tabs(array $items, array $options = [])
    {
        $options['type'] = Nav::TYPE_TABS;
        return static::nav($items, $options);
    }

    /**
     * @param array $items
     * @param array $options
     *
     * @return string
     */
    public static function pills(array $items, array $options = [])
    {
        $options['type'] = Nav::TYPE_PILLS;
        static::addCssClassWithSuffix($options, 'nav', ArrayHelper::popValue($options, 'stacked') ? 'stacked' : '');
        return static::nav($items, $options);
    }

    /**
     * @param array $items
     * @param array $options
     *
     * @return string
     */
    public static function dropdownMenu(array $items, array $options = [])
    {
        // todo: add support for the 'role' attribute.
        $options['item'] = array('static', 'menuItem');
        return static::ul($items, $options);
    }

    /**
     * @param array $options
     *
     * @return string
     */
    public static function menuDivider(array $options = [])
    {
        // todo: add support for the 'role' attribute.
        static::addCssClass($options, 'divider');
        return static::tag('li', '', $options);
    }

    /**
     * @param array $items
     * @param array $options
     *
     * @return string
     */
    public static function breadcrumbs(array $items, array $options = [])
    {
        $options['item'] = function ($item, $index) {
            if (is_string($item)) {
                $item = ['content' => $item];
            }

            $options = ArrayHelper::popValue($item, 'itemOptions', []);

            if (isset($item['url'])) {
                $item['content'] = static::a(
                    ArrayHelper::popValue($item, 'label'),
                    ArrayHelper::popValue($item, 'url'),
                    ArrayHelper::popValue($item, 'options', [])
                );
            }

            return static::tag('li', $item['content'], $options);
        };

        static::addCssClass($options, 'breadcrumbs');
        return static::ol($items, $options);
    }

    /**
     * @param array $items
     * @param array $options
     *
     * @return string
     */
    public static function pagination(array $items, array $options = [])
    {
        $options['item'] = function ($item, $index) {
            if (!isset($item['url'])) {
                $item['content'] = static::tag(
                    'span',
                    ArrayHelper::popValue($item, 'label'),
                    ArrayHelper::popValue($item, 'options', [])
                );
            }

            return static::menuItem($item, $index);
        };

        static::addCssClass($options, 'pagination');
        static::addCssClassWithSuffix($options, 'pagination', ArrayHelper::popValue($options, 'size'));
        return static::ul($items, $options);
    }

    /**
     * @param array $items
     * @param array $options
     *
     * @return string
     */
    public static function pager(array $items, array $options = [])
    {
        // todo: clean up this method (if possible).
        $options['item'] = function ($item, $index) {
            ArrayHelper::defaultValue($item, 'itemOptions', []);

            if (ArrayHelper::popValue($item, 'previous')) {
                static::addCssClass($item['itemOptions'], 'previous');
            } else if (ArrayHelper::popValue($item, 'next')) {
                static::addCssClass($item['itemOptions'], 'next');
            }

            return static::menuItem($item, $index);
        };

        static::addCssClass($options, 'pager');
        return static::ul($items, $options);
    }

    /**
     * @param string|array $item
     * @param int $index
     *
     * @return string
     */
    protected static function menuItem($item, $index)
    {
        if (is_string($item)) {
            return $item; // already rendered
        }

        $options = ArrayHelper::popValue($item, 'itemOptions', []);

        if (!ArrayHelper::popValue($item, 'visible', true)) {
            return '';
        }

        if (ArrayHelper::popValue($item, 'active')) {
            static::addCssClass($options, 'active');
        } else if (ArrayHelper::popValue($item, 'disabled')) {
            static::addCssClass($options, 'disabled');
        }

        if (isset($item['url'])) {
            $item['content'] = static::a(
                ArrayHelper::popValue($item, 'label'),
                ArrayHelper::popValue($item, 'url'),
                ArrayHelper::popValue($item, 'options', [])
            );
        }

        return static::tag('li', $item['content'], $options);
    }

    /**
     * @param string $content
     * @param array $options
     * - type: string
     *
     * @return string
     */
    public static function labelTb($content, array $options = [])
    {
        static::addCssClass($options, 'label');
        static::addCssClassWithSuffix(
            $options,
            'label',
            ArrayHelper::popValue($options, 'context', Label::CONTEXT_DEFAULT)
        );
        return static::tag(ArrayHelper::popValue($options, 'tag', 'span'), $content, $options);
    }

    /**
     * @param string $content
     * @param array $options
     *
     * @return string
     */
    public static function badge($content, array $options = [])
    {
        static::addCssClass($options, 'badge');
        return static::tag(ArrayHelper::popValue($options, 'tag', 'span'), $content, $options);
    }

    /**
     * @param string|array $content
     *
     * When passed an array:
     * - heading: string|array
     * - body: string|array
     *
     * @param array $options
     *
     * @return string
     */
    public static function jumbotron($content, array $options = [])
    {
        if (is_array($content)) {
            $content = self::getRenderer()->content(
                $content,
                [
                    'heading' => [
                        'tag' => 'h1',
                    ],
                    'body' => [
                        'tag' => 'p'
                    ],
                ]
            );
        }

        if (ArrayHelper::popValue($options, 'fullWidth', false)) {
            $content = static::tag('div', $content, ['class' => 'container']);
        }

        static::addCssClass($options, 'jumbotron');
        return static::tag(ArrayHelper::popValue($options, 'tag', 'div'), $content, $options);
    }

    /**
     * @param string|array $content
     *
     * When passed as array:
     * - heading: string|array
     * - subtext: string
     *
     * @param array $options
     *
     * @return string
     */
    public static function pageHeader($content, array $options = [])
    {
        if (is_array($content)) {
            $content = self::getRenderer()->content(
                $content,
                [
                    'heading' => [
                        'tag' => 'h1',
                        'append' => [
                            'subtext' => [
                                'tag' => 'small',
                            ],
                        ],
                    ],
                ]
            );
        }

        static::addCssClass($options, 'page-header');
        return static::tag(ArrayHelper::popValue($options, 'tag', 'div'), $content, $options);
    }

    /**
     * @param array $content
     * - url: string|array
     * - image: array
     *   - src: string|array
     * - caption: string|array
     * - label: string|array
     *
     * @param array $options
     *
     * @return string
     */
    public static function thumbnail($content, array $options = [])
    {
        $image = self::getRenderer()->element(
            'image',
            $content,
            [
                'src' => '',
                'formatter' => function ($content, $element) {
                        return static::img($element['src'], $element['options']);
                    },
                'allowEmpty' => true,
            ]
        );

        if (isset($content['url'])) {
            $options['href'] = static::url(ArrayHelper::popValue($content, 'url', '#'));
            $content = $image;
            $tagName = ArrayHelper::popValue($options, 'tag', 'a');
        } else {
            $caption = self::getRenderer()->parseElement(
                'caption',
                $content,
                [
                    'prepend' => [
                        'label' => [
                            'tag' => 'h3',
                        ]
                    ],
                ]
            );
            static::addCssClass($caption['options'], 'caption');
            $content = $image . self::getRenderer()->renderElement($caption);
            $tagName = ArrayHelper::popValue($options, 'tag', 'div');
        }

        static::addCssClass($options, 'thumbnail');
        return static::tag($tagName, $content, $options);
    }

    /**
     * @param string|array $content
     *
     * When passed an array:
     * - body: string
     *
     * @param array $options
     * - context: string
     *
     * @return string
     */
    public static function alert($content, array $options = [])
    {
        if (is_array($content)) {
            $content = self::getRenderer()->element(
                'body',
                $content,
                [
                    'prepend' => [
                        'closeButton' => [
                            'content' => '&times;',
                            'formatter' => function ($content, $element) {
                                return static::alertCloseButton($content, $element['options']);
                            },
                        ],
                    ],
                ]
            );
        }

        static::addCssClass($options, 'alert');
        static::addCssClassWithSuffix(
            $options,
            'alert',
            ArrayHelper::popValue($options, 'context', Alert::CONTEXT_SUCCESS)
        );
        return static::tag(ArrayHelper::popValue($options, 'tag', 'div'), $content, $options);
    }

    /**
     * @inheritDoc
     */
    public static function button($content = 'Button', array $options = [])
    {
        $options['type'] = 'button';
        return parent::button($content, $options);
    }

    /**
     * @param string $content
     * @param array $options
     *
     * @return string
     */
    public static function alertCloseButton($content = '&times;', array $options = [])
    {
        $options['data-dismiss'] = 'alert';
        return static::closeButton($content, $options);
    }

    /**
     * @param string $content
     * @param array $options
     *
     * @return string
     */
    protected static function closeButton($content = '&times;', array $options = [])
    {
        static::addCssClass($options, 'close');
        $options['aria-hidden'] = 'true';
        return static::button($content, $options);
    }

    /**
     * @param string $label
     * @param string|array $url
     * @param array $options
     *
     * @return string
     */
    public static function alertLink($label, $url = null, array $options = [])
    {
        static::addCssClass($options, 'alert-link');
        return static::a($label, $url, $options);
    }

    /**
     * Adds a CSS class with the given suffix to the specified options.
     *
     * @param array $options
     * @param string $class
     * @param string $suffix
     */
    public static function addCssClassWithSuffix(&$options, $class, $suffix)
    {
        if (!empty($suffix) && strpos($class, $suffix) === false) {
            $class .= '-' . $suffix;
        }
        static::addCssClass($options, $class);
    }

    private static $_renderer;

    /**
     * @return HtmlRenderer
     */
    protected static function getRenderer()
    {
        if (!isset(self::$_renderer)) {
            self::$_renderer = new HtmlRenderer;
        }
        return self::$_renderer;
    }
}