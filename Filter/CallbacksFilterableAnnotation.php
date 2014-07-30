<?php

/**
 * Required methods for a stage-filterable annotation
 *
 * @author kevbry
 */
interface CallbacksFilterableAnnotation {
	public function runForStage($stage);
}
