<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\Dosage;
use App\Models\Province;
use App\Models\CityMun;
use App\Models\Barangay;
use App\Models\User;
use Carbon\Carbon;

class VasReportcontroller extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {

        $user_id = $request->user_id;

        $start_date = $request->start_date ?? now();
        $start_date = Carbon::parse($start_date)->format("Y-m-d");

        $end_date = $request->end_date ?? now();
        $end_date = Carbon::parse($end_date)->format("Y-m-d");

        $coverage = "";
        if (Carbon::parse($start_date)->isSameDay(Carbon::parse($end_date))) {
            $coverage = Carbon::parse($start_date)->format("F j Y");
        } else {
            $coverage = Carbon::parse($start_date)->format("F j - ");
            $coverage .= Carbon::parse($end_date)->format("F j Y");
        }

        $asof = Carbon::now()->format("F j Y His");
        $fileName = "PGLU VAS Report as of {$asof} Coverage ({$coverage}).csv";

        $dosages = Dosage::whereBetween('date_of_vaccination',[$start_date,$end_date])->get();

        $headers = [
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        ];

        $file = fopen('php://output', 'w');

        $columns = [
            "CATEGORY",
            "UNIQUE_PERSON_ID",
            "PWD",
            "Indigenous Member",
            "LAST_NAME",
            "FIRST_NAME",
            "MIDDLE_NAME",
            "SUFFIX",
            "CONTACT_NO",
            "REGION",
            "PROVINCE",
            "MUNI_CITY",
            "BARANGAY",
            "SEX",
            "BIRTHDATE",
            "DEFERRAL",
            "REASON_FOR_DEFERRAL",
            "VACCINATION_DATE",
            "VACCINE_MANUFACTURER_NAME",
            "BATCH_NO",
            "LOT_NO",
            "BAKUNA_CENTER_CBCR_ID",
            "VACCINATOR_NAME",
            "1ST_DOSE",
            "2ND_DOSE",
            "Adverse Event",
            "Adverse Event Condition",
        ];

        $props = [
            "CATEGORY" => "priority_group", # 0 registrations
            "UNIQUE_PERSON_ID" => "qr_pass_id",  # registrations
            "PWD" => "pwd_id", # registrations
            "Indigenous Member" => "indigenous_member", # registrations
            "LAST_NAME" => "last_name", # registrations
            "FIRST_NAME" => "first_name", # registrations
            "MIDDLE_NAME" => "middle_name", # registrations
            "SUFFIX" => "suffix", # registrations
            "CONTACT_NO" => "contact_no", # registrations
            "REGION" => "region", # registrations
            "PROVINCE" => "province", # registrations
            "MUNI_CITY" => "town_city", # registrations
            "BARANGAY" => "barangay", # registrations
            "SEX" => "gender", # registrations
            "BIRTHDATE" => "birthdate", # 14 registrations
            "DEFERRAL" => "reason", # 15 pre_assessments
            "REASON_FOR_DEFERRAL" => "reason", # 16 pre_assessments
            "VACCINATION_DATE" => "date_of_vaccination", # 17 dosages
            "VACCINE_MANUFACTURER_NAME" => "brand_name", # dosages
            "BATCH_NO" => "batch_number", # dosages
            "LOT_NO" => "lot_number", # dosages
            "BAKUNA_CENTER_CBCR_ID" => "",  # dosages
            "VACCINATOR_NAME" => "user_id", # dosages
            "1ST_DOSE" => "dose", # dosages
            "2ND_DOSE" => "dose", # 24 dosages
            "Adverse Event" => "",
            "Adverse Event Condition" => "",
        ];        

        $genders = [
            "01_Female" => "F",
            "02_Male" => "M",
        ];

        $callback = function() use ($columns, $props, $dosages, $genders, $user_id) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($dosages as $dosage) {

                if (is_null($dosage->user->userHospital)) {
                    continue;
                }
                $vaccinator = $dosage->user->userHospital->location;

                if (is_null($user_id)) {
                    continue;
                }
                $encoder = User::find($user_id);
                if (is_null($encoder)) {
                    continue;
                }

                if (is_null($encoder)) {
                    continue;
                }
                $encoder_hospital = $encoder->userHospital;
                if (is_null($encoder_hospital)) {
                    continue;
                }
                if ($vaccinator!=$encoder_hospital->location) {
                    continue;
                }

                $values = [];
                $i = 0;                

                foreach ($props as $p => $a) {
                    if (($i >=0 ) && ($i <= 14)) { # registrations
                        $value = $dosage->vaccine->registration->{$a};
                        if ($p=="CATEGORY") {
                            $_value = explode("_",$value);
                            $value = $_value[1];
                        }
                        if ($p=="PWD") {
                            $value = (is_null($value))?"":"Y";
                        }
                        if ($p=="Indigenous Member") {
                            $value = ($value=="No")?"":$value;
                        }
                        if ($p=="PROVINCE") {
                            $_value = explode("_",$value);
                            $code = intval($_value[1]);
                            $province = Province::where('provCode',$code)->first();
                            if (is_null($province)) {
                                $value = "";
                            } else {
                                $value = $province->psgcCode.ucwords(strtolower($province->provDesc));
                            }
                        }
                        if ($p=="MUNI_CITY") {
                            $_value = explode("_",$value);
                            $code = intval($_value[1]);
                            $cityMun = CityMun::where('citymunCode',$code)->first();
                            if (is_null($cityMun)) {
                                $value = "";
                            } else {
                                $value = $cityMun->psgcCode.ucwords(strtolower($cityMun->citymunDesc));
                            }                            
                        }
                        if ($p=="BARANGAY") {
                            $_value = explode("_",$value);
                            $code = intval($_value[1]);
                            $barangay = Barangay::where('brgyCode',$code)->first();
                            if (is_null($barangay)) {
                                $value = "";
                            } else {
                                $value = $barangay->brgyDesc;
                            }
                        }
                        if ($p=="SEX") {
                            $value = $genders[$value];
                        }
                        if ($p=="BIRTHDATE") {
                            $value = Carbon::parse($value)->format("n/d/Y");
                            // $value = date("n/d/Y",strtotime($value));
                        }
                        $values[] = $value;
                    }
                    if (($i >=15 ) && ($i <= 16)) { # pre_assessments
                        $value = $dosage->pre_assessment->{$a};
                        if ($p=="DEFERRAL") {
                            $reason = $dosage->pre_assessment->reason;
                            $value = (is_null($reason))?"N":"Y";
                        }
                        if ($p=="REASON_FOR_DEFERRAL") {
                            $value = (is_null($value))?"NONE":$value;
                        }
                        $values[] = $value;
                    }
                    if (($i >=17 ) && ($i <= 24)) { # dosaoges
                        $value = $dosage->{$a};
                        if ($p=="VACCINATION_DATE") {
                            // $value = Carbon::parse($value)->format("n/d/y");
                            $value = date("n/d/Y",strtotime($value));
                        }
                        if ($p=="VACCINE_MANUFACTURER_NAME") {
                            $value = $this->getVaccineShortName($value);
                        }
                        if ($p=="BAKUNA_CENTER_CBCR_ID") {
                            if (is_null($dosage->vaccination_facility)) {
                                $value = $dosage->cbcr_id();
                            } else {
                                $value = $dosage->cbcr->cbcr_id;
                            }
                            // $value = "cho01";
                        }
                        if ($p=="VACCINATOR_NAME") {
                            $value = $dosage->dohVaccinator();
                        }
                        if ($p=="1ST_DOSE") {
                            $dose = $dosage->dose;
                            $value = ($dose==1)?"Y":"N";
                        }
                        if ($p=="2ND_DOSE") {
                            $value = ($dose==2)?"Y":"N";
                        }
                        $values[] = $value;
                    }
                    $i++;     
                }
                $values[] = ""; # Adverse Event
                $values[] = ""; # Adverse Event Condition
                fputcsv($file, $values);
                // break;
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    public function getVaccineShortName($id)
    {
        $brands = config('constants.brands');

        $brand = collect($brands)->where('id',$id);

        return $brand->first()['shortname'];
    }
}
