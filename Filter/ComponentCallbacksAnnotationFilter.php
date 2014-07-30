<?php
App::uses('BaseCallbacksAnnotationFilter', 'Filter');

/**
 * AnnotationFilter which returns only those annotations marked as being runnable at the given stage
 *
 * @author kevbry
 */
class ComponentCallbacksAnnotationFilter extends BaseCallbacksAnnotationFilter {
	const STAGE_INITIALIZE = "initialize";
	const STAGE_STARTUP = "startup";
	const STAGE_BEFORERENDER = "beforeRender";
	const STAGE_SHUTDOWN = "shutdown";
	const STAGE_BEFOREREDIRECT = "beforeRedirect";
}

