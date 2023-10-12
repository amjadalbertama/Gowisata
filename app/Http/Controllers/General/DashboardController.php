<?php

namespace App\Http\Controllers\General;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{
    DB,
    Auth,
};

use App\Models\{
    Log,
    KpiObjective,
    Objectegory,
    Objective,
    RiskIdentification,
    Roles,
    User,
};
use App\Models\Governances\{
    Organization,
    Kpi,
    Kpiperiod,
};
use App\Models\Control\{
    Kci,
};
use App\Models\Risks\{
    Kri,
    RiskRegisters,
    RiskRegisterAnalysis as Analysis,
    RiskRegisterTreatments as Treat
};

use App\Models\Compliance\{
    ComplianceRegister,
    TypeStatusFulfilled
};
use Psy\Readline\Hoa\Console;
use App\Library\BarCharts\MetaDashboard;


class DashboardController extends Controller
{
    public function index_dashboard()
    {
        return view('pages.general.dashboard.index');
    }
    
}
