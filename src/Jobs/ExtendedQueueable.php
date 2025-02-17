<?php

namespace Nikazooz\Simplesheet\Jobs;

use Illuminate\Bus\Queueable;

trait ExtendedQueueable
{
    use Queueable {
        chain as originalChain;
    }

    /**
     * @param  mixed  $chain
     * @return $this
     */
    public function chain($chain)
    {
        collect($chain)->each(function ($job) {
            $this->chained[] = serialize($job);
        });

        return $this;
    }
}
