<?php

namespace App\Traits;

use App\Exceptions\RowAlreadyExistsException;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;

trait HandlesUniqueConstraint
{
    /**
     * Tenta criar um novo registro e, em caso de violação de unicidade, restaura um registro soft-deleted.
     *
     * @param array $fields
     * @param Model $model
     * @return Model
     * @throws \Exception
     */
    public function createOrRestore(array $fields, Model $model)
    {
        try {
            return $model::create($fields);
        } catch (QueryException $e) {
            if ($this->isUniqueConstraintViolation($e)) {
                return $this->restoreSoftDeletedRecord($fields, $model);
            } else {
                throw $e;
            }
        }
    }

    /**
     * Verifica se a exceção é de violação de restrição de unicidade.
     *
     * @param QueryException $e
     * @return bool
     */
    private function isUniqueConstraintViolation(QueryException $e)
    {
        return str_contains(
            $e->getMessage(), 'unique constraint') || 
            str_contains($e->getMessage(), 'SQLSTATE[23000]'
        );
    }

    /**
     * Restaura um registro soft-deleted com base nos campos fornecidos.
     *
     * @param array $fields
     * @param Model $model
     * @return Model
     * @throws \Exception
     */
    private function restoreSoftDeletedRecord(array $fields, Model $model)
    {
        $existingRecord = $model::onlyTrashed()
            ->where(array_intersect_key($fields, array_flip($model->getFillable())))
            ->first();
        
        if ($existingRecord) {
            $existingRecord->restore();
            return $existingRecord;
        }
       

        throw new RowAlreadyExistsException;
    }
}
