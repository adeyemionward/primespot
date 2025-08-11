<?php
namespace App\Traits;

use App\Models\JobOrder;
use App\Models\JobPaymentNewHistory;
use App\Models\Expense;
use App\Models\JobOrderUnique;
use Illuminate\Http\Request;

trait FilterOrdersByDateTrait
{
    public function filterOrdersByDate(Request $request = null){
        $startDate  = request('date_from');
        $endDate    = request('date_to');
        $location   = request('location');
        $marketer   = request('marketer');
        $customer   = request('customer');

        //Start building the query
        $query = JobOrderUnique::query();

        // Apply date range filter if both dates are provided
        if (!empty($startDate) && !empty($endDate)) {
            $query->whereBetween('order_date', [$startDate, $endDate]);
        }

        // Apply location filter if provided
        if (!empty($location)) {
            $query->where('job_location_id', $location);
        }

        // Apply location filter if provided
        if (!empty($marketer)) {
            $query->where('marketer_id', $marketer);
        }

        // Apply customer filter if provided
        if (!empty($customer)) {
            $query->where('user_id', $customer);
        }

        // Execute the query and get the results
        $data = $query;
        // $data = $query->get();
        // dd( $data);
        return $data;
    }

    public function filterFinanceByDate(Request $request = null){
        $startDate  = request('date_from');
        $endDate    = request('date_to');
        $customer   = request('customer');

        //Start building the query
        $query = JobOrderUnique::query();

        // Apply date range filter if both dates are provided
        if (!empty($startDate) && !empty($endDate)) {
            $query->whereBetween('order_date', [$startDate, $endDate]);
        }


        // Apply customer filter if provided
        if (!empty($customer)) {
            $query->where('user_id', $customer);
        }

        // Execute the query and get the results
        $data = $query;
        return $data;
    }

    public function filterJobPaymentHistoryByDate(){
        $startDate  = request('date_from');
        $endDate    = request('date_to');
        $customer   = request('customer');

        //Start building the query
        $query = JobPaymentNewHistory::query();

        // Apply date range filter if both dates are provided
        if (!empty($startDate) && !empty($endDate)) {
            $query->whereBetween('payment_date', [$startDate, $endDate]);
        }


        // Apply customer filter if provided
        if (!empty($customer)) {
            $query->where('user_id', $customer);
        }

        // Execute the query and get the results
        $data = $query;
        // $data = $query->get();
        // dd( $data);
        return $data;
    }

    public function filterExpenseByDate(){
        $startDate  = request('date_from');
        $endDate    = request('date_to');
        $category   = request('category');

        //Start building the query
        $query = Expense::query();

        // Apply date range filter if both dates are provided
        if (!empty($startDate) && !empty($endDate)) {
            $query->whereBetween('expense_date', [$startDate, $endDate]);
        }


        // Apply category filter if provided
        if (!empty($category)) {
            $query->where('category_id', $category);
        }

        // Execute the query and get the results
        $data = $query;
        // $data = $query->get();
        // dd( $data);
        return $data;
    }
}
