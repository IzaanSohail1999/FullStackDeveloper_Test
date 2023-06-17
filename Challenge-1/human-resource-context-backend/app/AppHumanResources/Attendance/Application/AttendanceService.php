<?php


namespace App\AppHumanResources\Attendance\Application;

use App\AppHumanResources\Attendance\Domain\Attendance;
use App\Models\Employees;
use App\Models\Schedules;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class AttendanceService
{
    public function createAttendance(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);

        $file = $request->file('file');
        $data = Excel::toArray([], $file);
        $rows = $data[0];
        $rows = array_slice($rows, 1);

        DB::beginTransaction();

        $attendanceData = [];
        foreach ($rows as $row) {
            $employeeId = $row[0];
            $scheduleId = $row[1];
            $present = $row[2];
            $numericDate = $row[5];
            $date = Carbon::today()->addDays($numericDate - 1)->format('Y-m-d');

            $employee = Employees::find($employeeId);
            $schedule = Schedules::find($scheduleId);

            if (!$employee || !$schedule) {
                DB::rollBack();
                throw new \Exception("Employee with ID $employeeId or Schedule with ID $scheduleId does not exist");
            }

            $attendanceData[] = [
                'employee_id' => $employeeId,
                'schedule_id' => $scheduleId,
                'present' => $present,
                'date' => $date,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        // Insert the attendance records in a batch
        Attendance::insert($attendanceData);

        // Commit the transaction
        DB::commit();
        return response()->json(['message' => 'Attendance uploaded successfully']);
    }


    public function getAttendanceInformation()
    {
        $employees = Employees::all();
        $attendanceData = [];

        foreach ($employees as $employee) {
            $employeeId = $employee->id;
            $attendance = Attendance::with(['schedule.shift'])
                ->where('employee_id', $employeeId)
                ->where('present', 1) // Only consider attendance where present = 1
                ->get();

            $totalWorkingHours = $attendance->sum(function ($record) {
                return $record->schedule->shift->duration;
            });

            $attendanceData[] = [
                'employee_id' => $employee->id,
                'employee_name' => $employee->name,
                'attendance' => $attendance,
                'total_working_hours' => $totalWorkingHours,
            ];
        }

        return response()->json($attendanceData);
    }


}

