<x-app-layout>
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
    <div class="mb-2 bg-white dark:bg-gray-800 relative overflow-x-auto shadow-md sm:rounded-lg">
        <div class="mx-2 my-2">
            <h4 class="text-center text-2xl font-bold dark:text-white mx-auto">PATIENT DETAILS</h4>
            <div class="grid md:grid-cols-12 md:gap-4 ">
                <div class="relative z-0 mb-5 group col-span-3">
                    <label for="req_no" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">REQUEST NO</label>
                    <input type="text" id="req_no" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" disabled />
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
                    <input type="datetime-local" id="dt_requested" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" disabled />
                </div>
            </div>
        </div>
    </div>
    <div class="bg-white dark:bg-gray-800 relative overflow-x-auto shadow-md sm:rounded-lg">
        <form class="mx-2 my-2">
            <h4 class="text-center text-2xl font-bold dark:text-white mx-auto">FECALYSIS</h4>
            <div class="grid md:grid-cols-3 md:gap-6">
                <div class="mb-5">
                    <input type="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Color" required />
                </div>
                <div class="mb-5">
                    <input type="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Consistency" required />
                </div>
                <div class="mb-5">
                    <input type="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Pus Cells" required />
                </div>
            </div>
            <div class="grid md:grid-cols-3 md:gap-6">
                <div class="mb-5">
                    <input type="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Red Blood Cells" required />
                </div>
                <div class="mb-5">
                    <input type="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Amoeba" required />
                </div>
                <div class="mb-5">
                    <input type="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="E.Coli" required />
                </div>
            </div>
            <div class="grid md:grid-cols-3 md:gap-6">
                <div class="mb-5">
                    <input type="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Ascaris" required />
                </div>
                <div class="mb-5">
                    <input type="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Hookworm" required />
                </div>
                <div class="mb-5">
                    <input type="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="E.Histolyca" required />
                </div>
            </div>
            <div class="grid md:grid-cols-3 md:gap-6">
                <div class="mb-5">
                    <input type="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Whip worm" required />
                </div>
                <div class="mb-5">
                    <input type="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Pinworm" required />
                </div>
                <div class="mb-5">
                    <input type="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Yeast Cells" required />
                </div>
            </div>
            <div class="grid md:grid-cols-3 md:gap-6">
                <div class="mb-5">
                    <input type="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Gardia lamblia" required />
                </div>
                <div class="mb-5">
                    <input type="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Others" required />
                </div>
                <div class="mb-5">
                    <input type="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Remarks" required />
                </div>
            </div>

            <h4 class="text-center text-2xl font-bold dark:text-white mx-auto">FECAL OCCULT BLOOD TEST</h4>
            <div class="grid md:grid-cols-12 md:gap-4 ">
                <div class="relative z-0 mb-5 group col-span-3">
                    <label class="text-right block mb-2 text-sm font-medium text-gray-900 dark:text-white">RESULT</label>
                </div>
                <div class="relative z-0 mb-5 group col-span-3">
                    <input type="text" id="bloodtype" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                </div>
                <div class="relative z-0 mb-5 group col-span-3">
                    <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">SAVE</button>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>

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