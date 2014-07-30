<?php
App::uses('AnnotationFilter', 'Filter');
App::uses('CallbacksFilterableAnnotation', 'Filter');

/**
 * AnnotationFilter which returns only those annotations marked as being runnable at the given stage
 *
 * @author bigl
 */
class BaseCallbacksAnnotationFilter implements AnnotationFilter {
	const STAGE_BEFORE = "beforeMethod";

	protected $stage;

	/**
	 *
	 * @param type $stage The stage which all returned annotations must have
	 */
	public function __construct($stage = self::STAGE_INITIALIZE) {
		$this->stage = $stage;
	}

	/**
	 * Returns only those annotations marked as enabled for this stage
	 *
	 * @param array $annotations of ComponentCallbacksFilterableAnnotation
	 */
	public function apply($annotations) {
		$passed = array();
		foreach ($annotations as $annotation) {
			if ($annotation instanceof CallbacksFilterableAnnotation && $annotation->runForStage($this->stage)) {
				$passed[] = $annotation;
			}
		}
		return $passed;
	}
}