<?php

namespace App\Console\Commands;

use App\Room;
use Illuminate\Console\Command;

class RoomCreate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'room:create {name : number or the name of the room} {address}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a room';

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
     * @return int
     */
    public function handle()
    {
        $name = $this->argument('name');
        $address = $this->argument('address');

        $room = Room::create(compact('name', 'address'));
        $this->info($room->code.';'.$room->name.';'.$room->address);
        $this->info(route('room.poster', $room));
        return 0;
    }
}
