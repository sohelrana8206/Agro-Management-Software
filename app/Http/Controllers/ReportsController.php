<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;
use App\Animal_inventory;
use App\Report;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use RealRashid\SweetAlert\Facades\Alert;
use Session;

class ReportsController extends Controller
{

    public function ledgerBalance(){
        $accounts_head = DB::table('account_heads')->get();
        return view('admin/reports/ledger_balance',['accounts_head'=> $accounts_head]);
    }

    public function ledgerAjaxResult(Request $request){
        $acc_head = $request->input('acc_head');
        $from_month = date('Y-m-d',strtotime($request->input('from_month')));
        $to_month = date('Y-m-d',strtotime($request->input('to_month')));
        $statement_month = date('F Y',strtotime($from_month));
        $acc_head_name = DB::table('account_heads')->select('account_title')->where('id',$acc_head)->get()->first();

        if(empty($request->input('from_month')) && empty($request->input('to_month'))){
            $transaction_result = Transaction::get()->where('account_head_id',$acc_head);
            $opening_balance = 0;

        }else{
            $transaction_result = Transaction::get()
                ->where('account_head_id',$acc_head)
                ->where('transaction_date','>=',$from_month)
                ->where('transaction_date','<=',$to_month);

            $opening_dr_balance = Transaction::get()
                ->where('transaction_date','<',$from_month)
                ->where('account_head_id',$acc_head)
                ->where('dr_cr','Debit')
                ->sum('amount');

            $opening_cr_balance = Transaction::get()
                ->where('transaction_date','<',$from_month)
                ->where('account_head_id',$acc_head)
                ->where('dr_cr','Credit')
                ->sum('amount');

            $opening_balance = $opening_dr_balance - $opening_cr_balance;

            //dd($opening_balance);
        }

        return view('admin/reports/ledger_account_result',[
            'transaction_result'=> $transaction_result,
            'opening_balance'=> $opening_balance,
            'acc_head_name'=> $acc_head_name,
            'acc_head'=> $acc_head,
            'from_month'=> $request->input('from_month'),
            'to_month'=> $request->input('to_month')
        ]);
    }

    public function ledgerResultPdf(Request $request){
        $acc_head = $request->input('acc_head');
        $from_month = date('Y-m-d',strtotime($request->input('from_month')));
        $to_month = date('Y-m-d',strtotime($request->input('to_month')));
        $statement_month = date('F Y',strtotime($from_month));
        $acc_head_name = DB::table('account_heads')->select('account_title')->where('id',$acc_head)->get()->first();

        if(empty($request->input('from_month')) && empty($request->input('to_month'))){
            $transaction_result = Transaction::get()->where('account_head_id',$acc_head);
            $opening_balance = 0;

        }else{
            $transaction_result = Transaction::get()
                ->where('account_head_id',$acc_head)
                ->where('transaction_date','>=',$from_month)
                ->where('transaction_date','<=',$to_month);

            $opening_dr_balance = Transaction::get()
                ->where('transaction_date','<',$from_month)
                ->where('account_head_id',$acc_head)
                ->where('dr_cr','Debit')
                ->sum('amount');

            $opening_cr_balance = Transaction::get()
                ->where('transaction_date','<',$from_month)
                ->where('account_head_id',$acc_head)
                ->where('dr_cr','Credit')
                ->sum('amount');

            $opening_balance = $opening_dr_balance - $opening_cr_balance;

            //dd($opening_balance);
        }

        require_once(base_path('/vendor/autoload.php'));

        $mpdf = new \Mpdf\Mpdf();
        $html = view('admin/reports/ledger_account_result_pdf',[
            'transaction_result'=> $transaction_result,
            'opening_balance'=> $opening_balance,
            'acc_head_name'=> $acc_head_name
        ]);
        $stylesheet = file_get_contents(base_path('public/assets/css/pdf.css'));
        $mpdf->WriteHTML($stylesheet,1);
        $mpdf->WriteHTML($html,2);
        $fileName = $acc_head_name->account_title.'('.date('d-m-Y').').pdf';
        $mpdf->Output($fileName, 'I');
    }

    public function profit_loss_statement(){
        return view('admin/reports/profit_loss_statement');
    }

    public function profit_loss_ajax_result(Request $request){
        $from_month = date('Y-m-d',strtotime($request->input('from_month')));
        $to_month = date('Y-m-d',strtotime($request->input('to_month')));

        $output = new Report();
        $outputArray = $output->get_ledger_balance($from_month,$to_month);

        $statement_month = date('d F Y',strtotime($to_month));

        return view('admin/reports/profit_loss_statement_result',[
            'outputArray'=> $outputArray,
            'statement_month'=> $statement_month,
            'from_month'=> $request->input('from_month'),
            'to_month'=> $request->input('to_month')
        ]);
    }

    public function trial_balance(){
        return view('admin/reports/trial_balance');
    }

    public function trial_balance_ajax_result(Request $request){
        $from_month = date('Y-m-d',strtotime($request->input('from_month')));
        $to_month = date('Y-m-d',strtotime($request->input('to_month')));

        $output = new Report();
        $outputArray = $output->get_trial_balance($from_month,$to_month);

        //dd($outputArray['actualSales']);
        //print_r($outputArray['creditOperatingIncome']);die();

        $statement_month = date('F Y',strtotime($from_month));

        return view('admin/reports/trial_balance_result',[
            'outputArray'=> $outputArray,
            'statement_month'=> $statement_month,
            'from_month'=> $request->input('from_month'),
            'to_month'=> $request->input('to_month')
        ]);
    }
}
