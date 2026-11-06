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
            <div class="col-md-6">
                <label for="firstName" class="form-label">FIRST NAME</label>
                <input type="text" class="form-control" id="firstName" name="firstName" required>
            </div>
            <div class="col-md-6">
                <label for="lastName" class="form-label">LAST NAME</label>
                <input type="text" class="form-control" id="lastName" name="lastName" required>
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
            <div class="col-md-4">
                <label for="houseBuildingNo" class="form-label">HOUSE/BUILDING #</label>
                <input type="text" class="form-control" id="houseBuildingNo" name="houseBuildingNo" required>
            </div>
            <div class="col-md-8">
                <label for="streetName" class="form-label">STREET NAME</label>
                <input type="text" class="form-control" id="streetName" name="streetName" required>
            </div>
            <div class="col-md-6">
                <label for="barangaySubdivision" class="form-label">BRGY/SUB-DIVISION</label>
                <input type="text" class="form-control" id="barangaySubdivision" name="barangaySubdivision" required>
            </div>
            <div class="col-md-6">
                <label for="cityMunicipality" class="form-label">CITY/MUNICIPALITY</label>
                <input type="text" class="form-control" id="cityMunicipality" name="cityMunicipality" required>
            </div>
            <div class="col-md-8">
                <label for="region" class="form-label">REGION</label>
                <input type="text" class="form-control" id="region" name="region" required>
            </div>
            <div class="col-md-4">
                <label for="zipCode" class="form-label">ZIP CODE</label>
                <input type="text" class="form-control" id="zipCode" name="zipCode" required>
            </div>

            <h3 class=" font-bold text-xl mb-3" >Laboratory Requests</h3>
            <ul class="nav nav-fill nav-tabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="fill-tab-0" data-bs-toggle="tab" href="#fill-tabpanel-0" role="tab" aria-controls="fill-tabpanel-0" aria-selected="true"> Individual Test </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link " id="fill-tab-1" data-bs-toggle="tab" href="#fill-tabpanel-1" role="tab" aria-controls="fill-tabpanel-1" aria-selected="false"> Package Test </a>
                </li>
            </ul>
            <div class="tab-content pt-5" id="tab-content">
                <div class="tab-pane active" id="fill-tabpanel-0" role="tabpanel" aria-labelledby="fill-tab-0">
                    <!-- Lab request-Individual -->
                    <div class="col-md-6 mt-1">
                        <div id="individual-tests" data-prefix="individualTest" data-max="7">
                            <div class="test-row d-flex align-items-center gap-2 mt-3">
                                <select id="individualTest1" class="form-select" aria-label="Individual test 1" name="individualTest1">
                                    <option value="" selected>Select an individual test</option>
                                    @foreach($individualTest as $individual)
                                    <option value="{{ $individual->individualTest }}">{{ $individual->individualTest }}</option>
                                    @endforeach
                                </select>
                                <button type="button" class="btn btn-outline-danger remove-test" aria-label="Remove individual test">
                                    <i class="bi bi-dash-lg" aria-hidden="true"></i>
                                </button>
                            </div>
                        </div>
                        <button type="button" class="btn btn-outline-primary mt-3 add-test" aria-label="Add another individual test">
                            <i class="bi bi-plus-lg" aria-hidden="true"></i>
                        </button>
                    </div>
                </div>
           
                <div class="tab-pane" id="fill-tabpanel-1" role="tabpanel" aria-labelledby="fill-tab-1">
                    <!-- Lab request-Package -->
                    <div class="col-md-6 mt-1">
                        <div id="package-tests" data-prefix="package" data-max="4">
                            <div class="test-row d-flex align-items-center gap-2 mt-3">
                                <select id="package1" class="form-select" aria-label="Package test 1" name="package1">
                                    <option value="" selected>Select a package test</option>
                                    @foreach($packages as $package)
                                    <option value="{{ $package->packageName }}">{{ $package->packageName }}</option>
                                    @endforeach
                                </select>
                                <button type="button" class="btn btn-outline-danger remove-test" aria-label="Remove package test">
                                    <i class="bi bi-dash-lg" aria-hidden="true"></i>
                                </button>
                            </div>
                        </div>
                        <button type="button" class="btn btn-outline-primary mt-3 add-test" aria-label="Add another package test">
                            <i class="bi bi-plus-lg" aria-hidden="true"></i>
                        </button>
                    </div>
                </div>
            </div>
            <input type="submit" class="btn btn-primary btn-lg my-3" name="submit" value="Submit">
        </form>

        <script>
            document.querySelectorAll('[data-prefix]').forEach(function (group) {
                const prefix = group.dataset.prefix;
                const maxRows = Number(group.dataset.max);
                const addButton = group.parentElement.querySelector('.add-test');
                const isIndividual = prefix === 'individualTest';

                function updateRows() {
                    const rows = group.querySelectorAll('.test-row');
                    rows.forEach(function (row, index) {
                        const select = row.querySelector('select');
                        const number = index + 1;
                        select.id = prefix + number;
                        select.name = prefix + number;
                        select.setAttribute('aria-label', (isIndividual ? 'Individual' : 'Package') + ' test ' + number);
                    });
                    addButton.disabled = rows.length >= maxRows;

                    if (isIndividual) {
                        const selectedValues = Array.from(group.querySelectorAll('select'))
                            .map(function (select) { return select.value; })
                            .filter(Boolean);
                        group.querySelectorAll('select').forEach(function (select) {
                            Array.from(select.options).forEach(function (option) {
                                option.disabled = option.value !== '' && selectedValues.includes(option.value) && option.value !== select.value;
                            });
                        });
                    }
                }

                addButton.addEventListener('click', function () {
                    const firstRow = group.querySelector('.test-row');
                    if (group.querySelectorAll('.test-row').length >= maxRows) return;
                    const newRow = firstRow.cloneNode(true);
                    newRow.querySelector('select').selectedIndex = 0;
                    group.appendChild(newRow);
                    updateRows();
                });

                group.addEventListener('click', function (event) {
                    const removeButton = event.target.closest('.remove-test');
                    if (!removeButton) return;
                    const rows = group.querySelectorAll('.test-row');
                    if (rows.length > 1) removeButton.closest('.test-row').remove();
                    else removeButton.closest('.test-row').querySelector('select').selectedIndex = 0;
                    updateRows();
                });

                group.addEventListener('change', updateRows);
                updateRows();
            });
        </script>
        
        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-info btn-lg-square rounded-circle back-to-top float-end"><i class="bi bi-arrow-up float-right"></i></a>
    </div>
</x-client-layout>
