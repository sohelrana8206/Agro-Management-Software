<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Report extends Model
{
    public function get_ledger_balance($fromDate,$toDate){
        $actualSales = DB::table('transactions')
            ->join('account_heads','transactions.account_head_id' , '=','account_heads.id','LEFT')
            ->join('account_types','account_heads.account_type_id' , '=','account_types.id','LEFT')
            ->where('account_types.id', 9)
            ->where('transactions.transaction_date','>=',$fromDate)
            ->where('transactions.transaction_date','<=',$toDate)
            ->select(DB::raw('sum(case when transactions.dr_cr="Credit" then transactions.amount else - transactions.amount end) as sales'))
            ->first();

        $actualSalesReturn = DB::table('transactions')
            ->join('account_heads','transactions.account_head_id' , '=','account_heads.id','LEFT')
            ->join('account_types','account_heads.account_type_id' , '=','account_types.id','LEFT')
            ->where('account_types.id', 12)
            ->where('transactions.transaction_date','>=',$fromDate)
            ->where('transactions.transaction_date','<=',$toDate)
            ->select(DB::raw('sum(case when transactions.dr_cr="Debit" then transactions.amount else - transactions.amount end) as salesReturn'))
            ->first();

        $actualPurchase = DB::table('transactions')
            ->join('account_heads','transactions.account_head_id' , '=','account_heads.id','LEFT')
            ->join('account_types','account_heads.account_type_id' , '=','account_types.id','LEFT')
            ->where('account_types.id', 10)
            ->where('transactions.transaction_date','>=',$fromDate)
            ->where('transactions.transaction_date','<=',$toDate)
            ->select(DB::raw('sum(case when transactions.dr_cr="Debit" then transactions.amount else - transactions.amount end) as purchase'))
            ->first();

        $actualPurchaseReturn = DB::table('transactions')
            ->join('account_heads','transactions.account_head_id' , '=','account_heads.id','LEFT')
            ->join('account_types','account_heads.account_type_id' , '=','account_types.id','LEFT')
            ->where('account_types.id', 11)
            ->where('transactions.transaction_date','>=',$fromDate)
            ->where('transactions.transaction_date','<=',$toDate)
            ->select(DB::raw('sum(case when transactions.dr_cr="Credit" then transactions.amount else - transactions.amount end) as purchaseReturn'))
            ->first();

        $actualPurchaseCarriage = DB::table('transactions')
            ->join('account_heads','transactions.account_head_id' , '=','account_heads.id','LEFT')
            ->join('account_types','account_heads.account_type_id' , '=','account_types.id','LEFT')
            ->where('account_types.id', 13)
            ->where('transactions.dr_cr','=','Debit')
            ->where('transactions.transaction_date','>=',$fromDate)
            ->where('transactions.transaction_date','<=',$toDate)
            ->select(DB::raw('sum(case when transactions.dr_cr="Debit" then transactions.amount else - transactions.amount end) as purchaseCarriage'))
            ->first();

        $animalBorn = DB::table('animal_inventories')
            ->where('collection_type',2)
            ->where('created_at','>=',$fromDate)
            ->where('created_at','<=',$toDate)
            ->where('animal_status','active')
            ->orWhere('animal_status','sick')
            ->select(DB::raw('sum(estimated_price) as cost'))
            ->first();

        $animalDeath = DB::table('animal_inventories')
            ->where('animal_status','death')
            ->where('created_at','>=',$fromDate)
            ->where('created_at','<=',$toDate)
            ->select(DB::raw('sum(estimated_price) as cost'))
            ->first();

        $openingInventory = DB::table('animal_inventories')
            ->where('created_at','<',$fromDate)
            ->where('animal_status','active')
            ->orWhere('animal_status','sick')
            ->select(DB::raw('sum(estimated_price) as cost'))
            ->first();

        $ClosingInventory = DB::table('animal_inventories')
            ->where('created_at','>=',$fromDate)
            ->where('created_at','<=',$toDate)
            ->where('animal_status','active')
            ->orWhere('animal_status','sick')
            ->select(DB::raw('sum(estimated_price) as cost'))
            ->first();

        $operatingIncome = DB::table('transactions')
            ->join('account_heads','transactions.account_head_id' , '=','account_heads.id','LEFT')
            ->join('account_types','account_heads.account_type_id' , '=','account_types.id','LEFT')
            ->where('account_types.id', 7)
            ->where('transactions.transaction_date','>=',$fromDate)
            ->where('transactions.transaction_date','<=',$toDate)
            ->groupBy('account_head_id')
            ->select('account_heads.account_title','transactions.account_head_id',DB::raw('sum(case when transactions.dr_cr="Credit" then transactions.amount else - transactions.amount end) as operatingIncomes'))
            ->get();

        $operatingExpenses = DB::table('transactions')
            ->join('account_heads','transactions.account_head_id' , '=','account_heads.id','LEFT')
            ->join('account_types','account_heads.account_type_id' , '=','account_types.id','LEFT')
            ->where('account_types.id', 8)
            ->where('transactions.transaction_date','>=',$fromDate)
            ->where('transactions.transaction_date','<=',$toDate)
            ->groupBy('account_head_id')
            ->select('account_heads.account_title','transactions.account_head_id',DB::raw('sum(case when transactions.dr_cr="Debit" then transactions.amount else - transactions.amount end) as operatingExpenses'))
            ->get();

        $nonCurrentAsset = DB::table('transactions')
            ->join('account_heads','transactions.account_head_id' , '=','account_heads.id','LEFT')
            ->join('account_types','account_heads.account_type_id' , '=','account_types.id','LEFT')
            ->where('account_types.id', 1)
            ->where('transactions.transaction_date','>=',$fromDate)
            ->where('transactions.transaction_date','<=',$toDate)
            ->groupBy('transactions.account_head_id')
            ->select('account_heads.account_title','transactions.account_head_id',DB::raw('sum(case when transactions.dr_cr="Credit" then transactions.amount else - transactions.amount end) as nonCurrentAsset'))
            ->get();

        $currentAsset = DB::table('transactions')
            ->join('account_heads','transactions.account_head_id' , '=','account_heads.id','LEFT')
            ->join('account_types','account_heads.account_type_id' , '=','account_types.id','LEFT')
            ->where('account_types.id', 4)
            ->where('transactions.transaction_date','>=',$fromDate)
            ->where('transactions.transaction_date','<=',$toDate)
            ->groupBy('transactions.account_head_id')
            ->select('account_heads.account_title','transactions.account_head_id',DB::raw('sum(case when transactions.dr_cr="Debit" then transactions.amount else - transactions.amount end) as currentAsset'))
            ->get();

        $capital = DB::table('transactions')
            ->join('account_heads','transactions.account_head_id' , '=','account_heads.id','LEFT')
            ->join('account_types','account_heads.account_type_id' , '=','account_types.id','LEFT')
            ->where('account_types.id', 2)
            ->where('transactions.transaction_date','>=',$fromDate)
            ->where('transactions.transaction_date','<=',$toDate)
            ->select(DB::raw('sum(case when transactions.dr_cr="Credit" then transactions.amount else - transactions.amount end) as capital'))
            ->first();

        $drawings = DB::table('transactions')
            ->join('account_heads','transactions.account_head_id' , '=','account_heads.id','LEFT')
            ->join('account_types','account_heads.account_type_id' , '=','account_types.id','LEFT')
            ->where('account_types.id', 3)
            ->where('transactions.transaction_date','>=',$fromDate)
            ->where('transactions.transaction_date','<=',$toDate)
            ->select(DB::raw('sum(case when transactions.dr_cr="Credit" then transactions.amount else - transactions.amount end) as drawings'))
            ->first();

        $currentLiabilities = DB::table('transactions')
            ->join('account_heads','transactions.account_head_id' , '=','account_heads.id','LEFT')
            ->join('account_types','account_heads.account_type_id' , '=','account_types.id','LEFT')
            ->where('account_types.id', 5)
            ->where('transactions.transaction_date','>=',$fromDate)
            ->where('transactions.transaction_date','<=',$toDate)
            ->groupBy('transactions.account_head_id')
            ->select('account_heads.account_title','transactions.account_head_id',DB::raw('sum(case when transactions.dr_cr="Debit" then transactions.amount else - transactions.amount end) as currentLiabilities'))
            ->get();

        $nonCurrentLiabilities = DB::table('transactions')
            ->join('account_heads','transactions.account_head_id' , '=','account_heads.id','LEFT')
            ->join('account_types','account_heads.account_type_id' , '=','account_types.id','LEFT')
            ->where('account_types.id', 6)
            ->where('transactions.transaction_date','>=',$fromDate)
            ->where('transactions.transaction_date','<=',$toDate)
            ->groupBy('transactions.account_head_id')
            ->select('account_heads.account_title','transactions.account_head_id',DB::raw('sum(case when transactions.dr_cr="Credit" then transactions.amount else - transactions.amount end) as nonCurrentLiabilities'))
            ->get();

        return array(
            'actualSales' => $actualSales,
            'actualSalesReturn' => $actualSalesReturn,
            'actualPurchase' => $actualPurchase,
            'actualPurchaseReturn' => $actualPurchaseReturn,
            'actualPurchaseCarriage' => $actualPurchaseCarriage,
            'animalBorn' => $animalBorn,
            'animalDeath' => $animalDeath,
            'openingInventory' => $openingInventory,
            'ClosingInventory' => $ClosingInventory,
            'operatingIncome' => $operatingIncome,
            'operatingExpenses' => $operatingExpenses,
            'nonCurrentAsset' => $nonCurrentAsset,
            'currentAsset' => $currentAsset,
            'capital' => $capital,
            'drawings' => $drawings,
            'currentLiabilities' => $currentLiabilities,
            'nonCurrentLiabilities' => $nonCurrentLiabilities,
        );
    }

    public function get_trial_balance($fromDate,$toDate){
        $trialBalance = DB::table('transactions')
            ->join('account_heads','transactions.account_head_id' , '=','account_heads.id','LEFT')
            ->join('account_types','account_heads.account_type_id' , '=','account_types.id','LEFT')
            ->where('transactions.transaction_date','>=',$fromDate)
            ->where('transactions.transaction_date','<=',$toDate)
            ->groupBy('account_head_id')
            ->select('account_heads.account_title','transactions.account_head_id',DB::raw('sum(case when transactions.dr_cr="Debit" then transactions.amount else - transactions.amount end) as trialBalance'))
            ->get();

        return array(
            'trialBalance' => $trialBalance
        );
    }
}
