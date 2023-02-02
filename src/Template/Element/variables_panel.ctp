<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         DebugKit 0.1
 * @license       https://www.opensource.org/licenses/mit-license.php MIT License
 */

/**
 * @var \DebugKit\View\AjaxView $this
 * @var string $error
 * @var bool $sort
 * @var array $content
 * @var array $errors
 */

if (isset($error)):
    printf('<p class="warning">%s</p>', $error);
endif;

if (!empty($content)):
    printf('<label class="toggle-checkbox"><input type="checkbox" class="neat-array-sort"%s>%s</label>', $sort ? ' checked="checked"' : '', __d('debug_kit', 'Sort variables by name'));
    $this->Toolbar->setSort($sort);
    echo $this->Toolbar->makeNeatArray($content);
endif;

if (!empty($errors)):
    echo '<h4>' . __d('debug_kit', 'Validation errors') . '</h4>';
    echo $this->Toolbar->makeNeatArray($errors);
endif;
