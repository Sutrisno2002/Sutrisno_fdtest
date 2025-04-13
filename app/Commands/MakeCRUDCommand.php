<?php

namespace app\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Pluralizer;
use Illuminate\Support\Str;

class MakeCRUDCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:crud {module} {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Filesystem instance
     * @var Filesystem
     */
    protected $files;

    /**
     * Create a new command instance.
     * @param Filesystem $files
     */
    public function __construct(Filesystem $files)
    {
        parent::__construct();

        $this->files = $files;
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $paths = $this->getSourceFilePath();

        foreach (array_values($paths) as $path) {
            $this->makeDirectory(dirname($path));
        }

        $contents = $this->getSourceFiles();

        $results = [
            'created' => [],
            'failed' => [],
        ];

        foreach ($contents as $i => $content) {
            if (!$this->files->exists(array_values($paths)[$i])) {
                $this->files->put(array_values($paths)[$i], $content);

                $results['created'][] = [
                    array_keys($paths)[$i],
                    array_values($paths)[$i],
                ];
            } else {
                $results['Failed'][] = [
                    array_keys($paths)[$i],
                    'Already Exist',
                ];
            }
        }

        if (count($results['created']) > 0) {
            $this->info('========= SUCCESS =========');
            $this->table(['File', 'Info'], $results['created']);
            $this->info('========= ******* =========');
        }

        if (count($results['failed']) > 0) {
            $this->info('========= FAILED =========');
            $this->table(['File', 'Info'], $results['failed']);
            $this->info('========= ******* =========');
        }
    }

    /**
     * Return the Singular Capitalize Name
     * @param $name
     * @return string
     */
    public function getSingularClassName($name): string
    {
        return ucwords(Pluralizer::singular($name));
    }

    /**
     * Return the Plural Capitalize Name
     * @param $name
     * @return string
     */
    public function getPluralClassName($name)
    {
        return ucwords(Pluralizer::plural($name));
    }

    /**
     * Return the stub file path
     * @return array
     *
     */
    public function getStubPath()
    {
        return [
            storage_path('stubs/controller.stub'),
            storage_path('stubs/admin_view.stub'),
            storage_path('stubs/livewire/php/table.stub'),
            storage_path('stubs/livewire/view/table.stub'),
            storage_path('stubs/admin_create_view.stub'),
            storage_path('stubs/livewire/php/create.stub'),
            storage_path('stubs/livewire/view/create.stub'),
            storage_path('stubs/admin_edit_view.stub'),
            storage_path('stubs/livewire/php/edit.stub'),
            storage_path('stubs/livewire/view/edit.stub'),
            storage_path('stubs/filterable.stub'),
            storage_path('stubs/repository.stub'),
        ];
    }

    /**
     **
     * Map the stub variables present in stub to its value
     *
     * @return array
     *
     */
    public function getStubVariables()
    {
        $module = $this->getSingularClassName($this->argument('module'));
        $name = $this->getSingularClassName($this->argument('name'));
        $underscore = str_replace('-', '_', $this->livewireDirectory($name));
        $space = str_replace('-', ' ', $this->livewireDirectory($name));
        return [
            'LIVEWIRE_NAMESPACE' => 'Modules\\' . $module . '\\Http\\Livewire\\' . $name,
            'FILTERABLE_NAMESPACE' => 'Modules\\' . $module . '\\Services\\Filterables',
            'REPOSITORY_NAMESPACE' => 'Modules\\' . $module . '\\Services\\Repositories',
            'MODULE' => $module,
            'NAME' => $name,
            'CAP_NAME' => ucwords($space),
            'UNDERSCORE_NAME' => $underscore,
            'SPACE_NAME' => $space,
            'LIVEWIRE_PATH' => $this->livewireDirectory($name),
            'SLUG_MODULE' => Str::slug($module),
            'SLUG_NAME' => Str::slug($name),
        ];
    }

    /**
     * Get the stub path and the stub variables
     *
     * @return array
     *
     */
    public function getSourceFiles()
    {
        $files = [];
        foreach ($this->getStubPath() as $key => $stub) {
            array_push($files, $this->getSourceFile($stub));
        }
        return $files;
    }

    /**
     * Get the stub path and the stub variables
     *
     * @return bool|mixed|string
     *
     */
    public function getSourceFile($stub)
    {
        return $this->getStubContents($stub, $this->getStubVariables());
    }

    /**
     * Replace the stub variables(key) with the desire value
     *
     * @param $stub
     * @param array $stubVariables
     * @return bool|mixed|string
     */
    public function getStubContents($stub, $stubVariables = [])
    {
        $contents = file_get_contents($stub);

        foreach ($stubVariables as $search => $replace) {
            $contents = str_replace('$' . $search . '$', $replace, $contents);
        }

        return $contents;

    }

    /**
     * Get the full path of generate class
     *
     * @return array
     */
    public function getSourceFilePath()
    {
        $module = $this->getStubVariables()['MODULE'];
        $name = $this->getStubVariables()['NAME'];
        $livewire = $this->livewireDirectory($this->argument('name'));

        return [
            'CONTROLLER' => base_path('Modules/' . $module . '/Http/Controllers') . '/' . $name . 'Controller.php',
            'VIEW INDEX' => base_path('Modules/' . $module . '/resources/views') . '/' . $livewire . '/index.blade.php',
            'LIVEWIRE TABLE' => base_path('Modules/' . $module . '/Http/Livewire') . '/' . $name . '/Table.php',
            'LIVEWIRE TABLE VIEW' => base_path('Modules/' . $module . '/resources/views/livewire') . '/' . $livewire . '/table.blade.php',
            'VIEW CREATE' => base_path('Modules/' . $module . '/resources/views') . '/' . $livewire . '/create.blade.php',
            'LIVEWIRE CREATE' => base_path('Modules/' . $module . '/Http/Livewire') . '/' . $name . '/Create.php',
            'LIVEWIRE CREATE VIEW' => base_path('Modules/' . $module . '/resources/views/livewire') . '/' . $livewire . '/create.blade.php',
            'VIEW EDIT' => base_path('Modules/' . $module . '/resources/views') . '/' . $livewire . '/edit.blade.php',
            'LIVEWIRE EDIT' => base_path('Modules/' . $module . '/Http/Livewire') . '/' . $name . '/Edit.php',
            'LIVEWIRE EDIT VIEW' => base_path('Modules/' . $module . '/resources/views/livewire') . '/' . $livewire . '/edit.blade.php',
            'FILTERABLE' => base_path('Modules/' . $module . '/Services/Filterables/') . $name . 'Filters.php',
            'REPOSITORY' => base_path('Modules/' . $module . '/Services/Repositories/') . $name . 'Repo.php',
        ];
    }

    /**
     * Build the directory for the class if necessary.
     *
     * @param  string  $path
     * @return string
     */
    protected function makeDirectory($path)
    {
        if (!$this->files->isDirectory($path)) {
            $this->files->makeDirectory($path, 0777, true, true);
        }

        return $path;
    }

    /**
     * Generate livewire directory name
     *
     * @param  string $name
     * @return string
     */
    public function livewireDirectory(string $name): string
    {
        return strtolower(preg_replace(
            '/(?<=[a-z])([A-Z]+)/',
            '-$1',
            $name
        ));
    }

}
