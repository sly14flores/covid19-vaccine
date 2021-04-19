<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Writer\IWriter;

use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class ExportRegistrations extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $template = storage_path().'/app/Registrations.xlsx';

        $spreadsheet = IOFactory::load($template);
        // $sheet = $spreadsheet->getActiveSheet();
        
        
        $filename = "Registrations_Data_".Carbon::now()->format("F_j_Y_h_i_s_A").".xlsx";
        $excel_report = storage_path()."/app/{$filename}";
        $writer = IOFactory::createWriter($spreadsheet, "Xlsx");
        $writer->save($excel_report);

        return Storage::download($filename);        
    }
}
