<?php
App::uses('ControllerCallbacksAnnotationFilter', 'Filter');
App::uses('CakeAnnotation', 'Annotation');
App::uses('CallbacksFilterableAnnotation', 'Filter');

/**
 * Base class for action annotations
 *
 * @author bigl
 */
abstract class BaseAnnotation extends CakeAnnotation implements CallbacksFilterableAnnotation {
	/**
	 *
	 * @var Mixed The component lifecycle stage at which this annotation should run.
	 */
	public $stage;

	/**
	 *
	 * @param String $stage The current stage in the component lifecycle
	 *
	 * @return boolean True to have this annotation run at the given stage, false to ignore it
	 */
	public function runForStage($stage) {
		if (is_null($this->stage)) {
			return true;
		} else if (is_array($this->stage)) {
			return in_array($stage, $this->stage);
		}
		return $stage == $this->stage;
	}
}
