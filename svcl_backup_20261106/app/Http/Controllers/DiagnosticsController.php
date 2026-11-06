<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\PackagesController;
use App\Http\Controllers\IndivualTestController;
use App\Models\Diagnostics;
use App\Models\Packages;
use App\Models\IndividualTest;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Response;
use Illuminate\Support\Str;

class DiagnosticsController extends Controller
{
    /**
     * Store the express-diagnostics's input form.
     */
    public function create(string $id)
    {

        $diagnostics = DB::insert('insert into * diagnostics where id = ? limit 1', [$id]);
        return response($diagnostics);
    }

    /**
     * Handle an incoming diagnostics request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'firstName' => ['required', 'string', 'max:255'],
            'lastName' => ['required', 'string', 'max:255'],
            'age' => ['required', 'integer', 'min:0'],
            'gender' => ['required', 'string', 'max:255'],
            'contact' => ['required', 'string', 'max:255'],
            'houseBuildingNo' => ['required', 'string', 'max:255'],
            'streetName' => ['required', 'string', 'max:255'],
            'barangaySubdivision' => ['required', 'string', 'max:255'],
            'cityMunicipality' => ['required', 'string', 'max:255'],
            'region' => ['required', 'string', 'max:255'],
            'zipCode' => ['required', 'string', 'max:20'],
            'email' => ['required', 'email', 'max:255'],
            'reqphysician' => ['required', 'string', 'max:255'],
            'package1' => ['nullable', 'string', 'max:255'],
            'package2' => ['nullable', 'string', 'max:255'],
            'package3' => ['nullable', 'string', 'max:255'],
            'package4' => ['nullable', 'string', 'max:255'],
            'individualTest1' => ['nullable', 'string', 'max:255'],
            'individualTest2' => ['nullable', 'string', 'max:255'],
            'individualTest3' => ['nullable', 'string', 'max:255'],
            'individualTest4' => ['nullable', 'string', 'max:255'],
            'individualTest5' => ['nullable', 'string', 'max:255'],
            'individualTest6' => ['nullable', 'string', 'max:255'],
            'individualTest7' => ['nullable', 'string', 'max:255'],
        ]);

        $diagnosticFields = [
            'key',
            'firstName',
            'lastName',
            'name',
            'age',
            'gender',
            'contact',
            'houseBuildingNo',
            'streetName',
            'barangaySubdivision',
            'cityMunicipality',
            'region',
            'zipCode',
            'address',
            'email',
            'reqphysician',
            'package1',
            'package2',
            'package3',
            'package4',
            'individualTest1',
            'individualTest2',
            'individualTest3',
            'individualTest4',
            'individualTest5',
            'individualTest6',
            'individualTest7',
        ];

        DB::transaction(function () use ($validated, $diagnosticFields): void {
            Diagnostics::create(array_combine(
                $diagnosticFields,
                array_map(
                    fn(string $field): string|int => match ($field) {
                        'key' => (string) Str::uuid(),
                        'name' => $validated['firstName'] . ' ' . $validated['lastName'],
                        'address' => implode(', ', array_filter([
                            $validated['houseBuildingNo'],
                            $validated['streetName'],
                            $validated['barangaySubdivision'],
                            $validated['cityMunicipality'],
                            $validated['region'],
                            $validated['zipCode'],
                        ])),
                        default => $validated[$field] ?? '',
                    },
                    $diagnosticFields
                )
            ));

            if (DB::table('users')->where('email', $validated['email'])->doesntExist()) {
                DB::table('users')->insert([
                    'name' => $validated['firstName'] . ' ' . $validated['lastName'],
                    'email' => $validated['email'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        });

        return redirect(route('express-diagnostics', absolute: false))->with('success', 'Sucessfully Saved!');
    }

    public function packagesList()
    {

        $packages = DB::table('packages')
            ->select('id', 'packageName')
            ->get()
            ->unique('packageName')
            ->sortBy('packageName')
            ->values();
        $individualTest = DB::table('individualtest')
            ->select('id', 'individualTest')
            ->get()
            ->unique('individualTest')
            ->sortBy('individualTest')
            ->values();

        return view('express-diagnostics', [
            'packages' => $packages,
            'individualTest' => $individualTest
        ]);
    }

    public function individualTestList()
    {
        $individualTest = DB::table('individualtest')->select('id', 'individualTest')->get();

        return view('express-diagnostics', [
            'individualTest' => $individualTest
        ]);
    }

    /**
     * Display the packages list.
     */
    public function search(Request $request): Response
    {
        if (!empty($request->id)) {
            $id = $request->id;
            $patientInfo = DB::select('select * from diagnostics where id = ? limit 1', [$request->id]);
            return response($patientInfo);
        }

        if (!empty($request->name)) {
            $id = $request->id;
            $patientInfo = DB::select('select * from diagnostics where name = ? limit 1', [$request->name]);
            return response($patientInfo);
        }

        return response(''); // Return a response

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // $packages = DB::select('select * from packages where id = ? limit 1', [$id]);
        // return response($packages);

        // $packages = Packages::where('status', 1)->get();
        //         foreach ($packages as $data){
        //             $data->status = 0;
        //             $data->update();
        //         }
    }
}
