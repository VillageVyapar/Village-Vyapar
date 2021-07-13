@include('categorymenu');
<!-- catg header banner section -->
<section id="aa-catg-head-banner">
    <img src="img/fashion/fashion-header-bg-8.jpg" alt="fashion img">
    <div class="aa-catg-head-banner-area">
        <div class="container">
            <div class="aa-catg-head-banner-content">
                <h2>Contact Form</h2>
                <ol class="breadcrumb">
                    <li><a href="/">Home</a></li>
                    <li class="active">Contact</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<!-- / catg header banner section -->
<!-- start contact section -->
<section id="aa-contact">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="aa-contact-area">
                    <div class="aa-contact-top">
                        <h2>We are wating to assist you..</h2>
                        <p>If you have any inquiry type in form !!</p>
                    </div>
                    <!-- contact map -->
                    <div class="aa-contact-map">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3902.3714257064535!2d-86.7550931378034!3d34.66757706940219!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8862656f8475892d%3A0xf3b1aee5313c9d4d!2sHuntsville%2C+AL+35813%2C+USA!5e0!3m2!1sen!2sbd!4v1445253385137"
                            width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                    <!-- Contact address -->
                    <div class="aa-contact-address">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="aa-contact-address-left">
                                    <form method='post' class="comments-form contact-form" action="inquiryaction">
                                        {{@csrf_field()}}
                                        <div class="row">

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="text" name='cname' required value=''
                                                        placeholder="Your Name" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="email" name='email' required value=''
                                                        placeholder="Email" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="text" name='subject' required placeholder="Subject"
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="text" name='comp_name' required placeholder="Company"
                                                        class="form-control">
                                                </div>
                                            </div>

                                        </div>

                                        <div class="form-group">
                                            <textarea class="form-control" name='msg' required rows="3" cols='50'
                                                placeholder="Message"></textarea>
                                        </div>
                                        <button class="aa-secondary-btn">Send</button>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="aa-contact-address-right">
                                    <address>
                                        <h4><b>Village Vyapar </b></h4>
                                        <hr style='border:1px solid grey'>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum
                                            modi dolor
                                            facilis! Nihil error, eius.</p>
                                        <p><span class="fa fa-home"></span>25 Astor Pl, NY 10003, INDIA</p>
                                        <p><span class="fa fa-phone"></span>+91 8460730564</p>
                                        <p><span class="fa fa-envelope"></span>villagevyapar253@gmail.com
                                        </p>
                                    </address>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@include('footer');