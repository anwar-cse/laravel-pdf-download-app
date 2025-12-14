<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class SlipController extends Controller
{
    public function show()
    {
        $data = $this->mockData();
        return view('slip', $data);
    }

    public function downloadPdf()
    {
        $data = $this->mockData();

        $pdf = Pdf::loadView('slip_pdf', $data)
            ->setPaper('a4', 'portrait')
            ->setOptions([
                'isHtml5ParserEnabled' => true,
                'isRemoteEnabled' => true,
                'defaultFont' => 'DejaVu Sans',
            ]);

        return $pdf->download('acknowledgement-slip.pdf');
    }

    private function mockData(): array
    {
        return [
            'unit' => 'A',
            'gst_roll' => '100002',
            'candidate' => [
                'name' => 'SUMAIYA RAHMAN OISHY',
                'father' => 'MD. MAHFUZUR RAHMAN',
                'mother' => 'PARVIN RAHMAN',
                'quota' => 'FFQ-GC',
                'last_modified' => '2022-09-06 01:55:49',
            ],
            'fees' => [
                ['status' => 'Pending', 'bill_no' => '1000023', 'amount' => 500],
                ['status' => 'Paid',    'bill_no' => '1000022', 'amount' => 1000],
            ],
            'subject_choices' => [
                ['subject' => 'Mathematics', 'choice' => 1],
                ['subject' => 'Management', 'choice' => 4],
                ['subject' => 'Social Work', 'choice' => 6],
                ['subject' => 'Fisheries', 'choice' => 5],
                ['subject' => 'Computer Science and Engineering', 'choice' => 2],
                ['subject' => 'Electrical and Electronics Engineering', 'choice' => 3],
            ],

            // Image path for PDF (IMPORTANT)
            'photo_path' => public_path('images/photo.jpg'),
        ];
    }
}
