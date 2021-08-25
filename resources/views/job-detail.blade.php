@extends('parts.template') @section('title', 'Page Title') @section('content')
<div class="container">
    <div class="pagini">
        <a href="" class="pagini-text-mare">{{__('site.homepage')}} |</a>
        <a href="jobs" class="pagini-text-mic">{{__('site.jobs')}} |  {{$job->name}}</a>
    </div>
    <div class="page-title">{{$job->name}}</div>
    <div class="job-detail-description">{!!$job->description!!}</div>

    <form class="pages-form form-contact" action='{{ action("ContactController@send_appointment") }}' method="post">
        <div class="form-top" data-aos-delay="750" data-aos="fade-right">
            <div class="form-top-element">
                <div class="form-text">{{__('site.name')}}</div>
                <input class="form-input" type="text" id="name" name="name">
            </div>
            <div class="form-top-element">
                <div class="form-text">{{__('site.email')}}</div>
                <input class="form-input" type="email" id="email" name="email">
            </div>
            <div class="form-top-element">
                <div class="form-text">{{__('site.phone')}}</div>
                <input class="form-input" type="number" id="number" name="number">
            </div>
        </div>
        <div class="form-top" data-aos-delay="1000" data-aos="fade-right">
            <div class="form-top-element">
                <div class="form-text">{{__('site.job-apply')}}</div>
                <div class="select-container">
                    <select id="service" name="job">
                        @foreach($jobs as $jobs)
                        <option value="{{$jobs->name}}">{{$jobs->name}}</option>
                        @endforeach
                    </select>
                    <div class="select-arrow"><img src="images/white-arrow.svg" class="full-width"></div>
                </div>
            </div>
            <div class="form-top-element" data-aos-delay="1250" data-aos="fade-right">
                <div class="form-text">{{__('site.select-studio')}}</div>
                <div class="select-container">
                    <select id="salons" name="salons">
                        @foreach($salons as $salon)
                        <option value="{{$salon->name}}">{{$salon->name}}</option>
                        @endforeach
                    </select>
                    <div class="select-arrow"><img src="images/white-arrow.svg" class="full-width"></div>
                </div>
            </div>
            <div class="form-top-element" data-aos-delay="1250" data-aos="fade-right">
                <div class="form-text">{{__('site.choose-file')}}</div>
                <div class="upload-btn-wrapper">
                    <div class="btn-upload">
                        <p id="file-choosen">{{ __('site.file') }}</p>
                        <div class="choose-file">

                        </div>
                        <img class="img-upload" src="images/upload.svg">
                    </div>
                </div>
                <input type="file" name="cv" id="myFileSelected" placeholder="Incarca CV" accept="application/pdf"
                            style="display: none !important; width: 0px !important; height: 0px !important">
            </div>
        </div>
        <div class="form-text" style="margin-top:20px;">{{__('site.message')}}</div>
        <textarea name="message"></textarea>
        <div class="form-terms">
            <label class="checkbox">
                <input type="checkbox" id="accept-privacy" name="terms" value="terms">
                <span></span>
            </label>
            <div class="form-terms-text">{{__('site.terms')}}</div>
        </div>
        <div id="result"></div>
        <div class="price-button-container align-center">
            <button class="price-button">
                <div class="price-text">{{__('site.send')}}</div>
                <div class="price-image"><img class="full-width" src="images/subscribe-arrow.svg"></div>
            </button>
        </div>
    </form>
</div>
@endsection
@push('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function () {
        $.ajaxSetup({

            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            }
        });
        var $formContact = $('.pages-form');
        var $rezultatFormular = $('#result');
        $('.form-contact').on('submit', function (event) {
            var formData = new FormData(this);
            event.preventDefault();
            $.ajax({
                method: 'POST',
                url: '{{ action("ContactController@submit_file") }}',
                data: formData,
                processData: false,
                contentType: false,
                context: this, async: true, cache: false, dataType: 'json'
            }).done(function (res) {
                console.log(res);
                if (res.success == true) {
                    $.notify(res.msg, "success");
                    setTimeout(function () {
                        window.location.reload();

                    }, 4000);
                } else {
                    $rezultatFormular.fadeIn()
                    $rezultatFormular.css('color', 'red');
                    $rezultatFormular.html(

                        '<strong>' + res.msg.join('<br>') + "</strong>"
                    );
                }
            });
            return;
        });

    });
</script>
<script>
   $('.upload-btn-wrapper').click(function(){
        $('#myFileSelected').trigger('click');
        $('#myFileSelected').change(function () {
           var nume_fisier = $('#myFileSelected').val();
           nume_fisier_modificat = nume_fisier.split("\\");
           if (nume_fisier) {
               $("#file-choosen").text(nume_fisier_modificat[nume_fisier_modificat.length - 1]);
           }
           else {
               $("#file-choosen").text("No file choosen");
           }
       });
       });
</script>
@endpush