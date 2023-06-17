<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AppHumanResources\Attendance\Application\AttendanceService;

class AttendanceController extends Controller
{
    protected $attendanceService;

    public function __construct(AttendanceService $attendanceService)
    {
        $this->attendanceService = $attendanceService;
    }

    public function upload(Request $request)
    {
        $this->attendanceService->createAttendance($request);

        //When accessing from postman / react, uncomment this.
        return response()->json(['message' => 'Attendance uploaded successfully']);

        //When using Laravel Blade, uncomment this.
//        $attendanceInformation = $this->attendanceService->getAttendanceInformation();
//        return view('attendance', ['attendance' => $attendanceInformation->getData()]);
    }

    public function getAttendance()
    {
        $attendanceInformation = $this->attendanceService->getAttendanceInformation();

        //When accessing from postman / react, uncomment this.
        return response()->json($attendanceInformation->getData());

        //When using Laravel Blade, uncomment this.
//        return view('attendance', ['attendance' => $attendanceInformation->getData()]);
    }
}
