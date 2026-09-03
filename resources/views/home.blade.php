@extends('layout.app')
@push('styles')
    <style>
        .slick-prev:before,
        .slick-next:before {
            color:
                #333;
        }
    </style>
@endpush

@section('content')
    <div class="container py-4">

        @if (Session::get('succes'))
            <div class="alert alert-important alert-success alert-dismissible" role="alert">
                <div class="d-flex">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon" width="24" height="24"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M5 12l5 5l10 -10"></path>
                        </svg>
                    </div>
                    <div>{{ Session::get('succes') }}</div>
                </div>
                <a class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="close"></a>
            </div>
        @endif

        <div id="carousel-sample" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carousel-sample" data-bs-slide-to="0" class="active"></button>
                <button type="button" data-bs-target="#carousel-sample" data-bs-slide-to="1"></button>
                <button type="button" data-bs-target="#carousel-sample" data-bs-slide-to="2"></button>
                <button type="button" data-bs-target="#carousel-sample" data-bs-slide-to="3"></button>
                <button type="button" data-bs-target="#carousel-sample" data-bs-slide-to="4"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" alt=""
                        src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcStA1zREfwdFdKIgkJoGooLrFpQtrplGr88GtVKNwXeYQ&s=10" />
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" alt=""
                        src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcScz-swY9wyHGkhVgC0JDpwn2xcoyI2QgblzZXxhLReVg&s=10" />
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" alt=""
                        src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR8VTbS_vNejy5RwktrzUeO9Yfosp8n7QKGriAe21Duaw&s=10" />
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" alt=""
                        src="https://www.google.com/imgres?q=book%20festival%20banner&imgurl=https%3A%2F%2Fc8.alamy.com%2Fcomp%2F3A128FB%2Fbook-festival-colorful-banner-poster-design-template-vector-hand-drawn-sketch-illustration-flying-books-clouds-leaves-learning-and-education-creat-3A128FB.jpg&imgrefurl=https%3A%2F%2Fwww.alamy.com%2Fbook-festival-colorful-banner-poster-design-template-vector-hand-drawn-sketch-illustration-flying-books-clouds-leaves-learning-and-education-creat-image654659247.html&docid=6gqkDU0LSkRISM&tbnid=wnwLdcw_dbZxgM&vet=12ahUKEwix8vCKs8qWAxX5m-EIHQN7C08QnPAOegUIkQEQAA..i&w=1300&h=740&hcb=2&ved=2ahUKEwix8vCKs8qWAxX5m-EIHQN7C08QnPAOegUIkQEQAA" />
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" alt=""
                        src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTuKuNJhtjq9au_YH3VUeQOLX7U2s7kqB-uQl6GpzVacg&s" />
                </div>
            </div>
            <a class="carousel-control-prev" data-bs-target="#carousel-sample" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </a>
            <a class="carousel-control-next" data-bs-target="#carousel-sample" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </a>
        </div>

        <div class="mt-4">
            <div class="d-flex align-items-center">
                <span class="badge bg-yellow text-yellow-fg p-2"><i class="fa-solid fa-crown fs-3"></i></span>
                <h2 class="ms-3 text-dark"style="font-weight: bold;">Paket Langganan</h2>
            </div>
            <div class="row g-4 mt-2">
                <div class="col-md-4">
                    <div class="card h-100" style="background: linear-gradient(135deg, #ffffff 0%, #a7f1c6  100%);">
                        <div class="card-body row">
                            <div class="col-4"></div>
                            <div class="col-6 text-center text-dark">
                                <h2 style="font-weight: bold;">NON-FICION</h2>
                                <p class="text-secondary" style="font-weight: bold; margin: 0; !important">PACKAGE</p>
                                <div>
                                    Rp <span
                                        style="font-size: 2rem;
                                             font-weight: bold;
                                             "
                                        class="text-warning">
                                        49.000
                                    </span>

                                    <br>

                                    <span
                                        style="font-weight: bold;
                                                margin: 0;
                                                !important"
                                        class="text-secondary">

                                        /30 DAY
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="col-md-4">
                    <div class="card h-100" style="background: linear-gradient(135deg, #ffffff 0%, #d6a7f1  100%);">
                        <div class="card-body row">
                            <div class="col-4"></div>
                            <div class="col-6 text-center text-dark">
                                <h2 style="font-weight: bold;">NON-FICION</h2>
                                <p class="text-secondary" style="font-weight: bold; margin: 0; !important">PACKAGE</p>
                                <div>
                                    Rp <span
                                        style="font-size: 2rem;
                                             font-weight: bold;
                                             "
                                        class="text-warning">
                                        49.000
                                    </span>

                                    <br>
                                    <span
                                        style="font-weight: bold;
                                                margin: 0;
                                                !important"
                                        class="text-secondary">

                                        /30 DAY
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card h-100" style="background: linear-gradient(135deg, #ffffff 0%, #6f6bda  100%);">
                        <div class="card-body row">
                            <div class="col-4"></div>
                            <div class="col-6 text-center text-dark">
                                <h2 style="font-weight: bold;">FICION</h2>
                                <p class="text-secondary" style="font-weight: bold; margin: 0; !important">PACKAGE</p>
                                <div>
                                    Rp <span
                                        style="font-size: 2rem;
                                             font-weight: bold;
                                             "
                                        class="text-warning">
                                        99.000
                                    </span>

                                    <br>
                                    <span
                                        style="font-weight: bold;
                                                margin: 0;
                                                !important"
                                        class="text-secondary">

                                        /30 DAY
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="mt-4">
                <div class="d-flex align-items-center gap-2 mb-4">
                    <h2 class="mt-3 text-dark" style="font-weight: bold;">Buku Ini Baru Dirilis</h2>
                </div>

                <div id="wrapper-slider">
                    <div class="px-2">
                        <div class="card">
                            <div class="card-body ">
                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT51oQLWA4jqWVLGqDKPyCJ3wwG390M404xdKNa_aa7reujM7GMCXAUHFs-&s=10"
                                    alt="" class="d-block mx-auto w-75 h-50">
                                <div class="d-flex gap-2 mt-3">
                                    <span class="badge bg-secondary text-white"><i class="fa-solid fa-mobile-screen"></i>
                                        E-Book</span>
                                    <span class="badge bg-primary text-white">3+</span>
                                </div>
                                <div>
                                    <h3><span style="font-size: 0.8rem" class="text-secondary">Eka Nurfia Septiani</span>
                                    </h3>
                                    <span style="font-size: 1rem">Hujan</span>
                                    <h4 style="font-size: 1.2rem; font-weight: bold;">Rp 100.000</h4>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="px-2">
                        <div class="card">
                            <div class="card-body ">
                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSOQJfYGYkfotYuvEGheh278ex-DyBI7nDGeLfZ6aWawGKlEYWO_giMYQ5_&s=10"
                                    alt="" class="d-block mx-auto w-75 h-50">
                                <div class="d-flex gap-2 mt-3">
                                    <span class="badge bg-secondary text-white"><i class="fa-solid fa-mobile-screen"></i>
                                        E-Book</span>
                                    <span class="badge bg-primary text-white">3+</span>
                                </div>
                                <div>
                                    <h3><span style="font-size: 0.8rem" class="text-secondary">Eka Nurfia Septiani</span>
                                    </h3>
                                    <span style="font-size: 1rem">Seporsi Mie Ayam Sebelum Mati</span>
                                    <h4 style="font-size: 1.2rem; font-weight: bold;">Rp 150.000</h4>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="px-2">
                        <div class="card">
                            <div class="card-body ">
                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRHIQmygnWXhmLaVVzJPoeu7Bt9iILv_Gl3feod8R0tqSQy5yAxlHXOpVJh&s=10"
                                    alt="" class="d-block mx-auto w-75 h-50">
                                <div class="d-flex gap-2 mt-3">
                                    <span class="badge bg-secondary text-white"><i class="fa-solid fa-mobile-screen"></i>
                                        E-Book</span>
                                    <span class="badge bg-primary text-white">3+</span>
                                </div>
                                <div>
                                    <h3><span style="font-size: 0.8rem" class="text-secondary">Eka Nurfia Septiani</span>
                                    </h3>
                                    <span style="font-size: 1rem">Seporsi Mie Ayam Sebelum Mati</span>
                                    <h4 style="font-size: 1.2rem; font-weight: bold;">Rp 190.000</h4>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="px-2">
                        <div class="card">
                            <div class="card-body ">
                                <img src="https://perpustakaan.jakarta.go.id/catalog-dispusip/uploaded_files/sampul_koleksi/original/Monograf/103201.jpg"
                                    alt="" class="d-block mx-auto w-75 h-50">
                                <div class="d-flex gap-2 mt-3">
                                    <span class="badge bg-secondary text-white"><i class="fa-solid fa-mobile-screen"></i>
                                        E-Book</span>
                                    <span class="badge bg-primary text-white">3+</span>
                                </div>
                                <div>
                                    <h3><span style="font-size: 0.8rem" class="text-secondary">Eka Nurfia Septiani</span>
                                    </h3>
                                    <span style="font-size: 1rem">Seporsi Mie Ayam Sebelum Mati</span>
                                    <h4 style="font-size: 1.2rem; font-weight: bold;">Rp 190.000</h4>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="px-2">
                        <div class="card">
                            <div class="card-body ">
                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTmdKkFE7vXRXHW9oKagEbkJFYuX0cVvrUxa40UeM9OUO3Cb1MmX7Y8tbsC&s=10"
                                    alt="" class="d-block mx-auto w-75 h-50">
                                <div class="d-flex gap-2 mt-3">
                                    <span class="badge bg-secondary text-white"><i class="fa-solid fa-mobile-screen"></i>
                                        E-Book</span>
                                    <span class="badge bg-primary text-white">3+</span>
                                </div>
                                <div>
                                    <h3><span style="font-size: 0.8rem" class="text-secondary">Eka Nurfia Septiani</span>
                                    </h3>
                                    <span style="font-size: 1rem">Seporsi Mie Ayam Sebelum Mati</span>
                                    <h4 style="font-size: 1.2rem; font-weight: bold;">Rp 190.000</h4>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="px-2">
                        <div class="card">
                            <div class="card-body ">
                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTmdKkFE7vXRXHW9oKagEbkJFYuX0cVvrUxa40UeM9OUO3Cb1MmX7Y8tbsC&s=10"
                                    alt="" class="d-block mx-auto w-75 h-50">
                                <div class="d-flex gap-2 mt-3">
                                    <span class="badge bg-secondary text-white"><i class="fa-solid fa-mobile-screen"></i>
                                        E-Book</span>
                                    <span class="badge bg-primary text-white">3+</span>
                                </div>
                                <div>
                                    <h3><span style="font-size: 0.8rem" class="text-secondary">Eka Nurfia Septiani</span>
                                    </h3>
                                    <span style="font-size: 1rem">Seporsi Mie Ayam Sebelum Mati</span>
                                    <h4 style="font-size: 1.2rem; font-weight: bold;">Rp 190.000</h4>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="px-2">
                        <div class="card">
                            <div class="card-body ">
                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTmdKkFE7vXRXHW9oKagEbkJFYuX0cVvrUxa40UeM9OUO3Cb1MmX7Y8tbsC&s=10"
                                    alt="" class="d-block mx-auto w-75 h-50">
                                <div class="d-flex gap-2 mt-3">
                                    <span class="badge bg-secondary text-white"><i class="fa-solid fa-mobile-screen"></i>
                                        E-Book</span>
                                    <span class="badge bg-primary text-white">3+</span>
                                </div>
                                <div>
                                    <h3><span style="font-size: 0.8rem" class="text-secondary">Eka Nurfia Septiani</span>
                                    </h3>
                                    <span style="font-size: 1rem">Seporsi Mie Ayam Sebelum Mati</span>
                                    <h4 style="font-size: 1.2rem; font-weight: bold;">Rp 190.000</h4>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="px-2">
                        <div class="card">
                            <div class="card-body ">
                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTmdKkFE7vXRXHW9oKagEbkJFYuX0cVvrUxa40UeM9OUO3Cb1MmX7Y8tbsC&s=10"
                                    alt="" class="d-block mx-auto w-75 h-50">
                                <div class="d-flex gap-2 mt-3">
                                    <span class="badge bg-secondary text-white"><i class="fa-solid fa-mobile-screen"></i>
                                        E-Book</span>
                                    <span class="badge bg-primary text-white">3+</span>
                                </div>
                                <div>
                                    <h3><span style="font-size: 0.8rem" class="text-secondary">Eka Nurfia Septiani</span>
                                    </h3>
                                    <span style="font-size: 1rem">Seporsi Mie Ayam Sebelum Mati</span>
                                    <h4 style="font-size: 1.2rem; font-weight: bold;">Rp 190.000</h4>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="mt-4">
                <div class="d-flex align-items-center gap-2 mb-4">
                    <h2 class="mt-3 text-dark" style="font-weight: bold">Buku Gratis</h2>
                </div>
                <div class="row g-3">
                    <div class="col-4">
                        <div class="card d-flex flex-column">
                            <div class="row row-0 flex-fill">
                                <div class="col-md-3">
                                    <a href="#">
                                        <img src="https://marketplace.canva.com/EAFersXpW3g/1/0/1003w/
                                            canva-blue-and-white-modern-business-book-cover-cfxNJXYre8I.jpg"
                                            class="w-100 h-100 object-cover" alt="Card side image" />
                                    </a>
                                </div>
                                <div class="col">
                                    <div class="card-body h-full d-flex flex-column">
                                        <h3 class="card-title">
                                            <div class="badge"><i class="fa-solid fa-mobile"></i>PDF</div>
                                        </h3>
                                        <div class="text-secondary">
                                            Penulis
                                            <br><span class="text-dark">Judul Buku</span>
                                        </div>
                                        <div class="d-flex align-items-center pt-4 mt-auto">
                                            <h3><span class="text-decoration-line-through text-secondary">Rp
                                                    50.000</span> <span class="text-dark">Rp 0</span></h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="card d-flex flex-column">
                            <div class="row row-0 flex-fill">
                                <div class="col-md-3">
                                    <a href="#">
                                        <img src="https://marketplace.canva.com/EAFersXpW3g/1/0/1003w/
                                            canva-blue-and-white-modern-business-book-cover-cfxNJXYre8I.jpg"
                                            class="w-100 h-100 object-cover" alt="Card side image" />
                                    </a>
                                </div>
                                <div class="col">
                                    <div class="card-body h-full d-flex flex-column">
                                        <h3 class="card-title">
                                            <div class="badge"><i class="fa-solid fa-mobile"></i>PDF</div>
                                        </h3>
                                        <div class="text-secondary">
                                            Penulis
                                            <br><span class="text-dark">Judul Buku</span>
                                        </div>
                                        <div class="d-flex align-items-center pt-4 mt-auto">
                                            <h3><span class="text-decoration-line-through text-secondary">Rp
                                                    50.000</span> <span class="text-dark">Rp 0</span></h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="card d-flex flex-column">
                            <div class="row row-0 flex-fill">
                                <div class="col-md-3">
                                    <a href="#">
                                        <img src="https://marketplace.canva.com/EAFersXpW3g/1/0/1003w/
                                            canva-blue-and-white-modern-business-book-cover-cfxNJXYre8I.jpg"
                                            class="w-100 h-100 object-cover" alt="Card side image" />
                                    </a>
                                </div>
                                <div class="col">
                                    <div class="card-body h-full d-flex flex-column">
                                        <h3 class="card-title">
                                            <div class="badge"><i class="fa-solid fa-mobile"></i>PDF</div>
                                        </h3>
                                        <div class="text-secondary">
                                            Penulis
                                            <br><span class="text-dark">Judul Buku</span>
                                        </div>
                                        <div class="d-flex align-items-center pt-4 mt-auto">
                                            <h3><span class="text-decoration-line-through text-secondary">Rp
                                                    50.000</span> <span class="text-dark">Rp 0</span></h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="card d-flex flex-column">
                            <div class="row row-0 flex-fill">
                                <div class="col-md-3">
                                    <a href="#">
                                        <img src="https://marketplace.canva.com/EAFersXpW3g/1/0/1003w/
                                            canva-blue-and-white-modern-business-book-cover-cfxNJXYre8I.jpg"
                                            class="w-100 h-100 object-cover" alt="Card side image" />
                                    </a>
                                </div>
                                <div class="col">
                                    <div class="card-body h-full d-flex flex-column">
                                        <h3 class="card-title">
                                            <div class="badge"><i class="fa-solid fa-mobile"></i>PDF</div>
                                        </h3>
                                        <div class="text-secondary">
                                            Penulis
                                            <br><span class="text-dark">Judul Buku</span>
                                        </div>
                                        <div class="d-flex align-items-center pt-4 mt-auto">
                                            <h3><span class="text-decoration-line-through text-secondary">Rp
                                                    50.000</span> <span class="text-dark">Rp 0</span></h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="card d-flex flex-column">
                            <div class="row row-0 flex-fill">
                                <div class="col-md-3">
                                    <a href="#">
                                        <img src="https://marketplace.canva.com/EAFersXpW3g/1/0/1003w/
                                            canva-blue-and-white-modern-business-book-cover-cfxNJXYre8I.jpg"
                                            class="w-100 h-100 object-cover" alt="Card side image" />
                                    </a>
                                </div>
                                <div class="col">
                                    <div class="card-body h-full d-flex flex-column">
                                        <h3 class="card-title">
                                            <div class="badge"><i class="fa-solid fa-mobile"></i>PDF</div>
                                        </h3>
                                        <div class="text-secondary">
                                            Penulis
                                            <br><span class="text-dark">Judul Buku</span>
                                        </div>
                                        <div class="d-flex align-items-center pt-4 mt-auto">
                                            <h3><span class="text-decoration-line-through text-secondary">Rp
                                                    50.000</span> <span class="text-dark">Rp 0</span></h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="card d-flex flex-column">
                            <div class="row row-0 flex-fill">
                                <div class="col-md-3">
                                    <a href="#">
                                        <img src="https://marketplace.canva.com/EAFersXpW3g/1/0/1003w/
                                            canva-blue-and-white-modern-business-book-cover-cfxNJXYre8I.jpg"
                                            class="w-100 h-100 object-cover" alt="Card side image" />
                                    </a>
                                </div>
                                <div class="col">
                                    <div class="card-body h-full d-flex flex-column">
                                        <h3 class="card-title">
                                            <div class="badge"><i class="fa-solid fa-mobile"></i>PDF</div>
                                        </h3>
                                        <div class="text-secondary">
                                            Penulis
                                            <br><span class="text-dark">Judul Buku</span>
                                        </div>
                                        <div class="d-flex align-items-center pt-4 mt-auto">
                                            <h3><span class="text-decoration-line-through text-secondary">Rp
                                                    50.000</span> <span class="text-dark">Rp 0</span></h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            @endsection @push('scripts')
            <script>
                $(document).ready(function() {
                    $('#wrapper-slider').slick({
                        dots: true,
                        infinite: false,
                        speed: 300,
                        slidesToShow: 4,
                        slidesToScroll: 4,
                        responsive: [{
                                breakpoint: 1024,
                                settings: {
                                    slidesToShow: 3,
                                    slidesToScroll: 3,
                                    infinite: true,
                                    dots: true
                                }
                            },
                            {
                                breakpoint: 600,
                                settings: {
                                    slidesToShow: 2,
                                    slidesToScroll: 2
                                }
                            },
                            {
                                breakpoint: 480,
                                settings: {
                                    slidesToShow: 1,
                                    slidesToScroll: 1
                                }
                            }

                        ]
                    });
                });
            </script>
        @endpush
