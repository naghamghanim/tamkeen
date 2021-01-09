<header class='mb-5'>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="#">Fixed navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
            aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{asset('/')}}">Home <span class="sr-only">(current)</span></a>
                </li>
                <!--  <li class="nav-item">
                        <a class="nav-link" href="{{asset('/')}}">Link</a>
                    </li>-->
                <li>
                    <div class="dropdown show">
                        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Database
                        </a>

                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="{{asset('students')}}">Manage Students</a>
                            <a class="dropdown-item" href="{{asset('students-model')}}">Manage Students Model</a>
                            <a class="dropdown-item" href="{{asset('employees')}}">Employees</a>
                            <a class="dropdown-item" href="{{asset('employees-model')}}">Employees Model</a>
                            <a class="dropdown-item" href="{{asset('students-model/paging')}}">Manage Students
                                Model/Paging</a>
                            <a class="dropdown-item" href="{{asset('students-model/search')}}">Manage Students
                                Model/search</a>
                            <a class="dropdown-item" href="{{asset('students-model/search-paging')}}">Manage Students
                                Model/search Paging</a>
                            <a class="dropdown-item" href="{{asset('students-model/search-paging-advanced')}}">Manage
                                Students Model/Advanced Search</a>

                        </div>

                    </div>
                </li>
                <li>

                    <div class="dropdown show">
                        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Tasks
                        </a>

                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">

                            <a class="dropdown-item" href="{{asset('employees')}}">Employees</a>
                            <a class="dropdown-item" href="{{asset('employees-model')}}">Employees Model</a>

                        </div>

                    </div>
                </li>
                <li>
                    <div class="dropdown show">
                        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Session / Cookie
                        </a>

                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="{{asset('session-cookie/login')}}">Session Login</a>
                            <a class="dropdown-item" href="{{asset('session-cookie/secure')}}">Session Secure Page<a>
                                    <a class="dropdown-item" href="{{asset('session-cookie/login')}}">Cookie Login</a>
                                    <a class="dropdown-item" href="{{asset('session-cookie/secure')}}">Cookie Secure
                                        Page</a>

                        </div>

                    </div>
                </li>
                <li>

<div class="dropdown show">
    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Upload Files
    </a>

    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">

        <a class="dropdown-item" href="{{route('upload-file')}}">Upload File</a>
     

    </div>

</div>
</li>


                </li>

            </ul>

        </div>
    </nav>
</header>