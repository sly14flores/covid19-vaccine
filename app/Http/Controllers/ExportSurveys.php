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
        $template = storage_path().'/app/Surveys.xlsx';

        $filter = [
            "start_chart" => $request->start_date_chart,
            "end_chart" => $request->end_date_chart,
            "start" => $request->start_date,
            "end" => $request->end_date
        ];

        // $data = Summary::surveys([]);
        $data = Summary::surveys($filter);

        $spreadsheet = IOFactory::load($template);
        $sheet = $spreadsheet->getActiveSheet();
        
        $now = Carbon::now()->format('F j, Y');        
        $sheet->setCellValue('A8', "AS OF {$now}"); # Date
        $sheet->setCellValue('A12', $data['total_responses']); # Total Responses
        $sheet->setCellValue('E12', $data['male']); # Male
        $sheet->setCellValue('G12', $data['female']); # Female
        /**
         * Interested
         */
        $sheet->setCellValue('J12', $data['interested'][0]['yes_vaccine']); # Yes
        $sheet->setCellValue('L12', $data['interested'][0]['no_vaccine']); # No
        /**
         * Currently Pregnant
         */
        $sheet->setCellValue('C16', $data['current_pregnancy'][0]['yes_currently_pregnant']); # Yes
        $sheet->setCellValue('C17', $data['current_pregnancy'][0]['no_currently_pregnant']); # No
        $sheet->setCellValue('C18', $data['current_pregnancy'][0]['not_sure_currently_pregnant']); # Not Interested
        /**
         * Planning to get pregnant
         */
        $sheet->setCellValue('E17', $data['planning_pregnant'][0]['yes_pregnant_baby']); # Yes        
        $sheet->setCellValue('G17', $data['planning_pregnant'][0]['no_pregnant_baby']); # No

        /**
         * Population groups
         */
        $population_groups = [
            ["total"=>"H22","yes"=>"I22","no"=>"K22"],
            ["total"=>"H23","yes"=>"I23","no"=>"K23"],
            ["total"=>"H24","yes"=>"I24","no"=>"K24"],
            ["total"=>"H25","yes"=>"I25","no"=>"K25"],
            ["total"=>"H26","yes"=>"I26","no"=>"K26"],
            ["total"=>"H27","yes"=>"I27","no"=>"K27"],
            ["total"=>"H28","yes"=>"I28","no"=>"K28"],
            ["total"=>"H29","yes"=>"I29","no"=>"K29"],
            ["total"=>"H30","yes"=>"I30","no"=>"K30"],
            ["total"=>"H31","yes"=>"I31","no"=>"K31"],
            ["total"=>"H32","yes"=>"I32","no"=>"K32"],
            ["total"=>"H33","yes"=>"I33","no"=>"K33"],
            ["total"=>"H34","yes"=>"I34","no"=>"K34"],
            ["total"=>"H35","yes"=>"I35","no"=>"K35"],
        ];        
        foreach ($data['population_group'] as $i => $pg) {
            $sheet->setCellValue($population_groups[$i]['total'], $pg['value']);
            $sheet->setCellValue($population_groups[$i]['yes'], $pg['yes']);
            $sheet->setCellValue($population_groups[$i]['no'], $pg['no']);
        }

        /**
         * Health Conditions
         */
        $health_conditions = [
            ["cell"=>"H39"],
            ["cell"=>"H40"],
            ["cell"=>"H41"],
            ["cell"=>"H42"],
            ["cell"=>"H43"],
            ["cell"=>"H44"],
            ["cell"=>"H45"],
            ["cell"=>"H46"],
            ["cell"=>"H47"],
            ["cell"=>"H48"],
            ["cell"=>"H49"],
        ];
        foreach ($data['comorbidity'] as $i => $c) {
            $sheet->setCellValue($health_conditions[$i]['cell'], $c['value']);
        }

        /**
         * Reasons
         */
        $reasons = [
            ["cell"=>"H53"],
            ["cell"=>"H54"],
            ["cell"=>"H55"],
            ["cell"=>"H56"],
            ["cell"=>"H57"],
            ["cell"=>"H58"],
            ["cell"=>"H59"],
            ["cell"=>"H60"],
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
