<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Common;
use App\Helpers\LogActivity;
use App\Http\Controllers\Controller;
use App\Models\Budget;
use App\Models\Customer;
use App\Models\MenuType;
use App\Traits\HasDataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BudgetController extends Controller
{
    use HasDataTables;

    public $months = [
        'January', 'February', 'March',
        'April', 'May', 'June', 'July', 'August', 
        'September', 'October', 'November', 'December'
    ];
    public function index(Request $request)
    {
        // Budget::factory(100)->create();
        if (request()->ajax()) {
            $query = Budget::when($request->get("trash") , function($q){
                        $q->onlyTrashed();
                    })->latest();

            return $this->dataTable($query, 'budgets' , function ($dataTable) {
                    $dataTable->editColumn('package_name', function ($budget) {
                        return $budget->menuType ? $budget->menuType->type : 'N/A';
                    })
                    ->editColumn('client_name', function ($budget) {
                        return $budget->customer ? $budget->customer->name : 'N/A';
                    })
                    ->editColumn('profit_percentage', function ($budget) {
                        return $budget->profit_percentage . '%';
                    })->editColumn('created_at', function ($budget) {
                        return $budget->created_at->format('Y');
                    })->editColumn('action', function ($budget) {
                        return '<a class="btn btn-warning" href="' . route('admin.budget.update', $budget->id) . '">Update</a>';
                    });
            });
        }


        return view('admin.budget.index');
    }

    public function update()
    {
        $budget = null;
        if (request()->id) {
            $budget = Budget::find(request()->id);
        }
        $menus = MenuType::all();
        $customers = Customer::all();
        $months = $this->months;
        return view('admin.budget.update', compact('budget' , 'menus', 'customers' , 'months'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required',
            'menu_type_id' => 'required',
            'amount_received' => 'required|numeric|min:1',
            'monthly_expense' => 'required|numeric|min:1',
            'month' => 'nullable',
            'notes' => 'nullable|string|max:255',
        ]);
        $profit=  (float)$request->amount_received - (float)$request->monthly_expense;
        $profit_percentage = round(($profit / (float)$request->amount_received * 100), 2);
        $request->merge(['user_id' => auth()->id() , 'profit' => $profit , 'profit_percentage' => $profit_percentage]);
        if($request->id) {
            $budget = Budget::find($request->id);
            $changes_exist = Common::get_changes($budget, $request->all());
            if($changes_exist) {
                LogActivity::addToLog('budget', 'update', null, $changes_exist);
            }
            $budget->update($request->all());
        }
        else {
            $budget = Budget::create($request->all());
            LogActivity::addToLog('budget', 'insert', $budget, null);
        }
        return response()->json([
            'success' => true,
            'message' => !$request->id ? 'Budget created successfully!' : 'Budget update successfully!',
            'redirect' => route('admin.budget.index'),
        ]);
    }

    public function stats()
    {
        $currentMonth = request()->month ?? now()->format('F');
        $currentYear =  request()->year ?? now()->year;
        $rawData = DB::table('budgets')
                    ->selectRaw('month, SUM(amount_received) as total_amt_received, SUM(monthly_expense) as total_monthly_expense , SUM(profit) as total_monthly_profit')
                    ->whereYear('created_at', $currentYear)
                    ->groupByRaw('month')
                    ->get()
                    ->keyBy('month');
        
        $amountsReceived = [];
        $monthlyExpenses = [];
        $monthlyProfit = [];
        $months = $this->months;
        foreach ($months as $month) {
            $amountsReceived[] = isset($rawData[$month]) ? (float) $rawData[$month]->total_amt_received : 0.00;
            $monthlyExpenses[] = isset($rawData[$month]) ? (float) $rawData[$month]->total_monthly_expense : 0.00;
            $monthlyProfit[] = isset($rawData[$month]) ? (float) $rawData[$month]->total_monthly_profit : 0.00;
        }
        $y_profit = array_sum($amountsReceived) - array_sum($monthlyExpenses);
        $totalReceived = array_sum($amountsReceived);
        $y_profit = $totalReceived - array_sum($monthlyExpenses);
        $y_profit_percentage = $totalReceived > 0 ? round(($y_profit / $totalReceived * 100), 2) : 0;
        $y_expense = $totalReceived > 0 ? round((array_sum($monthlyExpenses) / $totalReceived * 100), 2) : 0;
        $profitExpense = [
            $y_profit_percentage,
            $y_expense,
        ];
        $c_amt = array_key_exists($currentMonth , $rawData->toArray()) ? $rawData[$currentMonth]->total_amt_received : 0;
        $c_exp = array_key_exists($currentMonth , $rawData->toArray()) ? $rawData[$currentMonth]->total_monthly_expense : 0;

        $c_profit = $c_amt - $c_exp;
        $c_profit_percentage = round((($c_amt > 0 ? ($c_profit / $c_amt) : 0) * 100), 2);
        $stats = [
            'Total Revenue'=> (object)[ 'value' => $c_amt, 'text' => 'PKR' , 'icon'=>false],
            'Total Expense'=> (object)[ 'value' => $c_exp, 'text' => 'PKR' , 'icon'=>false],
            'Total Profit'=> (object)[ 'value' => $c_profit, 'text' => 'PKR' , 'icon' => false],
            'Profit %'=> (object)[ 'value' => $c_profit_percentage, 'icon' => 'percent']
        ];
        return view('admin.budget.stats' , compact('amountsReceived', 'monthlyExpenses' , 'monthlyProfit' , 'profitExpense' , 'stats' , 'currentMonth', 'currentYear' , 'months'));
    }
}
