<?php
require_once("../config.php");
?>

<?php
include(FRONT . DS . "header.php");
?>



<div class="container-fluid mt-5">
    <div class="row content">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
            <h1 class="text-center">Contacta con nosotros</h1>
            <h6 class="text-center text-danger">
                <?php display_message() ?>
            </h6>
            <div class="card p-4 bg-light">
                <form action="" name="sentMessage" id="contactForm" method="post">
                    <!-- If we were on an online server
                <?php send_message(); ?>-->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" placeholder="Tu nombre *" id="name"
                                    required data-validation-required-message="Por favor introduce tu nombre.">
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" class="form-control" placeholder="Tu email *"
                                    id="email" required
                                    data-validation-required-message="Por favor introduce tu email.">
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="form-group">
                                <input type="text" name="subject" class="form-control" placeholder="Asunto *"
                                    id="subject" required
                                    data-validation-required-message="Por favor introduce el asunto.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <textarea name="message" class="form-control" placeholder="Mensaje *" id="message"
                                    required
                                    data-validation-required-message="Por favor introduce el mensaje."></textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="clearfix"></div>

                        <div class="col-lg-12 text-center">
                            <br>
                            <div id="success"></div>
                            <button type="submit" name="submit" class="btn text-light bg-dark ">Enviar mensaje</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>


<?php
include(FRONT . DS . "footer.php");
?>