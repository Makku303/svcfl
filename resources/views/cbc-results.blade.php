<x-client-layout>
    <div class="container">
        <form class="row g-3 needs-validation" novalidate method="GET" action="{{ route('cbc-results') }}">
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
                    <label for="dateTimePerf" class="form-label">DATE & TIME PERFORMED</label>
                    <input type="date" class="form-control" id="dateTimePerf">
                </div>
            <div class="col-md-3">
                <label for="dateTimePerf" class="form-label">DATE & TIME PERFORMED</label>
                <input type="date" class="form-control" id="dateTimePerf">
            </div>
            <div class="col-md-3">
                <label for="dateTimeVal" class="form-label">DATE & TIME VALIDATED</label>
                <input type="date" class="form-control" id="dateTimeVal">
            </div>

            <h1 class="text-center font-bold text-xl mt-4" >COMPLETE BLOOD COUNT</h1>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                        <th scope="col">COMPLETE BLOOD COUNT</th>
                        <th scope="col">RESULT</th>
                        <th scope="col">NORMAL VALUES</th>
                        <th scope="col">UNIT</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th colspan="4">Blood Count</th>
                        </tr>
                        <tr>
                            <td>WHITE BLOOD CELLS</td>
                            <td></td>
                            <td>4.5-11.0 x 103</td>
                            <td>UI</td>
                        </tr>
                        <tr>
                            <td>RED BLOOD CELLS</td>
                            <td></td>
                            <td></td>
                            <td>uL</td>
                        </tr>
                        <tr>
                            <td>PLATELET</td>
                            <td></td>
                            <td></td>
                            <td>uL</td>
                        </tr>
                        <tr>
                            <td>HEMATOCRIT(HCT)</td>
                            <td></td>
                            <td></td>
                            <td>%</td>
                        </tr>
                        <tr>
                            <td>HEMOGLOBIN</td>
                            <td></td>
                            <td></td>
                            <td>G/dL</td>
                        </tr>
                        <tr>
                            <th colspan="4">Differential Count</th>
                        </tr>
                        <tr>
                            <td>Neutrophil</td>
                            <td></td>
                            <td>50 - 65</td>
                            <td>%</td>
                        </tr>
                        <tr>
                            <td>Lymphocyte</td>
                            <td></td>
                            <td>20 - 40</td>
                            <td>%</td>
                        </tr>
                        <tr>
                            <td>Monocyte</td>
                            <td></td>
                            <td>02 – 08</td>
                            <td>%</td>
                        </tr>
                        <tr>
                            <td>Eosinophil</td>
                            <td></td>
                            <td>01 – 03</td>
                            <td>%</td>
                        </tr>
                        <tr>
                            <td>Basophil</td>
                            <td></td>
                            <td>0 – 01</td>
                            <td>%</td>
                        </tr>
                        <tr>
                            <th colspan="4">BLOOD TYPE WITH RH:</th>
                        </tr>
                    </tbody>
                </table>
            </div>
            
            
            @include('client-pages.licence-footer')
            <div class="col-12">
                <button type="submit" class="btn btn-success float-end my-4">Print Results</button>
            </div>

           
            
        </form>
    </div>
</x-client-layout>
