<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class CreateFolderStructure extends Command
{
    protected $signature = 'folders:create';
    protected $description = 'Create folder structure in public/uploads/article';

    public function handle()
    {
        $paths = [
            public_path('uploads/articles'),
            public_path('uploads/articles/large'),
            public_path('uploads/articles/small'),
            public_path('uploads/projects'),
            public_path('uploads/projects/large'),
            public_path('uploads/projects/small'),
            public_path('uploads/services'),
            public_path('uploads/services/large'),
            public_path('uploads/services/small'),
            public_path('uploads/testimonials'),
            public_path('uploads/testimonials/large'),
            public_path('uploads/testimonials/small'),
            public_path('uploads/members'),
            public_path('uploads/members/large'),
            public_path('uploads/members/small'),
            public_path('uploads/temp'),
            public_path('uploads/temp/thumb'),
        ];

        foreach ($paths as $path) {
            if (!File::isDirectory($path)) {
                File::makeDirectory($path, 0755, true);
                $this->info("Created: {$path}");
            } else {
                $this->warn("Directory already exists: {$path}");
            }
        }

        $this->info('Folder structure created successfully!');
    }
}
