<?php

namespace App\Exports\Governances;

use App\Models\Governances\Programs;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ReviewDetailsImprovementExport implements FromView
{
    protected $detrev;

    public function __construct($detrev)
    {
        $this->detrev = $detrev;
    }

    /**
     * @return \Illuminate\Support\view
     */
    public function view(): View
    {
        return view('pages.governance.review_n_improvement.exports.details', [
            'detrev' => $this->detrev,
        ]);
    }
}
