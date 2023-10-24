<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class TestJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private string $datetimeRun;
    /**
     * Create a new job instance.
     */
    public function __construct(string $datetimeRun)
    {
        $this->datetimeRun = $datetimeRun;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
      file_put_contents('/tmp/jobs.test'
        , __CLASS__ . " " . $this->datetimeRun . " " data('Y-m-d H:i:s') . PHP_EOL
        , FILE_APPEND);
    }
}
