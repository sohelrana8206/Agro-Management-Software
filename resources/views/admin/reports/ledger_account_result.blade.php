<h3 class="mb-0 mt-5 text-center">{{$acc_head_name->account_title}}</h3>
<form method="post" action="{{url('ledgerResultPdf')}}">
    @csrf
    <input type="hidden" name="acc_head" value="{{$acc_head}}">
    <input type="hidden" name="from_month" value="{{$from_month}}">
    <input type="hidden" name="to_month" value="{{$to_month}}">
    <button style="float: right; cursor: pointer" type="submit" class="btn btn-danger btn-sm"><i class="material-icons">picture_as_pdf</i> PDF</button>
</form>
<div class="table-responsive">
    <table style="background: #fff;font-size: 10px" class="table table-bordered">
        <thead>
        <tr>
            <th>SR. NO</th>
            <th>Transaction Date</th>
            <th>Transaction For</th>
            <th>Debit(tk)</th>
            <th>Credit(tk)</th>
            <th>Balance(tk)</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td></td>
            <td></td>
            <td colspan="3">Opening Balance</td>
            <td>
                <strong>
                    <?php
                    if($opening_balance > 0){
                        echo $opening_balance.'/- (dr)';
                    }elseif($opening_balance < 0){
                        echo abs($opening_balance).'/- (cr)';
                    } else{
                        echo $opening_balance.'/-';
                    }
                    ?>
                </strong>
            </td>
        </tr>
        <?php $count = 1; $balance = $opening_balance;?>
        @foreach($transaction_result as $row)
            <tr>
                <td>{{$count}}</td>
                <td>
                    {{ date('d F, Y',strtotime($row->transaction_date))}}
                </td>
                <td>
                    {{$row->narration}}
                </td>
                <td>
                <?php
                    if($row->dr_cr == 'Debit'){
                        echo $row->amount;
                    }else{
                        echo 0;
                    }
                ?>
                </td>
                <td>
                    <?php
                    if($row->dr_cr == 'Credit'){
                        echo $row->amount;
                    }
                    else{
                        echo 0;
                    }
                    ?>
                </td>
                <td>
                    <?php
                    if($row->dr_cr == 'Debit'){
                        $balance += $row->amount;
                        echo $balance.'/- (dr)';
                    }else{
                        $balance -= $row->amount;
                        echo abs($balance).'/- (cr)';
                    }
                    ?>
                </td>
            </tr>
            <?php $count++; ?>
        @endforeach
        <tr>
            <td></td>
            <td></td>
            <td colspan="3">Closing Balance</td>
            <td>
                <strong>
                    <?php
                    if($balance > 0){
                        echo $balance.'/- (dr)';
                    }elseif($balance < 0){
                        echo abs($balance).'/- (cr)';
                    }else{
                        echo $balance.'/-';
                    }
                    ?>
                </strong>
            </td>
        </tr>
        </tbody>
    </table>
</div>