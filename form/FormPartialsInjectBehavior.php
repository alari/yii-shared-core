<?php
/**
 * @author alari
 * @since 8/23/12 12:15 PM
 */
class FormPartialsInjectBehavior extends CBehavior implements IFormMixinBehavior
{
    public function onFormInit(ExtForm $form)
    {
    }

    public function beforeFormEnd(ExtForm $form)
    {
    }

    public function formInjectInside(ExtForm $form)
    {
        if($form->model instanceof IFormPartialsInject) {
            echo "<fieldset>";
            foreach($form->model->formPartialsInject() as $tmpl) {
                Yii::app()->controller->renderPartial($tmpl, array(
                    "model"=>$form->model,
                    "form"=>$form
                ));
            }
            echo "</fieldset>";
        }
    }
}
