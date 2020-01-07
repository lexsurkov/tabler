<?php
/**
 * Created for tabler.ru.
 * @author Aleksei Surkov <lexsurkov@rambler.ru>
 */

namespace tabler\infrastructure;

use tabler\application\FieldInvalidException;
use tabler\application\FieldRequiredException;
use tabler\application\Validator;
use yii\base\Model;
use yii\validators\RequiredValidator;

class YiiValidator extends Model implements Validator
{
	
	public function handle(array $data)
	{
		if (!$this->load($data, '') || !$this->validate()) {
			$requiredValidationFields = [];
			foreach ($this->getValidators() as $validator) {
				if ($validator instanceof RequiredValidator) {
					$requiredValidationFields = array_merge($requiredValidationFields, $validator->getAttributeNames());
				}
			}
			
			$requiredFields = [];
			$resultFields = [];
			foreach ($this->getFirstErrors() as $name => $message) {
				if (\in_array($name, $requiredValidationFields)) {
					$requiredFields[] = $name;
				} else {
					$resultFields[] = $name;
				}
			}
			
			if ($requiredFields) {
				throw new FieldRequiredException($requiredFields);
			}
			
			throw new FieldInvalidException($resultFields);
		}
		
		return $this;
	}
	
}