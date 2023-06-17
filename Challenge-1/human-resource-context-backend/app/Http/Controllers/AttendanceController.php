<?php

namespace App\Http\Controllers;

use App\AppHumanResources\Attendance\Application\AttendanceService;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    protected $attendanceService;

    public function __construct(AttendanceService $attendanceService)
    {
        $this->attendanceService = $attendanceService;
    }

    /**
     * Upload attendance data from a file.
     *
     * @param Request $request
     */
    public function upload(Request $request)
    {
        $this->attendanceService->createAttendance($request);

        //When accessing from postman / react, uncomment this.
        return response()->json(['message' => 'Attendance uploaded successfully']);

        //When using Laravel Blade, uncomment this.
//        $attendanceInformation = $this->attendanceService->getAttendanceInformation();
//        return view('attendance', ['attendance' => $attendanceInformation->getData()]);
    }

    /**
     * Get attendance information.
     */
    public function getAttendance()
    {
        $attendanceInformation = $this->attendanceService->getAttendanceInformation();

        //When accessing from postman / react, uncomment this.
        return response()->json($attendanceInformation->getData());

        //When using Laravel Blade, uncomment this.
//        return view('attendance', ['attendance' => $attendanceInformation->getData()]);
    }
}
