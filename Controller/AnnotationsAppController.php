<?php
App::uses('CR', 'Utility');
App::uses('Controller', 'Controller');

/**
 * Class AnnotationsAppController
 *
 * @author bigl
 *
 */
class AnnotationsAppController extends Controller {
	/**
	 * загрузка моделей с аннотациями
	 *
	 * @param null $modelClass
	 * @param null $id
	 *
	 * @return bool
	 * @throws MissingModelException
	 */
	public function loadModel($modelClass = null, $id = null) {
		if ($modelClass === null) {
			$modelClass = $this->modelClass;
		}

		$this->uses = ($this->uses) ? (array)$this->uses : array();
		if (!in_array($modelClass, $this->uses, true)) {
			$this->uses[] = $modelClass;
		}

		list($plugin, $modelClass) = pluginSplit($modelClass, true);

		$this->{$modelClass} = CR::init(array(
			'class' => $plugin . $modelClass, 'alias' => $modelClass, 'id' => $id
		));
		if (!$this->{$modelClass}) {
			throw new MissingModelException($modelClass);
		}
		return true;
	}
}
