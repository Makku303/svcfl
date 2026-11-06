<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
      <meta charset="utf-8">
      <title>SVCFL</title>
      <meta content="width=device-width, initial-scale=1.0" name="viewport">
      <meta content="" name="keywords">
      <meta content="" name="description">

      <!-- Favicon -->
      <link href="{{ asset('img/favicon.ico') }}" rel="icon">

      <!-- Google Web Fonts -->
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&family=Red+Rose:wght@600;700&display=swap"
          rel="stylesheet">

      <!-- Icon Font Stylesheet -->
      <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">

      <!-- Libraries Stylesheet -->
      <link href="{{ asset('lib/animate/animate.min.css')}}" rel="stylesheet">
      <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">

      <!-- Customized Bootstrap Stylesheet -->
      <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

      <!-- Template Stylesheet 
      <link href="{{ asset('css/style.css')}}" rel="stylesheet"> -->
    </head>
    <body>
            <div class="container">
            <form class="row g-3" method="POST" action="{{ route('diagnostics.express') }}">
            @method('POST')
            @csrf
                <h1 class="text-center font-bold text-xl mt-4" >Express Diagnostics</h1>
                <div class="col-md-12">
                    <label for="name" class="form-label">COMPLETE NAME</label>
                    <input type="text" class="form-control" id="name">
                </div>
                <div class="col-md-3">
                    <label for="age" class="form-label">AGE</label>
                    <input type="number" class="form-control" id="age">
                </div>
                <div class="col-md-3">
                    <label for="contact" class="form-label">CONTACT NO.</label>
                    <input type="text" class="form-control" id="contact" placeholder="09XX-123-1234">
                </div>
                <div class="col-md-6">
                    <label for="gender" class="form-label">GENDER</label>
                    <!-- <input type="text" class="form-control" id="gender"> -->
                     <select class="form-control" id="gender">
                        <option></option>
                        <option value="Female">Female</option>
                        <option value="Male">Male</option>
                     </select>
                </div>
                <div class="col-md-6">
                    <label for="email" class="form-label">EMAIL</label>
                    <input type="email" class="form-control" id="email">
                </div>
                <div class="col-md-6">
                    <label for="reqphysician" class="form-label">REQUESTING PHYSICIAN</label>
                    <input type="text" class="form-control" id="reqphysician">
                </div>
                <div class="col-12">
                    <label for="address" class="form-label">ADDRESS</label>
                    <input type="text" class="form-control" id="address">
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

                <div class="flex items-center gap-4 mb-2">
                    <x-primary-button>{{ __('Save') }}</x-primary-button>

                    @if (session('status') === 'diagnostics-saved')
                        <p
                            x-data="{ show: true }"
                            x-show="show"
                            x-transition
                            x-init="setTimeout(() => show = false, 2000)"
                            class="text-sm text-gray-600 dark:text-gray-400"
                        >{{ __('Saved.') }}</p>
                    @endif
                </div>
                <input type="submit" class="btn btn-primary btn-lg" name="submit" value="Submit">

            </form>
            <!-- Back to Top -->
            <a href="#" class="btn btn-lg btn-info btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a>
        </div>
        <!-- JavaScript Libraries -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="{{ asset('lib/wow/wow.min.js') }}"></script>
        <script src="{{ asset('lib/easing/easing.min.js') }}"></script>
        <script src="{{ asset('lib/waypoints/waypoints.min.js') }}"></script>
        <script src="{{ asset('lib/counterup/counterup.min.js') }}"></script>
        <script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>

        <!-- Template Javascript -->
        <!-- <script src="{{ asset('js/main.js') }}"></script>
        <script src="{{ asset('js/dark-mode.js')}}"></script> -->
    </body>
</html>
