<?php
$content = '<div style="text-align: center">
    <img style="padding: 2px;margin-top: -20px" width="30%" src="'.url('public/assets/images/IRCL-logo.png').'">
    <h2 style="margin-bottom: 0px;padding-bottom: 0px">BISMILLAH AGRO & VARIETIES</h2>
    <h3 style="margin-top: 0px;padding-top: 0px">'.$acc_head_name->account_title.'</h3>
</div>';
$content = $content. '<div class="table-responsive">
    <table class="table-style-two">
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
        <tbody>';
        $content = $content.'<tr>
            <td></td>
            <td></td>
            <td colspan="3">Opening Balance</td>
            <td>
                <strong>';
                    if($opening_balance > 0){
                        $content = $content.$opening_balance.'/- (dr)';
                    }elseif($opening_balance < 0){
                        $content = $content.abs($opening_balance).'/- (cr)';
                    } else{
                        $content = $content.$opening_balance.'/-';
                    }
        $content = $content.'</strong>
            </td>
        </tr>';
        $count = 1; $balance = $opening_balance;
        foreach($transaction_result as $row){
            $content = $content.'<tr>
            <td>'.$count.'</td>
            <td>' .date('d F, Y',strtotime($row->transaction_date)).'</td>
            <td>' .$row->narration.'</td>
            <td>';
            if($row->dr_cr == 'Debit'){
                $content = $content.$row->amount;
            }else{
                $content = $content.'0';
            }
            $content = $content.'</td><td>';
            if($row->dr_cr == 'Credit'){
                $content = $content.$row->amount;
            }
            else{
                $content = $content.'0';
            }
            $content = $content.'</td><td>';
            if($row->dr_cr == 'Debit'){
                $balance += $row->amount;
                $content = $content.$balance.'/- (dr)';
            }else{
                $balance -= $row->amount;
                $content = $content.abs($balance).'/- (cr)';
            }
            $content = $content.'</td></tr>';
            $count++;
        }
        $content = $content. '<tr>
                        <td></td>
                        <td></td>
                        <td colspan="3">Closing Balance</td>
                        <td><strong>';
        if($balance > 0){
            $content = $content.$balance.'/- (dr)';
        }elseif($balance < 0){
            $content = $content.abs($balance).'/- (cr)';
        }else{
            $content = $content.$balance.'/-';
        }
        $content = $content.'</strong></td>
                    </tr>';
$content = $content. '</tbody></table></div>';
echo $content;
?>