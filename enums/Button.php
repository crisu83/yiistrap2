<?php

namespace yiistrap\enums;

class Button
{
    const TYPE_LINK = 'link';
    const TYPE_BUTTON = 'button';
    const TYPE_SUBMIT = 'submit';
    const TYPE_RESET = 'reset';
    const TYPE_INPUT = 'input';
    const TYPE_INPUT_SUBMIT = 'submitInput';
    const TYPE_INPUT_RESET = 'resetInput';

    const CONTEXT_DEFAULT = 'default';
    const CONTEXT_PRIMARY = 'primary';
    const CONTEXT_SUCCESS = 'success';
    const CONTEXT_INFO = 'info';
    const CONTEXT_WARNING = 'warning';
    const CONTEXT_DANGER = 'danger';
    const CONTEXT_LINK = 'link';

    const SIZE_LG = 'lg';
    const SIZE_SM = 'sm';
    const SIZE_XS = 'xs';
}