<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Services\PerformanceService;
use App\Services\RefactorService;

class ModernPHPController extends Controller
{
    public function __construct(
        PerformanceService $performanceService,
        RefactorService $refactorService
    ) {
        $this->performanceService = $performanceService;
        $this->refactorService = $refactorService;
    }

    public function index(Request $request)
    {
        //
    }

    public function showPerformance(Request $request, string $type)
    {
        switch ($type) {
            case 'loop':
                $this->performanceService->normalLoop();
                break;
            case 'yield':
                $this->performanceService->yieldTest();
                break;
            default:
                dump('lol');
                break;
        }
    }

    public function showRefactor(Request $request, string $type)
    {
        switch ($type) {
            case 'list':
                RefactorService::listMultipleResult();
                break;

            default:
                dump('hi');
                break;
        }
    }
}
