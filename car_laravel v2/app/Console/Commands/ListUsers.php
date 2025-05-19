<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class ListUsers extends Command
{
    protected $signature = 'users:list';
    protected $description = 'List all users with their details';

    public function handle()
    {
        $users = User::all();
        
        $headers = ['ID', 'Name', 'Email', 'Role', 'Password Hash', 'Created At'];
        
        $data = $users->map(function ($user) {
            return [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'role' => $user->role ?? 'user',
                'password' => $user->password,
                'created_at' => $user->created_at->format('Y-m-d H:i:s')
            ];
        })->toArray();

        $this->table($headers, $data);
        
        $this->info("\nTotal users: " . $users->count());
    }
}
