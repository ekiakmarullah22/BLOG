@extends('frontend.layout.template')

@section('title', 'Laravel Blog | Contact Page')
    

@section('content')

<!-- Page content-->
<div class="container">
    <div class="row">
        <!-- Blog entries-->
        <div class="col-lg-8" data-aos="fade-in" data-aos-anchor-placement="top-bottom" data-aos-delay="300">
            <!-- Featured blog post-->
            <div class="card mb-4 shadow">
               <div class="text-center">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31749.81985912371!2d95.29597447127931!3d5.893855526324796!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3041c63f8e3fdca1%3A0xf20b1945392dd4c2!2sIe%20Meulee%2C%20Sukajaya%2C%20Sabang%20City%2C%20Aceh!5e0!3m2!1sen!2sid!4v1726531407749!5m2!1sen!2sid" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
               </div>
                <div class="card-body">
                    <div class="small text-muted">
                        <span class="ml-3"><i class="fa-regular fa-calendar-days mx-2"></i>{{ date('d/m/Y') }}</span>
                    </div>
                    <h2 class="card-title">Contact Laravel Blog</h2>
                    <p class="card-text">
                        Laravel Blog is simple blog project that use Framework Laravel, This is just sample project. I create this sample project to learn more about Laravel Framework.

                        If you found some bugs or miss leading words or mulfunction on this website please report it to me through my github page on : 
                    </p>

                    <ul class="d-flex justify-content-center">
                        <span class="text-dark"><a href="{{ $config["github"] }}" target="__blank" class="nav-link"><i class="fa-brands fa-github-alt mx-2"></i>Github</a></span>

                        <span class="text-primary"><a href="{{ $config["twitter"] }}" target="__blank" class="nav-link"><i class="fa-brands fa-twitter mx-2"></i>Twitter</a></span>

                        <span class="text-danger"><a href="{{ $config["youtube"] }}" target="__blank" class="nav-link"><i class="fa-brands fa-youtube mx-2"></i>Youtube</a></span>
                    </ul>
                </div>
            </div>
            <!-- Nested row for non-featured blog posts-->
        </div>

        <!-- Side widgets-->
        @include('frontend.layout.side-widget')
    </div>
</div>
    
@endsection


        

        
