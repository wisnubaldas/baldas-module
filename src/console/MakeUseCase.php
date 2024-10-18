<?php

namespace Wisnubaldas\BaldasModule\console;

use Illuminate\Console\Command;
use Illuminate\Contracts\Console\PromptsForMissingInput;
use Wisnubaldas\BaldasModule\modular\UseCaseClass;
// use Wisnubaldas\BaldasModule\modular\RouteConsoleClass;
class MakeUseCase extends Command implements PromptsForMissingInput
{
    use ConsoleTrait;

    protected $signature = 'make:use-case {name}';

    protected $description;
    protected $useCase;

    public function __construct(UseCaseClass $useCase)
    {

        $this->description = $this->teal('Bikin class UseCase', true);
        parent::__construct();
        $this->useCase = $useCase;
    }

    public function handle()
    {

        $name = $this->argument('name');
        $this->useCase->validateName($name);
        $this->useCase->create($name);
    }

    protected function promptForMissingArgumentsUsing(): array
    {
        return [
            'name' => 'Nama class usecase harus dibuat....!!!',
        ];
    }
}
