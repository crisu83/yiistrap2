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

/**
 * @author Christoffer Niska <christoffer.niska@gmail.com>
 * @author Christoffer Lindqvist <christoffer.lindqvist@nordsoftware.com>
 * @since 2.0.0
 */
class Html extends \yii\helpers\Html
{
    const ICON_ASTERISK = 'asterisk';
    const ICON_PLUS = 'plus';
    const ICON_EURO = 'euro';
    const ICON_MINUS = 'minus';
    const ICON_CLOUD = 'cloud';
    const ICON_ENVELOPE = 'envelope';
    const ICON_PENCIL = 'pencil';
    const ICON_GLASS = 'glass';
    const ICON_MUSIC = 'music';
    const ICON_SEARCH = 'search';
    const ICON_HEART = 'heart';
    const ICON_STAR = 'star';
    const ICON_STAR_EMPTY = 'star-empty';
    const ICON_USER = 'user';
    const ICON_FILM = 'film';
    const ICON_TH_LARGE = 'th-large';
    const ICON_TH = 'th';
    const ICON_TH_LIST = 'th-list';
    const ICON_OK = 'ok';
    const ICON_REMOVE = 'remove';
    const ICON_ZOOM_IN = 'zoom-in';
    const ICON_ZOOM_OUT = 'zoom-out';
    const ICON_OFF = 'off';
    const ICON_SIGNAL = 'signal';
    const ICON_COG = 'cog';
    const ICON_TRASH = 'trash';
    const ICON_HOME = 'home';
    const ICON_FILE = 'file';
    const ICON_TIME = 'time';
    const ICON_ROAD = 'road';
    const ICON_DOWNLOAD_ALT = 'download-alt';
    const ICON_DOWNLOAD = 'download';
    const ICON_UPLOAD = 'upload';
    const ICON_INBOX = 'inbox';
    const ICON_PLAY_CIRCLE = 'play-circle';
    const ICON_REPEAT = 'repeat';
    const ICON_REFRESH = 'refresh';
    const ICON_LIST_ALT = 'list-alt';
    const ICON_LOCK = 'lock';
    const ICON_FLAG = 'flag';
    const ICON_HEADPHONES = 'headphones';
    const ICON_VOLUME_OFF = 'volume-off';
    const ICON_VOLUME_DOWN = 'volume-down';
    const ICON_VOLUME_UP = 'volume-up';
    const ICON_QRCODE = 'qrcode';
    const ICON_BARCODE = 'barcode';
    const ICON_TAG = 'tag';
    const ICON_TAGS = 'tags';
    const ICON_BOOK = 'book';
    const ICON_BOOKMARK = 'bookmark';
    const ICON_PRINT = 'print';
    const ICON_CAMERA = 'camera';
    const ICON_FONT = 'font';
    const ICON_BOLD = 'bold';
    const ICON_ITALIC = 'italic';
    const ICON_TEXT_HEIGHT = 'text-height';
    const ICON_TEXT_WIDTH = 'text-width';
    const ICON_ALIGN_LEFT = 'align-left';
    const ICON_ALIGN_CENTER = 'align-center';
    const ICON_ALIGN_RIGHT = 'align-right';
    const ICON_ALIGN_JUSTIFY = 'align-justify';
    const ICON_LIST = 'list';
    const ICON_INDENT_LEFT = 'indent-left';
    const ICON_INDENT_RIGHT = 'indent-right';
    const ICON_FACETIME_VIDEO = 'facetime-video';
    const ICON_PICTURE = 'picture';
    const ICON_MAP_MARKER = 'map-marker';
    const ICON_ADJUST = 'adjust';
    const ICON_TINT = 'tint';
    const ICON_EDIT = 'edit';
    const ICON_SHARE = 'share';
    const ICON_CHECK = 'check';
    const ICON_MOVE = 'move';
    const ICON_STEP_BACKWARD = 'step-backward';
    const ICON_FAST_BACKWARD = 'fast-backward';
    const ICON_BACKWARD = 'backward';
    const ICON_PLAY = 'play';
    const ICON_PAUSE = 'pause';
    const ICON_STOP = 'stop';
    const ICON_FORWARD = 'forward';
    const ICON_FAST_FORWARD = 'fast-forward';
    const ICON_STEP_FORWARD = 'step-forward';
    const ICON_EJECT = 'eject';
    const ICON_CHEVRON_LEFT = 'chevron-left';
    const ICON_CHEVRON_RIGHT = 'chevron-right';
    const ICON_PLUS_SIGN = 'plus-sign';
    const ICON_MINUS_SIGN = 'minus-sign';
    const ICON_REMOVE_SIGN = 'remove-sign';
    const ICON_OK_SIGN = 'ok-sign';
    const ICON_QUESTION_SIGN = 'question-sign';
    const ICON_INFO_SIGN = 'info-sign';
    const ICON_SCREENSHOT = 'screenshot';
    const ICON_REMOVE_CIRCLE = 'remove-circle';
    const ICON_OK_CIRCLE = 'ok-circle';
    const ICON_BAN_CIRCLE = 'ban-circle';
    const ICON_ARROW_LEFT = 'arrow-left';
    const ICON_ARROW_RIGHT = 'arrow-right';
    const ICON_ARROW_UP = 'arrow-up';
    const ICON_ARROW_DOWN = 'arrow-down';
    const ICON_SHARE_ALT = 'share-alt';
    const ICON_RESIZE_FULL = 'resize-full';
    const ICON_RESIZE_SMALL = 'resize-small';
    const ICON_EXCLAMATION_SIGN = 'exclamation-sign';
    const ICON_GIFT = 'gift';
    const ICON_LEAF = 'leaf';
    const ICON_FIRE = 'fire';
    const ICON_EYE_OPEN = 'eye-open';
    const ICON_EYE_CLOSE = 'eye-close';
    const ICON_WARNING_SIGN = 'warning-sign';
    const ICON_PLANE = 'plane';
    const ICON_CALENDAR = 'calendar';
    const ICON_RANDOM = 'random';
    const ICON_COMMENT = 'comment';
    const ICON_MAGNET = 'magnet';
    const ICON_CHEVRON_UP = 'chevron-up';
    const ICON_CHEVRON_DOWN = 'chevron-down';
    const ICON_RETWEET = 'retweet';
    const ICON_SHOPPING_CART = 'shopping-cart';
    const ICON_FOLDER_CLOSE = 'folder-close';
    const ICON_FOLDER_OPEN = 'folder-open';
    const ICON_RESIZE_VERTICAL = 'resize-vertical';
    const ICON_RESIZE_HORIZONTAL = 'resize-horizontal';
    const ICON_HDD = 'hdd';
    const ICON_BULLHORN = 'bullhorn';
    const ICON_BELL = 'bell';
    const ICON_CERTIFICATE = 'certificate';
    const ICON_THUMBS_UP = 'thumbs-up';
    const ICON_THUMBS_DOWN = 'thumbs-down';
    const ICON_HAND_RIGHT = 'hand-right';
    const ICON_HAND_LEFT = 'hand-left';
    const ICON_HAND_UP = 'hand-up';
    const ICON_HAND_DOWN = 'hand-down';
    const ICON_CIRCLE_ARROW_RIGHT = 'circle-arrow-right';
    const ICON_CIRCLE_ARROW_LEFT = 'circle-arrow-left';
    const ICON_CIRCLE_ARROW_UP = 'circle-arrow-up';
    const ICON_CIRCLE_ARROW_DOWN = 'circle-arrow-down';
    const ICON_GLOBE = 'globe';
    const ICON_WRENCH = 'wrench';
    const ICON_TASKS = 'tasks';
    const ICON_FILTER = 'filter';
    const ICON_BRIEFCASE = 'briefcase';
    const ICON_FULLSCREEN = 'fullscreen';
    const ICON_DASHBOARD = 'dashboard';
    const ICON_PAPERCLIP = 'paperclip';
    const ICON_HEART_EMPTY = 'heart-empty';
    const ICON_LINK = 'link';
    const ICON_PHONE = 'phone';
    const ICON_PUSHPIN = 'pushpin';
    const ICON_USD = 'usd';
    const ICON_GBP = 'gbp';
    const ICON_SORT = 'sort';
    const ICON_SORT_BY_ALPHABET = 'sort-by-alphabet';
    const ICON_SORT_BY_ALPHABET_ALT = 'sort-by-alphabet-alt';
    const ICON_SORT_BY_ORDER = 'sort-by-order';
    const ICON_SORT_BY_ORDER_ALT = 'sort-by-order-alt';
    const ICON_SORT_BY_ATTRIBUTES = 'sort-by-attributes';
    const ICON_SORT_BY_ATTRIBUTES_ALT = 'sort-by-attributes-alt';
    const ICON_UNCHECKED = 'unchecked';
    const ICON_EXPAND = 'expand';
    const ICON_COLLAPSE_DOWN = 'collapse-down';
    const ICON_COLLAPSE_UP = 'collapse-up';
    const ICON_LOG_IN = 'log-in';
    const ICON_FLASH = 'flash';
    const ICON_LOG_OUT = 'log-out';
    const ICON_NEW_WINDOW = 'new-window';
    const ICON_RECORD = 'record';
    const ICON_SAVE = 'save';
    const ICON_OPEN = 'open';
    const ICON_SAVED = 'saved';
    const ICON_IMPORT = 'import';
    const ICON_EXPORT = 'export';
    const ICON_SEND = 'send';
    const ICON_FLOPPY_DISK = 'floppy-disk';
    const ICON_FLOPPY_SAVED = 'floppy-saved';
    const ICON_FLOPPY_REMOVE = 'floppy-remove';
    const ICON_FLOPPY_SAVE = 'floppy-save';
    const ICON_FLOPPY_OPEN = 'floppy-open';
    const ICON_CREDIT_CARD = 'credit-card';
    const ICON_TRANSFER = 'transfer';
    const ICON_CUTLERY = 'cutlery';
    const ICON_HEADER = 'header';
    const ICON_COMPRESSED = 'compressed';
    const ICON_EARPHONE = 'earphone';
    const ICON_PHONE_ALT = 'phone-alt';
    const ICON_TOWER = 'tower';
    const ICON_STATS = 'stats';
    const ICON_SD_VIDEO = 'sd-video';
    const ICON_HD_VIDEO = 'hd-video';
    const ICON_SUBTITLES = 'subtitles';
    const ICON_SOUND_STEREO = 'sound-stereo';
    const ICON_SOUND_DOLBY = 'sound-dolby';
    const ICON_SOUND_5_1 = 'sound-5-1';
    const ICON_SOUND_6_1 = 'sound-6-1';
    const ICON_SOUND_7_1 = 'sound-7-1';
    const ICON_COPYRIGHT_MARK = 'copyright-mark';
    const ICON_REGISTRATION_MARK = 'registration-mark';
    const ICON_CLOUD_DOWNLOAD = 'cloud-download';
    const ICON_CLOUD_UPLOAD = 'cloud-upload';
    const ICON_TREE_CONIFER = 'tree-conifer';
    const ICON_TREE_DECIDUOUS = 'tree-deciduous';

    /**
     * @param string $type
     * @param array $options
     *
     * @return string
     */
    public static function icon($type, array $options = [])
    {
        static::addCssClass($options, 'glyphicon glyphicon-' . $type);
        return static::tag(ArrayHelper::popValue($options, 'tag', 'span'), '', $options);
    }

    /**
     * @param array $items
     * @param array $options
     *
     * @return string
     */
    public static function breadcrumbs(array $items, array $options = [])
    {
        $options['item'] = array('static', 'renderItem');
        static::addCssClass($options, 'breadcrumbs');
        return static::ol($items, $options);
    }

    const PAGINATION_LG = 'lg';
    const PAGINATION_SM = 'sm';

    /**
     * @param array $items
     * @param array $options
     *
     * @return string
     */
    public static function pagination(array $items, array $options = [])
    {
        $options['item'] = array('static', 'renderItem');
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
        $options['item'] = function($item, $index) {
            ArrayHelper::defaultValue($item, 'itemOptions', []);
            if (ArrayHelper::popValue($item, 'previous')) {
                static::addCssClass($item['itemOptions'], 'previous');
            }
            if (ArrayHelper::popValue($item, 'next')) {
                static::addCssClass($item['itemOptions'], 'next');
            }
            return static::renderItem($item, $index);
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
    protected static function renderItem($item, $index)
    {
        if (is_array($item)) {
            ArrayHelper::defaultValue($item, 'itemOptions', []);
            if (ArrayHelper::popValue($item, 'active')) {
                static::addCssClass($item['itemOptions'], 'active');
            }
            if (ArrayHelper::popValue($item, 'disabled')) {
                static::addCssClass($item['itemOptions'], 'disabled');
            }
            if (isset($item['url'])) {
                $item['content'] = static::a(
                    ArrayHelper::popValue($item, 'label'),
                    ArrayHelper::popValue($item, 'url'),
                    ArrayHelper::popValue($item, 'options', [])
                );
            } else {
                $item['content'] = static::tag(
                    'span',
                    ArrayHelper::popValue($item, 'label'),
                    ArrayHelper::popValue($item, 'options', [])
                );
            }
        } else {
            $item = ['content' => $item];
        }
        return static::tag('li', $item['content'], ArrayHelper::popValue($item, 'itemOptions', []));
    }

    const LABEL_DEFAULT = 'default';
    const LABEL_PRIMARY = 'primary';
    const LABEL_SUCCESS = 'success';
    const LABEL_INFO = 'info';
    const LABEL_WARNING = 'warning';
    const LABEL_DANGER = 'danger';

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
        static::addCssClassWithSuffix($options, 'label', ArrayHelper::popValue($options, 'type', self::LABEL_DEFAULT));
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
            $content = static::content(
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
            $content = static::content(
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
        $image = static::element(
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
            $caption = static::parseElement(
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
            $content = $image . static::renderElement($caption);
            $tagName = ArrayHelper::popValue($options, 'tag', 'div');
        }

        static::addCssClass($options, 'thumbnail');
        return static::tag($tagName, $content, $options);
    }

    const ALERT_SUCCESS = 'success';
    const ALERT_INFO = 'info';
    const ALERT_WARNING = 'warning';
    const ALERT_ERROR = 'error';

    /**
     * @param string|array $content
     *
     * When passed an array:
     * - body: string
     *
     * @param array $options
     * - type: string
     *
     * @return string
     */
    public static function alert($content, array $options = [])
    {
        if (is_array($content)) {
            $content = static::element(
                'body',
                $content,
                [
                    'prepend' => [
                        'closeButton' => [
                            'content' => '&times;',
                            'formatter' => function($content, $element) {
                                return static::alertCloseButton($content, $element['options']);
                            },
                        ],
                    ],
                ]
            );
        }

        static::addCssClass($options, 'alert');
        static::addCssClassWithSuffix($options, 'alert', ArrayHelper::popValue($options, 'type', self::ALERT_SUCCESS));
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
     * @param string $content
     * @param array $options
     * - url, string|array
     *
     * @return string
     */
    public static function alertLink($content, array $options = [])
    {
        static::addCssClass($options, 'alert-link');
        return static::a($content, ArrayHelper::popValue($options, 'url'), $options);
    }

    /**
     * Parses elements from the given content according to the given structure.
     *
     * @param string|array $content
     * @param array $structure
     *
     * @return array the parsed elements.
     */
    public static function parseContent($content, array $structure = [])
    {
        $result = [];
        foreach ($structure as $name => $element) {
            $result[$name] = static::parseElement($name, $content, $structure[$name]);
        }
        return $result;
    }

    /**
     * Parses the a specific element from the given content according to the given structure.
     *
     * @param string $name
     * @param string|array $content
     * @param array $structure
     *
     * @return array the parsed element.
     */
    public static function parseElement($name, $content, array $structure = [])
    {
        if (isset($content[$name])) {
            $element = is_array($content[$name]) ? $content[$name] : ['content' => $content[$name]];
        } else {
            $element = [];
        }

        $element = static::normalizeElement($element, $structure);

        if (!empty($structure['prepend'])) {
            $element['prepend'] = static::parseContent($content, $structure['prepend']);
        }
        if (!empty($structure['append'])) {
            $element['append'] = static::parseContent($content, $structure['append']);
        }

        return $element;
    }

    /**
     * Normalizes the given element using the given default values.
     *
     * @param array $element
     * @param array $defaults
     *
     * @return array the normalized element.
     */
    public static function normalizeElement(array $element, array $defaults = [])
    {
        return array_merge(
            [
                'tag' => 'div',
                'content' => '',
                'options' => [],
                'prepend' => [],
                'append' => [],
            ],
            $defaults,
            $element
        );
    }

    /**
     * Renders the elements in the given content.
     *
     * @param array $content
     *
     * @return string the rendered elements
     */
    public static function renderContent(array $content)
    {
        $out = '';
        foreach ($content as $element) {
            $out .= static::renderElement($element);
        }
        return $out;
    }

    /**
     * Renders the given element.
     *
     * @param array $element
     * - tag: string
     * - content: string
     * - options: array
     * - prepend: array
     * - append: array
     * - allowEmpty: bool
     *
     * @return string the rendered element.
     */
    public static function renderElement(array $element)
    {
        $prepend = !empty($element['prepend']) ? static::renderContent($element['prepend']) . ' ' : '';
        $append = !empty($element['append']) ? ' ' . static::renderContent($element['append']) : '';
        $content = $prepend . $element['content'] . $append;
        if (!empty($content) || (isset($element['allowEmpty']) && $element['allowEmpty'])) {
            if (isset($element['formatter']) && is_callable($element['formatter'])) {
                return call_user_func($element['formatter'], $content, $element);
            } else {
                return static::tag($element['tag'], $content, $element['options']);
            }
        }
    }

    /**
     * Parses and renders elements from the given content according to the given structure.
     *
     * @param string|array $content
     * @param array $structure
     *
     * @return string the rendered elements.
     */
    protected static function content($content, array $structure = [])
    {
        return static::renderContent(static::parseContent($content, $structure));
    }

    /**
     * Parses and renders a specific element from the given content according to the given structure.
     *
     * @param string $name
     * @param array $content
     * @param array $structure
     *
     * @return string the rendered element.
     */
    protected static function element($name, $content, array $structure = [])
    {
        return static::renderElement(static::parseElement($name, $content, $structure));
    }

    /**
     * Adds a CSS class to the specified options.
     *
     * @param array $options
     * @param string $class
     */
    public static function addCssClass(&$options, $class)
    {
        if (empty($class)) {
            return;
        }
        parent::addCssClass($options, $class);
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
}