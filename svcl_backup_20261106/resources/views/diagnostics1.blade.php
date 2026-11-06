<x-guest-layout>
    <form method="POST" action="{{ route('diagnostics') }}">
        @csrf
        <h1 class="text-center font-bold text-xl mt-4" >Express Diagnostics</h1>
        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Age -->
        <div class="mt-4">
            <x-input-label for="age" :value="__('Age')" />
            <x-text-input id="age" class="block mt-1 w-full" type="text" name="age" :value="old('age')" required autofocus autocomplete="age" />
            <x-input-error :messages="$errors->get('age')" class="mt-2" />
        </div>
    
        <!-- Gender -->
        <div class="mt-4">
            <x-input-label for="gender" :value="__('Gender')" />
            <x-text-input id="gender" class="block mt-1 w-full" type="text" name="gender" :value="old('gender')" required autofocus autocomplete="gender" />
            <x-input-error :messages="$errors->get('gender')" class="mt-2" />
        </div>

        <!-- Contact No -->
        <div class="mt-4">
            <x-input-label for="contact" :value="__('Contact No.')" />
            <x-text-input id="contact" class="block mt-1 w-full" type="text" name="contact" :value="old('contact')" required autofocus autocomplete="contact" />
            <x-input-error :messages="$errors->get('contact')" class="mt-2" />
        </div>

        <!-- Address -->
        <div class="mt-4">
            <x-input-label for="address" :value="__('Address')" />
            <x-text-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')" required autofocus autocomplete="address" />
            <x-input-error :messages="$errors->get('address')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Physician Name -->
        <div class="mt-4">
            <x-input-label for="physician" :value="__('Requesting Physician:')" />
            <x-text-input id="physician" class="block mt-1 w-full" type="text" name="physician" :value="old('physician')" required autofocus autocomplete="physician" />
            <x-input-error :messages="$errors->get('physician')" class="mt-2" />
        </div>

        <div class="grid md:grid-cols-2 md:gap-6">
            <div class="relative z-0 w-full mb-4 group">
                <!-- Lab request-Individual -->
                <form class="max-w-md mx-auto mt-4">
                    <label for="test" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white mt-4">Select an Individual Test</label>
                    <select id="individualTest1" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>Pathology Testing</option>
                        <option value="">Microbiology Tests</option>
                        <option value="">Biochemistry Tests</option>
                        <option value="">Histopatology Tests</option>
                    </select>

                    <select id="individualTest2" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mt-4">
                        <option selected>Pathology Testing</option>
                        <option value="">Microbiology Tests</option>
                        <option value="">Biochemistry Tests</option>
                        <option value="">Histopatology Tests</option>
                    </select>

                    <select id="individualTest3" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mt-4">
                        <option selected>Pathology Testing</option>
                        <option value="">Microbiology Tests</option>
                        <option value="">Biochemistry Tests</option>
                        <option value="">Histopatology Tests</option>
                    </select>
                </form>
            </div>

            <div class="relative z-0 w-full mb-4 group">
                <!-- Lab request-Package -->
                <form class="max-w-md mx-auto mt-4">
                <label for="test" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white mt-4">Select a Package Test</label>
                    <select id="package1" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>Pathology Testing</option>
                        <option value="">Microbiology Tests</option>
                        <option value="">Biochemistry Tests</option>
                        <option value="">Histopatology Tests</option>
                    </select>

                    <select id="package2" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mt-4">
                        <option selected>Pathology Testing</option>
                        <option value="">Microbiology Tests</option>
                        <option value="">Biochemistry Tests</option>
                        <option value="">Histopatology Tests</option>
                    </select>

                    <select id="package3" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mt-4">
                        <option selected>Pathology Testing</option>
                        <option value="">Microbiology Tests</option>
                        <option value="">Biochemistry Tests</option>
                        <option value="">Histopatology Tests</option>
                    </select>
                </form>
            </div>
        </div>

        

        <x-primary-button class="mt-4 float-right">
                {{ __('Submit') }}
        </x-primary-button>
    </form>
</x-guest-layout>
