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
use yiistrap\enums\Navbar;
use yiistrap\exceptions\InvalidOption;
use yiistrap\exceptions\MissingOption;

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
     * - context: string
     * - size: string
     * - block: bool
     * - active: bool
     * - disabled: bool
     *
     * @return string
     */
    public static function linkTb($label, array $options = [])
    {
        static::addCssClassWithCondition($options, 'disabled', ArrayHelper::popValue($options, 'disabled'));

        $options['role'] = 'button';
        $options['formatter'] = function ($label, $options) {
            return static::a($label, ArrayHelper::popValue($options, 'url'), $options);
        };

        return static::btn($label, $options);
    }

    /**
     * @param string $label
     * @param array $options
     * - context: string
     * - size: string
     * - block: bool
     * - active: bool
     * - disabled: bool
     *
     * @return string
     */
    public static function buttonTb($label, array $options = [])
    {
        if (ArrayHelper::popValue($options, 'disabled')) {
            $options['disabled'] = 'disabled';
        }

        ArrayHelper::defaultValue($options, 'type', 'button');

        $options['formatter'] = function ($label, $options) {
            return static::button($label, $options);
        };

        return static::btn($label, $options);
    }

    /**
     * @param string $label
     * @param array $options
     * - context: string
     * - size: string
     * - block: bool
     * - active: bool
     * - disabled: bool
     *
     * @return string
     */
    public static function submitButtonTb($label, array $options = [])
    {
        $options['type'] = 'submit';
        return static::buttonTb($label, $options);
    }

    /**
     * @param string $label
     * @param array $options
     * - context: string
     * - size: string
     * - block: bool
     * - active: bool
     * - disabled: bool
     *
     * @return string
     */
    public static function resetButtonTb($label, array $options = [])
    {
        $options['type'] = 'reset';
        return static::buttonTb($label, $options);
    }

    /**
     * @param string $label
     * @param array $options
     * - context: string
     * - size: string
     * - block: bool
     * - active: bool
     * - disabled: bool
     *
     * @return string
     */
    public static function buttonInputTb($label, array $options = [])
    {
        if (ArrayHelper::popValue($options, 'disabled')) {
            $options['disabled'] = 'disabled';
        }

        $options['formatter'] = function ($label, $options) {
            return static::buttonInput($label, $options);
        };

        return static::btn($label, $options);
    }

    /**
     * @param string $label
     * @param array $options
     * - context: string
     * - size: string
     * - block: bool
     * - active: bool
     * - disabled: bool
     *
     * @return string
     */
    public static function submitInputTb($label, array $options = [])
    {
        $options['type'] = 'submit';
        return static::buttonInputTb($label, $options);
    }

    /**
     * @param string $label
     * @param array $options
     * - context: string
     * - size: string
     * - block: bool
     * - active: bool
     * - disabled: bool
     *
     * @return string
     */
    public static function resetInputTb($label, array $options = [])
    {
        $options['type'] = 'reset';
        return static::buttonInputTb($label, $options);
    }

    /**
     * @param string $label
     * @param array $options
     * - context: string
     * - size: string
     * - block: bool
     * - active: bool
     * - disabled: bool
     *
     * @throws InvalidOption
     *
     * @return string
     */
    public static function btn($label, array $options = [])
    {
        // todo: add tests.
        static::addCssClass($options, 'btn');
        static::addCssClassWithSuffix(
            $options,
            'btn',
            ArrayHelper::popValue($options, 'context', Button::CONTEXT_DEFAULT)
        );
        static::addCssClassWithSuffix($options, 'btn', ArrayHelper::popValue($options, 'size'));
        static::addCssClassWithSuffix($options, 'btn', ArrayHelper::popValue($options, 'block') ? 'block' : '');
        static::addCssClassWithCondition($options, 'active', ArrayHelper::popValue($options, 'active'));

        $formatter = ArrayHelper::popValue($options, 'formatter');

        if (!is_callable($formatter)) {
            throw new InvalidOption('Option "formatter" must be callable.');
        }

        return call_user_func($formatter, $label, $options);
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
        // todo: add more tests.
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
                        'formatter' => function ($element) {
                                return static::dropdownToggle($element['content'], $element['options']);
                            },
                    ],
                    'menu' => [
                        'items' => [],
                        'formatter' => function ($element) {
                                return static::dropdownMenu(
                                    ArrayHelper::popValue($element, 'items', []),
                                    $element['options']
                                );
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

        static::addCssClass($options, 'dropdown-toggle');

        $options['data-toggle'] = 'dropdown';
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
        // todo: add more tests.
        $options['item'] = function ($item) {
            if (!isset($item['label'])) {
                throw new MissingOption('Required option "label" is not set.');
            }

            if (isset($item['items'])) {
                ArrayHelper::defaultValue($item, 'content', []);

                $item['content'] = self::getRenderer()->parseContent(
                    $item['content'],
                    [
                        'toggle' => [
                            'content' => $item['label'],
                            'options' => ['href' => '#'],
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
                return static::menuItem($item);
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
        static::addCssClassWithSuffix($options, 'nav', ArrayHelper::popValue($options, 'stacked') ? 'stacked' : '');

        $options['type'] = Nav::TYPE_PILLS;
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
        $options['item'] = function ($item) {
            return static::menuItem($item);
        };
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
     * @param $content
     * @param array $options
     *
     * @return string
     */
    public static function navbar($content, array $options = [])
    {
        static::addCssClass($options, 'navbar');
        static::addCssClassWithSuffix(
            $options,
            'navbar',
            ArrayHelper::popValue($options, 'color', Navbar::COLOR_DEFAULT)
        );
        static::addCssClassWithSuffix($options, 'navbar', ArrayHelper::popValue($options, 'position'));

        $options['role'] = 'navigation';
        return static::tag(ArrayHelper::popValue($options, 'tag', 'nav'), $content, $options);
    }

    // todo: implement navbar elements (minor)

    /**
     * @param array $items
     * @param array $options
     *
     * @return string
     */
    public static function breadcrumbs(array $items, array $options = [])
    {
        $options['item'] = function ($item) {
            if (is_string($item)) {
                $item = ['content' => $item];
            }

            if (isset($item['url'])) {
                $item['content'] = static::a(
                    ArrayHelper::popValue($item, 'label'),
                    ArrayHelper::popValue($item, 'url'),
                    ArrayHelper::popValue($item, 'options', [])
                );
            }

            return static::tag('li', $item['content'], ArrayHelper::popValue($item, 'itemOptions', []));
        };

        static::addCssClass($options, 'breadcrumb');

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
        $options['item'] = function ($item) {
            if (!isset($item['url'])) {
                $item['content'] = static::tag(
                    'span',
                    ArrayHelper::popValue($item, 'label'),
                    ArrayHelper::popValue($item, 'options', [])
                );
            }

            return static::menuItem($item);
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
        $options['item'] = function ($item) {
            ArrayHelper::defaultValue($item, 'itemOptions', []);

            static::addCssClassWithCondition(
                $item['itemOptions'],
                'previous',
                ArrayHelper::popValue($item, 'previous')
            );
            static::addCssClassWithCondition($item['itemOptions'], 'next', ArrayHelper::popValue($item, 'next'));

            return static::menuItem($item);
        };

        static::addCssClass($options, 'pager');

        return static::ul($items, $options);
    }

    /**
     * @param string|array $item
     *
     * @return string
     */
    public static function menuItem($item)
    {
        // todo: add tests.
        if (is_string($item)) {
            return $item; // already rendered
        }

        if (!ArrayHelper::popValue($item, 'visible', true)) {
            return '';
        }

        $options = ArrayHelper::popValue($item, 'itemOptions', []);

        static::addCssClassWithCondition($options, 'active', ArrayHelper::popValue($item, 'active'));
        static::addCssClassWithCondition($options, 'disabled', ArrayHelper::popValue($item, 'disabled'));

        $linkOptions = ArrayHelper::popValue($item, 'options', []);

        ArrayHelper::moveValue('icon', $item, $linkOptions);
        ArrayHelper::moveValue('badge', $item, $linkOptions);

        if (isset($item['url'])) {
            $item['content'] = static::a(
                ArrayHelper::popValue($item, 'label'),
                ArrayHelper::popValue($item, 'url'),
                $linkOptions
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
                    'buttons' => [
                        'tag' => 'p',
                        'formatter' => function () use ($content) {
                                return static::listFactory(
                                    function ($items) {
                                        return static::buttonFactory($items);
                                    },
                                    ArrayHelper::popValue($content, 'buttons', [])
                                );
                            },
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
        // todo: clean up this method.
        $image = self::getRenderer()->element(
            'image',
            $content,
            [
                'src' => '',
                'formatter' => function ($element) {
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
                    'append' => [
                        'buttons' => [
                            'tag' => 'p',
                            'formatter' => function () use ($content) {
                                    return static::listFactory(
                                        function ($items) {
                                            return static::buttonFactory($items);
                                        },
                                        ArrayHelper::popValue($content, 'buttons', [])
                                    );
                                },
                        ],
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
        // todo: add more tests.
        if (is_array($content)) {
            $content = self::getRenderer()->element(
                'body',
                $content,
                [
                    'tag' => false,
                    'prepend' => [
                        'closeButton' => [
                            'content' => '&times;',
                            'formatter' => function ($element, $content) {
                                    return static::alertCloseButton($content, $element['options']);
                                },
                        ],
                    ],
                ]
            );
            static::addCssClass($options, 'alert-dismissable');
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
    public static function closeButton($content = '&times;', array $options = [])
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
     * @param int|array $content
     * @param array $options
     *
     * @return string
     */
    public static function progress($content, array $options = [])
    {
        // todo: refactor this method.
        if (!is_array($content)) {
            $content = [
                ['percentage' => $content],
            ];
        }

        $defaults = ['context' => null, 'showLabel' => false];
        ArrayHelper::moveValues(array('context', 'showLabel'), $options, $defaults);

        $content = static::listFactory(
            function ($bar) use ($defaults) {
                $bar = static::getRenderer()->normalizeElement($bar);
                ArrayHelper::copyValues(array_keys($defaults), $bar, $bar['options']);
                ArrayHelper::defaultValues($bar['options'], $defaults);
                return static::progressBar($bar['percentage'], $bar['options']);
            },
            $content
        );

        if (ArrayHelper::popValue($options, 'animated')) {
            static::addCssClass($options, 'active');
            $options['striped'] = true; // active must be striped.
        }

        static::addCssClass($options, 'progress');
        static::addCssClassWithCondition($options, 'progress-striped', ArrayHelper::popValue($options, 'striped'));

        return static::tag(ArrayHelper::popValue($options, 'tag', 'div'), $content, $options);
    }

    /**
     * @param int $percentage
     * @param array $options
     *
     * @return string
     */
    public static function progressBar($percentage, array $options = [])
    {
        $content = !ArrayHelper::popValue($options, 'showLabel', false)
            ? static::tag('span', $percentage . '%', ['class' => 'sr-only'])
            : $percentage . '%';

        static::addCssClass($options, 'progress-bar');
        static::addCssClassWithSuffix($options, 'progress-bar', ArrayHelper::popValue($options, 'context'));

        static::addCssStyle($options, 'width: ' . $percentage . '%');

        $options['role'] = 'progressbar';
        $options['aria-valuenow'] = $percentage;
        $options['aria-valuemin'] = '0';
        $options['aria-valuemax'] = '100';
        return static::tag(ArrayHelper::popValue($options, 'tag', 'div'), $content, $options);
    }

    /**
     * @inheritDoc
     */
    public static function tag($name, $content = '', array $options = [])
    {
        if (isset($options['icon'])) {
            $icon = self::getRenderer()->normalizeElement(ArrayHelper::popValue($options, 'icon'));
            $content = static::icon($icon['content'], $icon['options']) . ' ' . $content;
        }

        if (isset($options['badge'])) {
            $badge = self::getRenderer()->normalizeElement(ArrayHelper::popValue($options, 'badge'));
            $content .= ' ' . static::badge($badge['content'], $badge['options']);
        }

        return parent::tag($name, $content, $options);
    }

    /**
     * @param callable $formatter
     * @param array $items
     *
     * @return string
     */
    public static function listFactory(callable $formatter, array $items)
    {
        // todo: add tests.
        if (empty($items)) {
            return '';
        }

        $result = '';

        foreach ($items as $item) {
            $result .= ' ' . call_user_func($formatter, $item);
        }

        return $result;
    }

    /**
     * @param array $options
     * - type, string
     * - label, string
     * - url, string|array|null
     * - options, array
     *
     * @throws InvalidOption
     *
     * @return string
     */
    public static function buttonFactory(array $options)
    {
        // todo: add tests.

        $map = [
            Button::TYPE_BUTTON => 'buttonTb',
            Button::TYPE_SUBMIT => 'submitButtonTb',
            Button::TYPE_RESET => 'resetButtonTb',
            Button::TYPE_INPUT_SUBMIT => 'submitInputTb',
            Button::TYPE_INPUT_RESET => 'resetInputTb',
            Button::TYPE_LINK => 'linkTb',
        ];

        $type = ArrayHelper::popValue($options, 'type', 'button');

        if (!isset($map[$type])) {
            throw new InvalidOption(sprintf('Option "type" is not valid. (%s)', $type));
        }

        return static::$map[$type](ArrayHelper::popValue($options, 'label', 'Button'), $options);
    }

    /**
     * Adds a CSS class with the given suffix to the specified options.
     *
     * @param array $options
     * @param string $class
     * @param string $suffix
     */
    public static function addCssClassWithSuffix(array &$options, $class, $suffix)
    {
        // todo: add tests.
        if (!empty($suffix) && strpos($class, $suffix) === false) {
            $class .= '-' . $suffix;
        }

        static::addCssClass($options, $class);
    }

    /**
     * Adds a CSS class to the specified options if the given condition is met.
     *
     * @param array $options
     * @param string $class
     * @param bool $condition
     */
    public static function addCssClassWithCondition(array &$options, $class, $condition)
    {
        if (!$condition) {
            return;
        }

        static::addCssClass($options, $class);
    }

    private static $_renderer;

    /**
     * @return HtmlRenderer
     */
    public static function getRenderer()
    {
        // todo: add tests.
        if (!isset(self::$_renderer)) {
            self::$_renderer = new HtmlRenderer;
        }

        return self::$_renderer;
    }
}