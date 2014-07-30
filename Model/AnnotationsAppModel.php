<?php
App::uses('AnnotatedModelWrapper', 'Utility');
App::uses('Model', 'Model');

/**
 * Class AnnotationsAppModel
 *
 * @author bigl
 */
class AnnotationsAppModel extends Model {

	/**
	 * перегрузили, что бы в поведениях получить модели с аннотациями
	 *
	 * @param string $method
	 * @param array  $params
	 *
	 * @return array|mixed
	 */
	public function __call($method, $params) {
		$result = $this->Behaviors->dispatchMethod(new AnnotatedModelWrapper($this), $method, $params);
		if ($result !== array('unhandled')) {
			return $result;
		}

		return $this->getDataSource()->query($method, $params, $this);
	}
}

