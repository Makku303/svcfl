<x-app-layout>
    <div class="bg-white dark:bg-gray-800 relative overflow-x-auto shadow-md sm:rounded-lg">
        <form class="mx-2 my-2">
            <h4 class="text-center text-2xl font-bold dark:text-white mx-auto">Patient Details</h4>
            <div class="grid md:grid-cols-12 md:gap-4 ">
                <div class="relative z-0 mb-5 group col-span-3">
                    <label for="req_no" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">REQUEST NO</label>
                    <input type="text" id="req_no" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                </div>
                <div class="relative z-0 mb-5 group col-span-6">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">PATIENT NAME</label>
                    <input type="text" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                </div>                
                <div class="relative z-0 mb-5 group col-span-3">
                    <label for="or_no" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">OR NO</label>
                    <input type="text" id="or_no" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                </div>
            </div>
            <div class="grid md:grid-cols-12 md:gap-4 ">
                <div class="relative z-0 mb-5 group col-span-2">
                    <label for="age" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">AGE</label>
                    <input type="number" id="age" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                </div>
                <div class="relative z-0 mb-5 group col-span-2">
                    <label for="gender" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">GENDER</label>
                    <select id="gender" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected></option>
                        <option value="M">Male</option>
                        <option value="F">Femae</option>
                    </select>
                </div>
                <div class="relative z-0 mb-5 group col-span-8">
                    <label for="address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">ADDRESS</label>
                    <input type="text" id="address" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                </div>
            </div>
            <div class="grid md:grid-cols-12 md:gap-4 ">
                <div class="relative z-0 mb-5 group col-span-3">
                    <label for="doctor" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">REQUESTING DOCTOR</label>
                    <input type="text" id="doctor" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                </div>
                <div class="relative z-0 mb-5 group col-span-3">
                    <label for="dt_requested" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">DATE & TIME REQUESTED</label>
                    <input type="datetime-local" id="dt_requested" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                </div>
                <div class="relative z-0 mb-5 group col-span-3">
                    <label for="dt_performed" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">DATE & TIME PERFORMED</label>
                    <input type="datetime-local" id="dt_performed" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                </div>
                <div class="relative z-0 mb-5 group col-span-3">
                    <label for="dt_validated" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">DATE & TIME VALIDATED</label>
                    <input type="datetime-local" id="dt_validated" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                </div>
            </div>
            <h4 class="text-center text-2xl font-bold dark:text-white mx-auto">COMPLETE CLOOD COUNT</h4>
            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                        <th scope="col" class="px-6 py-3">COMPLETE BLOOD COUNT</th>
                        <th scope="col" class="px-6 py-3">RESULT</th>
                        <th scope="col" class="px-6 py-3">NORMAL VALUES</th>
                        <th scope="col" class="px-6 py-3">UNIT</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white" colspan="4">Blood Count</th>
                        </tr>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <td class="px-6 py-2">WHITE BLOOD CELLS</td>
                            <td class="px-6 py-2"></td>
                            <td class="px-6 py-2">4.5-11.0 x 103</td>
                            <td class="px-6 py-2">UI</td>
                        </tr>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <td class="px-6 py-2">RED BLOOD CELLS</td>
                            <td class="px-6 py-2"></td>
                            <td class="px-6 py-2"></td>
                            <td class="px-6 py-2">uL</td>
                        </tr>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <td class="px-6 py-2">PLATELET</td>
                            <td class="px-6 py-2"></td>
                            <td class="px-6 py-2"></td>
                            <td class="px-6 py-2">uL</td>
                        </tr>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <td class="px-6 py-2">HEMATOCRIT(HCT)</td>
                            <td class="px-6 py-2"></td>
                            <td class="px-6 py-2"></td>
                            <td class="px-6 py-2">%</td>
                        </tr>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <td class="px-6 py-2">HEMOGLOBIN</td>
                            <td class="px-6 py-2"></td>
                            <td class="px-6 py-2"></td>
                            <td class="px-6 py-2">G/dL</td>
                        </tr>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white" colspan="4">Differential Count</th>
                        </tr>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <td class="px-6 py-2">Neutrophil</td>
                            <td class="px-6 py-2"></td>
                            <td class="px-6 py-2">50 - 65</td>
                            <td class="px-6 py-2">%</td>
                        </tr>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <td class="px-6 py-2">Lymphocyte</td>
                            <td class="px-6 py-2"></td>
                            <td class="px-6 py-2">20 - 40</td>
                            <td class="px-6 py-2">%</td>
                        </tr>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <td class="px-6 py-2">Monocyte</td>
                            <td class="px-6 py-2"></td>
                            <td class="px-6 py-2">02 – 08</td>
                            <td class="px-6 py-2">%</td>
                        </tr>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <td class="px-6 py-2">Eosinophil</td>
                            <td class="px-6 py-2"></td>
                            <td class="px-6 py-2">01 – 03</td>
                            <td class="px-6 py-2">%</td>
                        </tr>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <td class="px-6 py-2">Basophil</td>
                            <td class="px-6 py-2"></td>
                            <td class="px-6 py-2">0 – 01</td>
                            <td class="px-6 py-2">%</td>
                        </tr>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white" colspan="4">BLOOD TYPE WITH RH:</th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </form>
    </div>
</x-app-layout>