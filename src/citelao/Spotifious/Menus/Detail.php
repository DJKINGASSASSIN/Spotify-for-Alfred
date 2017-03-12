<?php
namespace Spotifious\Menus;

use Spotifious\Menus\Menu;
use Spotifious\Menus\DetailArtist;
use Spotifious\Menus\DetailAlbum;

class Detail {
	protected $submenu;

	public function __construct($options, $alfred) {
		$this->search = $options['search'];

		$this->currentURI = $options['URIs'][$options['depth'] - 1];
		$explodedURI = explode(":", $this->currentURI);
		$this->type = $explodedURI[1];

		$constructedOptions = array(
			'currentURI' => $this->currentURI,
			'search' => $options['search'],
			'id' => $explodedURI[2],
			'originalQuery' => $options['query'],
			'query' => implode(" ⟩", $options['args'])
		);

		if($this->type == "artist") {
			$this->submenu = new DetailArtist($constructedOptions, $alfred);
		} else {
			$this->submenu = new DetailAlbum($constructedOptions, $alfred);
		}
	}

	public function output() {
		return $this->submenu->output();
	}

	// protected function contains($stack, $needle) {
	// 	return (strpos($stack, $needle) !== false);
	// }
}