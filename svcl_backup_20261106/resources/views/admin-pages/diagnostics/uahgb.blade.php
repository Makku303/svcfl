<x-admin-layout>
    <div class="bg-white mb-2 dark:bg-gray-800 relative overflow-x-auto shadow-md sm:rounded-lg">
        <div class="mx-2 my-2">
            <h4 class="text-center text-2xl font-bold dark:text-white mx-auto">Search Patient</h4>
            <div class="grid md:grid-cols-12 md:gap-4 ">
                <div class="relative z-0 mb-5 group col-span-3">
                    <label for="search_req_no" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">REQUEST NO</label>
                    <input type="text" id="search_req_no" name="search_req_no" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                </div>
                <div class="relative z-0 mb-5 group col-span-4">
                    <label for="search_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">PATIENT NAME</label>
                    <input type="text" id="search_name" name="search_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                </div>
                <div class="relative z-0 mb-5 group col-span-3">
                <button type="button" onclick="getInfo()" class="mt-7 p-2.5 ms-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                    </svg>
                    <span class="sr-only">Search</span>
                </button>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-white dark:bg-gray-800 relative overflow-x-auto shadow-md sm:rounded-lg">
        <form class="mx-2 my-2">
            <h4 class="text-center text-2xl font-bold dark:text-white mx-auto">PATIENT DETAILS</h4>
            <div class="grid md:grid-cols-12 md:gap-4 ">
                <div class="relative z-0 mb-5 group col-span-3">
                    <label for="req_no" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">REQUEST NO</label>
                    <input type="text" id="req_no" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                </div>
                <div class="relative z-0 mb-5 group col-span-6">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">PATIENT NAME</label>
                    <input type="text" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" disabled />
                </div>                
                <div class="relative z-0 mb-5 group col-span-3">
                    <label for="or_no" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">OR NO</label>
                    <input type="text" id="or_no" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" disabled />
                </div>
            </div>
            <div class="grid md:grid-cols-12 md:gap-4 ">
                <div class="relative z-0 mb-5 group col-span-2">
                    <label for="age" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">AGE</label>
                    <input type="text" id="age" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" disabled />
                </div>
                <div class="relative z-0 mb-5 group col-span-2">
                    <label for="gender" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">GENDER</label>
                    <input type="text" id="gender" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" disabled />
                </div>
                <div class="relative z-0 mb-5 group col-span-8">
                    <label for="address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">ADDRESS</label>
                    <input type="text" id="address" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" disabled />
                </div>
            </div>
            <div class="grid md:grid-cols-12 md:gap-4 ">
                <div class="relative z-0 mb-5 group col-span-3">
                    <label for="reqphysician" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">REQUESTING DOCTOR</label>
                    <input type="text" id="reqphysician" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" disabled />
                </div>
                <div class="relative z-0 mb-5 group col-span-3">
                    <label for="dt_requested" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">DATE & TIME REQUESTED</label>
                    <input type="datetime-local" id="dt_requested" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                </div>
                <div class="relative z-0 mb-5 group col-span-3">
                    <label for="dt_performed" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">DATE & TIME PERFORMED</label>
                    <input type="datetime-local" id="dateTimePerf" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                </div>
                <div class="relative z-0 mb-5 group col-span-3">
                    <label for="dt_validated" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">DATE & TIME VALIDATED</label>
                    <input type="datetime-local" id="dt_validated" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                </div>
            </div>
            <div class="bg-white dark:bg-gray-800 relative overflow-x-auto shadow-md sm:rounded-lg">
                <form class="mx-2 my-2">
                    <h4 class="text-center text-2xl font-bold dark:text-white mx-auto">URINALYSIS</h4>
                    <h6 class="text-left font-bold dark:text-white">Physical Characteristics</h6>
                    <div class="grid md:gap-4 grid-cols-4 grid-rows-3 mb-5">
                        <label for="Color" class="text-gray-900 text-L rounded-lg focus:ring-blue-500 w-full p-2.5 dark:placeholder-gray-400 dark:text-white">Color</label>
                        <input type="text" id="Color" name="Color" class="text-right bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required />
                        <label for="Transparency" class="text-gray-900 text-L rounded-lg focus:ring-blue-500 w-full p-2.5 dark:placeholder-gray-400 dark:text-white">Transparency</label>
                        <input type="text" id="Transparency" name="Transparency" class="text-right bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required />
                        <label for="pH" class="text-gray-900 text-L rounded-lg focus:ring-blue-500 w-full p-2.5 dark:placeholder-gray-400 dark:text-white">pH</label>
                        <input type="text" id="pH" name="pH" class="text-right bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required />
                        <label for="Specific Gravity" class="text-gray-900 text-L rounded-lg focus:ring-blue-500 w-full p-2.5 dark:placeholder-gray-400 dark:text-white">Specific Gravity</label>
                        <input type="text" id="Specific Gravity" name="Specific Gravity" class="text-right bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required />
                    </div>
                    <h6 class="text-left font-bold dark:text-white">Chemical Characteristics</h6>
                    <div class="grid md:gap-4 grid-cols-4 grid-rows-3">
                        <label for="Protein" class="text-gray-900 text-L rounded-lg focus:ring-blue-500 w-full p-2.5 dark:placeholder-gray-400 dark:text-white">Protein</label>
                        <input type="text" id="Protein" name="Protein" class="text-right bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required />
                        <label for="Glucose" class="text-gray-900 text-L rounded-lg focus:ring-blue-500 w-full p-2.5 dark:placeholder-gray-400 dark:text-white">Glucose</label>
                        <input type="text" id="Glucose" name="Glucose" class="text-right bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required />
                    </div>
                    <h6 class="text-left font-bold dark:text-white">Microscopic Findings</h6>
                    <div class="grid md:gap-4 grid-cols-4 grid-rows-3 mb-5">
                        <label for="Casts" class="text-gray-900 text-L rounded-lg focus:ring-blue-500 w-full p-2.5 dark:placeholder-gray-400 dark:text-white">Casts</label>
                        <input type="text" id="Casts" name="Casts" class="text-right bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required />
                        <label for="Crystals" class="text-gray-900 text-L rounded-lg focus:ring-blue-500 w-full p-2.5 dark:placeholder-gray-400 dark:text-white">Crystals</label>
                        <input type="text" id="Crystals" name="Crystals" class="text-right bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required />
                        <label for="Amorphous" class="text-gray-900 text-L rounded-lg focus:ring-blue-500 w-full p-2.5 dark:placeholder-gray-400 dark:text-white">Amorphous</label>
                        <input type="text" id="Amorphous" name="Amorphous" class="text-right bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required />
                        <label for="Micro Organism" class="text-gray-900 text-L rounded-lg focus:ring-blue-500 w-full p-2.5 dark:placeholder-gray-400 dark:text-white">Micro Organism</label>
                        <input type="text" id="Micro Organism" name="Micro Organism" class="text-right bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required />
                        <label for="Others" class="text-gray-900 text-L rounded-lg focus:ring-blue-500 w-full p-2.5 dark:placeholder-gray-400 dark:text-white">Others</label>
                        <input type="text" id="Others" name="Others" class="text-right bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required />
                        <label for="W.B.C / hpf" class="text-gray-900 text-L rounded-lg focus:ring-blue-500 w-full p-2.5 dark:placeholder-gray-400 dark:text-white">W.B.C / hpf</label>
                        <input type="text" id="WBC" name="WBC" class="text-right bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required />
                        <label for="R.B.C. / hpf" class="text-gray-900 text-L rounded-lg focus:ring-blue-500 w-full p-2.5 dark:placeholder-gray-400 dark:text-white">R.B.C. / hpf</label>
                        <input type="text" id="RBC" name="RBC" class="text-right bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required />
                        <label for="Epithelial Cells" class="text-gray-900 text-L rounded-lg focus:ring-blue-500 w-full p-2.5 dark:placeholder-gray-400 dark:text-white">Epithelial Cells</label>
                        <input type="text" id="Epithelial Cells" name="Epithelial Cells" class="text-right bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required />
                        <label for="Mucus Threads" class="text-gray-900 text-L rounded-lg focus:ring-blue-500 w-full p-2.5 dark:placeholder-gray-400 dark:text-white">Mucus Threads</label>
                        <input type="text" id="Mucus Threads" name="Mucus Threads" class="text-right bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required />
                        <label for="Bacteria" class="text-gray-900 text-L rounded-lg focus:ring-blue-500 w-full p-2.5 dark:placeholder-gray-400 dark:text-white">Bacteria</label>
                        <input type="text" id="Bacteria" name="Bacteria" class="text-right bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required />
                    </div>
                    <h6 class="text-left font-bold dark:text-white">HEMOGLOBIN</h6>
                    <div class="grid md:gap-4 grid-cols-4 grid-rows-3 mb-5">
                        <label for="Hemoglobin" class="text-gray-900 text-L rounded-lg focus:ring-blue-500 w-full p-2.5 dark:placeholder-gray-400 dark:text-white">Results</label>
                        <input type="text" id="Hemoglobin" name="Hemoglobin" class="text-right bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="mg/dl" required />
                        <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">SAVE</button>
                    </div>
                   
                </form>
            </div>
        </form>    
    </div>
</x-admin-layout>

<script>
    function getInfo() {
        var data = {
            id : $('#search_req_no').val(),
            name : $('#search_name').val()
        };

        console.log(data);
        $.ajax({
                headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/diagnostics/search',
                type: 'POST',
                data: data,
                success: function(response) {
                    // Handle the response (e.g., update UI)
                    $('#req_no').val(response[0].id);
                    $('#name').val(response[0].name);
                    $('#age').val(response[0].age);
                    $('#gender').val(response[0].gender);
                    $('#address').val(response[0].address);
                    $('#reqphysician').val(response[0].reqphysician);
                    $('#dt_requested').val(response[0].updated_at);

                    console.log(response);
                }
            });
    }
</script>