<x-client-layout>
    <div class="container">
        <form class="row g-3 needs-validation" novalidate method="GET" action="{{ route('ua-hgb-results') }}">
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

            <h1 class="text-center font-bold text-xl mt-4" >URINALYSIS</h1>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                        <th scope="col" class="col-4">METHOD:URINALYSIS UNCENTRIFUGED SPECIMEN</th>
                        <th scope="col">RESULT</th>
                        <th scope="col">REFERENCE</th>
                        <th scope="col">UNIT</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th colspan="4">Physical Characteristics</th>
                        </tr>
                        <tr>
                            <td>Color</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Transparency</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>pH</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Specific Gravity</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th colspan="4">Chemical Characteristics</th>
                        </tr>
                        <tr>
                            <td>Protein</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Glucose</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th colspan="4">Microscopic Findings</th>
                        </tr>
                        <tr>
                            <td>Casts</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Crystals</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>  
                        <tr>
                            <td>Amorphous</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr> 
                        <tr>
                            <td>Micro Organism</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Others</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>  
                        <tr>
                            <td>W.B.C / hpf</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>  
                        <tr>
                            <td>R.B.C. / hpf</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>  
                        <tr>
                            <td>Epithelial Cells</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>  
                        <tr>
                            <td>Mucus Threads</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Bacteria</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr> 
                    </tbody>
                </table>
            </div>
            <h1 class="text-center font-bold text-xl mt-4" >HEMOGLOBIN</h1>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                        <th scope="col" class="text-center">TEST</th>
                        <th scope="col" class="text-center">Result</th>
                        <th scope="col" class="text-center">Normal Values</th>
                        <th scope="col" class="text-center">Unit</th>
                        </tr>
                    </thead>
                    <tr>
                        <td class="col-4">HEMOGLOBIN</td>
                        <td class="col-3"></td>
                        <td class="col-3">M - 13.2 - 16.2, F - 12.0 - 15.2</td>
                        <td class="col-2">mg/dl</td>
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
