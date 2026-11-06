<x-client-layout>
    <div class="container">
        <form class="row g-3 needs-validation" novalidate method="POST" action="{{ route('ua-results') }}">
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
            <h1 class="text-center font-bold text-xl mt-4" >Urinalysis</h1>

            <h5 class="font-medium text-xl mt-4" >Physical</h5>
            <div class="table-responsive">
                <table class="table table-bordered text-center">
                    <thead >
                        <tr>
                            <th scope="col">Color</th>
                            <th scope="col">Transparency</th>
                            <th scope="col">pH</th>
                            <th scope="col">Sp. Gr.</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Yellow</td>
                            <td>Slightly Hazy</td>
                            <td>6.0</td>
                            <td>1.020</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <h5 class="font-medium text-xl mt-4" >Chemical</h5>
            <div class="table-responsive">
                <table class="table table-bordered text-center">
                    <thead >
                        <tr>
                            <th scope="col">Protein</th>
                            <th scope="col">Glucose</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Negative</td>
                            <td>Negative</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <h5 class="font-medium text-xl mt-4" >Microscopic</h5>
            <div class="table-responsive">
                <table class="table table-bordered text-center">
                    <thead >
                        <tr>
                            <th scope="col">Casts</th>
                            <th scope="col">Crystals</th>
                            <th scope="col">Amorphous</th>
                            <th scope="col">Micro Organism</th>
                            <th scope="col">Others</th>
                            <th scope="col">W.B.C / hpf</th>
                            <th scope="col">R.B.C. / hpf</th>
                            <th scope="col">Epithelial Cells</th>
                            <th scope="col">Mucus Threads</th>
                            <th scope="col">Bacteria</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td>CALCIUM OXALATE: RARE/HPF</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>1-2</td>
                            <td>2-5</td>
                            <td>Rare</td>
                            <td>Moderate</td>
                            <td>Few</td>

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