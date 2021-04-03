<?php

namespace App\Transformers;

/**
 * Class TeamTransformer
 *
 * @package App\Transformers
 */
class TeamTransformer extends Transformer
{
    /**
     * @param array $data
     *
     * @return array
     */
    public function transformIndex(array $data): array
    {
        return $data;
    }

    /**
     * @param array $data
     *
     * @return array
     */
    public function transformShow(array $data): array
    {
        return $data;
    }
}
