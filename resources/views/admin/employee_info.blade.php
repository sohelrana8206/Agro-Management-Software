<div class="logo">
    <img width="100px" src="{{public_path('assets/images/IRCL-logo.png')}}">
</div>
<h2 class="club-name">Bismillah Agro & Varieties.</h2>
<h4>Employee Information:</h4>
<table class="table table-style-four">
    <tr>
        <td>Name</td>
        <td> : </td>
        <td>{{$data->name}}</td>
        <td rowspan="3">
            <div style="padding: 5px;">
                <img style="border: 1px solid #ccc;padding: 2px" width="150px" src="{{public_path('uploads/employee/thumbnail/'.$data->image)}}">
            </div>
        </td>
    </tr>
    <tr>
        <td>Designation</td>
        <td> : </td>
        <td>{{$data->designation}}</td>
    </tr>
    <tr>
        <td>Email</td>
        <td> : </td>
        <td>{{$data->email}}</td>
    </tr>
    <tr>
        <td>Mobile Number</td>
        <td> : </td>
        <td>{{$data->mobile}}</td>
    </tr>
    <tr>
        <td>Address</td>
        <td> : </td>
        <td>{{$data->address}}</td>
    </tr>
    <tr>
        <td>Employment Type</td>
        <td> : </td>
        <td>{{$data->employment_type}}</td>
    </tr>
</table>