<?php
App::uses('ClassRegistry', 'Utility');
App::uses('AnnotatedModelWrapper', 'Annotations.Utility');

/**
 * Замена для ClassRegistry
 *
 * Class CR
 *
 * @author bigl
 */
class CR extends ClassRegistry {

	public static function init($class, $strict = false) {
		return new AnnotatedModelWrapper(parent::init($class, $strict));
	}
}

