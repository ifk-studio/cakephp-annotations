<?php
App::uses('ControllerActionAnnotationInvoker', 'Annotations.Invoker');
App::uses('ModelCallbacksAnnotationFilter', 'Annotations.Filter');

/**
 * Class AnnotatedModelWrapper
 *
 * @author bigl
 */
class AnnotatedModelWrapper {
	protected $Model;
	public $engine = null;
	private $engineInstance = null;
	public $annotationInvoker;
	public $annotationEngine;

	public function __construct($Model) {
		$this->Model = $Model;

		$this->annotationEngine = $this->getAnnotationEngine();
		$this->annotationEngine->readAnnotationsFromClass($Model);
	}

	public function __call($method, $arguments) {
		try {
			$annotations = $this->annotationEngine->annotationsForMethod($method);
			$this->annotationInvoker = new ControllerActionAnnotationInvoker($this->Model, $annotations);
			$this->runAnnotations(ModelCallbacksAnnotationFilter::STAGE_BEFORE);
		} catch (ReflectionException $e) {

		}
		return call_user_func_array(array($this->Model, $method), $arguments);
	}

	public function __set($name, $value) {
		$this->Model->{$name} = $value;
	}

	public function __get($name) {
		return $this->Model->{$name};
	}

	public function __isset($name) {
		return !empty($this->Model->{$name});
	}

	protected function getAnnotationEngine() {
		if (is_null($this->engineInstance)) {
			if (is_null($this->engine)) {
				$engine = Configure::read('Annotations.default_engine');

				App::uses($engine, 'Engine');
				$this->engineInstance = new $engine;
			} else {
				App::uses($this->engine, "Engine");
				$this->engineInstance = new $this->engine;
			}
		}
		return $this->engineInstance;
	}

	public function runAnnotations($stage) {
		$this->annotationInvoker->invokeAnnotations(new ModelCallbacksAnnotationFilter($stage));
	}
}