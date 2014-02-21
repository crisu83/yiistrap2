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
        Html::addCssClass($options, 'glyphicon glyphicon-' . $type);
        return Html::tag(ArrayHelper::popValue($options, 'tag', 'span'), '', $options);
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

    /**
     * @param array $items
     * @param array $options
     *
     * @return string
     */
    public static function pagination(array $items, array $options = [])
    {
        // todo: add support for size and alignment
        $options['item'] = array('static', 'renderItem');
        static::addCssClass($options, 'pagination');
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
        // todo: add support for alignment
        $options['item'] = array('static', 'renderItem');
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
            $item['content'] = static::a(
                $item['label'],
                ArrayHelper::popValue($item, 'url'),
                ArrayHelper::popValue($item, 'options', [])
            );
        } else {
            $item = ['content' => $item];
        }
        return static::renderContent($item, ['tag' => 'li']);
    }

    /**
     * @param array $items
     */
    protected static function normalizeItems(array &$items)
    {
        foreach ($items as &$item) {
            if (is_array($item)) {
                $item = function($item, $index) {
                    return static::a(
                        $item['label'],
                        ArrayHelper::popValue($item, 'url'),
                        ArrayHelper::popValue($item, 'options', [])
                    );
                };
            }
        }
    }

    const LABEL_DEFAULT = 'default';
    const LABEL_PRIMARY = 'primary';
    const LABEL_SUCCESS = 'success';
    const LABEL_INFO = 'info';
    const LABEL_WARNING = 'warning';
    const LABEL_DANGER = 'danger';

    /**
     * @param string $text
     * @param string $type
     * @param array $options
     *
     * @return string
     */
    public static function labelTb($text, $type = self::LABEL_DEFAULT, array $options = [])
    {
        Html::addCssClass($options, 'label label-' . $type);
        return Html::tag(ArrayHelper::popValue($options, 'tag', 'span'), $text, $options);
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
            $content = static::renderContent(
                    ArrayHelper::popValue($content, 'heading'),
                    ['tag' => 'h1']
                ) . static::renderContent(
                    ArrayHelper::popValue($content, 'body'),
                    ['tag' => 'p']
                );
        }

        static::addCssClass($options, 'jumbotron');
        return static::tag(ArrayHelper::popValue($options, 'tag', 'div'), $content, $options);
    }

    /**
     * @param string|array $content
     *
     * When passed as array:
     * - heading: string
     * - headingOptions: array
     * - headingTag: string
     * - subtext: string
     *
     * @param array $options
     *
     * @return string
     */
    public static function pageHeader($content, array $options = [])
    {
        if (is_array($content)) {
            if (isset($content['subtext'])) {
                $content['heading']['content'] .= ' ' . static::tag(
                        'small',
                        ArrayHelper::popValue($content, 'subtext')
                    );
            }
            $content = static::renderContent(
                ArrayHelper::popValue($content, 'heading'),
                ['tag' => 'h1']
            );
        }

        static::addCssClass($options, 'page-header');
        return static::tag(ArrayHelper::popValue($options, 'tag', 'div'), $content, $options);
    }

    /**
     * @param array $content
     *
     * - src: string
     * - url: string|array
     * - imageOptions: array
     * - caption: string
     * - captionOptions: array
     * - label: string
     * - labelOptions: array
     * - labelTag: string
     *
     * @param array $options
     *
     * @return string
     */
    public static function thumbnail($content, array $options = [])
    {
        $img = static::img(
            ArrayHelper::popValue($content, 'src'),
            ArrayHelper::popValue($content, 'image', [])
        );

        if (isset($content['url'])) {
            $options['href'] = static::url(ArrayHelper::popValue($content, 'url', '#'));
            $tagName = ArrayHelper::popValue($options, 'tag', 'a');
            $content = $img;
        } else {
            if (isset($content['caption'])) {
                $caption = ArrayHelper::popValue($content, 'caption', '');
                if (!is_array($caption)) {
                    $caption = ['content' => $caption];
                }
                ArrayHelper::defaultValues(
                    $caption,
                    [
                        'content' => '',
                        'options' => []
                    ]
                );
                ArrayHelper::defaultValue($caption, 'options', []);
                static::addCssClass($caption['options'], 'caption');

                if (isset($content['label'])) {
                    $caption['content'] = static::renderContent(
                        ArrayHelper::popValue($content, 'label'),
                        ['tag' => 'h3']
                    ) . $caption['content'];
                }

                $caption = static::renderContent($caption, ['tag' => 'div']);
            } else {
                $caption = '';
            }

            $tagName = ArrayHelper::popValue($options, 'tag', 'div');
            $content = $img . $caption;
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
     * @param string $type
     * @param array $options
     * @return string
     */
    public static function alert($content, $type = self::ALERT_SUCCESS, array $options = [])
    {
        if (is_array($content)) {
            if (isset($content['closeButton'])) {
                $closeButton = ArrayHelper::popValue($content, 'closeButton', '');
                if (!is_array($closeButton)) {
                    $closeButton = ['content' => $closeButton];
                }
                ArrayHelper::defaultValues(
                    $closeButton,
                    [
                        'content' => '&times;',
                        'options' => []
                    ]
                );
                $closeButton = static::alertCloseButton(
                    $closeButton['content'],
                    $closeButton['options']
                );
            } else {
                $closeButton = '';
            }
            $content = $closeButton . ArrayHelper::popValue($content, 'body', '');
        }

        static::addCssClass($options, 'alert alert-' . $type);
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
     * @param string $text
     * @param string|array $url
     * @param array $options
     *
     * @return string
     */
    public static function alertLink($text, $url = null, array $options = [])
    {
        static::addCssClass($options, 'alert-link');
        return static::a($text, $url, $options);
    }

    /**
     * @param string|array $content
     *
     * When passed an array:
     * - tag: string
     * - content: string
     * - options: array
     *
     * @param array $defaults
     *
     * - tag: string
     * - content: string
     * - options: array
     *
     * @return string
     */
    protected static function renderContent($content, array $defaults = [])
    {
        $defaults = array_merge(
            [
                'tag' => 'div',
                'content' => '',
                'options' => [],
            ],
            $defaults
        );
        if (is_array($content)) {
            return static::tag(
                ArrayHelper::popValue($content, 'tag', $defaults['tag']),
                ArrayHelper::popValue($content, 'content', $defaults['content']),
                ArrayHelper::popValue($content, 'options', $defaults['options'])
            );
        } else {
            return static::tag($defaults['tag'], $content);
        }
    }
}