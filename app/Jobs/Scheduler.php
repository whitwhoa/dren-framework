<?php

namespace App\Jobs;

use Dren\Jobs\JobScheduler;

class Scheduler extends JobScheduler
{
    public function schedule(): void
    {

// Add a single job		
//        $this->addJob('* * * * *', 'TestJob', ['TestJob Data One', 'TestJob Data Two']);

// Add an aggregate of jobs. Preceeding job must have completed successfully for job to execute.
//        $this->addAggregateJob('* * * * *', [
//            [
//                'TestJob',
//                ['TestJob Data One', 'TestJob Data Two']
//            ],
//            [
//                'TestJob2',
//                ['TestJob2 Data One', 'TestJob2 Data Two']
//            ]
//        ]);

    }
}