<?php
App::uses('BaseCallbacksAnnotationFilter', 'Filter');

/**
 * AnnotationFilter which returns only those annotations marked as being runnable at the given stage
 *
 * @author bigl
 */
class ModelCallbacksAnnotationFilter extends BaseCallbacksAnnotationFilter {
	const STAGE_BEFORE = "beforeMethod";
}