<?php
namespace extas\components\plugins;

use extas\components\exceptions\ExceptionMissedField;
use extas\interfaces\fields\IField;
use extas\interfaces\IItem;
use extas\interfaces\stages\IStageItemInit;

/**
 * Class PluginFieldsRequired
 *
 * @method fieldsRepository()
 *
 * @package extas\components\plugins
 * @author jeyroik@gmail.com
 */
class PluginFieldsRequired extends Plugin implements IStageItemInit
{
    /**
     * @param IItem $item
     * @throws ExceptionMissedField
     */
    public function __invoke(IItem &$item): void
    {
        /**
         * @var IField[] $fields
         */
        $subject = $item->__subject();
        $fields = $this->fieldsRepository()->all([
            IField::FIELD__PARAMETERS . '.subject' => $subject,
            IField::FIELD__PARAMETERS . '.required' => true
        ]);

        foreach ($fields as $field) {
            if (!$item->has($field->getName())) {
                throw new ExceptionMissedField($field->getName());
            }
        }
    }
}
