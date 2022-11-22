<?php

class DomDocumentParser {

//store the HTML of the sites that we visit
	private $doc;

	public function __construct($url) {

//array specifing the method and user agent crawler
		$options = array(
			'http'=>array('method'=>"GET", 'header'=>"User-Agent: marleneBot/0.1\n")
			);
//create the stream context used to get the data

		$context = stream_context_create($options);

//create an instance of the dom document class

		$this->doc = new DomDocument();

//load url HTML into the doc variable
		@$this->doc->loadHTML(file_get_contents($url, false, $context));
	}
// return the a elements
	public function getlinks() {
		return $this->doc->getElementsByTagName("a");
	}
//return the title elements
	public function getTitleTags() {
		return $this->doc->getElementsByTagName("title");
	}
//return the metatags
	public function getMetaTags() {
		return $this->doc->getElementsByTagName("meta");
	}
//return the images
	public function getImages() {
		return $this->doc->getElementsByTagName("img");
	}
}
?>