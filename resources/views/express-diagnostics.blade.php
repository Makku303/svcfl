<x-client-layout>
    <div class="container rounded">
        <form class="row g-3" method="POST" action="{{ route('express-diagnostics') }}">

            @csrf
            <h1 class="text-center font-bold text-xl mt-4" >Express Diagnostics</h1>
            @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
            <div class="col-md-12">
                <label for="name" class="form-label">COMPLETE NAME</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="col-md-4">
                <label for="age" class="form-label">AGE</label>
                <input type="number" class="form-control" id="age" name="age" required>
            </div>
            <div class="col-md-3">
                <label for="gender" class="form-label">GENDER</label>
                <!-- <input type="text" class="form-control" id="gender"> -->
                    <select class="form-control" id="gender" name="gender" required>
                    <option></option>
                    <option value="Female">Female</option>
                    <option value="Male">Male</option>
                    </select>
            </div>
            <div class="col-md-5">
                <label for="contact" class="form-label">CONTACT NO.</label>
                <input type="text" class="form-control" id="contact" name="contact" placeholder="09XX-123-1234" required>
            </div>
    
            <div class="col-md-6">
                <label for="email" class="form-label">EMAIL</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="col-md-6">
                <label for="reqphysician" class="form-label">REQUESTING PHYSICIAN</label>
                <input type="text" class="form-control" id="reqphysician" name="reqphysician" required>
            </div>
            <div class="col-12">
                <label for="address" class="form-label">ADDRESS</label>
                <input type="text" class="form-control" id="address" name="address" placeholder="1234 Main St" required>

            </div>

            <h3 class=" font-bold text-xl mb-3" >Laboratory Requests</h3>

            <ul class="nav nav-fill nav-tabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="fill-tab-0" data-bs-toggle="tab" href="#fill-tabpanel-0" role="tab" aria-controls="fill-tabpanel-0" aria-selected="true"> Individual Test </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="fill-tab-1" data-bs-toggle="tab" href="#fill-tabpanel-1" role="tab" aria-controls="fill-tabpanel-1" aria-selected="false"> Package Test </a>
                </li>
            </ul>
            <div class="tab-content pt-5" id="tab-content">
                <div class="tab-pane active" id="fill-tabpanel-0" role="tabpanel" aria-labelledby="fill-tab-0">
                    <!-- Lab request-Individual -->
                    <div class="col-md-6 mt-1">
                        <select id="individualTest1" class="form-select mt-3" aria-label="Default select example" name="individualTest1">
                            <option selected></option>
                            @foreach($individualTest as $individual)
                            <option value="{{ $individual->individualTest }}">{{ $individual->individualTest }}</option>
                            @endforeach
                        </select>

                        <select id="individualTest2" class="form-select mt-3" aria-label="Default select example" name="individualTest2">
                           <option selected></option>
                            @foreach($individualTest as $individual)
                            <option value="{{ $individual->individualTest }}">{{ $individual->individualTest }}</option>      
                                @endforeach
                        </select>
                        
                        <select id="individualTest3" class="form-select mt-3" aria-label="Default select example" name="individualTest3">
                            <option selected></option>
                            @foreach($individualTest as $individual)
                            <option value="{{ $individual->individualTest}}">{{ $individual->individualTest }}</option>                     
                            @endforeach
                        </select>

                        <select id="individualTest4" class="form-select mt-3" aria-label="Default select example" name="individualTest4">
                            <option selected></option>
                            @foreach($individualTest as $individual)
                            <option value="{{ $individual->individualTest }}">{{ $individual->individualTest }}</option>
                            @endforeach
                        </select>

                        <select id="individualTest5" class="form-select mt-3" aria-label="Default select example" name="individualTest5">
                            <option selected></option>
                            @foreach($individualTest as $individual)
                            <option value="{{ $individual->individualTest}}">{{ $individual->individualTest }}</option>
                            @endforeach
                        </select>
                        
                        <select id="individualTest6" class="form-select mt-3" aria-label="Default select example" name="individualTest6">
                            <option selected></option>
                            @foreach($individualTest as $individual)
                            <option value="{{ $individual->individualTest }}">{{ $individual->individualTest }}</option>
                            @endforeach
                        </select> 

                        <select id="individualTest7" class="form-select mt-3" aria-label="Default select example" name="individualTest7">
                            <option selected></option>
                            @foreach($individualTest as $individual)
                            <option value="{{ $individual->individualTest }}">{{ $individual->individualTest }}</option>
                            @endforeach
                        </select> 
                    </div>
                </div>
           
                <div class="tab-pane active" id="fill-tabpanel-1" role="tabpanel" aria-labelledby="fill-tab-1">
                    <!-- Lab request-Package -->
                    <div class="col-md-6 mt-1">
                    <select id="package1" class="form-select mt-3" aria-label="Default select example" name="package1">
                    <option selected></option>
                        
                        @foreach($packages as $package)
                            <option value="{{ $package->id }}">{{ $package->packageName }}</option>
                        
                        @endforeach
                    </select>
                    
                    <select id="package2" class="form-select mt-3" aria-label="Default select example" name="package2">
                    <option selected></option>
                            @foreach($packages as $package)
                            <option value="{{ $package->id }}">{{ $package->packageName }}</option>
                            @endforeach 
                    </select>
                    
                    <select id="package3" class="form-select mt-3" aria-label="Default select example" name="package3">
                    <option selected></option>
                            @foreach($packages as $package)
                            <option value="{{ $package->id }}">{{ $package->packageName }}</option>
                            @endforeach 
                    </select>
    
                    <select id="package4" class="form-select mt-3" aria-label="Default select example" name="package4">
                    <option selected></option>
                            @foreach($packages as $package)
                            <option value="{{ $package->id }}">{{ $package->packageName }}</option>
                            @endforeach 
                        </select>
                </div>
                <!-- <input type="submit" class="btn btn-primary btn-lg my-3" name="submit" value="Submit"> -->
            </div>
            <input type="submit" class="btn btn-primary btn-lg my-3" name="submit" value="Submit">
        </form>
        
        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-info btn-lg-square rounded-circle back-to-top float-end"><i class="bi bi-arrow-up float-right"></i></a>
    </div>
</x-client-layout>
