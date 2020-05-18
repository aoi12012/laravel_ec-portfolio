<?php

namespace App\Services;

use App\Models\Sequence;

class SequenceService
{
    public function getNewItemId()
    {
        return $this->getNewValueAndCommit('item_id');
    }

    protected function getNewValueAndCommit(string $key)
    {
        $default = config("sequence.default.$key", 1);

        $sequence = Sequence::lockForUpdate()->find($key);
        if (!$sequence)
        {
            $sequence = new Sequence;
            $sequence->key = $key;
        }

        if (($sequence->sequence ?? 0) < $default)
        {
            $sequence->sequence = $default;
        } else {
            $sequence->sequence = ($sequence->sequence ?? 0) + 1;
        }
        $sequence->save();
        return $sequence->sequence;
    }
}
