<?php

namespace App\Console\Commands;

use App\Models\Employee;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class TestDataSelect extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:data-select';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {

        /* $employees = Employee::all();
        //var_dump($employees);
        foreach ($employees as $employee) {
            echo $employee->first_name . ' ' . $employee->id . PHP_EOL;
        } */

        /* $employees = Employee::find(2);
        echo $employees['first_name'] . ' ' . $employees['id'] . PHP_EOL; */

        /* $employees = Employee::where('first_name', '=', 'John')->orWhere('age', '>', 27)->get()//first(); */

        /* foreach ($employees as $employee) {
            echo $employee->first_name . ' ' . $employee->id . PHP_EOL;
        } */


        /* echo $employees['first_name'] . ' ' . $employees['id'] . PHP_EOL; */

        /* $employees = Employee::orderBy('age', 'ASC')->skip(2)->limit(2)->get();

        foreach ($employees as $employee) {
            echo $employee->first_name . ' ' . $employee->id .  ' ' . $employee->age .  PHP_EOL;
        } */

        /* $employees = DB::table('employees')->groupBy('first_name')->select('first_name', DB::raw('count(1) as employee_total'))->get();

        foreach ($employees as $employee) {
            echo $employee->first_name . ' ' . $employee->employee_total . PHP_EOL;
        } */

        $employees = Employee::distinct()->orderBy('first_name')->get(['first_name']);

        foreach ($employees as $employee) {
            echo $employee->first_name . PHP_EOL;
        }



        return 0;
    }
}
