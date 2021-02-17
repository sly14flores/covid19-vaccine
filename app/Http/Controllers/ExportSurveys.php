<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Writer\IWriter;

use Illuminate\Support\Facades\Storage;
use App\Traits\Summary;
use Carbon\Carbon;

class ExportSurveys extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $template = storage_path().'/Surveys.xlsx';
        $data = Summary::surveys([]);   

        $spreadsheet = IOFactory::load($template);
        $sheet = $spreadsheet->getActiveSheet();
        
        $now = Carbon::now()->format('F j, Y');        
        $sheet->setCellValue('A3', "AS OF {$now}"); # Date
        $sheet->setCellValue('A6', $data['total_responses']); # Total Responses
        $sheet->setCellValue('E6', $data['male']); # Male
        $sheet->setCellValue('G6', $data['female']); # Female
        /**
         * Interested
         */
        $sheet->setCellValue('J6', $data['interested'][0]['yes_vaccine']); # Yes
        $sheet->setCellValue('L6', $data['interested'][0]['no_vaccine']); # No
        /**
         * Currently Pregnant
         */
        $sheet->setCellValue('J12', $data['current_pregnancy'][0]['yes_currently_pregnant']); # Yes
        $sheet->setCellValue('L12', $data['current_pregnancy'][0]['no_currently_pregnant']); # No
        $sheet->setCellValue('N12', $data['current_pregnancy'][0]['not_sure_currently_pregnant']); # Not Interested
        /**
         * Planning to get pregnant
         */
        $sheet->setCellValue('J16', $data['planning_pregnant'][0]['yes_pregnant_baby']); # Yes        
        $sheet->setCellValue('M16', $data['planning_pregnant'][0]['no_pregnant_baby']); # No

        /**
         * Population groups
         */
        $population_groups = [
            ["cell"=>"H11"],
            ["cell"=>"H12"],
            ["cell"=>"H13"],
            ["cell"=>"H14"],
            ["cell"=>"H15"],
            ["cell"=>"H16"],
            ["cell"=>"H17"],
            ["cell"=>"H18"],
            ["cell"=>"H19"],
            ["cell"=>"H20"],
            ["cell"=>"H21"],
            ["cell"=>"H22"],
            ["cell"=>"H23"],
            ["cell"=>"H24"],
        ];        
        foreach ($data['population_group'] as $i => $pg) {
            $sheet->setCellValue($population_groups[$i]['cell'], $pg['value']);
        }

        /**
         * Health Conditions
         */
        $health_conditions = [
            ["cell"=>"H28"],
            ["cell"=>"H29"],
            ["cell"=>"H30"],
            ["cell"=>"H31"],
            ["cell"=>"H32"],
            ["cell"=>"H33"],
            ["cell"=>"H34"],
            ["cell"=>"H35"],
            ["cell"=>"H36"],
            ["cell"=>"H37"],
            ["cell"=>"H38"],
        ];
        foreach ($data['comorbidity'] as $i => $c) {
            $sheet->setCellValue($health_conditions[$i]['cell'], $c['value']);
        }

        /**
         * Reasons
         */
        $reasons = [
            ["cell"=>"H42"],
            ["cell"=>"H43"],
            ["cell"=>"H44"],
            ["cell"=>"H45"],
            ["cell"=>"H46"],
            ["cell"=>"H47"],
            ["cell"=>"H48"],
            ["cell"=>"H49"],
        ];
        foreach ($data['reason'] as $i => $r) {
            $sheet->setCellValue($reasons[$i]['cell'], $r['value']);
        }        

        $filename = "Surveys_Data_".Carbon::now()->format("F_j_Y_h_i_s_A").".xlsx";
        $excel_report = storage_path()."/app/{$filename}";
        $writer = IOFactory::createWriter($spreadsheet, "Xlsx");
        $writer->save($excel_report);

        return Storage::download($filename);

    }
}
