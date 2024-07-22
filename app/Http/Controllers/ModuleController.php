<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Nwidart\Modules\Facades\Module;

class ModuleController extends Controller
{
	/**
	 * Enable the specified module.
	 *
	 * @param Request $request
	 * @return JsonResponse
	 */
	public function enable(Request $request): \Illuminate\Http\JsonResponse
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

	/**
	 * Disable the specified module.
	 *
	 * @param Request $request
	 * @return JsonResponse
	 */
	public function disable(Request $request): \Illuminate\Http\JsonResponse
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
