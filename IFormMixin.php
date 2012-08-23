<?php
/**
 * @author alari
 * @since 8/22/12 5:16 PM
 */
interface IFormMixin
{
    public function onFormInit(ExtForm $form);

    public function beforeFormEnd(ExtForm $form);

    public function formInjectInside(ExtForm $form);
}
