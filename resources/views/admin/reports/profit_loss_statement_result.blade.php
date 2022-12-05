<form method="post" action="{{url('incomeExpenseResultPdf')}}">
    @csrf
    <input type="hidden" name="from_month" value="{{$from_month}}">
    <input type="hidden" name="to_month" value="{{$to_month}}">
    <button style="float: right; cursor: pointer" type="submit" class="btn btn-danger btn-sm"><i class="material-icons">picture_as_pdf</i> PDF</button>
</form>
<h3 class="mb-0 mt-5 text-center">BISMILLAH AGRO & VARIETIES</h3>
<h4 class="mt-0 text-center">Profit & Loss statements for the Year Ended of {{$statement_month}}</h4>
<div class="table-responsive">
    <table style="background: #fff;font-size: 10px" class="table table-bordered">
        <thead>
        <tr>
            <th></th>
            <th width="15%" style="text-align: center">Amount(tk)</th>
            <th width="15%" style="text-align: center">Amount(tk)</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td><strong>Sales</strong></td>
            <td>
                {{$outputArray['actualSales']->sales}}
            </td>
            <td></td>
        </tr>
        <tr>
            <td><strong>Less: Sales Return</strong></td>
            <td><span>({{$outputArray['actualSalesReturn']->salesReturn}})</span></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td style="border-top: 2px solid #000"></td>
            <td>{{$outputArray['actualSales']->sales - $outputArray['actualSalesReturn']->salesReturn}}</td>
        </tr>
        <tr>
            <td><span style="text-decoration: underline;font-weight: bold">Less: Cost of Sales</span></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>Opening Inventory</td>
            <td>{{$outputArray['openingInventory']->cost}}</td>
            <td></td>
        </tr>
        <tr>
            <td>Add: Purchase</td>
            <td>{{$outputArray['actualPurchase']->purchase}}</td>
            <td></td>
        </tr>
        @if($outputArray['actualPurchaseReturn']->purchaseReturn > 0)
            <tr>
                <td>Less: Purchase Return</td>
                <td>({{$outputArray['actualPurchaseReturn']->purchaseReturn}})</td>
                <td></td>
            </tr>
        @endif
        @if($outputArray['actualPurchaseCarriage']->purchaseCarriage > 0)
            <tr>
                <td>Add: Carriage on Purchase</td>
                <td><span>{{$outputArray['actualPurchaseCarriage']->purchaseCarriage}}</span></td>
                <td></td>
            </tr>
        @endif
        @if($outputArray['animalBorn']->cost > 0)
            <tr>
                <td>Add: Animal Born</td>
                <td>{{$outputArray['animalBorn']->cost}}</td>
                <td></td>
            </tr>
        @endif
        <tr>
            <td style="text-align: end;font-weight: bold"><span>Cost of Goods Available for Sales</span></td>
            <td style="font-weight: bold;border-top: 2px solid #000">
                <?php
                $cogas = $outputArray['openingInventory']->cost + $outputArray['actualPurchase']->purchase - $outputArray['actualPurchaseReturn']->purchaseReturn + $outputArray['actualPurchaseCarriage']->purchaseCarriage + $outputArray['animalBorn']->cost;
                    echo $cogas;
                ?>
            </td>
            <td></td>
        </tr>
        <tr>
            <td>Less: Closing Inventory @if($outputArray['animalDeath']->cost > 0) ({{'Closing Inventory:'.$ci = $outputArray['ClosingInventory']->cost.' - '.'Animal Death:'.$outputArray['animalDeath']->cost}}) @endif</td>
            <td><span>({{$ci = $outputArray['ClosingInventory']->cost - $outputArray['animalDeath']->cost}})</span></td>
            <td></td>
        </tr>
        <tr>
            <td style="text-align: end;font-weight: bold"><span>Cost of Sales</span></td>
            <td style="border-top: 2px solid #000"></td>
            <td style="font-weight: bold">
                (
                <?php
                $cogs = $cogas - $ci;
                    echo $cogs;
                ?>
                )
            </td>
        </tr>
        <tr>
            <td style="text-align: end;font-weight: bold"><span>Gross Profit/Gross Loss</span></td>
            <td></td>
            <td style="font-weight: bold;border-top: 2px solid #000">
                <?php
                $grossProfit = $outputArray['actualSales']->sales - $cogs;
                    if($grossProfit > 0){
                        echo $grossProfit;
                    }else{
                        echo '('.abs($grossProfit).')';
                    }
                ?>
            </td>
        </tr>
        <tr>
            <td><span style="text-decoration: underline;font-weight: bold">Add: Operating Income</span></td>
            <td></td>
            <td></td>
        </tr>

        <?php $totalOperatingIncome = 0 ?>
        @foreach($outputArray['operatingIncome'] as $income)
        <tr>
            <td>{{$income->account_title}}</td>
            <td></td>
            <td>{{$income->operatingIncomes}}</td>
        </tr>
            <?php $totalOperatingIncome += $income->operatingIncomes; ?>
        @endforeach
        <tr>
            <td style="text-align: end;font-weight: bold"><span>Total Income</span></td>
            <td></td>
            <td style="font-weight: bold;border-top: 2px solid #000">
                <?php
                $totalIncome = $grossProfit + $totalOperatingIncome;
                    echo $totalIncome;
                ?>
            </td>
        </tr>
        <tr>
            <td><span style="text-decoration: underline;font-weight: bold">Less: Operating Expenses</span></td>
            <td></td>
            <td></td>
        </tr>
        <?php $totalOperatingExpenses = 0 ?>
        @foreach($outputArray['operatingExpenses'] as $income)
            <tr>
                <td>{{$income->account_title}}</td>
                <td>{{$income->operatingExpenses}}</td>
                <td></td>
            </tr>
            <?php $totalOperatingExpenses += $income->operatingExpenses; ?>
        @endforeach
        @if($outputArray['animalDeath']->cost > 0)
            <tr>
                <td>Animal Death</td>
                <td>{{$outputArray['animalDeath']->cost}}</td>
                <td></td>
            </tr>
        @endif
        <tr>
            <td style="text-align: end;font-weight: bold">Total Expenses</td>
            <td style="border-top: 2px solid #000"></td>
            <td><span style="text-decoration: underline;font-weight: bold">({{$totalOperatingExpenses + $outputArray['animalDeath']->cost}})</span></td>
        </tr>
        <tr>
            <td style="text-align: end;font-weight: bold"><span>Net Profit/Net Loss</span></td>
            <td></td>
            <td style="border-top: 2px solid #000;border-bottom: 5px solid #000"><span style="font-weight: bold">
                    <?php
                    $netProfit = $totalIncome - $totalOperatingExpenses;
                    if($netProfit > 0){
                        echo $netProfit;
                    }else{
                        echo '('.abs($netProfit).')';
                    }
                    ?>
                </span></td>
        </tr>
        </tbody>
    </table>
</div>


<h3 class="mb-0 mt-5 text-center">BISMILLAH AGRO & VARIETIES</h3>
<h4 class="mt-0 text-center">Balance Sheet for the Year Ended of {{$statement_month}}</h4>
<div class="table-responsive">
    <table style="background: #fff;font-size: 10px" class="table table-bordered">
        <thead>
        <tr>
            <th></th>
            <th width="15%" style="text-align: center">Amount(tk)</th>
            <th width="15%" style="text-align: center">Amount(tk)</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td><span style="text-decoration: underline;font-weight: bold">Non-Current Assets</span></td>
            <td></td>
            <td></td>
        </tr>

        <?php $totalNonCurrentAsset = 0 ?>
        @foreach($outputArray['nonCurrentAsset'] as $nonCurrent)
            <tr>
                <td>{{$nonCurrent->account_title}}</td>
                <td>{{$nonCurrent->nonCurrentAsset}}</td>
                <td></td>
            </tr>
            <?php $totalNonCurrentAsset += $nonCurrent->nonCurrentAsset; ?>
        @endforeach

        <tr>
            <td style="text-align: end;font-weight: bold"><span>Total Non Current Asset</span></td>
            <td style="font-weight: bold;border-top: 2px solid #000"></td>
            <td>
                <?php
                echo $totalNonCurrentAsset;
                ?>
            </td>
        </tr>

        <tr>
            <td><span style="text-decoration: underline;font-weight: bold">Current Assets</span></td>
            <td></td>
            <td></td>
        </tr>

        <?php $totalCurrentAsset = 0 ?>
        @foreach($outputArray['currentAsset'] as $cuAsset)
            <tr>
                <td>{{$cuAsset->account_title}}</td>
                <td>{{$cuAsset->currentAsset}}</td>
                <td></td>
            </tr>
            <?php $totalCurrentAsset += $cuAsset->currentAsset; ?>
        @endforeach
        <tr>
            <td>Closing Inventory</td>
            <td><span>{{$ci = $outputArray['ClosingInventory']->cost - $outputArray['animalDeath']->cost}}</span></td>
            <td></td>
        </tr>
        <tr>
            <td style="text-align: end;font-weight: bold"><span>Total Current Asset</span></td>
            <td style="font-weight: bold;border-top: 2px solid #000"></td>
            <td>
                <?php
                echo $totalCurrentAsset + $ci;
                ?>
            </td>
        </tr>
        <tr>
            <td style="text-align: end;font-weight: bold"><span>Total Asset</span></td>
            <td></td>
            <td style="font-weight: bold;border-top: 2px solid #000;border-bottom: 2px solid #000">
                <?php
                $totalAsset = $totalNonCurrentAsset + $totalCurrentAsset + $ci;
                echo $totalAsset;
                ?>
            </td>
        </tr>
        <tr>
            <td><span style="text-decoration: underline;font-weight: bold">Capital and Liabilities</span></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td><span style="text-decoration: underline;font-weight: bold">Finance By</span></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td><strong>Capital</strong></td>
            <td>
                {{$outputArray['capital']->capital}}
            </td>
            <td></td>
        </tr>
        <tr>
            <td><strong>Add: Profit for the year</strong></td>
            <td>
                <?php
                if($netProfit > 0){
                    echo $netProfit;
                }else{
                    echo '('.abs($netProfit).')';
                }
                ?>
            </td>
            <td></td>
        </tr>
        <tr>
            <td><strong>Less: Drawings</strong></td>
            <td>
                ({{$outputArray['drawings']->drawings}})
            </td>
            <td></td>
        </tr>
        <tr>
            <td style="text-align: end;font-weight: bold"><span>Closing Capital</span></td>
            <td></td>
            <td style="font-weight: bold;border-top: 2px solid #000">
                {{$closingCapital = $outputArray['capital']->capital + $netProfit - $outputArray['drawings']->drawings}}
            </td>
        </tr>
        <tr>
            <td><span style="text-decoration: underline;font-weight: bold">Current Liabilities</span></td>
            <td></td>
            <td></td>
        </tr>
        <?php $totalCurrentLiabilities = 0 ?>
        @foreach($outputArray['currentLiabilities'] as $cuLiabilities)
            <tr>
                <td>{{$cuLiabilities->account_title}}</td>
                <td>{{$cuLiabilities->currentLiabilities}}</td>
                <td></td>
            </tr>
            <?php $totalCurrentLiabilities += $cuLiabilities->currentLiabilities; ?>
        @endforeach
        <tr>
            <td style="text-align: end;font-weight: bold">Total Current Liabilities</td>
            <td style="border-top: 2px solid #000"></td>
            <td><span style="text-decoration: underline;font-weight: bold">{{$totalCurrentLiabilities}}</span></td>
        </tr>
        <tr>
            <td><span style="text-decoration: underline;font-weight: bold">Non Current Liabilities</span></td>
            <td></td>
            <td></td>
        </tr>
        <?php $totalNonCurrentLiabilities = 0 ?>
        @foreach($outputArray['nonCurrentLiabilities'] as $nonCuLiabilities)
            <tr>
                <td>{{$nonCuLiabilities->account_title}}</td>
                <td>{{$nonCuLiabilities->currentLiabilities}}</td>
                <td></td>
            </tr>
            <?php $totalNonCurrentLiabilities += $nonCuLiabilities->nonCurrentLiabilities; ?>
        @endforeach
        <tr>
            <td style="text-align: end;font-weight: bold">Total Non-Current Liabilities</td>
            <td style="border-top: 2px solid #000"></td>
            <td><span style="text-decoration: underline;font-weight: bold">{{$totalNonCurrentLiabilities}}</span></td>
        </tr>
        <tr>
            <td style="text-align: end;font-weight: bold"><span>Total Capital and Liabilities</span></td>
            <td></td>
            <td style="font-weight: bold;border-top: 2px solid #000;border-bottom: 2px solid #000">
                <?php
                echo $closingCapital + $totalCurrentLiabilities + $totalNonCurrentLiabilities;
                ?>
            </td>
        </tr>
        </tbody>
    </table>
</div>