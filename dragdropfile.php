<?php
/**
 * DragDrop File ver: 1.0
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
	
	private $rcube;
		

	/********************************************
     *  Инициализация плагина.					
    ********************************************/
    public function init(): void
    {
		$this->rcube = rcube::get_instance();

        if ($this->rcube->task == 'mail') {
            $this->include_stylesheet("skins/default/pages/style.css");
			$this->include_script('dragdropfile.js');
			$this->add_texts('localization', true);
			$this->add_hook('template_object_messageattachments', array($this, 'add_drag_button'));
        }
    }
	

	/********************************************
     *  Добавление кнопку "Перетащить все" в начало области вложений письма.
    ********************************************/
	function add_drag_button($p)
    {
		$button = html::a(
					[
                        'href' => '#',
                        'class' => 'dragdropfile-link',
                        'title' => $this->gettext('drag_all_files'),
                    ],
                    ''
                );
		
		$p['content'] = '<span class="dragdropfile">' .  $button . '</span>' . $p['content'];
		
		return $p;
    }	
}
