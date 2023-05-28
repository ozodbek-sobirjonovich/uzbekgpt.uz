<footer class="footer footer-transparent d-print-none">
    <div class="container-xl">
        <div class="row text-center align-items-center flex-row-reverse">
            <div class="col-lg-auto ms-lg-auto">
                <ul class="list-inline list-inline-dots mb-0">

                    <li class="list-inline-item">{{__('Version')}}: {{$setting->script_version}}R</li>
                </ul>
            </div>
            <div class="col-12 col-lg-auto mt-3 mt-lg-0">
                <ul class="list-inline list-inline-dots mb-0">
                    <li class="list-inline-item">
                        {{__('Copyright')}} &copy; <?php echo date("Y"); ?>
                        <a href="{{route('index')}}" class="link-secondary">{{$setting->site_name}}</a>.
                        {{__('All rights reserved.')}}
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>
