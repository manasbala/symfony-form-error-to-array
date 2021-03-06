<?php

/**
 * Created by PhpStorm.
 * User: manas.du@gmail.com
 * Date: 2/5/17
 * Time: 10:41 AM
 */

namespace MB\SymfonyFormErrorToArrayBundle\Service;

use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Form;

class FormErrorToArray
{
    public function transform(Form $form)
    {
        $fields = $this->getFormFields($form);

        foreach ($fields as $name => $val) {
            $error = (string) $form[$name]->getErrors();
            if (!empty($error)) {
                $fields[$name] = $error;
            }
        }

        return $fields;
    }

    public function getFormFields(Form $form)
    {
        $formFields = array();

        /** @var Form $item */
        foreach ($form->all() as $item) {
            $formFields[$item->getName()] = '';
        }

        return $formFields;
    }
}