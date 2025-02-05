@extends('layouts.app')

@section('content')

    <main class="main">

        <!-- Hero Section -->
        <section id="hero" class="hero section accent-background">

            <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">
                <div class="row gy-5 justify-content-between">
                    <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
                        <h2 style="color: #ffff;"><span style="color: #ffff;">O futuro ao seu alcance 24H</span></h2>
                        <p style="color: #ffff">Experimente grátis e sinta a diferença!</p>
                        <div class="d-flex">
                            <a href="#about-consultores" style="background-color: green;color: #ffff"
                                class="btn-get-started mx-3">VIDENTES</a>
                            <a href="#about" style="background-color: green;color: #ffff"
                                class="btn-get-started">EXPERIMENTE GRÁTIS</a>

                        </div>
                    </div>
                    <style>
                        @keyframes girar {
                            from {
                                transform: rotate(0deg);
                            }

                            to {
                                transform: rotate(360deg);
                            }
                        }

                        #fotor-redondo {
                            animation: girar 150s linear infinite;
                            /* Tempo de rotação de 10 segundos */
                        }
                    </style>
                    <div class="col-lg-5 order-1 order-lg-2">
                        <img id="fotor-redondo" src="assets/img/fotor-redondo.png" width="80%" class="img-fluid"
                            alt="">
                    </div>
                </div>
            </div>

            <style>
                .icon-box {
                    position: relative !important;
                    background-size: cover !important;
                    background-repeat: no-repeat !important;
                    background-position: center !important;
                    width: 100% !important;
                    aspect-ratio: 3/2 !important;
                    /* Mantém a proporção sem distorcer */
                    display: flex !important;
                    flex-direction: column !important;
                    align-items: center !important;
                    justify-content: flex-end !important;
                    padding: 0 !important;
                    /* Remover padding extra */
                    margin: 0 !important;
                    /* Remover margem extra */
                    border-radius: 10px !important;
                    overflow: hidden !important;
                    color: white !important;
                    padding: 50% !important;
                    margin-top: 30% !important;
                }

                .icon-box .content {
                    position: absolute !important;
                    bottom: 15px !important;
                    /* Move tudo mais para baixo */
                    width: 100% !important;
                    text-align: center !important;
                    background: rgba(0, 0, 0, 0.6) !important;
                    padding: 10px !important;
                    border-radius: 10px !important;
                }

                .icon-box h4 {
                    font-size: 18px !important;
                    font-weight: bold !important;
                    margin-bottom: 5px !important;
                }

                .icon-box .status {
                    font-size: 14px !important;
                    margin-bottom: 10px !important;
                    display: block !important;
                }

                .icon-box button {
                    padding: 8px 15px !important;
                    font-size: 14px !important;
                    background-color: red !important;
                    color: white !important;
                    border: none !important;
                    border-radius: 5px !important;
                }

                .title {
                    color: white !important;
                }
            </style>

            <div id="about-consultores" class="icon-boxes position-relative" data-aos="fade-up" data-aos-delay="200">
                <div class="container position-relative">
                    <div class="row gy-4 mt-5">

                        <!-- Atendente 1 -->
                        <div class="col-xl-3 col-md-6">
                            <div class="icon-box"
                                style="background-image: url('{{ asset('assets/img/atendente1.jpg') }}');">
                                <div class="content">
                                    <h4 class="title">Atendente 1</h4>
                                    <span class="status">Disponível</span>
                                    <button class="btn btn-danger">Consultar</button>
                                </div>
                            </div>
                        </div><!-- End Atendente -->

                        <!-- Atendente 2 -->
                        <div class="col-xl-3 col-md-6">
                            <div class="icon-box"
                                style="background-image: url('{{ asset('assets/img/atendente2.jpg') }}');">
                                <div class="content">
                                    <h4 class="title">Atendente 1</h4>
                                    <span class="status">Disponível</span>
                                    <button class="btn btn-danger">Consultar</button>
                                </div>
                            </div>
                        </div><!-- End Atendente -->

                        <!-- Atendente 3 -->
                        <div class="col-xl-3 col-md-6">
                            <div class="icon-box"
                                style="background-image: url('{{ asset('assets/img/atendente3.jpg') }}');">
                                <div class="content">
                                    <h4 class="title">Atendente 1</h4>
                                    <span class="status">Disponível</span>
                                    <button class="btn btn-danger">Consultar</button>
                                </div>
                            </div>
                        </div><!-- End Atendente -->

                        <!-- Atendente 4 -->
                        <div class="col-xl-3 col-md-6">
                            <div class="icon-box"
                                style="background-image: url('{{ asset('assets/img/atendente4.jpg') }}');">
                                <div class="content">
                                    <h4 class="title">Atendente 1</h4>
                                    <span class="status">Disponível</span>
                                    <button class="btn btn-danger">Consultar</button>
                                </div>
                            </div>
                        </div><!-- End Atendente -->

                    </div>
                </div>
            </div>



        </section><!-- /Hero Section -->
        <!-- Services Section -->
        <section id="horoscopoNave" class="services section">

            <div class="container section-title" data-aos="fade-up">
                <h2>Horóscopo</h2>
                <p>Descubra o que os astros revelam para você hoje! Confira as previsões para cada signo e aproveite as
                    energias do universo a seu favor.</p>
            </div>

            <div class="container">

                <div class="row gy-4">
                    <div class="col-md-3" data-aos="fade-up" data-aos-delay="100">
                        <div class="service-item position-relative">
                            <div class="icon">
                                <img src="{{ asset('assets/img/horoscopos/aries.png') }}" alt="Áries"
                                    class="img-fluid">
                            </div>
                            <h3>Áries</h3>
                            <p>O ariano é conhecido pela sua coragem e energia. Está sempre em busca de novos desafios e
                                aventuras. Sua personalidade forte faz dele um líder nato, mas também pode ser impaciente.
                            </p>
                            <p><strong>Data:</strong> <?php echo date('d/m/Y'); ?></p>
                        </div>

                    </div>

                    <div class="col-md-3" data-aos="fade-up" data-aos-delay="100">
                        <div class="service-item position-relative">
                            <div class="icon">
                                <img src="{{ asset('assets/img/horoscopos/touro.png') }}" alt="Áries"
                                    class="img-fluid">
                            </div>
                            <h3>Touro</h3>
                            <p>Taurino é calmo, paciente e determinado. Gosta de estabilidade e segurança. Pode ser um pouco
                                teimoso, mas é muito leal e trabalhador.</p>
                            <p><strong>Data:</strong> <?php echo date('d/m/Y'); ?></p>
                        </div>
                    </div>

                    <div class="col-md-3" data-aos="fade-up" data-aos-delay="100">
                        <div class="service-item position-relative">
                            <div class="icon">
                                <img src="{{ asset('assets/img/horoscopos/gemeos.png') }}" alt="Áries"
                                    class="img-fluid">
                            </div>
                            <h3>Gêmeos</h3>
                            <p>Geminianos são curiosos, comunicativos e adaptáveis. Eles amam aprender coisas novas e se
                                entusiasmam facilmente. Às vezes, podem ser indecisos.</p>
                            <p><strong>Data:</strong> <?php echo date('d/m/Y'); ?></p>
                        </div>
                    </div>

                    <div class="col-md-3" data-aos="fade-up" data-aos-delay="100">
                        <div class="service-item position-relative">
                            <div class="icon">
                                <img src="{{ asset('assets/img/horoscopos/cancer.png') }}" alt="Áries"
                                    class="img-fluid">
                            </div>
                            <h3>Câncer</h3>
                            <p>Cancerianos são muito sensíveis e protetores com quem amam. Eles têm um forte vínculo com sua
                                família e são muito intuitivos.</p>
                            <p><strong>Data:</strong> <?php echo date('d/m/Y'); ?></p>
                        </div>
                    </div>

                    <div class="col-md-3" data-aos="fade-up" data-aos-delay="100">
                        <div class="service-item position-relative">
                            <div class="icon">
                                <img src="{{ asset('assets/img/horoscopos/leao.png') }}" alt="Áries"
                                    class="img-fluid">
                            </div>
                            <h3>Leão</h3>
                            <p>Leoninos são confiantes, generosos e carismáticos. Eles adoram ser o centro das atenções e
                                têm uma personalidade forte, mas sabem ser leais e protetores com quem amam.</p>
                            <p><strong>Data:</strong> <?php echo date('d/m/Y'); ?></p>
                        </div>
                    </div>

                    <div class="col-md-3" data-aos="fade-up" data-aos-delay="100">
                        <div class="service-item position-relative">
                            <div class="icon">
                                <img src="{{ asset('assets/img/horoscopos/virgem.jpeg') }}" alt="Áries"
                                    class="img-fluid">
                            </div>
                            <h3>Virgem</h3>
                            <p>Virginianos são analíticos, detalhistas e trabalhadores. Eles são perfeccionistas e exigem
                                excelência em tudo o que fazem, mas também são muito práticos e organizados.</p>
                            <p><strong>Data:</strong> <?php echo date('d/m/Y'); ?></p>
                        </div>
                    </div>

                    <div class="col-md-3" data-aos="fade-up" data-aos-delay="100">
                        <div class="service-item position-relative">
                            <div class="icon">
                                <img src="{{ asset('assets/img/horoscopos/libra.png') }}" alt="Áries"
                                    class="img-fluid">
                            </div>
                            <h3>Libra</h3>
                            <p>Librianos são equilibrados, diplomáticos e sociáveis. Eles buscam harmonia e paz em suas
                                relações e evitam conflitos. São conhecidos por sua grande capacidade de fazer amigos.</p>
                            <p><strong>Data:</strong> <?php echo date('d/m/Y'); ?></p>
                        </div>
                    </div>

                    <div class="col-md-3" data-aos="fade-up" data-aos-delay="100">
                        <div class="service-item position-relative">
                            <div class="icon">
                                <img src="{{ asset('assets/img/horoscopos/escorpiao.png') }}" alt="Áries"
                                    class="img-fluid">
                            </div>
                            <h3>Escorpião</h3>
                            <p>Escorpianos são intensos, apaixonados e determinados. Eles têm uma energia magnética e são
                                conhecidos pela sua lealdade, mas também podem ser muito reservados.</p>
                            <p><strong>Data:</strong> <?php echo date('d/m/Y'); ?></p>
                        </div>
                    </div>

                    <div class="col-md-3" data-aos="fade-up" data-aos-delay="100">
                        <div class="service-item position-relative">
                            <div class="icon">
                                <img src="{{ asset('assets/img/horoscopos/sagitario.png') }}" alt="Áries"
                                    class="img-fluid">
                            </div>
                            <h3>Sagitário</h3>
                            <p>Sagitarianos são otimistas, aventureiros e independentes. Eles amam explorar o mundo e buscam
                                a liberdade, sendo honestos e diretos em suas ações.</p>
                            <p><strong>Data:</strong> <?php echo date('d/m/Y'); ?></p>
                        </div>
                    </div>

                    <div class="col-md-3" data-aos="fade-up" data-aos-delay="100">
                        <div class="service-item position-relative">
                            <div class="icon">
                                <img src="{{ asset('assets/img/horoscopos/capricornio.png') }}" alt="Áries"
                                    class="img-fluid">
                            </div>
                            <h3>Capricórnio</h3>
                            <p>Capricornianos são responsáveis, determinados e muito focados. Eles estão sempre em busca de
                                estabilidade e sucesso, sendo pragmáticos e com grande senso de dever.</p>
                            <p><strong>Data:</strong> <?php echo date('d/m/Y'); ?></p>
                        </div>
                    </div>

                    <div class="col-md-3" data-aos="fade-up" data-aos-delay="100">
                        <div class="service-item position-relative">
                            <div class="icon">
                                <img src="{{ asset('assets/img/horoscopos/aquario.png') }}" alt="Áries"
                                    class="img-fluid">
                            </div>
                            <h3>Aquário</h3>
                            <p>Aquarianos são visionários, originais e independentes. Eles buscam liberdade e inovação,
                                sendo intelectuais e muitas vezes à frente de seu tempo.</p>
                            <p><strong>Data:</strong> <?php echo date('d/m/Y'); ?></p>
                        </div>
                    </div>

                    <div class="col-md-3" data-aos="fade-up" data-aos-delay="100">
                        <div class="service-item position-relative">
                            <div class="icon">
                                <img src="{{ asset('assets/img/horoscopos/peixe.png') }}" alt="Áries"
                                    class="img-fluid">
                            </div>
                            <h3>Peixes</h3>
                            <p>Piscianos são sonhadores, sensíveis e intuitivos. Eles têm uma conexão profunda com suas
                                emoções e com os outros, sendo empáticos e muito criativos.</p>
                            <p><strong>Data:</strong> <?php echo date('d/m/Y'); ?></p>
                        </div>
                    </div>
                </div>
            </div>

        </section><!-- /Services Section -->
        <!-- About Section -->
        <section id="quemSomosNave" class="about section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Quem Somos</h2>
                <p>Conectamos espiritualidade e autoconhecimento para guiar você na sua jornada.</p>
            </div><!-- End Section Title -->

            <div class="container">

                <div class="row gy-4">
                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                        <h3>Unindo sabedoria ancestral e conhecimento espiritual para iluminar seu caminho.</h3>
                        <img src="{{ asset('assets/img/quem-somos.jpeg') }}" width="100%"
                            class="img-fluid rounded-4 mb-4" alt="Espiritualidade e Misticismo">
                        <p>Somos uma comunidade de profissionais altamente capacitados, incluindo tarólogos, cartomantes,
                            terapeutas holísticos e oraculistas. Nosso propósito é oferecer orientação espiritual e auxiliar
                            no despertar do seu Eu Superior, proporcionando insights para suas decisões de vida.</p>
                        <p>Acreditamos que a espiritualidade e o autoconhecimento são chaves essenciais para uma vida mais
                            equilibrada e harmoniosa. Nossa missão é trazer clareza e conexão através de práticas místicas e
                            orientações profundas.</p>
                    </div>
                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="250">
                        <div class="content ps-0 ps-lg-5">
                            <p class="fst-italic">
                                Nossa abordagem une tradição e modernidade, trazendo previsões, consultas e rituais para
                                guiar você com sabedoria.
                            </p>
                            <ul>
                                <li><i class="bi bi-check-circle-fill"></i> <span>Consultas personalizadas com
                                        especialistas em tarot e astrologia.</span></li>
                                <li><i class="bi bi-check-circle-fill"></i> <span>Previsões diárias para te ajudar a tomar
                                        melhores decisões.</span></li>
                                <li><i class="bi bi-check-circle-fill"></i> <span>Rituais energéticos para fortalecer sua
                                        conexão espiritual e atrair boas energias.</span></li>
                            </ul>
                            <p>
                                Nosso compromisso é oferecer orientação de qualidade, baseada na ética e no respeito à
                                individualidade de cada pessoa. A cada consulta, buscamos trazer luz e entendimento para as
                                suas questões.
                            </p>

                            <div class="position-relative mt-4">
                                <img src="{{ asset('assets/img/quem-somos-2.jpeg') }}" width="100%"
                                    class="img-fluid rounded-4" alt="Sabedoria e Espiritualidade">
                                {{-- <a href="https://www.youtube.com/watch?v=Y7f98aduVJ8" class="glightbox pulsating-play-btn"></a> --}}
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </section><!-- /About Section -->


        {{-- <!-- Clients Section -->
        <section id="clients" class="clients section">

            <div class="container">

                <div class="swiper init-swiper">
                    <script type="application/json" class="swiper-config">
              {
                "loop": true,
                "speed": 600,
                "autoplay": {
                  "delay": 5000
                },
                "slidesPerView": "auto",
                "pagination": {
                  "el": ".swiper-pagination",
                  "type": "bullets",
                  "clickable": true
                },
                "breakpoints": {
                  "320": {
                    "slidesPerView": 2,
                    "spaceBetween": 40
                  },
                  "480": {
                    "slidesPerView": 3,
                    "spaceBetween": 60
                  },
                  "640": {
                    "slidesPerView": 4,
                    "spaceBetween": 80
                  },
                  "992": {
                    "slidesPerView": 6,
                    "spaceBetween": 120
                  }
                }
              }
            </script>
                    <div class="swiper-wrapper align-items-center">
                        <div class="swiper-slide"><img src="assets/img/clients/client-1.png" class="img-fluid"
                                alt=""></div>
                        <div class="swiper-slide"><img src="assets/img/clients/client-2.png" class="img-fluid"
                                alt=""></div>
                        <div class="swiper-slide"><img src="assets/img/clients/client-3.png" class="img-fluid"
                                alt=""></div>
                        <div class="swiper-slide"><img src="assets/img/clients/client-4.png" class="img-fluid"
                                alt=""></div>
                        <div class="swiper-slide"><img src="assets/img/clients/client-5.png" class="img-fluid"
                                alt=""></div>
                        <div class="swiper-slide"><img src="assets/img/clients/client-6.png" class="img-fluid"
                                alt=""></div>
                        <div class="swiper-slide"><img src="assets/img/clients/client-7.png" class="img-fluid"
                                alt=""></div>
                        <div class="swiper-slide"><img src="assets/img/clients/client-8.png" class="img-fluid"
                                alt=""></div>
                    </div>
                </div>

            </div>

        </section><!-- /Clients Section --> --}}

        {{-- <!-- Stats Section -->
        <section id="stats" class="stats section">

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row gy-4 align-items-center">

                    <div class="col-lg-5">
                        <img src="assets/img/stats-img.svg" alt="" class="img-fluid">
                    </div>

                    <div class="col-lg-7">

                        <div class="row gy-4">

                            <div class="col-lg-6">
                                <div class="stats-item d-flex">
                                    <i class="bi bi-emoji-smile flex-shrink-0"></i>
                                    <div>
                                        <span data-purecounter-start="0" data-purecounter-end="232"
                                            data-purecounter-duration="1" class="purecounter"></span>
                                        <p><strong>Happy Clients</strong> <span>consequuntur quae</span></p>
                                    </div>
                                </div>
                            </div><!-- End Stats Item -->

                            <div class="col-lg-6">
                                <div class="stats-item d-flex">
                                    <i class="bi bi-journal-richtext flex-shrink-0"></i>
                                    <div>
                                        <span data-purecounter-start="0" data-purecounter-end="521"
                                            data-purecounter-duration="1" class="purecounter"></span>
                                        <p><strong>Projects</strong> <span>adipisci atque cum quia aut</span></p>
                                    </div>
                                </div>
                            </div><!-- End Stats Item -->

                            <div class="col-lg-6">
                                <div class="stats-item d-flex">
                                    <i class="bi bi-headset flex-shrink-0"></i>
                                    <div>
                                        <span data-purecounter-start="0" data-purecounter-end="1453"
                                            data-purecounter-duration="1" class="purecounter"></span>
                                        <p><strong>Hours Of Support</strong> <span>aut commodi quaerat</span></p>
                                    </div>
                                </div>
                            </div><!-- End Stats Item -->

                            <div class="col-lg-6">
                                <div class="stats-item d-flex">
                                    <i class="bi bi-people flex-shrink-0"></i>
                                    <div>
                                        <span data-purecounter-start="0" data-purecounter-end="32"
                                            data-purecounter-duration="1" class="purecounter"></span>
                                        <p><strong>Hard Workers</strong> <span>rerum asperiores dolor</span></p>
                                    </div>
                                </div>
                            </div><!-- End Stats Item -->

                        </div>

                    </div>

                </div>

            </div>

        </section><!-- /Stats Section --> --}}

        {{-- <!-- Call To Action Section -->
        <section id="call-to-action" class="call-to-action section dark-background">

            <div class="container">
                <img src="assets/img/cta-bg.jpg" alt="">
                <div class="content row justify-content-center" data-aos="zoom-in" data-aos-delay="100">
                    <div class="col-xl-10">
                        <div class="text-center">
                            <a href="https://www.youtube.com/watch?v=Y7f98aduVJ8" class="glightbox play-btn"></a>
                            <h3>Call To Action</h3>
                            <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                                pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                                mollit anim id est laborum.</p>
                            <a class="cta-btn" href="#">Call To Action</a>
                        </div>
                    </div>
                </div>
            </div>

        </section><!-- /Call To Action Section --> --}}



        {{-- <!-- Testimonials Section -->
        <section id="testimonials" class="testimonials section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Testimonials</h2>
                <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
            </div><!-- End Section Title -->

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="swiper init-swiper">
                    <script type="application/json" class="swiper-config">
              {
                "loop": true,
                "speed": 600,
                "autoplay": {
                  "delay": 5000
                },
                "slidesPerView": "auto",
                "pagination": {
                  "el": ".swiper-pagination",
                  "type": "bullets",
                  "clickable": true
                },
                "breakpoints": {
                  "320": {
                    "slidesPerView": 1,
                    "spaceBetween": 40
                  },
                  "1200": {
                    "slidesPerView": 3,
                    "spaceBetween": 10
                  }
                }
              }
            </script>
                    <div class="swiper-wrapper">

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <img src="assets/img/testimonials/testimonials-1.jpg" class="testimonial-img"
                                    alt="">
                                <h3>Saul Goodman</h3>
                                <h4>Ceo &amp; Founder</h4>
                                <div class="stars">
                                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i>
                                </div>
                                <p>
                                    <i class="bi bi-quote quote-icon-left"></i>
                                    <span>Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit
                                        rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam,
                                        risus at semper.</span>
                                    <i class="bi bi-quote quote-icon-right"></i>
                                </p>
                            </div>
                        </div><!-- End testimonial item -->

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <img src="assets/img/testimonials/testimonials-2.jpg" class="testimonial-img"
                                    alt="">
                                <h3>Sara Wilsson</h3>
                                <h4>Designer</h4>
                                <div class="stars">
                                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i>
                                </div>
                                <p>
                                    <i class="bi bi-quote quote-icon-left"></i>
                                    <span>Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid
                                        cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet
                                        legam anim culpa.</span>
                                    <i class="bi bi-quote quote-icon-right"></i>
                                </p>
                            </div>
                        </div><!-- End testimonial item -->

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <img src="assets/img/testimonials/testimonials-3.jpg" class="testimonial-img"
                                    alt="">
                                <h3>Jena Karlis</h3>
                                <h4>Store Owner</h4>
                                <div class="stars">
                                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i>
                                </div>
                                <p>
                                    <i class="bi bi-quote quote-icon-left"></i>
                                    <span>Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem
                                        veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint
                                        minim.</span>
                                    <i class="bi bi-quote quote-icon-right"></i>
                                </p>
                            </div>
                        </div><!-- End testimonial item -->

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <img src="assets/img/testimonials/testimonials-4.jpg" class="testimonial-img"
                                    alt="">
                                <h3>Matt Brandon</h3>
                                <h4>Freelancer</h4>
                                <div class="stars">
                                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i>
                                </div>
                                <p>
                                    <i class="bi bi-quote quote-icon-left"></i>
                                    <span>Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim
                                        fugiat minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem
                                        dolore labore illum veniam.</span>
                                    <i class="bi bi-quote quote-icon-right"></i>
                                </p>
                            </div>
                        </div><!-- End testimonial item -->

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <img src="assets/img/testimonials/testimonials-5.jpg" class="testimonial-img"
                                    alt="">
                                <h3>John Larson</h3>
                                <h4>Entrepreneur</h4>
                                <div class="stars">
                                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i>
                                </div>
                                <p>
                                    <i class="bi bi-quote quote-icon-left"></i>
                                    <span>Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor
                                        noster veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat legam esse
                                        veniam culpa fore nisi cillum quid.</span>
                                    <i class="bi bi-quote quote-icon-right"></i>
                                </p>
                            </div>
                        </div><!-- End testimonial item -->

                    </div>
                    <div class="swiper-pagination"></div>
                </div>

            </div>

        </section><!-- /Testimonials Section --> --}}

        {{-- <!-- Portfolio Section -->
        <section id="portfolio" class="portfolio section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Portfolio</h2>
                <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
            </div><!-- End Section Title -->

            <div class="container">

                <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

                    <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
                        <li data-filter="*" class="filter-active">All</li>
                        <li data-filter=".filter-app">App</li>
                        <li data-filter=".filter-product">Product</li>
                        <li data-filter=".filter-branding">Branding</li>
                        <li data-filter=".filter-books">Books</li>
                    </ul><!-- End Portfolio Filters -->

                    <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">

                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
                            <div class="portfolio-content h-100">
                                <a href="assets/img/portfolio/app-1.jpg" data-gallery="portfolio-gallery-app"
                                    class="glightbox"><img src="assets/img/portfolio/app-1.jpg" class="img-fluid"
                                        alt=""></a>
                                <div class="portfolio-info">
                                    <h4><a href="portfolio-details.html" title="More Details">App 1</a></h4>
                                    <p>Lorem ipsum, dolor sit amet consectetur</p>
                                </div>
                            </div>
                        </div><!-- End Portfolio Item -->

                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-product">
                            <div class="portfolio-content h-100">
                                <a href="assets/img/portfolio/product-1.jpg" data-gallery="portfolio-gallery-app"
                                    class="glightbox"><img src="assets/img/portfolio/product-1.jpg" class="img-fluid"
                                        alt=""></a>
                                <div class="portfolio-info">
                                    <h4><a href="portfolio-details.html" title="More Details">Product 1</a></h4>
                                    <p>Lorem ipsum, dolor sit amet consectetur</p>
                                </div>
                            </div>
                        </div><!-- End Portfolio Item -->

                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-branding">
                            <div class="portfolio-content h-100">
                                <a href="assets/img/portfolio/branding-1.jpg" data-gallery="portfolio-gallery-app"
                                    class="glightbox"><img src="assets/img/portfolio/branding-1.jpg" class="img-fluid"
                                        alt=""></a>
                                <div class="portfolio-info">
                                    <h4><a href="portfolio-details.html" title="More Details">Branding 1</a></h4>
                                    <p>Lorem ipsum, dolor sit amet consectetur</p>
                                </div>
                            </div>
                        </div><!-- End Portfolio Item -->

                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-books">
                            <div class="portfolio-content h-100">
                                <a href="assets/img/portfolio/books-1.jpg" data-gallery="portfolio-gallery-app"
                                    class="glightbox"><img src="assets/img/portfolio/books-1.jpg" class="img-fluid"
                                        alt=""></a>
                                <div class="portfolio-info">
                                    <h4><a href="portfolio-details.html" title="More Details">Books 1</a></h4>
                                    <p>Lorem ipsum, dolor sit amet consectetur</p>
                                </div>
                            </div>
                        </div><!-- End Portfolio Item -->

                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
                            <div class="portfolio-content h-100">
                                <a href="assets/img/portfolio/app-2.jpg" data-gallery="portfolio-gallery-app"
                                    class="glightbox"><img src="assets/img/portfolio/app-2.jpg" class="img-fluid"
                                        alt=""></a>
                                <div class="portfolio-info">
                                    <h4><a href="portfolio-details.html" title="More Details">App 2</a></h4>
                                    <p>Lorem ipsum, dolor sit amet consectetur</p>
                                </div>
                            </div>
                        </div><!-- End Portfolio Item -->

                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-product">
                            <div class="portfolio-content h-100">
                                <a href="assets/img/portfolio/product-2.jpg" data-gallery="portfolio-gallery-app"
                                    class="glightbox"><img src="assets/img/portfolio/product-2.jpg" class="img-fluid"
                                        alt=""></a>
                                <div class="portfolio-info">
                                    <h4><a href="portfolio-details.html" title="More Details">Product 2</a></h4>
                                    <p>Lorem ipsum, dolor sit amet consectetur</p>
                                </div>
                            </div>
                        </div><!-- End Portfolio Item -->

                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-branding">
                            <div class="portfolio-content h-100">
                                <a href="assets/img/portfolio/branding-2.jpg" data-gallery="portfolio-gallery-app"
                                    class="glightbox"><img src="assets/img/portfolio/branding-2.jpg" class="img-fluid"
                                        alt=""></a>
                                <div class="portfolio-info">
                                    <h4><a href="portfolio-details.html" title="More Details">Branding 2</a></h4>
                                    <p>Lorem ipsum, dolor sit amet consectetur</p>
                                </div>
                            </div>
                        </div><!-- End Portfolio Item -->

                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-books">
                            <div class="portfolio-content h-100">
                                <a href="assets/img/portfolio/books-2.jpg" data-gallery="portfolio-gallery-app"
                                    class="glightbox"><img src="assets/img/portfolio/books-2.jpg" class="img-fluid"
                                        alt=""></a>
                                <div class="portfolio-info">
                                    <h4><a href="portfolio-details.html" title="More Details">Books 2</a></h4>
                                    <p>Lorem ipsum, dolor sit amet consectetur</p>
                                </div>
                            </div>
                        </div><!-- End Portfolio Item -->

                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
                            <div class="portfolio-content h-100">
                                <a href="assets/img/portfolio/app-3.jpg" data-gallery="portfolio-gallery-app"
                                    class="glightbox"><img src="assets/img/portfolio/app-3.jpg" class="img-fluid"
                                        alt=""></a>
                                <div class="portfolio-info">
                                    <h4><a href="portfolio-details.html" title="More Details">App 3</a></h4>
                                    <p>Lorem ipsum, dolor sit amet consectetur</p>
                                </div>
                            </div>
                        </div><!-- End Portfolio Item -->

                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-product">
                            <div class="portfolio-content h-100">
                                <a href="assets/img/portfolio/product-3.jpg" data-gallery="portfolio-gallery-app"
                                    class="glightbox"><img src="assets/img/portfolio/product-3.jpg" class="img-fluid"
                                        alt=""></a>
                                <div class="portfolio-info">
                                    <h4><a href="portfolio-details.html" title="More Details">Product 3</a></h4>
                                    <p>Lorem ipsum, dolor sit amet consectetur</p>
                                </div>
                            </div>
                        </div><!-- End Portfolio Item -->

                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-branding">
                            <div class="portfolio-content h-100">
                                <a href="assets/img/portfolio/branding-3.jpg" data-gallery="portfolio-gallery-app"
                                    class="glightbox"><img src="assets/img/portfolio/branding-3.jpg" class="img-fluid"
                                        alt=""></a>
                                <div class="portfolio-info">
                                    <h4><a href="portfolio-details.html" title="More Details">Branding 3</a></h4>
                                    <p>Lorem ipsum, dolor sit amet consectetur</p>
                                </div>
                            </div>
                        </div><!-- End Portfolio Item -->

                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-books">
                            <div class="portfolio-content h-100">
                                <a href="assets/img/portfolio/books-3.jpg" data-gallery="portfolio-gallery-app"
                                    class="glightbox"><img src="assets/img/portfolio/books-3.jpg" class="img-fluid"
                                        alt=""></a>
                                <div class="portfolio-info">
                                    <h4><a href="portfolio-details.html" title="More Details">Books 3</a></h4>
                                    <p>Lorem ipsum, dolor sit amet consectetur</p>
                                </div>
                            </div>
                        </div><!-- End Portfolio Item -->

                    </div><!-- End Portfolio Container -->

                </div>

            </div>

        </section><!-- /Portfolio Section --> --}}

        <!-- Team Section -->
        <section id="team" class="team section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Sobre consultores</h2>
                {{-- <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p> --}}
            </div><!-- End Section Title -->

            <div class="container">

                <div class="row gy-4">

                    <style>
                        .member img {
    max-width: 200px !important; /* Define a largura máxima */
    max-height: 200px !important; /* Define a altura máxima */
    object-fit: cover !important; /* Garante que a imagem preencha o espaço sem distorcer */
    border-radius: 10px !important; /* (Opcional) Adiciona bordas arredondadas */
}

                    </style>
                    <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="100">
                        <div class="member">
                            <img src="{{asset('assets/img/atendente1.jpg')}}" class="img-fluid" alt="">
                            <h4>Zé do Caxinguelê</h4>
                            <span>Consultor Espiritual</span>
                            <div class="status">
                                <p>Status: Disponível</p>
                                <p>Preço: R$ 150,00</p>
                            </div>
                            <button class="btn btn-danger">Consultar</button>
                        </div>
                    </div><!-- End Team Member -->
                    
                    <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="200">
                        <div class="member">
                            <img src="{{asset('assets/img/atendente2.jpg')}}" class="img-fluid" alt="">
                            <h4>Maria Padilha</h4>
                            <span>Consultora de Espiritualidade</span>
                            <div class="status">
                                <p>Status: Ocupada</p>
                                <p>Preço: R$ 200,00</p>
                            </div>
                            <button class="btn btn-danger">Consultar</button>
                        </div>
                    </div><!-- End Team Member -->
                    
                    <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="300">
                        <div class="member">
                            <img src="{{asset('assets/img/atendente3.jpg')}}" class="img-fluid" alt="">
                            <h4>Clarividente Manuela</h4>
                            <span>Consultora Mística</span>
                            <div class="status">
                                <p>Status: Disponível</p>
                                <p>Preço: R$ 180,00</p>
                            </div>
                            <button class="btn btn-danger">Consultar</button>
                        </div>
                    </div><!-- End Team Member -->
                    
                    <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="400">
                        <div class="member">
                            <img src="{{asset('assets/img/atendente4.jpg')}}" class="img-fluid" alt="">
                            <h4>Iara de Oxum</h4>
                            <span>Consultora de Sabedoria</span>
                            <div class="status">
                                <p>Status: Disponível</p>
                                <p>Preço: R$ 120,00</p>
                            </div>
                            <button class="btn btn-danger">Consultar</button>
                        </div>
                    </div><!-- End Team Member -->
                    

                </div>

            </div>

        </section><!-- /Team Section -->

        {{-- <!-- Pricing Section -->
        <section id="pricing" class="pricing section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Pricing</h2>
                <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
            </div><!-- End Section Title -->

            <div class="container" data-aos="zoom-in" data-aos-delay="100">

                <div class="row g-4">

                    <div class="col-lg-4">
                        <div class="pricing-item">
                            <h3>Free Plan</h3>
                            <div class="icon">
                                <i class="bi bi-box"></i>
                            </div>
                            <h4><sup>$</sup>0<span> / month</span></h4>
                            <ul>
                                <li><i class="bi bi-check"></i> <span>Quam adipiscing vitae proin</span></li>
                                <li><i class="bi bi-check"></i> <span>Nec feugiat nisl pretium</span></li>
                                <li><i class="bi bi-check"></i> <span>Nulla at volutpat diam uteera</span></li>
                                <li class="na"><i class="bi bi-x"></i> <span>Pharetra massa massa ultricies</span>
                                </li>
                                <li class="na"><i class="bi bi-x"></i> <span>Massa ultricies mi quis hendrerit</span>
                                </li>
                            </ul>
                            <div class="text-center"><a href="#" class="buy-btn">Buy Now</a></div>
                        </div>
                    </div><!-- End Pricing Item -->

                    <div class="col-lg-4">
                        <div class="pricing-item featured">
                            <h3>Business Plan</h3>
                            <div class="icon">
                                <i class="bi bi-rocket"></i>
                            </div>

                            <h4><sup>$</sup>29<span> / month</span></h4>
                            <ul>
                                <li><i class="bi bi-check"></i> <span>Quam adipiscing vitae proin</span></li>
                                <li><i class="bi bi-check"></i> <span>Nec feugiat nisl pretium</span></li>
                                <li><i class="bi bi-check"></i> <span>Nulla at volutpat diam uteera</span></li>
                                <li><i class="bi bi-check"></i> <span>Pharetra massa massa ultricies</span></li>
                                <li><i class="bi bi-check"></i> <span>Massa ultricies mi quis hendrerit</span></li>
                            </ul>
                            <div class="text-center"><a href="#" class="buy-btn">Buy Now</a></div>
                        </div>
                    </div><!-- End Pricing Item -->

                    <div class="col-lg-4">
                        <div class="pricing-item">
                            <h3>Developer Plan</h3>
                            <div class="icon">
                                <i class="bi bi-send"></i>
                            </div>
                            <h4><sup>$</sup>49<span> / month</span></h4>
                            <ul>
                                <li><i class="bi bi-check"></i> <span>Quam adipiscing vitae proin</span></li>
                                <li><i class="bi bi-check"></i> <span>Nec feugiat nisl pretium</span></li>
                                <li><i class="bi bi-check"></i> <span>Nulla at volutpat diam uteera</span></li>
                                <li><i class="bi bi-check"></i> <span>Pharetra massa massa ultricies</span></li>
                                <li><i class="bi bi-check"></i> <span>Massa ultricies mi quis hendrerit</span></li>
                            </ul>
                            <div class="text-center"><a href="#" class="buy-btn">Buy Now</a></div>
                        </div>
                    </div><!-- End Pricing Item -->

                </div>

            </div>

        </section><!-- /Pricing Section --> --}}

        {{-- <!-- Faq Section -->
        <section id="faq" class="faq section">

            <div class="container">

                <div class="row gy-4">

                    <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="content px-xl-5">
                            <h3><span>Frequently Asked </span><strong>Questions</strong></h3>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                                labore et dolore magna aliqua. Duis aute irure dolor in reprehenderit
                            </p>
                        </div>
                    </div>

                    <div class="col-lg-8" data-aos="fade-up" data-aos-delay="200">

                        <div class="faq-container">
                            <div class="faq-item faq-active">
                                <h3><span class="num">1.</span> <span>Non consectetur a erat nam at lectus urna
                                        duis?</span></h3>
                                <div class="faq-content">
                                    <p>Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat lacus laoreet
                                        non curabitur gravida. Venenatis lectus magna fringilla urna porttitor rhoncus dolor
                                        purus non.</p>
                                </div>
                                <i class="faq-toggle bi bi-chevron-right"></i>
                            </div><!-- End Faq item-->

                            <div class="faq-item">
                                <h3><span class="num">2.</span> <span>Feugiat scelerisque varius morbi enim nunc
                                        faucibus a pellentesque?</span></h3>
                                <div class="faq-content">
                                    <p>Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum
                                        velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend
                                        donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in
                                        cursus turpis massa tincidunt dui.</p>
                                </div>
                                <i class="faq-toggle bi bi-chevron-right"></i>
                            </div><!-- End Faq item-->

                            <div class="faq-item">
                                <h3><span class="num">3.</span> <span>Dolor sit amet consectetur adipiscing elit
                                        pellentesque?</span></h3>
                                <div class="faq-content">
                                    <p>Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci. Faucibus
                                        pulvinar elementum integer enim. Sem nulla pharetra diam sit amet nisl suscipit.
                                        Rutrum tellus pellentesque eu tincidunt. Lectus urna duis convallis convallis
                                        tellus. Urna molestie at elementum eu facilisis sed odio morbi quis</p>
                                </div>
                                <i class="faq-toggle bi bi-chevron-right"></i>
                            </div><!-- End Faq item-->

                            <div class="faq-item">
                                <h3><span class="num">4.</span> <span>Ac odio tempor orci dapibus. Aliquam eleifend mi
                                        in nulla?</span></h3>
                                <div class="faq-content">
                                    <p>Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum
                                        velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend
                                        donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in
                                        cursus turpis massa tincidunt dui.</p>
                                </div>
                                <i class="faq-toggle bi bi-chevron-right"></i>
                            </div><!-- End Faq item-->

                            <div class="faq-item">
                                <h3><span class="num">5.</span> <span>Tempus quam pellentesque nec nam aliquam sem et
                                        tortor consequat?</span></h3>
                                <div class="faq-content">
                                    <p>Molestie a iaculis at erat pellentesque adipiscing commodo. Dignissim suspendisse in
                                        est ante in. Nunc vel risus commodo viverra maecenas accumsan. Sit amet nisl
                                        suscipit adipiscing bibendum est. Purus gravida quis blandit turpis cursus in</p>
                                </div>
                                <i class="faq-toggle bi bi-chevron-right"></i>
                            </div><!-- End Faq item-->

                        </div>

                    </div>
                </div>

            </div>

        </section><!-- /Faq Section -->

        <!-- Recent Posts Section -->
        <section id="recent-posts" class="recent-posts section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Recent Blog Posts</h2>
                <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
            </div><!-- End Section Title -->

            <div class="container">

                <div class="row gy-4">

                    <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                        <article>

                            <div class="post-img">
                                <img src="assets/img/blog/blog-1.jpg" alt="" class="img-fluid">
                            </div>

                            <p class="post-category">Politics</p>

                            <h2 class="title">
                                <a href="blog-details.html">Dolorum optio tempore voluptas dignissimos</a>
                            </h2>

                            <div class="d-flex align-items-center">
                                <img src="assets/img/blog/blog-author.jpg" alt=""
                                    class="img-fluid post-author-img flex-shrink-0">
                                <div class="post-meta">
                                    <p class="post-author">Maria Doe</p>
                                    <p class="post-date">
                                        <time datetime="2022-01-01">Jan 1, 2022</time>
                                    </p>
                                </div>
                            </div>

                        </article>
                    </div><!-- End post list item -->

                    <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                        <article>

                            <div class="post-img">
                                <img src="assets/img/blog/blog-2.jpg" alt="" class="img-fluid">
                            </div>

                            <p class="post-category">Sports</p>

                            <h2 class="title">
                                <a href="blog-details.html">Nisi magni odit consequatur autem nulla dolorem</a>
                            </h2>

                            <div class="d-flex align-items-center">
                                <img src="assets/img/blog/blog-author-2.jpg" alt=""
                                    class="img-fluid post-author-img flex-shrink-0">
                                <div class="post-meta">
                                    <p class="post-author">Allisa Mayer</p>
                                    <p class="post-date">
                                        <time datetime="2022-01-01">Jun 5, 2022</time>
                                    </p>
                                </div>
                            </div>

                        </article>
                    </div><!-- End post list item -->

                    <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                        <article>

                            <div class="post-img">
                                <img src="assets/img/blog/blog-3.jpg" alt="" class="img-fluid">
                            </div>

                            <p class="post-category">Entertainment</p>

                            <h2 class="title">
                                <a href="blog-details.html">Possimus soluta ut id suscipit ea ut in quo quia et soluta</a>
                            </h2>

                            <div class="d-flex align-items-center">
                                <img src="assets/img/blog/blog-author-3.jpg" alt=""
                                    class="img-fluid post-author-img flex-shrink-0">
                                <div class="post-meta">
                                    <p class="post-author">Mark Dower</p>
                                    <p class="post-date">
                                        <time datetime="2022-01-01">Jun 22, 2022</time>
                                    </p>
                                </div>
                            </div>

                        </article>
                    </div><!-- End post list item -->

                </div><!-- End recent posts list -->

            </div>

        </section><!-- /Recent Posts Section --> --}}

        <!-- Contact Section -->
        {{-- <section id="contact" class="contact section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Contact</h2>
                <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
            </div><!-- End Section Title -->

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row gx-lg-0 gy-4">

                    <div class="col-lg-4">
                        <div class="info-container d-flex flex-column align-items-center justify-content-center">
                            <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="200">
                                <i class="bi bi-geo-alt flex-shrink-0"></i>
                                <div>
                                    <h3>Address</h3>
                                    <p>A108 Adam Street, New York, NY 535022</p>
                                </div>
                            </div><!-- End Info Item -->

                            <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
                                <i class="bi bi-telephone flex-shrink-0"></i>
                                <div>
                                    <h3>Call Us</h3>
                                    <p>+1 5589 55488 55</p>
                                </div>
                            </div><!-- End Info Item -->

                            <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
                                <i class="bi bi-envelope flex-shrink-0"></i>
                                <div>
                                    <h3>Email Us</h3>
                                    <p>info@example.com</p>
                                </div>
                            </div><!-- End Info Item -->

                            <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="500">
                                <i class="bi bi-clock flex-shrink-0"></i>
                                <div>
                                    <h3>Open Hours:</h3>
                                    <p>Mon-Sat: 11AM - 23PM</p>
                                </div>
                            </div><!-- End Info Item -->

                        </div>

                    </div>

                    <div class="col-lg-8">
                        <form action="forms/contact.php" method="post" class="php-email-form" data-aos="fade"
                            data-aos-delay="100">
                            <div class="row gy-4">

                                <div class="col-md-6">
                                    <input type="text" name="name" class="form-control" placeholder="Your Name"
                                        required="">
                                </div>

                                <div class="col-md-6 ">
                                    <input type="email" class="form-control" name="email" placeholder="Your Email"
                                        required="">
                                </div>

                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="subject" placeholder="Subject"
                                        required="">
                                </div>

                                <div class="col-md-12">
                                    <textarea class="form-control" name="message" rows="8" placeholder="Message" required=""></textarea>
                                </div>

                                <div class="col-md-12 text-center">
                                    <div class="loading">Loading</div>
                                    <div class="error-message"></div>
                                    <div class="sent-message">Your message has been sent. Thank you!</div>

                                    <button type="submit">Send Message</button>
                                </div>

                            </div>
                        </form>
                    </div><!-- End Contact Form -->

                </div>

            </div>

        </section><!-- /Contact Section --> --}}

    </main>

  
@endsection
