<?php
/**
 * @package angi4j
 * @copyright Copyright (c)2009-2018 Nicholas K. Dionysopoulos / Akeeba Ltd
 * @author Nicholas K. Dionysopoulos - http://www.dionysopoulos.me
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL v3 or later
 */

defined('_AKEEBA') or die();

class AngieViewReplacedata extends AView
{
	public function onBeforeMain()
	{
		$this->container->application->getDocument()->addScript('platform/js/replacedata.js');

		$force = $this->input->getBool('force', false);

		/** @var AngieModelWordpressReplacedata $model */
		$model = $this->getModel();

		$this->replacements = $model->getReplacements(false, $force);
		$this->otherTables = $model->getNonCoreTables();

		return true;
	}
}
