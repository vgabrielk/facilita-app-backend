<?php

namespace App\Http\Controllers\Traits;

use Illuminate\Support\Facades\Log;

trait HandlesExecution
{
    protected function handleExecution(callable $callback, string $successMessage, string|array|null $redirectRoute = null)
    {
        try {
            $result = $callback();

            if ($redirectRoute) {
                if (is_array($redirectRoute)) {
                    return redirect()->route($redirectRoute[0], $redirectRoute[1])->with('success', $successMessage);
                }
                return redirect()->route($redirectRoute)->with('success', $successMessage);
            }

            return $result ?? redirect()->back()->with('success', $successMessage);
        } catch (\Exception $e) {
            Log::error($e);
            return redirect()->back()->withInput()->with('error', 'Error: ' . $e->getMessage());
        }
    }
}
