
    <div class="container">
        <form class="row g-3" method="POST" action="{{ route('diagnostics') }}">
            @csrf
            <h1 class="text-center font-bold text-xl mt-4" >Express Diagnostics</h1>
            <div class="col-md-4">
                <label for="fname" class="form-label">First Name</label>
                <input type="text" class="form-control" id="fname">
            </div>
            <div class="col-md-4">
                <label for="mname" class="form-label">Middle Name</label>
                <input type="text" class="form-control" id="mname">
            </div>
            <div class="col-md-4">
                <label for="lname" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="lname">
            </div>
            <div class="col-md-6">
                <label for="age" class="form-label">Age</label>
                <input type="number" class="form-control" id="age">
            </div>
            <div class="col-md-6">
                <label for="gender" class="form-label">Gender</label>
                <input type="text" class="form-control" id="gender">
            </div>
            <div class="col-md-6">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email">
            </div>
            <div class="col-md-6">
                <label for="reqphysician" class="form-label">Requesting Physician</label>
                <input type="text" class="form-control" id="reqphysician">
            </div>
            <div class="col-12">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control" id="address" placeholder="1234 Main St">
            </div>
            <div class="col-12">
                <label for="address2" class="form-label">Address 2</label>
                <input type="text" class="form-control" id="address2" placeholder="Apartment, studio, or floor">
            </div>
            <div class="col-md-6">
                <label for="city" class="form-label">City</label>
                <input type="text" class="form-control" id="city">
            </div>
            <div class="col-md-4">
                <label for="province" class="form-label">Province</label>
                <select id="province" class="form-select">
                <option selected>Select a Province</option>
                <option value="1">Valencia City</option>
                <option value="2">Cagayan De Oro City</option>
                <option value="3">Davao City</option>
                </select>
            </div>
            <div class="col-md-2">
                <label for="inputZip" class="form-label">Zip</label>
                <input type="text" class="form-control" id="inputZip">
            </div>
            <h3 class=" font-bold text-xl mt-4" >Laboratory Requests</h3>
            <!---
            <div class="col-12">
                <div class="form-check">
                <input class="form-check-input" type="checkbox" id="gridCheck">
                <label class="form-check-label" for="gridCheck">
                    Check me out
                </label>
                </div>
            </div> --->
            <h1></h1>
            <div class="col-md-6">
                <!-- Lab request-Individual -->
                
                <label class="mt-1">Select an Individual Test</label>
                <select id="individualTest1" class="form-select mt-3" aria-label="Default select example">
                    <option selected>Pathology Testing</option>
                    <option value="1">Microbiology Tests</option>
                    <option value="2">Biochemistry Tests</option>
                    <option value="3">Histopatology Tests</option>
                </select>

                <select id="individualTest2" class="form-select mt-3" aria-label="Default select example">
                    <option selected>Pathology Testing</option>
                    <option value="1">Microbiology Tests</option>
                    <option value="2">Biochemistry Tests</option>
                    <option value="3">Histopatology Tests</option>
                </select>
                
                <select id="individualTest3" class="form-select mt-3" aria-label="Default select example">
                    <option selected>Pathology Testing</option>
                    <option value="1">Microbiology Tests</option>
                    <option value="2">Biochemistry Tests</option>
                    <option value="3">Histopatology Tests</option>
                </select>

                
            </div>
            <div class="col-md-6">
                <!-- Lab request-Package -->
                <label class="mt-1">Select a Package Test</label>
                <select id="package1" class="form-select mt-3" aria-label="Default select example">
                    <option selected>Pathology Testing</option>
                    <option value="1">Microbiology Tests</option>
                    <option value="2">Biochemistry Tests</option>
                    <option value="3">Histopatology Tests</option>
                </select>

                <select id="package2" class="form-select mt-3" aria-label="Default select example">
                    <option selected>Pathology Testing</option>
                    <option value="1">Microbiology Tests</option>
                    <option value="2">Biochemistry Tests</option>
                    <option value="3">Histopatology Tests</option>
                </select>
                
                <select id="package3" class="form-select mt-3" aria-label="Default select example">
                    <option selected>Pathology Testing</option>
                    <option value="1">Microbiology Tests</option>
                    <option value="2">Biochemistry Tests</option>
                    <option value="3">Histopatology Tests</option>
                </select>
            </div>
        
            <div class="col-12">
                <button type="submit" class="btn btn-success float-end my-4">Submit</button>
            </div>
            
        
        </form>
          <!-- Back to Top -->
          <a href="#" class="btn btn-lg btn-info btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a>

