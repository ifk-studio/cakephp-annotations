<?php

App::build(array(
	'Annotation' => array('%s' . 'Annotation' . DS, CakePlugin::path("Annotations") . 'Annotation' . DS),
	'Engine' => array('%s' . 'Engine' . DS, CakePlugin::path("Annotations") . 'Engine' . DS),
	'Filter' => array('%s' . 'Filter' . DS, CakePlugin::path("Annotations") . 'Filter' . DS),
	'Invoker' => array('%s' . 'Invoker' . DS, CakePlugin::path("Annotations") . 'Invoker' . DS)
), App::REGISTER);

if (!Configure::read("Annotations.default_engine")) {
	Configure::write("Annotations.default_engine", "AddendumAnnotationEngine");
}
