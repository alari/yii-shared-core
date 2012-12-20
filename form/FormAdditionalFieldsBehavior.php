<?php
/**
 * @author alari
 * @since 8/23/12 12:27 PM
 */
class FormAdditionalFieldsBehavior extends CBehavior implements IFormMixinBehavior
{
    public function onFormInit(ExtForm $form)
    {
    }

    public function beforeFormEnd(ExtForm $form)
    {
    }

    public function formInjectInside(ExtForm $form)
    {
        if($form->model instanceof IFormAdditionalFields) {
            echo "<fieldset>";
            foreach ($form->model->additionalFields() as $k => $v) { ?>
            <div class="row">
                <?php echo $form->labelEx($form->model, Yii::t('app', $k)); ?>
                <?php echo $form->$v($form->model, $k); ?>
                <?php echo $form->error($form->model, $k); ?>
            </div>
            <? }
            echo "</fieldset>";
        }
    }
}
