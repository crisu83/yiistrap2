<?php

namespace yiistrap\tests\unit\helpers;

use yiistrap\enums\Button;
use yiistrap\enums\Icon;
use yiistrap\enums\Label;
use yiistrap\enums\Pagination;
use yiistrap\helpers\Html;
use yiistrap\tests\unit\TestCase;

class HtmlTest extends TestCase
{
    /**
     * @var \CodeGuy
     */
    protected $codeGuy;

    public function testBtn()
    {
        $I = $this->codeGuy;

        $html = Html::btn(
            'Button',
            [
                'context' => Button::CONTEXT_PRIMARY,
                'size' => Button::SIZE_LG,
                'active' => true,
            ]
        );
        $btn = $I->createNode($html, '.btn');
        $I->seeNodeCssClass($btn, 'btn btn-primary btn-lg active');
        $I->dontSeeNodeCssClass($btn, 'btn-block');
        $I->seeNodeText($btn, 'Button');

        $html = Html::btn(
            'Button',
            [
                'disabled' => true,
                'block' => true,
            ]
        );
        $btn = $I->createNode($html, '.btn');
        $I->seeNodeCssClass($btn, 'btn-block');
        $I->seeNodeAttribute($btn, 'disabled', 'disabled');
    }

    public function testIcon()
    {
        $I = $this->codeGuy;

        $html = Html::icon(Icon::GLYPH_ADJUST);
        $icon = $I->createNode($html, 'span');
        $I->seeNodeCssClass($icon, 'glyphicon glyphicon-adjust');
    }

    public function testIconConstants()
    {
        // Icons are copy/pasted from the Bootstrap site.
        $icons = [
            'asterisk',
            'plus',
            'euro',
            'minus',
            'cloud',
            'envelope',
            'pencil',
            'glass',
            'music',
            'search',
            'heart',
            'star',
            'star-empty',
            'user',
            'film',
            'th-large',
            'th',
            'th-list',
            'ok',
            'remove',
            'zoom-in',
            'zoom-out',
            'off',
            'signal',
            'cog',
            'trash',
            'home',
            'file',
            'time',
            'road',
            'download-alt',
            'download',
            'upload',
            'inbox',
            'play-circle',
            'repeat',
            'refresh',
            'list-alt',
            'lock',
            'flag',
            'headphones',
            'volume-off',
            'volume-down',
            'volume-up',
            'qrcode',
            'barcode',
            'tag',
            'tags',
            'book',
            'bookmark',
            'print',
            'camera',
            'font',
            'bold',
            'italic',
            'text-height',
            'text-width',
            'align-left',
            'align-center',
            'align-right',
            'align-justify',
            'list',
            'indent-left',
            'indent-right',
            'facetime-video',
            'picture',
            'map-marker',
            'adjust',
            'tint',
            'edit',
            'share',
            'check',
            'move',
            'step-backward',
            'fast-backward',
            'backward',
            'play',
            'pause',
            'stop',
            'forward',
            'fast-forward',
            'step-forward',
            'eject',
            'chevron-left',
            'chevron-right',
            'plus-sign',
            'minus-sign',
            'remove-sign',
            'ok-sign',
            'question-sign',
            'info-sign',
            'screenshot',
            'remove-circle',
            'ok-circle',
            'ban-circle',
            'arrow-left',
            'arrow-right',
            'arrow-up',
            'arrow-down',
            'share-alt',
            'resize-full',
            'resize-small',
            'exclamation-sign',
            'gift',
            'leaf',
            'fire',
            'eye-open',
            'eye-close',
            'warning-sign',
            'plane',
            'calendar',
            'random',
            'comment',
            'magnet',
            'chevron-up',
            'chevron-down',
            'retweet',
            'shopping-cart',
            'folder-close',
            'folder-open',
            'resize-vertical',
            'resize-horizontal',
            'hdd',
            'bullhorn',
            'bell',
            'certificate',
            'thumbs-up',
            'thumbs-down',
            'hand-right',
            'hand-left',
            'hand-up',
            'hand-down',
            'circle-arrow-right',
            'circle-arrow-left',
            'circle-arrow-up',
            'circle-arrow-down',
            'globe',
            'wrench',
            'tasks',
            'filter',
            'briefcase',
            'fullscreen',
            'dashboard',
            'paperclip',
            'heart-empty',
            'link',
            'phone',
            'pushpin',
            'usd',
            'gbp',
            'sort',
            'sort-by-alphabet',
            'sort-by-alphabet-alt',
            'sort-by-order',
            'sort-by-order-alt',
            'sort-by-attributes',
            'sort-by-attributes-alt',
            'unchecked',
            'expand',
            'collapse-down',
            'collapse-up',
            'log-in',
            'flash',
            'log-out',
            'new-window',
            'record',
            'save',
            'open',
            'saved',
            'import',
            'export',
            'send',
            'floppy-disk',
            'floppy-saved',
            'floppy-remove',
            'floppy-save',
            'floppy-open',
            'credit-card',
            'transfer',
            'cutlery',
            'header',
            'compressed',
            'earphone',
            'phone-alt',
            'tower',
            'stats',
            'sd-video',
            'hd-video',
            'subtitles',
            'sound-stereo',
            'sound-dolby',
            'sound-5-1',
            'sound-6-1',
            'sound-7-1',
            'copyright-mark',
            'registration-mark',
            'cloud-download',
            'cloud-upload',
            'tree-conifer',
            'tree-deciduous',
        ];

        foreach ($icons as $icon) {
            $const = strtoupper(str_replace('-', '_', $icon));
            // Evil eval to the rescue.
            eval("\\yiistrap\\helpers\\Html::icon(\\yiistrap\\enums\\Icon::GLYPH_$const);");
        }
    }

    public function testDropdown()
    {
        $I = $this->codeGuy;

        $items = [
            ['label' => 'Action', 'url' => '#'],
            ['label' => 'Another action', 'url' => '#'],
            ['label' => 'Something else here', 'url' => '#'],
            Html::menuDivider(),
            ['label' => 'Separated link', 'url' => '#'],
        ];

        $html = Html::dropdown(
            [
                'toggle' => [
                    'label' => 'Dropdown',
                    'class' => 'btn sr-only',
                ],
                'menu' => [
                    'items' => $items,
                ]
            ]
        );

        $dropdown = $I->createNode($html, 'div.dropdown');
        $I->seeNodeChildren($dropdown, ['a.dropdown-toggle', 'ul.dropdown-menu']);
        $menu = $dropdown->filter('ul.dropdown-menu');
        foreach ($menu->children() as $n => $liElement) {
            $li = $I->createNode($liElement);
            if ($n === 3) {
                $I->seeNodeCssClass($li, 'divider');
            } else {
                $a = $li->filter('a');
                $I->seeNodeAttribute($a, 'href', '#');
                $I->seeNodeText($a, $items[$n]['label']);
            }
        }
    }

    public function testDropdownToggle()
    {
        $I = $this->codeGuy;

        $html = Html::dropdownToggle('Dropdown');

        $toggle = $I->createNode($html, 'a.dropdown-toggle');
        $I->seeNodeAttribute($toggle, 'data-toggle', 'dropdown');
        $I->seeNodePattern($toggle, '/ <span class="caret"><\/span>$/');
    }

    public function testNav()
    {
        $I = $this->codeGuy;

        $items = [
            ['label' => 'Home', 'url' => '#', 'active' => true],
            ['label' => 'Profile', 'url' => '#'],
            ['label' => 'Messages', 'url' => '#', 'disabled' => true],
        ];

        // normal
        $html = Html::nav($items);
        $nav = $I->createNode($html, 'ul.nav');
        $I->seeNodeChildren($nav, ['li.active', 'li', 'li']);
        foreach ($nav->children() as $n => $liElement) {
            $li = $I->createNode($liElement, 'li');
            if ($n === 0) {
                $I->seeNodeCssClass($li, 'active');
            } else if ($n === 2) {
                $I->seeNodeCssClass($li, 'disabled');
            }
            $a = $li->filter('a');
            $I->seeNodeAttribute($a, 'href', $items[$n]['url']);
        }

        // justified
        $html = Html::tabs(
            [
                ['label' => 'Home', 'url' => '#', 'active' => true],
                ['label' => 'Profile', 'url' => '#'],
                ['label' => 'Messages', 'url' => '#'],
            ],
            [
                'justified' => true,
            ]
        );
        $nav = $I->createNode($html, 'ul.nav');
        $I->seeNodeCssClass($nav, 'nav-justified');

        $items = [
            ['label' => 'Action', 'url' => '#'],
            ['label' => 'Another action', 'url' => '#'],
            ['label' => 'Something else here', 'url' => '#'],
            Html::menuDivider(),
            ['label' => 'Separated link', 'url' => '#'],
        ];

        // dropdown
        $html = Html::tabs(
            [
                ['label' => 'Home', 'url' => '#', 'active' => true],
                ['label' => 'Help', 'url' => '#'],
                ['label' => 'Dropdown', 'items' => $items],
            ]
        );
        $nav = $I->createNode($html, 'ul.nav');
        foreach ($nav->children() as $n => $liElement) {
            $li = $I->createNode($liElement, 'li');
            if ($n === 2) {
                $I->seeNodeCssClass($li, 'dropdown');
                $I->seeNodeChildren($li, ['a.dropdown-toggle', 'ul.dropdown-menu']);
            }
        }
    }

    public function testTabs()
    {
        $I = $this->codeGuy;

        $html = Html::tabs(
            [
                ['label' => 'Home', 'url' => '#', 'active' => true],
                ['label' => 'Profile', 'url' => '#'],
                ['label' => 'Messages', 'url' => '#'],
            ]
        );
        $nav = $I->createNode($html, 'ul.nav');
        $I->seeNodeCssClass($nav, 'nav-tabs');
    }

    public function testPills()
    {
        $I = $this->codeGuy;

        // normal
        $html = Html::pills(
            [
                ['label' => 'Home', 'url' => '#', 'active' => true],
                ['label' => 'Profile', 'url' => '#'],
                ['label' => 'Messages', 'url' => '#'],
            ]
        );
        $nav = $I->createNode($html, 'ul.nav');
        $I->seeNodeCssClass($nav, 'nav-pills');

        // stacked
        $html = Html::pills(
            [
                ['label' => 'Home', 'url' => '#', 'active' => true],
                ['label' => 'Profile', 'url' => '#'],
                ['label' => 'Messages', 'url' => '#'],
            ],
            [
                'stacked' => true,
            ]
        );
        $nav = $I->createNode($html, 'ul.nav');
        $I->seeNodeCssClass($nav, 'nav-pills');
    }

    public function testDivider()
    {
        $I = $this->codeGuy;

        $html = Html::menuDivider();
        $divider = $I->createNode($html, 'li');
        $I->seeNodeCssClass($divider, 'divider');
    }

    public function testBreadcrumbs()
    {
        $I = $this->codeGuy;

        $html = Html::breadcrumbs(
            [
                ['label' => 'Home', 'url' => 'http://getyiistrap.com/home'],
                ['label' => 'Library', 'url' => 'http://getyiistrap.com/library'],
                'Data',
            ]
        );

        $breadcrumbs = $I->createNode($html, 'ol.breadcrumbs');
        $I->seeNodeChildren($breadcrumbs, ['li', 'li', 'li']);
        $items = $breadcrumbs->filter('li');
        $first = $items->first()->filter('a');
        $I->seeNodeAttribute($first, 'href', 'http://getyiistrap.com/home');
        $I->seeNodeText($first, 'Home');
        $last = $items->last();
        $I->seeNodeText($last, 'Data');
    }

    public function testPagination()
    {
        $I = $this->codeGuy;

        $html = Html::pagination(
            [
                ['label' => '1', 'url' => 'http://getyiistrap.com/home/1', 'active' => true],
                ['label' => '2'],
                ['label' => '3', 'url' => 'http://getyiistrap.com/home/3', 'disabled' => true],
            ],
            [
                'size' => Pagination::SIZE_LG,
            ]
        );
        $pagination = $I->createNode($html, 'ul.pagination');
        $I->seeNodeCssClass($pagination, 'pagination-lg');
        $I->seeNodeChildren($pagination, ['li', 'li > span', 'li']);
        $items = $pagination->filter('li');
        $first = $items->first();
        $I->seeNodeCssClass($first, 'active');
        $I->seeNodeText($first->filter('a'), '1');
        $last = $items->last();
        $I->seeNodeCssClass($last, 'disabled');
        $I->seeNodeText($last->filter('a'), '3');
    }

    public function testPager()
    {
        $I = $this->codeGuy;

        $html = Html::pager(
            [
                ['label' => 'Previous', 'url' => 'http://getyiistrap.com/home/prev'],
                ['label' => 'Next', 'url' => 'http://getyiistrap.com/home/next'],
            ]
        );
        $pager = $I->createNode($html, 'ul.pager');
        $I->seeNodeChildren($pager, ['li', 'li']);
        $items = $pager->filter('li');
        $first = $items->first()->filter('a');
        $I->seeNodeText($first, 'Previous');
        $last = $items->last()->filter('a');
        $I->seeNodeText($last, 'Next');
    }

    public function testLabel()
    {
        $I = $this->codeGuy;

        $html = Html::labelTb(
            'Primary',
            [
                'context' => Label::CONTEXT_PRIMARY,
            ]
        );
        $label = $I->createNode($html, 'span');
        $I->seeNodeCssClass($label, 'label label-primary');
        $I->seeNodeText($label, 'Primary');

        $html = Html::labelTb(Html::icon(Icon::GLYPH_INBOX) . ' Inbox');
        $label = $I->createNode($html, 'span');
        $I->seeNodePattern($label, '/> Inbox$/');
        $I->seeNodeChildren($label, ['.glyphicon']);
    }
    
    public function testBadge()
    {
        $I = $this->codeGuy;

        $html = Html::badge('42');
        $badge = $I->createNode($html, 'span.badge');
        $I->seeNodeText($badge, '42');
    }

    public function testJumbotron()
    {
        $I = $this->codeGuy;

        // string content
        $html = Html::jumbotron('<h1>Hello, world!</h1>');
        $jumbotron = $I->createNode($html, 'div.jumbotron');
        $I->seeNodeText($jumbotron, 'Hello, world!');

        // array content
        $html = Html::jumbotron(
            [
                'heading' => [
                    'tag' => 'h2',
                    'content' => 'Hello, world!',
                    'options' => ['class' => 'heading'],
                ],
                'body' => [
                    'tag' => 'div',
                    'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto commodi dolorum ducimus, ea eaque fugiat, maiores, nulla quas recusandae sed tempora unde. A dicta dolores odio perspiciatis sequi veritatis voluptates.',
                    'options' => ['class' => 'body'],
                ],
            ]
        );
        $jumbotron = $I->createNode($html, '.jumbotron');
        $heading = $jumbotron->filter('h2');
        $I->seeNodeText($heading, 'Hello, world!');
        $I->seeNodeCssClass($heading, 'heading');
        $body = $jumbotron->filter('.body');
        $I->seeNodeText($body, 'Lorem');
        $I->seeNodeCssClass($body, 'body');

        // full width
        $html = Html::jumbotron('<h1>Hello, world!</h1>', ['fullWidth' => true]);
        $jumbotron = $I->createNode($html, 'div.jumbotron');
        $container = $jumbotron->filter('div.container');
        $I->seeNodeText($container, 'Hello, world!');
    }

    public function testPageHeader()
    {
        $I = $this->codeGuy;

        // string content
        $html = Html::pageHeader('<h1>Page header</h1>');
        $header = $I->createNode($html, 'div.page-header');
        $h1 = $header->filter('h1');
        $I->seeNodeText($h1, 'Page header');

        // array content
        $html = Html::pageHeader(
            [
                'heading' => [
                    'tag' => 'h2',
                    'content' => 'Page header',
                    'options' => ['class' => 'heading'],
                ],
                'subtext' => 'Subtext',
            ]
        );
        $header = $I->createNode($html, 'div.page-header');
        $heading = $header->filter('h2');
        $I->seeNodeText($heading, 'Page header');
        $I->seeNodeCssClass($heading, 'heading');
        $small = $heading->filter('small');
        $I->seeNodeText($small, 'Subtext');
    }

    public function testThumbnail()
    {
        $I = $this->codeGuy;

        // default thumbnail
        $html = Html::thumbnail(
            [
                'url' => 'http://getyiistrap.com/',
                'image' => [
                    'src' => 'http://getyiistrap.com/thumbnail.png',
                    'options' => [
                        'alt' => 'Alternative text',
                    ],
                ],
            ]
        );
        $thumbnail = $I->createNode($html, 'a.thumbnail');
        $I->seeNodeAttribute($thumbnail, 'href', 'http://getyiistrap.com/');
        $img = $thumbnail->filter('img');
        $I->seeNodeAttributes(
            $img,
            [
                'src' => 'http://getyiistrap.com/thumbnail.png',
                'alt' => 'Alternative text',
            ]
        );

        // custom thumbnail
        $html = Html::thumbnail(
            [
                'image' => [
                    'src' => 'http://getyiistrap.com/thumbnail.png',
                ],
                'label' => [
                    'tag' => 'h5',
                    'content' => 'Thumbnail label',
                    'options' => ['class' => 'label'],
                ],
                'caption' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad, alias consequuntur eius eveniet facilis inventore ipsam iste iure minima nisi possimus quae reprehenderit vero? Aspernatur assumenda exercitationem odio quidem ut.',
            ]
        );
        $thumbnail = $I->createNode($html, 'div.thumbnail');
        $img = $thumbnail->filter('img');
        $I->seeNodeAttribute($img, 'src', 'http://getyiistrap.com/thumbnail.png');
        $caption = $thumbnail->filter('div.caption');
        $label = $caption->filter('h5');
        $I->seeNodeText($label, 'Thumbnail label');
        $I->seeNodeText($caption, 'Lorem');
    }

    public function testAlert()
    {
        $I = $this->codeGuy;

        $html = Html::alert(
            [
                'body' => '<strong>Well done!</strong> You successfully read this important alert message.',
                'closeButton' => [],
            ]
        );
        $alert = $I->createNode($html, 'div.alert');
        $I->seeNodeCssClass($alert, 'alert-success');
        $I->seeNodeText($alert, 'You successfully read this important alert message.');
        $strong = $alert->filter('strong');
        $I->seeNodeText($strong, 'Well done!');
    }

    public function testAlertLink()
    {
        $I = $this->codeGuy;

        $html = Html::alertLink('this important alert message');
        $a = $I->createNode($html, 'a.alert-link');
        $I->seeNodeText($a, 'this important alert message');
    }
}