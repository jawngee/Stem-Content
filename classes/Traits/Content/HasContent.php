<?php

namespace ILab\StemContent\Traits\Content;

use ILab\Stem\Core\Context;
use ILab\Stem\Models\Page;
use ILab\StemContent\Models\ContentBlockContainer;

/**
 * Class HasLink
 *
 * Trait for content that has a link clone field attached to it.
 *
 * @package ILab\StemContent\Traits\Content
 */
trait HasContent {
	/**
	 * Content container
	 * @var ContentBlockContainer
	 */
	public $content = null;

	/**
	 * Builds the content for the page.
	 *
	 * @param Context $context
	 * @param Page $page
	 */
	public function buildContent(Context $context, Page $page) {
		$contentData = get_field("content", $page->id);
		$this->content = new ContentBlockContainer($context, $contentData, null, $page);
	}
}