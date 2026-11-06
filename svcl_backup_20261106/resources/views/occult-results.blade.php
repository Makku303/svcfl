<x-client-layout>  
    <div class="container">
            <form class="row g-3 needs-validation" novalidate method="GET" action="{{ route('occult-results') }}">
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

                <h1 class="text-center font-bold text-xl mt-4" >FECALYSIS</h1>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                            <th scope="col" class="col-4">METHOD:</th>
                            <th scope="col" class="text-center">RESULT</th> 
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Color</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Consistency</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Pus Cells</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Red Blood Cells</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Amoeba</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>E.Coli</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>E.Histolyca</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Ascaris</td>
                                <td></td>
                            </tr>  
                            <tr>
                                <td>Hookworm</td>
                                <td></td>
                            </tr> 
                            <tr>
                                <td>Whip worm</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Pinworm</td>
                                <td></td>
                            </tr>  
                            <tr>
                                <td>Yeast Cells</td>
                                <td></td>
                            </tr>  
                            <tr>
                                <td>Gardia lamblia</td>
                                <td></td>
                            </tr>  
                            <tr>
                                <td>Others</td>
                                <td></td>
                            </tr>  
                            <tr>
                                <td colspan="4">Remarks:</td>
                            </tr> 
                        </tbody>
                    </table>
                </div>
                <h1 class="text-center font-bold text-xl mt-4" >FECAL OCCULT BLOOD TEST</h1>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                            <th colspan="4" class="text-center">METHOD:TEST KIT(IMMUNOCHROMATOGRAPHICASSAY)</th>
                            </tr>
                        </thead>
                        <tr>
                            <td class="col-3">Result</td>
                            <td></td>
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