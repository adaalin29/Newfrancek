<footer>
    <div class="container">
        <div class="footer-container">
            <div class = "footer-logo-mobile">
                <a href="" class="footer-logo"><img src="images/logo2.png" class="full-width logos"></a>
            </div>
            <div class="footer-left">
                <div class="get-special">{{__('site.get-special')}}</div>
                <div class="join-newsletter">{{__('site.join-newsletter')}}</div>
                <form class="newsletter" action='{{ action("ContactController@subscribeNewsletter") }}' method="post">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="newsletter-contact">
                        <input class="news-letter" type="email" id="femail" name="email" placeholder="Email">
                        <button class="newsletter-image-container" type = "submit">
                            <div class="newsletter-image-text">{{__('site.subscribe')}}</div>
                            <div class="newsletter-image-image"><img class="full-width"
                                    src="images/subscribe-arrow.svg"></div>
                        </button>
                    </div>
                    <div class="accept-newsletter-container">
                        <label class="checkbox">
                            <input type="checkbox" id="accept-privacy" name="termeni" value="checkbox">
                            <span></span>
                        </label>
                        <div class="checkbox-text">{{__('site.checkbox-text')}}</div>
                    </div>
                    <div id = "result"></div>
                </form>
            </div>
            <div class="footer-center">
                <a href="" class="footer-logo"><img src="images/logo2.png" class="full-width logos"></a>
            </div>
            <div class="footer-right">
                <div class="footer-elemente-container">
                    <div class="footer-elemente">
                        <a class="footer-element" href="contact">{{__('site.footer-contact')}}</a>
                        <a class="footer-element" href="jobs">{{__('site.footer-jobs')}}</a>
                        <a class="footer-element" href="appointments">{{__('site.footer-online')}}</a>
                    </div>
                    <div class="footer-elemente">
                        <a class="footer-element" href="terms">{{__('site.terms-footer')}}</a>
                        <a class="footer-element" href="cookies">{{__('site.cookies')}}</a>
                        <a class="footer-element" href="impressum">{{__('site.impressum')}}</a>
                    </div>
                </div>
            <div class = "copy"><div>{{__('site.copy')}}</div><a style='float:right;' href="https:\\touchmedia360.com">www.touchmedia360.com</a></div>
            </div>
        </div>
    </div>
</footer>
@push('scripts')
<script>
 document.addEventListener("DOMContentLoaded", function () {
    $.ajaxSetup({
 
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
      }
    });
    var $formContact = $('.newsletter');
    $('.newsletter-image-container').on('click', function (event) {
      event.preventDefault();
      $.ajax({
        method: 'POST',
        url: '{{ action("ContactController@subscribeNewsletter") }}',
        data: $formContact.serializeArray(),
        context: this,
        async: true,
        cache: false,
        dataType: 'json'
      }).done(function (res) {
        console.log(res);
        if (res.success == true) {
          $.notify(res.successMessage, "success");
          setTimeout(function () {
            window.location.reload();
          
          }, 4000);
        } else {
          var eroare = res.msg_email;
        for (var i = 0; i < eroare.length; i++) {
          eroare[i] = eroare[i] + "\n";
        }
          $.notify(res.msg_email, {
            type: "error",
            breakNewLines: true,
            gap:2
          });
        }
      });
      return;
    });
 
  });
</script>
@endpush