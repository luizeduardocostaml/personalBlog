<?php

namespace App\Jobs;

use App\Log;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class CreateLog implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $object;
    private $action;
    private $object_id;
    private $user_id;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($object, $action, $object_id, $user_id)
    {
        $this->object = $object;
        $this->action = $action;
        $this->object_id = $object_id;
        $this->user_id = $user_id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $user = User::find($this->user_id);
        $description = 'O usuário ' . $user->name;

        switch($this->action){
            case 'create':
                $description .= ' criou um ';
                break;
            case 'update':
                $description .= ' atualizou um ';
                break;
            case 'delete':
                $description .= ' apagou um ';
                break;
            case 'answer':
                $description .= ' respondeu um ';
                break;
        }

        $description .= $this->object . ' com o ID ' . $this->object_id;

        Log::create(['user_id' => $this->user_id, 'description' => $description]);
    }
}
