<?php
/**
 * @author alari
 * @since 8/22/12 5:00 PM
 */
class ExtForm extends CActiveForm
{
    /**
     * @var IFormMixinBehavior[]
     */
    private $formBehaviors = array();

    /**
     * @var CActiveRecord
     */
    public $model;

    public function init() {
        foreach($this->model->behaviors() as $behavior) {
            if(!($behavior instanceof IBehavior))
                $behavior = Yii::createComponent($behavior);
            if(!($behavior instanceof IFormMixinBehavior)) {
                continue;
            }
            /** @var $behavior IFormMixinBehavior */
            $this->formBehaviors[] = $behavior;
            $behavior->onFormInit($this);
        }

        parent::init();
    }

    public function inject() {
        foreach($this->formBehaviors as $behavior) {
            $behavior->formInjectInside($this);
        }
    }

    public function run() {
        foreach($this->formBehaviors as $behavior) {
            $behavior->beforeFormEnd($this);
        }
        parent::run();
    }
}
