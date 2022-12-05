@if(count($employee_name) > 0)
    <h6>Payment History for {{$employee_name[0]->name}}</h6>

    <div class="table-responsive">
        <table style="background: #fff;font-size: 10px" class="table table-bordered">
            <thead>
            <tr>
                <th>SR. NO</th>
                <th>Payment Month</th>
                <th>Transaction Date</th>
            </tr>
            </thead>
            <tbody>
            <?php $count = 1; ?>
            @foreach($employee_name as $row)
                <tr>
                    <td>{{$count}}</td>
                    <td>
                        <?php
                        $months = explode('/',$row->months_for);
                        ?>
                        {{ date('M\'Y',strtotime($months[0]))}}
                            @if(!empty($months[1]))
                        <strong style="font-size: larger"> to </strong>
                        {{ date('M\'Y',strtotime($months[1]))}}
                                @endif
                    </td>
                    <td>
                        {{ date('d F, Y',strtotime($row->transaction_date))}}
                    </td>
                </tr>
                <?php $count++; ?>
            @endforeach
            </tbody>
        </table>
    </div>
@else
    {{'No payment history found of this member.'}}
@endif