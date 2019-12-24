<?php

namespace App\Custom\Traits;

trait Cachable {
    public function getCacheKey()
    {
        return sprintf('%s/%s-%s',
            get_class($this),
            $this->id,
            $this->updated_at->timestamp
        );
    }
}
