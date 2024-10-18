<?php
namespace Wisnubaldas\BaldasModule\modular;

use function Laravel\Prompts\clear;
use function Laravel\Prompts\confirm;
use function Laravel\Prompts\select;
use function Laravel\Prompts\info;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

final class UseCaseClass extends MainConsole implements UseCaseInterface
{

	public function __construct()
	{
		parent::__construct();
	}
	public function create($name)
	{
		$nsUseCase = $this->ns_cls($name, 'App\UseCase');
		$stb = $this->stubFile('use-case');
		$strClass = $this->replace_content_stub($stb, $nsUseCase);
		$stbI = $this->stubFile('use-case-interface');
		$strInterface = $this->replace_content_stub($stbI, $nsUseCase);
		$fileName = [
			'class_file'=>$nsUseCase['class'].'UseCase',
			'interface_file'=>$nsUseCase['class'].'UseCaseInterface'
		];
		$this->save_file($strClass,$nsUseCase,$fileName['class_file']);
		$this->save_file($strInterface,$nsUseCase,$fileName['interface_file']);
		$confirm = confirm('Mau di injek ngga ke service provider ??');
		if($confirm){
			$bindContent = [
				'interface'=>$nsUseCase['namespace'].DIRECTORY_SEPARATOR.$fileName['interface_file'].'::class',
				'class'=>$nsUseCase['namespace'].DIRECTORY_SEPARATOR.$fileName['class_file'].'::class'
			];
			$this->binding($bindContent);
			info('Sukses binding ke repository provider');
		}
	}
}