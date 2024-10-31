@extends('layouts.layout')

@section('content')
    <section class="page-section clearfix" style="background-color: #ebf5fb;">
        <div class="container">
            <div class="intro">
                <img class="intro-img img-fluid mb-3 mb-lg-0 rounded" src="assets/img/intro.jpg" alt="..." />
                <div class="intro-text left-0 text-center p-5 rounded" style="background-color: #d6eaf8; font-family: 'Roboto', sans-serif;">
                    <h2 class="section-heading mb-4">
                        <span class="section-heading-upper" style="color: #2874a6;">Saint Gabriel</span>
                        <span class="section-heading-lower" style="color: #21618c;"></span>
                    </h2>
                    <p class="mb-3" style="color: #1b4f72;">Les Assurances Saint Gabriel sont l’assureur de l’économie solidaire, la mutuelle de tous ceux qui s’engagent : associations, ONG à but humanitaire et caritatif, organismes sanitaires et sociaux, enseignement, institutions</p>
                    <div class="intro-button mx-auto">
                        <a class="btn btn-primary btn-xl" href="#!" style="background-color: #3498db; border-color: #3498db; font-family: 'The Bold Font', sans-serif;">Il est temps d'adhérer !</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="page-section cta" style="background-color: #aed6f1;">
        <div class="container">
            <div class="row">
                <div class="col-xl-9 mx-auto">
                    <div class="cta-inner text-center rounded" style="background-color: #5dade2; color: #ffffff; font-family: 'Newyork', serif;">
                        <h2 class="section-heading mb-4">
                            <span class="section-heading-upper" style="color: #21618c;">À vos côtés</span>
                            <span class="section-heading-lower" style="color: #1b4f72;">Au plus proche de vos besoins</span>
                        </h2>
                        <p class="mb-0">Assureur mutualiste de l’économie solidaire, Saint-Gabriel met à la disposition de ses sociétaires une expertise, une capacité d’écoute et une volonté d’innovation reconnues.</p>
                        <p>Parce que notre but est d’être là dans tous les moments clés de votre vie, notre panel d’assurances couvre tous les aléas et tous les biens que vous souhaitez, de façon évolutive et dans le respect de nos valeurs.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
