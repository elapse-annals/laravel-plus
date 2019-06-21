<?php

namespace App\Transformers;

/**
 * Class TempTransformer
 *
 * @package App\Transformers
 */
class TempTransformer extends Transformer
{
    /**
     * @param $data
     *
     * @return mixed
     */
    public function transformIndex($data)
    {
        return $data;
    }

    /**
     *
     */
    public function show()
    {
    }

    /**
     *
     */
    public function edit()
    {
    }
}
