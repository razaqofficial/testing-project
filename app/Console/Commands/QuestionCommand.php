<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class QuestionCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'question';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'A simple command for test';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $name = $this->ask('What is your name?');

        $language = $this->choice('Your favorite programming language?',[
            'PHP',
            'Go',
            'Python',
            'Javascript',
            'Ruby'
        ]);
        if ($this->confirm('Are you satisfied with your answers?')) {
            $this->line("Your name is {$name} and your favorite programming language is {$language}");
        } else {
            $this->line('You can run the question command to begin');
        }

    }
}
