<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Nwidart\Modules\Facades\Module;

class ModuleController extends Controller
{
	public function enable(Request $request): JsonResponse
	{
		$moduleName = $request->input('module');
		$module = Module::find($moduleName);

		if ($module) {
			$module->enable();
			return response()->json(['message' => "Module {$moduleName} has been enabled."], 200);
		} else {
			return response()->json(['message' => "Module {$moduleName} not found."], 404);
		}
	}

	public function disable(Request $request): JsonResponse
	{
		$moduleName = $request->input('module');
		$module = Module::find($moduleName);

		if ($module) {
			$module->disable();
			return response()->json(['message' => "Module {$moduleName} has been disabled."], 200);
		} else {
			return response()->json(['message' => "Module {$moduleName} not found."], 404);
		}
	}
}
