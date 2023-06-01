<?php
/**
 * DragDrop File ver: 0.2
 *
 * Roundcube plugin for drag and drop attachment files to local host
 *
 * @author Michael Ladanov
 *
 * Copyright (C) 2023 Michael Ladanov
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see <http://www.gnu.org/licenses/>
 */

class dragdropfile extends rcube_plugin
{
    public $task = 'mail';
    public $noajax = true;
	
	
	public $hooks = [
        'template_object_messageattachments' => 'templateObjectMessageattachmentsHook',
    ];


	/********************************************
     *  Инициализация плагина.					
    ********************************************/
    function init()
    {
        parent::init();

        if ($this->rcmail->task === 'mail') {
            $this->include_stylesheet("skins/default/pages/style.css");
			$this->include_script('dragdropfile.js');
        }
    }
	
	
	/********************************************
     *  Добавление кнопку "Перетащить все" в область вложений письма.
    ********************************************/
    public function templateObjectMessageattachmentsHook(array $p): array
    {
		$this->add_drag_button($p);

        return $p;
    }
	
	
	/********************************************
     *  Добавление кнопку "Перетащить все" в область вложений письма.
    ********************************************/
	private function add_drag_button(array &$p): void
    {
        $p['content'] = preg_replace_callback(
            '/(<ul.*?id="attachment-list".*?>)(.*?)<\/ul>/uS',
            function (array $matches): string {
                $block_ul = $matches[0];		// Весь фрагмент HTML-кода.
				$ul = $matches[1];				// Открывающий тэг UL.
				$inside_ul = $matches[2];		// Код внутри UL.
                
                $button = html::a(
                    [
                        'href' => '#',
                        'class' => 'dragdropfile-link',
                        'title' => $this->gettext('drag_all_files'),
                    ],
                    ''
                );
                
                return $ul . '<li dragdropfile>' . $button . '</li>' . $inside_ul . '</ul>';
            }, $p['content']
        );
    }
}
