<!DOCTYPE html>
<html lang="en">
@include('partials.nav') <!-- Inclure la navigation -->

    @include('partials.head') <!-- Inclure le head -->
<body>
    @include('partials.header') <!-- Inclure le header -->
    <div class="content">
        @yield('content') <!-- Section pour le contenu spécifique des pages -->
    </div>

    @include('partials.footer') <!-- Inclure le footer -->
</body>
</html>
