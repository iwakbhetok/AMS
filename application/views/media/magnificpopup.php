<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
  ------------------------------------------------------------------------------
  AMS Applications
  ------------------------------------------------------------------------------

  Author : Dadang Nurjaman
  Email  : mail.nurjaman@gmail.com
  @2014

  ------------------------------------------------------------------------------
  Mabes Polri
  ------------------------------------------------------------------------------
 */
?>

<section class="vbox">
    <header class="header bg-light lt b-b b-light">
        <p class="h4 font-thin m-r m-b-sm">Beranda</p>         
    </header>
    <section class="">	 
        <a class="image-popup-vertical-fit" href="http://farm9.staticflickr.com/8241/8589392310_7b6127e243_b.jpg" title="Caption. Can be aligned it to any side and contain any HTML.">
            <img src="http://farm9.staticflickr.com/8241/8589392310_7b6127e243_s.jpg" height="75" width="75">
        </a>
        <a class="image-popup-fit-width" href="http://farm9.staticflickr.com/8379/8588290361_ecf8c27021_b.jpg" title="This image fits only horizontally.">
            <img src="http://farm9.staticflickr.com/8379/8588290361_ecf8c27021_s.jpg" height="75" width="75">
        </a>
        <a class="image-popup-no-margins" href="http://farm4.staticflickr.com/3721/9207329484_ba28755ec4_o.jpg">
            <img src="http://farm4.staticflickr.com/3721/9207329484_ba28755ec4_o.jpg" height="75" width="107">
        </a>     				

        <div class="popup-gallery">
            <a href="http://farm9.staticflickr.com/8242/8558295633_f34a55c1c6_b.jpg" title="The Cleaner"><img src="http://farm9.staticflickr.com/8242/8558295633_f34a55c1c6_s.jpg" height="75" width="75"></a>
            <a href="http://farm9.staticflickr.com/8382/8558295631_0f56c1284f_b.jpg" title="Winter Dance"><img src="http://farm9.staticflickr.com/8382/8558295631_0f56c1284f_s.jpg" height="75" width="75"></a>
            <a href="http://farm9.staticflickr.com/8225/8558295635_b1c5ce2794_b.jpg" title="The Uninvited Guest"><img src="http://farm9.staticflickr.com/8225/8558295635_b1c5ce2794_s.jpg" height="75" width="75"></a>
            <a href="http://farm9.staticflickr.com/8383/8563475581_df05e9906d_b.jpg" title="Oh no, not again!"><img src="http://farm9.staticflickr.com/8383/8563475581_df05e9906d_s.jpg" height="75" width="75"></a>
            <a href="http://farm9.staticflickr.com/8235/8559402846_8b7f82e05d_b.jpg" title="Swan Lake"><img src="http://farm9.staticflickr.com/8235/8559402846_8b7f82e05d_s.jpg" height="75" width="75"></a>
            <a href="http://farm9.staticflickr.com/8235/8558295467_e89e95e05a_b.jpg" title="The Shake"><img src="http://farm9.staticflickr.com/8235/8558295467_e89e95e05a_s.jpg" height="75" width="75"></a>
            <a href="http://farm9.staticflickr.com/8378/8559402848_9fcd90d20b_b.jpg" title="Who's that, mommy?"><img src="http://farm9.staticflickr.com/8378/8559402848_9fcd90d20b_s.jpg" height="75" width="75"></a>
        </div>

        <div class="zoom-gallery">
            <!--
    
            Width/height ratio of thumbnail and the main image must match to avoid glitches.
    
            If ratios are different, you may add CSS3 opacity transition to the main image to make the change less noticable.
    
            -->
            <a href="http://farm4.staticflickr.com/3763/9204547649_0472680945_o.jpg" data-source="http://500px.com/photo/32736307" title="Into The Blue" style="width:193px;height:125px;">
                <img src="http://farm4.staticflickr.com/3763/9204547649_7de96ee188_t.jpg" height="125" width="193">
            </a>
            <a href="http://farm3.staticflickr.com/2856/9207329420_7f2a668b06_o.jpg" data-source="http://500px.com/photo/32554131" title="Light Sabre" style="width:82px;height:125px;">
                <img src="http://farm3.staticflickr.com/2856/9207329420_e485948b01_t.jpg" height="125" width="82px">
            </a>
        </div>

        <a class="popup-youtube" href="http://www.youtube.com/watch?v=0O2aH4XLbto">Open YouTube video</a><br>
        <a class="popup-vimeo" href="https://vimeo.com/45830194">Open Vimeo video</a><br>
        <a class="popup-gmaps" href="https://maps.google.com/maps?q=221B+Baker+Street,+London,+United+Kingdom&amp;hl=en&amp;t=v&amp;hnear=221B+Baker+St,+London+NW1+6XE,+United+Kingdom">Open Google Map</a>
        <a class="popup-pdf" href="<?php echo base_url('assets/pdf.pdf') ?>">Open PDF</a>
        <a class="" href="<?php echo base_url('assets/doc.doc') ?>">Open Doc</a>	

        <a class="popup-with-zoom-anim" href="#small-dialog">Open with fade-zoom animation</a><br>
        <a class="popup-with-move-anim" href="#small-dialog">Open with fade-slide animation</a>

        <!-- dialog itself, mfp-hide class is required to make dialog hidden -->
        <div id="small-dialog" class="zoom-anim-dialog mfp-hide">
            <h1>Dialog example</h1>
            <p>This is dummy copy. It is not meant to be read. It has been placed here solely to demonstrate the look and feel of finished, typeset text. Only for show. He who searches for meaning here will be sorely disappointed.</p>
        </div>

        <!-- link that opens popup -->
        <a class="popup-with-form" href="#test-form">Open form</a>

        <!-- form itself -->
        <form id="test-form" class="mfp-hide white-popup-block">
            <h1>Form</h1>
            <fieldset style="border:0;">
                <p>Lightbox has an option to automatically focus on the first input. It's strongly recommended to use <code>inline</code> popup type for lightboxes with form instead of <code>ajax</code> (to keep entered data if the user accidentally refreshed the page).</p>
                <ol>
                    <li>
                        <label for="name">Name</label>
                        <input id="name" name="name" placeholder="Name" required="" type="text">
                    </li>
                    <li>
                        <label for="email">Email</label>
                        <input id="email" name="email" placeholder="example@domain.com" required="" type="email">
                    </li>
                    <li>
                        <label for="phone">Phone</label>
                        <input id="phone" name="phone" placeholder="Eg. +447500000000" required="" type="tel">
                    </li>
                    <li>
                        <label for="textarea">Textarea</label><br>
                        <textarea id="textarea">Try to resize me to see how popup CSS-based resizing works.</textarea>
                    </li>
                </ol>
            </fieldset>
        </form>

        <a class="simple-ajax-popup-align-top" href="../assets/test-ajax.html">Load content via ajax</a><br>
        <a class="simple-ajax-popup" href="../assets/test-ajax-2.html">Load another content via ajax</a>

        <a class="popup-modal" href="#test-modal">Open modal</a>

        <div id="test-modal" class="mfp-hide white-popup-block">
            <h1>Modal dialog</h1>
            <p>You won't be able to dismiss this by usual means (escape or
                click button), but you can close it programatically based on
                user choices or actions.</p>
            <p><a class="popup-modal-dismiss" href="#">Dismiss</a></p>
        </div>

        <a id="broken-image" class="mfp-image" href="http://upload.wikimedia.org/wikipedia/commons/thumb/f/f3/Blois_Loire_Panorama_-_July_2011.jpg/640px-Blois_Loire_Panorama_-_July_2011-fake.jpg">Broken image</a><br>
        <a id="broken-ajax" class="mfp-ajax" href="http://example.com/fakeg">Broken ajax request</a>

    </section>	     
</section>

<script type="text/javascript">
    $(document).ready(function() {

        $('.image-popup-vertical-fit').magnificPopup({
            type: 'image',
            closeOnContentClick: true,
            mainClass: 'mfp-img-mobile',
            image: {
                verticalFit: true
            }

        });

        $('.image-popup-fit-width').magnificPopup({
            type: 'image',
            closeOnContentClick: true,
            image: {
                verticalFit: false
            }
        });

        $('.image-popup-no-margins').magnificPopup({
            type: 'image',
            closeOnContentClick: true,
            closeBtnInside: false,
            fixedContentPos: true,
            mainClass: 'mfp-no-margins mfp-with-zoom', // class to remove default margin from left and right side
            image: {
                verticalFit: true
            },
            zoom: {
                enabled: true,
                duration: 300 // don't foget to change the duration also in CSS
            }
        });

        $('.popup-gallery').magnificPopup({
            delegate: 'a',
            type: 'image',
            tLoading: 'Loading image #%curr%...',
            mainClass: 'mfp-img-mobile',
            gallery: {
                enabled: true,
                navigateByImgClick: true,
                preload: [0, 1] // Will preload 0 - before current, and 1 after the current image
            },
            image: {
                tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
                titleSrc: function(item) {
                    return item.el.attr('title') + '<small>by Marsel Van Oosten</small>';
                }
            }
        });

        $('.zoom-gallery').magnificPopup({
            delegate: 'a',
            type: 'image',
            closeOnContentClick: false,
            closeBtnInside: false,
            mainClass: 'mfp-with-zoom mfp-img-mobile',
            image: {
                verticalFit: true,
                titleSrc: function(item) {
                    return item.el.attr('title') + ' &middot; <a class="image-source-link" href="' + item.el.attr('data-source') + '" target="_blank">image source</a>';
                }
            },
            gallery: {
                enabled: true
            },
            zoom: {
                enabled: true,
                duration: 300, // don't foget to change the duration also in CSS
                opener: function(element) {
                    return element.find('img');
                }
            }

        });

        $('.popup-youtube, .popup-vimeo, .popup-gmaps, .popup-pdf, .popup-doc').magnificPopup({
            disableOn: 700,
            type: 'iframe',
            mainClass: 'mfp-fade',
            removalDelay: 160,
            preloader: false,
            fixedContentPos: false
        });

        $('.popup-with-zoom-anim').magnificPopup({
            type: 'inline',
            fixedContentPos: false,
            fixedBgPos: true,
            overflowY: 'auto',
            closeBtnInside: true,
            preloader: false,
            midClick: true,
            removalDelay: 300,
            mainClass: 'my-mfp-zoom-in'
        });

        $('.popup-with-move-anim').magnificPopup({
            type: 'inline',
            fixedContentPos: false,
            fixedBgPos: true,
            overflowY: 'auto',
            closeBtnInside: true,
            preloader: false,
            midClick: true,
            removalDelay: 300,
            mainClass: 'my-mfp-slide-bottom'
        });

        $('.popup-with-form').magnificPopup({
            type: 'inline',
            preloader: false,
            focus: '#name',
            // When elemened is focused, some mobile browsers in some cases zoom in
            // It looks not nice, so we disable it:
            callbacks: {
                beforeOpen: function() {
                    if ($(window).width() < 700) {
                        this.st.focus = false;
                    } else {
                        this.st.focus = '#name';
                    }
                }
            }
        });

        $('.simple-ajax-popup-align-top').magnificPopup({
            type: 'ajax',
            alignTop: true,
            overflowY: 'scroll' // as we know that popup content is tall we set scroll overflow by default to avoid jump
        });

        $('.simple-ajax-popup').magnificPopup({
            type: 'ajax'
        });

        $('.popup-modal').magnificPopup({
            type: 'inline',
            preloader: false,
            focus: '#username',
            modal: true
        });
        $(document).on('click', '.popup-modal-dismiss', function(e) {
            e.preventDefault();
            $.magnificPopup.close();
        });

        $('#broken-image, #broken-ajax').magnificPopup({});

    });
</script>