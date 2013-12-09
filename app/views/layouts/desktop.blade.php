<!DOCTYPE html>
<html lang="en">
    
    @include('desktop.commons.head')

    <body>
    
        <!--@include('desktop.commons.header')-->

        <div id="content" class="container">
            <!-- Content -->
            @yield('content')
            <!-- ./ content -->
        </div>

        @javascripts('application-js')

        {{-- Extra JavaScripts --}}
        @section('scripts')
            <script type="text/javascript"></script>
        @show

    </body>
</html>