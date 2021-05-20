<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;

use App\Models\Registration;
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

        $file = "Registrations.xlsx";
        $file_path = storage_path()."/app/{$file}";

        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        // $reader->setLoadSheetsOnly(["Eligible Population"]);
        $spreadsheet = $reader->load($file_path);
        $worksheet = $spreadsheet->getSheetByName('Eligible Population');

        // $cells = [
        //     'priority_group' => 'A',
        //     'sub_priority_group' => 'B',
        //     'last_name' => 'C',
        //     'first_name' => 'D',
        //     'middle_name' => 'E',
        //     'suffix' => 'F',
        //     'contact_no' => 'G',
        //     'region' => 'H',
        //     'province' => 'I',
        //     'town_city' => 'J',
        //     'barangay' => 'K',
        //     'gender' => 'L',
        //     'birthdate' => 'M',
        //     'occupation' => 'N',
        //     'allergic_to_vaccines' => 'O',
        //     'with_comorbidity' => 'P',
        // ];

        $cells = [
            'qr_pass_id' => 'A',
            'priority_group' => 'B',
            'sub_priority_group' => 'C',
            'last_name' => 'D',
            'first_name' => 'E',
            'middle_name' => 'F',
            'suffix' => 'G',
            'contact_no' => 'H',
            'region' => 'I',
            'province' => 'J',
            'town_city' => 'K',
            'barangay' => 'L',
            'gender' => 'M',
            'birthdate' => 'N',
            'occupation' => 'O',
            'allergic_to_vaccines' => 'P',
            'with_comorbidity' => 'Q',
        ];        

        /**
         * Populate cells
         */
        $registrations = Registration::all();

        $i = 2;
        foreach ($registrations->toArray() as $registration) {
            // if ($i==10) break;
            foreach (array_keys($cells) as $key) {
                if ($key=='birthdate') {
                    $worksheet->setCellValue("{$cells[$key]}{$i}", Carbon::parse($registration[$key])->format('m/d/Y'));
                } else {
                    $worksheet->setCellValue("{$cells[$key]}{$i}", $registration[$key]);
                }
                $worksheet->getStyle("{$cells[$key]}{$i}")->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                $worksheet->getStyle("{$cells[$key]}{$i}")->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                $worksheet->getStyle("{$cells[$key]}{$i}")->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                $worksheet->getStyle("{$cells[$key]}{$i}")->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
            }
            $i++;
        }


        $filename = "Registrations_Data_".Carbon::now()->format("F_j_Y_h_i_s_A").".xlsx";
        $excel_report = storage_path()."/app/{$filename}";
        $writer = IOFactory::createWriter($spreadsheet, "Xlsx");
        $writer->save($excel_report);
        
        return Storage::download($filename);    

    }
}
