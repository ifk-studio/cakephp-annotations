<?php
App::uses('ModelCallbacksAnnotationFilter', 'Filter');
App::uses('BaseAnnotation', 'Annotation');
App::uses('CallbacksFilterableAnnotation', 'Filter');

/**
 * Base class for Controller action annotations
 *
 * @author kevbry
 */
abstract class ModelMethodAnnotation extends BaseAnnotation implements CallbacksFilterableAnnotation {
	/**
	 *
	 * @var Mixed The component lifecycle stage at which this annotation should run. By default, only at initialize (pre-beforeFilter). May be single or array of stages.
	 */
	public $stage = ModelCallbacksAnnotationFilter::STAGE_BEFORE;

	/**
	 * Called to run this annotation on an action ($Model->method)
	 * on the given controller
	 */
	abstract public function invoke(Model $Model);
}
