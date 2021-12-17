<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<html lang="en"><head>
    <meta charset="utf-8">
    <meta content="width=device-width,minimum-scale=1,maximum-scale=1" name="viewport">
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
    <meta name="csrf-token" content="1ec1GagSMSsTDByC5XyJImlQmnaCUPVrpuLlFo5w">

    <title>Customer information – MyShop – Checkout</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha256-eZrrJcwDc/3uDhsdt61sL2oOBY362qM3lon1gyExkL0=" crossorigin="anonymous">


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.13/css/intlTelInput.css" integrity="sha512-gxWow8Mo6q6pLa1XH/CcH8JyiSDEtiwJV78E+D+QP0EVasFs8wKXq16G8CLD4CJ2SnonHr4Lm/yY2fSI2+cbmw==" crossorigin="anonymous" referrerpolicy="no-referrer">


    <script type="text/javascript" async="" src="https://analytics.tiktok.com/i18n/pixel/config.js?sdkid=C5T4RVK247CAE4T44EJ0&amp;hostname=nadzirulstore.myshoppegram.com"></script><script async="" src="https://connect.facebook.net/en_US/fbevents.js"></script><script type="text/javascript" async="" src="https://analytics.tiktok.com/i18n/pixel/events.js?sdkid=C5T4RVK247CAE4T44EJ0&amp;lib=ttq"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <link rel="stylesheet" type="text/css" href="https://cdn.shoppegram.com/files/33001-1638950412/checkout">


<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.13/js/intlTelInput.min.js" integrity="sha512-QMUqEPmhXq1f3DnAVdXvu40C8nbTgxvBGvNruP6RFacy3zWKbNTmx7rdQVVM2gkd2auCWhlPYtcW2tHwzso4SA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.13/js/utils.min.js" integrity="sha512-lv6g7RcY/5b9GMtFgw1qpTrznYu1U4Fm2z5PfDTG1puaaA+6F+aunX+GlMotukUFkxhDrvli/AgjAu128n2sXw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script type="text/javascript">
$(function() {

var $iniTelPhone = $('#inti-tel-phone'),
    $phoneDiv = $('#phone-div'),
    $intlPhone = window.intlTelInput($iniTelPhone[0], {
        hiddenInput: 'phone',
        customContainer: 'w-100',
        initialCountry: 'my',
        onlyCountries: ["my", "sg", "bn"],
        utilsScript: 'https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.13/js/utils.min.js'
    });

$intlPhone.setNumber($iniTelPhone.val());

$iniTelPhone.on('keyup countrychange', function() {
    validatePhone();
});

$iniTelPhone.closest('form').on('submit', function(e) {
    var $btnSubmit = $('#btn-submit'),
        btnText = $btnSubmit.data('loading-text'),
        isValid = validatePhone();

    if (! isValid) {
        e.preventDefault();

        $iniTelPhone.addClass('is-invalid');
        $phoneDiv.append('<div class="invalid-feedback d-block" id="phone-error">Invalid phone numbers.</div>');
        $btnSubmit.removeAttr('disabled').text(btnText);
        $('body').find('input[name="phone"]').attr('value', '');
    }
});

$('#country').change(function() {
    let $country = $(this), $states = $('#states');

    $.ajax({
        type     : 'POST',
        data     : {
            country_id  : $country.val(),
        },
        url      : 'https://nadzirulstore.myshoppegram.com/checkouts/7kkGrnJuxM8GdYhp2eEUQdwlFRIecob3/shipping/states',
        cache    : false,
        success  : function(data) {

            if (data.length === 0) {
                $states.parent().addClass('d-none');
                $country.parent().removeClass('col-md-6').addClass('col-md-12');
            } else {
                $states.parent().removeClass('d-none');
                $country.parent().removeClass('col-md-12').addClass('col-md-6');
            }

            // Clear the old options, and add default option
            $states.empty();
            $states.append(new Option('State', ''));

            // Load the new options
            for (state in data) {
                $states.append(new Option(data[state], state));
            }
        },
    });
});

function validatePhone() {
    var validationErrors = window.intlTelInputUtils.validationError,
        error = $intlPhone.getValidationError(),
        isPossible = !! (error && error === validationErrors.IS_POSSIBLE),
        isValid = $intlPhone.isValidNumber() || isPossible;

    // reset phone error message
    $iniTelPhone.removeClass('is-invalid');
    $phoneDiv.find('#phone-error').remove();
    $('body').find('input[name="phone"]').attr('value', $intlPhone.getNumber());

    return isValid;
}


$(':radio[name="delivery_method"]').change(function () {

    $('#shipping-method').addClass('d-block').removeClass('d-none');
    $('#pickup-method').addClass('d-none').removeClass('d-block');

    if ($(this).val() == 'pickup') {
        $('#shipping-method').addClass('d-none').removeClass('d-block');
        $('#pickup-method').addClass('d-block').removeClass('d-none');
    }

});

$(':radio[name="delivery_method"]:checked').trigger('change');

});
</script>


    <script type="text/javascript">

    $(function() {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('button[data-loading-text]').click(function() {

            if ($(this).closest('form')[0].checkValidity()) {

                $(this).prop('disabled', true).closest('form').submit();

                $(this).html('<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>');

                setTimeout(function() {
                    $(this).prop('disabled', false)
                }, 2000);
            }

        });

    });

    </script>

    <script>!function (w, d, t) {
w.TiktokAnalyticsObject=t;var ttq=w[t]=w[t]||[];ttq.methods=["page","track","identify","instances","debug","on","off","once","ready","alias","group","enableCookie","disableCookie"],ttq.setAndDefer=function(t,e){t[e]=function(){t.push([e].concat(Array.prototype.slice.call(arguments,0)))}};for(var i=0;i<ttq.methods.length;i++)ttq.setAndDefer(ttq,ttq.methods[i]);ttq.instance=function(t){for(var e=ttq._i[t]||[],n=0;n<ttq.methods.length;n++)ttq.setAndDefer(e,ttq.methods[n]);return e},ttq.load=function(e,n){var i="https://analytics.tiktok.com/i18n/pixel/events.js";ttq._i=ttq._i||{},ttq._i[e]=[],ttq._i[e]._u=i,ttq._t=ttq._t||{},ttq._t[e]=+new Date,ttq._o=ttq._o||{},ttq._o[e]=n||{};var o=document.createElement("script");o.type="text/javascript",o.async=!0,o.src=i+"?sdkid="+e+"&lib="+t;var a=document.getElementsByTagName("script")[0];a.parentNode.insertBefore(o,a)};
}(window, document, "ttq");</script><script>ttq.load('C5T4RVK247CAE4T44EJ0');ttq.page();</script><script>ttq.track('InitiateCheckout', {"content_name":"Express checkout","content_type":"product_group","content_id":[3954287],"value":50,"quantity":1,"currency":"MYR"});</script><!-- Facebook Pixel Code -->
            <script>
            !function(f,b,e,v,n,t,s)
              {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
                  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
                  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
                  n.queue=[];t=b.createElement(e);t.async=!0;
                  t.src=v;s=b.getElementsByTagName(e)[0];
                  s.parentNode.insertBefore(t,s)}(window, document,'script',
              'https://connect.facebook.net/en_US/fbevents.js');fbq('init', '594807398549761');fbq('track', 'PageView');</script><noscript><img height='1' width='1' style='display:none' src='https://www.facebook.com/tr?id=594807398549761&ev=PageView&noscript=1'
            /></noscript><script>fbq('track', 'InitiateCheckout', {"content_name":"Express checkout","content_type":"product_group","content_ids":[3954287],"value":50,"num_items":1,"currency":"MYR"});</script><!-- End Facebook Pixel Code -->


<script charset="utf-8" src="https://analytics.tiktok.com/i18n/pixel/identify.js"></script></head>

<body>



<div class="container">
<div class="row justify-content-md-center">

<div class="col-md-5 col-center mt-3">

    <h1 class="logo">
<a href="https://nadzirulstore.myshoppegram.com" title="Back to MyShop" class="text-dark">MyApp</a>
</h1>


    <div class="order-details mt-3 mb-3" id="summaryTab">

        <div class="card">

            <div class="card-header" id="tab">

                <button class="btn btn-block order-summary" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">

                    <div class="row">

                        <div class="col-8 text-left">
                            <i class="fa fa-shopping-cart mr-1"></i> Show order summary
                        </div>

                        <div class="col-4 text-right">RM50.00</div>

                    </div>

                </button>

            </div>

            <div id="collapseOne" class="collapse show" aria-labelledby="tab" data-parent="#summaryTab" style="">

                <div class="card-body">

                    <table class="table table-sm mb-0 table-summary">

                        <tbody>


                            <tr>
                                <td class="border-top-0">
                                    Combo Product Unit
                                    <small class="d-block">
                                        1 Unit x 1 @ RM50.00
                                    </small>
                                </td>
                                <td width="180" class="text-right  border-top-0  ">
                                    RM50.00
                                </td>
                            </tr>




                            <tr class="shipping-info">
                                <td>Shipping</td>
                                <td class="text-right text-muted">
                                    Calculated at next step
                                </td>
                            </tr>


                            <tr>
                                <th>Total</th>
                                <th width="100" class="text-right">RM50.00</th>
                            </tr>

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>

    <form method="POST" action="https://nadzirulstore.myshoppegram.com/checkouts/7kkGrnJuxM8GdYhp2eEUQdwlFRIecob3" accept-charset="UTF-8" class="mb-5"><input name="_token" type="hidden" value="1ec1GagSMSsTDByC5XyJImlQmnaCUPVrpuLlFo5w">

    <label class="form-title">Contact information</label>


    <div class="form-group">
        <input class="form-control " placeholder="Email address" autofocus="" name="email" type="text">
    </div>


    <div class="form-row">
        <div class="form-group col-md-6">
            <input class="form-control " placeholder="First name" autofocus="" name="first_name" type="text">
        </div>

        <div class="form-group col-md-6">
            <input class="form-control " placeholder="Last name" name="last_name" type="text">
        </div>
    </div>

    <div class="form-group" id="phone-div">
        <div class="iti iti--allow-dropdown w-100"><div class="iti__flag-container"><div class="iti__selected-flag" role="combobox" aria-controls="iti-0__country-listbox" aria-owns="iti-0__country-listbox" aria-expanded="false" tabindex="0" title="Malaysia: +60" aria-activedescendant="iti-0__item-my"><div class="iti__flag iti__my"></div><div class="iti__arrow"></div></div><ul class="iti__country-list iti__hide" id="iti-0__country-listbox" role="listbox" aria-label="List of countries"><li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-bn" role="option" data-dial-code="673" data-country-code="bn" aria-selected="false"><div class="iti__flag-box"><div class="iti__flag iti__bn"></div></div><span class="iti__country-name">Brunei</span><span class="iti__dial-code">+673</span></li><li class="iti__country iti__standard iti__active" tabindex="-1" id="iti-0__item-my" role="option" data-dial-code="60" data-country-code="my" aria-selected="true"><div class="iti__flag-box"><div class="iti__flag iti__my"></div></div><span class="iti__country-name">Malaysia</span><span class="iti__dial-code">+60</span></li><li class="iti__country iti__standard" tabindex="-1" id="iti-0__item-sg" role="option" data-dial-code="65" data-country-code="sg" aria-selected="false"><div class="iti__flag-box"><div class="iti__flag iti__sg"></div></div><span class="iti__country-name">Singapore</span><span class="iti__dial-code">+65</span></li></ul></div><input id="inti-tel-phone" class="form-control " placeholder="Phone number" inputmode="tel" name="intitelphone" type="text" autocomplete="off" data-intl-tel-input-id="0"><input type="hidden" name="phone"></div>
    </div>



    <div class="form-group">
        <input name="delivery_method" type="hidden" value="standard">
    </div>



    <div id="shipping-method" class="d-block">

        <div class="form-group">
            <label class="form-title">Shipping address</label>
            <input class="form-control " placeholder="Address" name="address" type="text">
        </div>

        <div class="form-row">

            <div class="form-group col-md-6">
                <input class="form-control " placeholder="Postcode / Zip" name="zip" type="text">
            </div>

            <div class="form-group col-md-6">
                <input class="form-control " placeholder="City" name="city" type="text">
            </div>

        </div>

        <div class="form-row">


            <div class="form-group col-md-6">
                <select id="states" class="form-control " name="state_id"><option value="" selected="selected">State</option><option value="1">Johor</option><option value="2">Kedah</option><option value="3">Kelantan</option><option value="4">Kuala Lumpur</option><option value="5">Labuan</option><option value="6">Melaka</option><option value="7">Negeri Sembilan</option><option value="8">Pahang</option><option value="9">Perak</option><option value="10">Perlis</option><option value="11">Pulau Pinang</option><option value="12">Putrajaya</option><option value="13">Sabah</option><option value="14">Sarawak</option><option value="15">Selangor</option><option value="16">Terengganu</option></select>
            </div>

            <div class="form-group col-md-6">
                <select id="country" class="form-control " name="country_id"><option value="1">Malaysia</option></select>
            </div>


        </div>

    </div>




    <button type="submit" id="btn-submit" class="btn btn-primary btn-block pt-3 pb-3" style=" " data-loading-text="Continue to shipping method">Continue to shipping method</button>


            <a href="https://nadzirulstore.myshoppegram.com/cart" class="small text-secondary return-cart"><i class="fa fa-chevron-left"></i> Return to cart</a>

    </form>

</div>

</div>

</div>



</body><iframe id="__JSBridgeIframe_1.0__" style="display: none;"></iframe><iframe id="__JSBridgeIframe_SetResult_1.0__" style="display: none;"></iframe><iframe id="__JSBridgeIframe__" style="display: none;"></iframe><iframe id="__JSBridgeIframe_SetResult__" style="display: none;"></iframe></html>
