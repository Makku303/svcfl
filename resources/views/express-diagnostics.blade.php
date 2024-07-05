<x-guest-layout>
            <div class="container">
            <form class="row g-3" method="POST" action="{{ route('diagnostics.express') }}">
            @csrf
                <h1 class="text-center font-bold text-xl mt-4" >Express Diagnostics</h1>
                <div class="col-md-12">
                    <label for="name" class="form-label">COMPLETE NAME</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>
                <div class="col-md-3">
                    <label for="age" class="form-label">AGE</label>
                    <input type="number" class="form-control" id="age" name="age">
                </div>
                <div class="col-md-3">
                    <label for="contact" class="form-label">CONTACT NO.</label>
                    <input type="text" class="form-control" id="contact" name="contact" placeholder="09XX-123-1234">
                </div>
                <div class="col-md-6">
                    <label for="gender" class="form-label">GENDER</label>
                    <!-- <input type="text" class="form-control" id="gender"> -->
                     <select class="form-control" id="gender" name="gender">
                        <option></option>
                        <option value="Female">Female</option>
                        <option value="Male">Male</option>
                     </select>
                </div>
                <div class="col-md-6">
                    <label for="email" class="form-label">EMAIL</label>
                    <input type="email" class="form-control" id="email" name="email">
                </div>
                <div class="col-md-6">
                    <label for="physician" class="form-label">REQUESTING PHYSICIAN</label>
                    <input type="text" class="form-control" id="physician" name="physician">
                </div>
                <div class="col-12">
                    <label for="address" class="form-label">ADDRESS</label>
                    <input type="text" class="form-control" id="address" name="address">
                </div>
                <h3 class=" font-bold text-xl mb-3" >Laboratory Requests</h3>
                <div class="col-md-6 mt-1">
                    <!-- Lab request-Individual -->

                    <!-- <label class="text-dark">Select an Individual Test</label>
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

                    <select id="individualTest4" class="form-select mt-3" aria-label="Default select example">
                        <option selected>Pathology Testing</option>
                        <option value="1">Microbiology Tests</option>
                        <option value="2">Biochemistry Tests</option>
                        <option value="3">Histopatology Tests</option>
                    </select>

                    <select id="individualTest5" class="form-select mt-3" aria-label="Default select example">
                        <option selected>Pathology Testing</option>
                        <option value="1">Microbiology Tests</option>
                        <option value="2">Biochemistry Tests</option>
                        <option value="3">Histopatology Tests</option>
                    </select>
                    
                    <select id="individualTest6" class="form-select mt-3" aria-label="Default select example">
                        <option selected>Pathology Testing</option>
                        <option value="1">Microbiology Tests</option>
                        <option value="2">Biochemistry Tests</option>
                        <option value="3">Histopatology Tests</option>
                    </select> -->
                </div>
                <div class="col-md-6 mt-1">
                    <!-- Lab request-Package -->
                    <!-- <label class="text-dark">Select a Package Test</label>
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
                    
                    <select id="package3" class="form-select mt-3 my-3" aria-label="Default select example">
                        <option selected>Pathology Testing</option>
                        <option value="1">Microbiology Tests</option>
                        <option value="2">Biochemistry Tests</option>
                        <option value="3">Histopatology Tests</option>
                    </select> -->
                </div>
                <input type="submit" class="btn btn-primary btn-lg" name="submit" value="Submit">

            </form>
</x-guest-layout>