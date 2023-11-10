<!DOCTYPE html>
<html class="wide wow-animation" lang="en">
    <head>
        <title>Card Distribution</title>
        <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
        <meta charset="UTF-8">
        <link rel="icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon">
        <!-- Stylesheets-->
        @include('layouts.styles')
    </head>
    <body>
        @include('layouts.preloader')
        <div class="page">
        <!-- Example of Cards -->
            <section class="section section-md bg-default">
                <div class="container">
                    <h3 class="oh-desktop"><span class="d-inline-block wow slideInDown">Cards</span></h3>
                    <div class="row row-md row-30">
                        <div class="col-md-6 col-xl-3 isotope-item oh-desktop">
                            <!-- Thumbnail-->
                            <article class="thumbnail thumbnail-mary thumbnail-mary-2 wow slideInDown"><a class="thumbnail-mary-figure" href="{{ asset('images/spade.png') }}" data-lightgallery="item"><img src="{{ asset('images/spade.png') }}" alt="" width="311" height="289"/></a>
                              <div class="thumbnail-mary-caption">
                                <div>
                                  <h6 class="thumbnail-mary-title"><a href="#">Spade</a></h6>
                                </div>
                              </div>
                            </article>
                        </div>
                        <div class="col-md-6 col-xl-3 isotope-item oh-desktop">
                            <!-- Thumbnail-->
                            <article class="thumbnail thumbnail-mary thumbnail-mary-2 wow slideInDown"><a class="thumbnail-mary-figure" href="{{ asset('images/heart.png') }}" data-lightgallery="item"><img src="{{ asset('images/heart.png') }}" alt="" width="311" height="289"/></a>
                              <div class="thumbnail-mary-caption">
                                <div>
                                  <h6 class="thumbnail-mary-title"><a href="#">Heart</a></h6>
                                </div>
                              </div>
                            </article>
                        </div>
                        <div class="col-md-6 col-xl-3 isotope-item oh-desktop">
                            <!-- Thumbnail-->
                            <article class="thumbnail thumbnail-mary thumbnail-mary-2 wow slideInDown"><a class="thumbnail-mary-figure" href="{{ asset('images/club.png') }}" data-lightgallery="item"><img src="{{ asset('images/club.png') }}" alt="" width="311" height="289"/></a>
                              <div class="thumbnail-mary-caption">
                                <div>
                                  <h6 class="thumbnail-mary-title"><a href="#">Club</a></h6>
                                </div>
                              </div>
                            </article>
                        </div>
                        <div class="col-md-6 col-xl-3 isotope-item oh-desktop">
                            <!-- Thumbnail-->
                            <article class="thumbnail thumbnail-mary thumbnail-mary-2 wow slideInDown"><a class="thumbnail-mary-figure" href="{{ asset('images/diamond.png') }}" data-lightgallery="item"><img src="{{ asset('images/diamond.png') }}" alt="" width="311" height="289"/></a>
                              <div class="thumbnail-mary-caption">
                                <div>
                                  <h6 class="thumbnail-mary-title"><a href="#">Diamond</a></h6>
                                </div>
                              </div>
                            </article>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Distribute process -->
            <section class="section section-sm section-first bg-default">
                <div class="container">
                    <h3 class="heading-3">Distribute The Cards</h3>
                    <div class="row row-20 gutters-20">
                        <div class="col-md-12 col-lg-6">
                            <form class="rd-form rd-mailform form-style-1" id="myForm" method="POST" action="{{ route('distribute') }}">
                                @csrf
                                <div class="row row-20 gutters-20">
                                    <div class="col-md-12 col-lg-12">
                                        <div class="form-wrap wow slideInDown">
                                            <input class="form-input" id="number_of_people" type="text" name="number_of_people" required>
                                            <label class="form-label" for="number_of_people">Number of People</label>
                                        </div>
                                        <div class="group-custom-1 group-middle oh-desktop">
                                            <button class="button button-lg button-primary button-winona wow fadeInRight" type="button" onclick="validateAndSubmit()">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-12 col-lg-6">
                            <div class="owl-carousel owl-style-11 dots-style-2" data-items="1" data-margin="30" data-dots="true" data-mouse-drag="true" data-rtl="true">
                                <article class="box-icon-megan wow fadeInUp">
                                <div class="box-icon-megan-header">
                                    <div class="box-icon-megan-icon linearicons-box"></div>
                                </div>
                                <h5 class="box-icon-megan-title"><a href="#">Number of People: <b>{{ request('number_of_people') }}</b></a></h5>
                                @foreach ($cards as $person => $cardArray)
                                    <p class="box-icon-megan-text"><b>{{ htmlspecialchars($person) }}</b> 
                                        @foreach ($cardArray as $card)
                                            {{ htmlspecialchars($card) }}
                                            @if (!$loop->last)
                                                , 
                                            @endif
                                        @endforeach
                                    </p>
                                @endforeach
                                </article>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <!-- Javascript-->
        @include('layouts.scripts')
        <script>
            function validateAndSubmit() {
                // Get the input value
                const numberOfPeople = document.getElementById('number_of_people').value;

                // Validate the input
                if (!numberOfPeople || isNaN(numberOfPeople)) {
                    // Display message using SweetAlert for invalid input
                    Swal.fire({
                        title: 'Error!',
                        text: 'Input value does not exist or is invalid',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                    $('#number_of_people').val(''); // Clear input value
                    return; // Terminate the process
                }
                else if (numberOfPeople <= 0) {
                    // Display message using SweetAlert for input less than 0
                    Swal.fire({
                        title: 'Error!',
                        text: 'Input value is invalid',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                    $('#number_of_people').val(''); // Clear input value
                    return; // Terminate the process
                }
                // Valid input, submit the form or perform other actions
                document.getElementById('myForm').submit();
            }
        </script>
    </body>
</html>