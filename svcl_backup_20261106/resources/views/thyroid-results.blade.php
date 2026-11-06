<x-client-layout>
    <div class="container">
        <form class="row g-3 needs-validation" novalidate method="GET" action="{{ route('thyroid-results') }}">
            @csrf
            
            <h1 class="text-center font-bold text-xl mt-4">Patient Details</h1>
            <div class="col-md-6">
                <label for="fname" class="form-label">PATIENT NAME</label>
                <input type="text" class="form-control" id="fname" required>
                <div class="valid-feedback">
                Looks good!
                </div>
            </div>
            <div class="col-md-3">
                <label for="requestNo" class="form-label">REQUEST NO</label>
                <input type="text" class="form-control" id="requestNo">
            </div>
            <div class="col-md-3">
                <label for="orNo" class="form-label">OR NO</label>
                <input type="number" class="form-control" id="orNo">
            </div>
            <div class="col-md-2">
                <label for="age" class="form-label">AGE</label>
                <input type="number" class="form-control" id="age">
            </div>
            <div class="col-md-2">
                <label for="gender" class="form-label">GENDER</label>
                <input type="text" class="form-control" id="gender">
            </div>
            <div class="col-md-8">
                <label for="address" class="form-label">ADDRESS</label>
                <input type="text" class="form-control" id="address" placeholder="1234 Main St">
            </div>
            <div class="col-md-3">
                <label for="rDoctor" class="form-label">REQUESTING DOCTOR</label>
                <input type="text" class="form-control" id="rDoctor">
            </div>
            <div class="col-md-3">
                <label for="dateTimeReq" class="form-label">DATE & TIME REQUESTED</label>
                <input type="date" class="form-control" id="dateTimeReq">
            </div>
            <div class="col-md-3">
                <label for="dateTimePerf" class="form-label">DATE & TIME PERFORMED</label>
                <input type="date" class="form-control" id="dateTimePerf">
            </div>
            <div class="col-md-3">
                <label for="dateTimeVal" class="form-label">DATE & TIME VALIDATED</label>
                <input type="date" class="form-control" id="dateTimeVal">
            </div>

            <h1 class="text-center font-bold text-xl mt-4" >THYROID FUNCTION TESTS</h1>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                        <th scope="col-2" class="text-center">TEST</th>
                        <th scope="col-4" class="text-center">Result</th>
                        <th scope="col-4" class="text-center">Normal Values</th>
                        <th scope="col-2" class="text-center">Unit</th>
                        </tr>
                    </thead>
                    <tr>
                        <td class="col">TSH</td>
                        <td class="col"></td>
                        <td class="col">0.3-4.2</td>
                        <td class="col">mIU/L</td>
                    </tr>
                    <tr>
                        <td class="col">FT4</td>
                        <td class="col"></td>
                        <td class="col">12-22</td>
                        <td class="col">pmol/L</td>
                    </tr>
                    <tr>
                        <td class="col">FT3</td>
                        <td class="col"></td>
                        <td class="col">2.8-7.1</td>
                        <td class="col">pmol/L</td>
                    </tr>
                    <tr>
                        <td class="col">T3</td>
                        <td class="col"></td>
                        <td class="col">1.23-3.07</td>
                        <td class="col">nmol/L</td>
                    </tr>
                    <tr>
                        <td class="col-4">T4</td>
                        <td class="col-3"></td>
                        <td class="col-3">66-181</td>
                        <td class="col-2">nmol/L</td>
                    </tr>
                </table>
            </div>

           
            @include('client-pages.licence-footer') 
            <div class="col-12">
                <button type="submit" class="btn btn-success float-end my-4">Print Results</button>
            </div>
            
        </form>
    </div>
</x-client-layout>