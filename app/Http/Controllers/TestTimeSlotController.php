<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;

class TestTimeSlotController extends Controller
{
    public function test()
    {
        // $period = new CarbonPeriod('03:00', '24 hours', '14:00'); // for create use 24 hours format later change format
        // $slots = [];
        // foreach($period as $item){
        //     array_push($slots,$item->format("h:i A"));
        // }

        Carbon::setWeekStartsAt(Carbon::SUNDAY);
        Carbon::setWeekEndsAt(Carbon::SATURDAY);

        $month = 3;
        // $carbon = new Carbon(new Carbon(date('Y-m-d', strtotime('next monday', strtotime('2023-' . $month . '-01'))), 'Asia/Dubai'));
        // $carbon = new Carbon(new Carbon(date('Y-m-d', strtotime('first day of this month',strtotime('2023-' . $month . '-01'))), 'Africa/Cairo'));
        $months_array = [];
        for ($i =$month ; $i <= 5 ; $i++)
        {
            $month = $i;
            $weeks_array = [];
            $carbon = new Carbon(new Carbon(date('Y-m-d', strtotime('first day of this month',strtotime('2023-' . $month . '-01'))), 'Africa/Cairo'));
            // $carbon = new Carbon(new Carbon(date('Y-m-d', strtotime('15 day',strtotime('2023-' . $month . '-01'))), 'Africa/Cairo'));
            while (intval($carbon->month) == intval($month)){
                // $week_array[$carbon->weekOfMonth][ $carbon->format('l') ] = $carbon->toDateString();
                $weeks_array[$carbon->weekOfMonth][ $carbon->format('l') ] =
                    [
                        'date' => $carbon->toDateString(),
                        'exe_ids' =>[1,2,3,4,5]
                    ];
                $carbon->addDay();
            }
            $month_name = date("F", mktime(0, 0, 0, $month, 10));
            $months_array [$month_name] = $weeks_array;
        }

        return $months_array;
    }

    public function test2()
    {
        $weeks_number = 12;
        $weeks_array = [];
        for($i =1 ; $i<= $weeks_number; $i++)
        {
            for($j =1 ; $j<= 7; $j++)
            {
                $weeks_array [$i][$j] =
                    [
                        //exe array associative array with exe_id => completed or not
                        'exe_array' =>
                            [

                                // 12 => true,
                                // 14 => false,

                            ],
                            'is_completed' => false,

                    ];
            }
        }

        return json_encode($weeks_array);
    }
}
