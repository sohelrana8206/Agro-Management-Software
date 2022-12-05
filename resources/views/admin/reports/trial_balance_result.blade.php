<form method="post" action="{{url('incomeExpenseResultPdf')}}">
    @csrf
    <input type="hidden" name="from_month" value="{{$from_month}}">
    <input type="hidden" name="to_month" value="{{$to_month}}">
    <button style="float: right; cursor: pointer" type="submit" class="btn btn-danger btn-sm"><i class="material-icons">picture_as_pdf</i> PDF</button>
</form>
<h3 class="mb-0 mt-5 text-center">BISMILLAH AGRO & VARIETIES</h3>
<h4 class="mt-0 text-center">Trial Balance for the Month of {{$statement_month}}</h4>
<div class="table-responsive">
    <table style="background: #fff;font-size: 10px" class="table table-bordered">
        <thead>
        <tr>
            <th></th>
            <th width="15%" style="text-align: center">Debit(tk)</th>
            <th width="15%" style="text-align: center">Credit(tk)</th>
        </tr>
        </thead>
        <tbody>
        <?php $debitBalance = 0; $creditBalance = 0; ?>
        @foreach($outputArray['trialBalance'] as $trialBalance)
            <tr>
                <td>{{$trialBalance->account_title}}</td>
                <td>
                    @if($trialBalance->trialBalance > 0)
                        {{$trialBalance->trialBalance}}
                        <?php $debitBalance += $trialBalance->trialBalance; ?>
                    @endif
                </td>
                <td>
                    @if($trialBalance->trialBalance < 0)
                        {{abs($trialBalance->trialBalance)}}
                        <?php $creditBalance += $trialBalance->trialBalance; ?>
                    @endif
                </td>
            </tr>
        @endforeach
        <tr>
            <td style="text-align: right"><strong>Total</strong></td>
            <td style="border-top: 2px solid #000;border-bottom: 5px solid #000"><strong>{{$debitBalance}}</strong></td>
            <td style="border-top: 2px solid #000;border-bottom: 5px solid #000"><strong>{{abs($creditBalance)}}</strong></td>
        </tr>
        </tbody>
    </table>
</div>