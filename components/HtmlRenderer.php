<?php

namespace yiistrap\components;

use yii\base\Component;
use yiistrap\helpers\Html;

class HtmlRenderer extends Component
{
    /**
     * Parses elements from the given content according to the given structure.
     *
     * @param string|array $content
     * @param array $structure
     *
     * @return array the parsed elements.
     */
    public function parseContent($content, array $structure = [])
    {
        $result = [];
        foreach ($structure as $name => $element) {
            $result[$name] = $this->parseElement($name, $content, $structure[$name]);
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
    public function parseElement($name, $content, array $structure = [])
    {
        if (isset($content[$name])) {
            $element = is_array($content[$name]) ? $content[$name] : ['content' => $content[$name]];
        } else {
            $element = [];
        }

        $element = $this->normalizeElement($element, $structure);

        if (!empty($structure['prepend'])) {
            $element['prepend'] = $this->parseContent($content, $structure['prepend']);
        }
        if (!empty($structure['append'])) {
            $element['append'] = $this->parseContent($content, $structure['append']);
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
    public function normalizeElement(array $element, array $defaults = [])
    {
        return array_merge(
            ['tag' => 'div', 'content' => '', 'options' => [], 'prepend' => [], 'append' => []],
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
    public function renderContent(array $content)
    {
        $out = '';
        foreach ($content as $element) {
            $out .= $this->renderElement($element);
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
    public function renderElement(array $element)
    {
        $prepend = !empty($element['prepend']) ? $this->renderContent($element['prepend']) . ' ' : '';
        $append = !empty($element['append']) ? ' ' . $this->renderContent($element['append']) : '';
        $content = $prepend . $element['content'] . $append;

        if (empty($content) && isset($element['allowEmpty']) && !$element['allowEmpty']) {
            return '';
        }

        if (isset($element['formatter']) && is_callable($element['formatter'])) {
            $content = call_user_func($element['formatter'], $content, $element);
        }

        return $element['tag'] !== false ? Html::tag($element['tag'], $content, $element['options']) : $content;
    }

    /**
     * Parses and renders elements from the given content according to the given structure.
     *
     * @param string|array $content
     * @param array $structure
     *
     * @return string the rendered elements.
     */
    public function content($content, array $structure = [])
    {
        return $this->renderContent($this->parseContent($content, $structure));
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
    public function element($name, $content, array $structure = [])
    {
        return $this->renderElement($this->parseElement($name, $content, $structure));
    }
} 