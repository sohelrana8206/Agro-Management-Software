<!-- Left Sidebar -->
<aside id="leftsidebar" class="sidebar">
    <div class="menu">
        <ul class="list">
            <li>
                <div class="user-info">
                    <div class="image"><a href="profile.html"><img src="{{url('public/assets/images/profile_av.jpg')}}" alt="User"></a></div>
                    <div class="detail">
                        <h4>{{session('name')}}</h4>
                        <small>{{session('email')}}</small>
                    </div>
                    <a href="events.html" title="Events"><i class="zmdi zmdi-calendar"></i></a>
                    <a href="mail-inbox.html" title="Inbox"><i class="zmdi zmdi-email"></i></a>
                    <a href="contact.html" title="Contact List"><i class="zmdi zmdi-account-box-phone"></i></a>
                    <a href="chat.html" title="Chat App"><i class="zmdi zmdi-comments"></i></a>
                    <a href="sign-in.html" title="Sign out"><i class="zmdi zmdi-power"></i></a>
                </div>
            </li>
            <li class="active"> <a href="{{url('dashboard')}}"><i class="zmdi zmdi-home"></i><span>Dashboard</span></a></li>
            <li> <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-apps"></i><span>Finance Info</span> </a>
                <ul class="ml-menu">
                    <li><a href="{{route('accounts_head.index')}}">Accounts Head</a></li>
                    <li><a href="{{route('transactions.index')}}">Transactions List</a></li>
                </ul>
            </li>
            <li> <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-apps"></i><span>Animal Info</span> </a>
                <ul class="ml-menu">
                    <li><a href="{{url('animalList')}}">Animal List</a></li>
                    <li><a href="{{url('inventory')}}">Animal Inventory</a></li>
                    <li><a href="{{url('animalBreedList')}}">Animal Breed List</a></li>
                </ul>
            </li>
            <li> <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-apps"></i><span>Animal Health</span> </a>
                <ul class="ml-menu">
                    <li><a href="{{url('animalHealth')}}">Animal Health</a></li>
                    <li><a href="{{url('physicianList')}}">Physician List</a></li>
                    <li><a href="{{url('healthCondition')}}">Health Condition</a></li>
                    <li><a href="{{url('medicine')}}">Medicine/Vaccine List</a></li>
                </ul>
            </li>
            <li> <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-apps"></i><span>Animal Food</span> </a>
                <ul class="ml-menu">
                    <li><a href="{{url('animalFeeding')}}">Animal Feeding</a></li>
                    <li><a href="{{url('foodInventory')}}">Food Inventory</a></li>
                    <li><a href="{{url('foodSupplier')}}">Food Supplier Info</a></li>
                    <li><a href="{{url('yield')}}">Yield Information</a></li>
                </ul>
            </li>
            <li> <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-apps"></i><span>Insemination Info</span> </a>
                <ul class="ml-menu">
                    <li><a href="{{url('insemination')}}">Insemination Information</a></li>
                    <li><a href="{{url('bullList')}}">Bull List</a></li>
                    <li><a href="{{url('inseminationCompanyList')}}">Insemination Company List</a></li>
                </ul>
            </li>
            <li> <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-apps"></i><span>Employee Info</span> </a>
                <ul class="ml-menu">
                    <li><a href="{{route('employee.index')}}">Employee List</a></li>
                </ul>
            </li>
            <li> <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-apps"></i><span>Reports</span> </a>
                <ul class="ml-menu">
                    <li><a href="{{url('ledgerBalance')}}">Ledger Accounts</a></li>
                    <li><a href="{{url('trialBalance')}}">Trial Balance</a></li>
                    <li><a href="{{url('profitLossStatement')}}">Financial Statement</a></li>
                </ul>
            </li>
            <li> <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-apps"></i><span>Accounts</span> </a>
                <ul class="ml-menu">
                    <li><a href="{{url('ledgerBalance')}}">User List</a></li>
                </ul>
            </li>
        </ul>
    </div>
</aside>