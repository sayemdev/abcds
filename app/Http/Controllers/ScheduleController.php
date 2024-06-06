<?php
namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Models\Employee;
use App\Models\Designation;
use App\Models\Shift;
use Carbon\Carbon;
use App\Http\Requests\StoreScheduleRequest;
use App\Http\Requests\UpdateScheduleRequest;

class ScheduleController extends Controller
{
    public function index()
    {
        $employees = Employee::where("end_date", null)->get();
        $currentDate = Carbon::today();
        $endDate = $currentDate->copy()->addDays(6); // Only include up to 7 days (current day + 6)

        $response = [];

        foreach ($employees as $employee) {
            $designation = Designation::where("id", $employee->designation)->first();
            $employee->designation = $designation->name;
            
            // Log employee details
            \Log::info("Processing employee: {$employee->id} - {$employee->name}");

            $schedules = Schedule::where('employee', $employee->id)
                ->whereBetween('date', [$currentDate, $endDate])
                ->get();

            // Log schedules for the employee
            \Log::info("Schedules for employee {$employee->id}: " . json_encode($schedules));

            $days = [];
            for ($i = 1; $i <= 7; $i++) {
                $days["day$i"] = [];
            }

            foreach ($schedules as $schedule) {
                $shift = Shift::where("id", $schedule->shift_id)->first();

                $formattedShiftTimes = $this->formatShiftTimes($shift);

                // Calculate time difference
                $startTime = Carbon::createFromFormat('H:i:s', $shift->start);
                $endTime = Carbon::createFromFormat('H:i:s', $shift->end);
                $timeDifference = $startTime->diff($endTime)->format('%H hrs %I mins');

                $scheduleShift = "{$formattedShiftTimes['start']} - {$formattedShiftTimes['end']} ($timeDifference) - {$employee->designation}";

                $dayIndex = 'day' . (Carbon::parse($currentDate)->diffInDays($schedule->date) + 1);

                // Ensure the dayIndex is within the desired range
                if (array_key_exists($dayIndex, $days)) {
                    $daysOfWeek = $this->formatDaysOfWeek($shift->days); // Directly use the array

                    $days[$dayIndex][] = [
                        'scheduleShift' => $scheduleShift,
                        'employeeName' => $employee->name,
                        'date' => $schedule->date,
                        'shift' => $shift->name,
                        'shift_id' => $shift->id,
                        'minStartTime' => $formattedShiftTimes['min_start'],
                        'startTime' => $formattedShiftTimes['start'],
                        'maxStartTime' => $formattedShiftTimes['max_start'],
                        'minEndTime' => $formattedShiftTimes['min_end'],
                        'endTime' => $formattedShiftTimes['end'],
                        'maxEndTime' => $formattedShiftTimes['max_end'],
                        'breakTime' => '45',
                        'endOn' => '2024-05-04',
                        'recuterShift' => true,
                    ] + $daysOfWeek;
                }
            }

            $response[] = [
                'id' => $employee->id,
                'name' => $employee->name,
                'image' => $employee->profile,
                'designation' => $employee->designation,
                'scheduleCount' => count($schedules) // Include schedule count
            ] + $days;
        }

        return response()->json($response);
    }

    public function store(StoreScheduleRequest $request)
    {
        // Get validated data from the request
        $validatedData = $request->validated();

        // Check if there's an existing schedule for the employee on the specified date
        $existingSchedule = Schedule::where('employee', $validatedData['employee'])
            ->where('date', $validatedData['date'])
            ->first();

        // If an existing schedule is found, update it
        if ($existingSchedule) {
            $existingSchedule->update($validatedData);
            return response()->json($existingSchedule, 200);
        }

        // If no existing schedule is found, create a new one
        $schedule = Schedule::create($validatedData);
        return response()->json($schedule, 201);
    }

    public function show(Schedule $schedule)
    {
        $schedule->load('shift'); // Eager load the shift relationship

        // Retrieve employee details based on IDs stored in the employees field
        $employeeIds = $schedule->employees;
        $employees = Employee::whereIn('id', $employeeIds)->get();

        // Optionally, you can modify the employees array to include additional details
        $employeesFormatted = $employees->map(function ($employee) {
            return [
                'id' => $employee->id,
                'name' => $employee->name,
                'designation_id' => $employee->designation,
                'designation' => Designation::where('id', $employee->designation)->first()->name
            ];
        });

        return response()->json([
            'id' => $schedule->id,
            'employees' => $employeesFormatted,
            'date' => $schedule->shift_id,
            'shift_id' => $schedule->date,
            'shift_details' => $schedule->shift, // Include details of the shift
            'accept_extra_hours' => $schedule->accept_extra_hours,
            'status' => $schedule->status,
            'created_at' => $schedule->created_at,
            'updated_at' => $schedule->updated_at,
        ]);
    }

    public function update(UpdateScheduleRequest $request, Schedule $schedule)
    {
        $schedule->update($request->validated());
        return response()->json($schedule, 200);
    }

    public function destroy(Schedule $schedule)
    {
        $schedule->delete();
        return response()->json(null, 204);
    }

    private function formatShiftTimes($shift)
    {
        $formattedTimes = [];
        $timeFields = ['min_start', 'start', 'max_start', 'min_end', 'end', 'max_end'];

        foreach ($timeFields as $field) {
            $formattedTimes[$field] = Carbon::createFromFormat('H:i:s', $shift->$field)->format('g:i A');
        }

        return $formattedTimes;
    }

    private function formatDaysOfWeek($days)
    {
        $dayMap = [
            'monday' => 'M',
            'tuesday' => 'T',
            'wednesday' => 'W',
            'thursday' => 'TT',
            'friday' => 'F',
            'saturday' => 'S',
            'sunday' => 'SS'
        ];

        $formattedDays = [
            'M' => false,
            'T' => false,
            'W' => false,
            'TT' => false,
            'F' => false,
            'S' => false,
            'SS' => false
        ];

        foreach ($days as $day) {
            $key = $dayMap[strtolower($day)];
            $formattedDays[$key] = true;
        }

        return $formattedDays;
    }
}

