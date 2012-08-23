<?php
/**
 * @author alari
 * @since 8/23/12 12:28 PM
 */
interface IFormAdditionalFields
{
    /**
     * @abstract
     * @return array fieldName => formMethod
     */
    public function additionalFields();
}
