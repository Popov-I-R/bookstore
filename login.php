<?php
require_once 'header.php'; 
?>

        <div class="page-content p-5" id="content">
            <section class="vh-100">
                <div class="container-fluid h-custom">
                    <div class="row d-flex justify-content-center align-items-center h-100">
                        <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                            <form>
                                <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
                                    <p class="lead fw-normal mb-0 me-3">Влезнете чрез</p>
                                    <button type="button" class="btn btn-primary btn-floating mx-1">
                                        <i class="fab fa-facebook-f"></i>
                                    </button>

                                    <button type="button" class="btn btn-primary btn-floating mx-1">
                                        <i class="fab fa-twitter"></i>
                                    </button>

                                    <button type="button" class="btn btn-primary btn-floating mx-1">
                                        <i class="fab fa-linkedin-in"></i>
                                    </button>
                                </div>

                                <div class="divider d-flex align-items-center my-4">
                                    <p class="text-center fw-bold mx-3 mb-0">или въведете</p>
                                </div>

                                <!-- Email input -->
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="email">Email адрес</label>
                                    <input type="email" id="email" class="form-control form-control-lg"
                                           placeholder="Въведете имейл" />

                                </div>

                                <!-- Password input -->
                                <div class="form-outline mb-3">
                                    <label class="form-label" for="password">Парола</label>
                                    <input type="password" id="password" class="form-control form-control-lg"
                                           placeholder="Въведете парола" />

                                </div>

                                <div class="d-flex justify-content-between align-items-center">
                                    <!-- Checkbox -->
                                    <div class="form-check mb-0">
                                        <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
                                        <label class="form-check-label" for="form2Example3">
                                            Запомни ме
                                        </label>
                                    </div>
                                    <a href="#!" class="text-body">Забравена парола ?</a>
                                </div>

                                <p id="error"></p>

                                <div class="text-center text-lg-start mt-4 pt-2">
                                    <button type="button" id="btn-login" class="btn-login btn-primary btn-lg"
                                            style="padding-left: 2.5rem; padding-right: 2.5rem;">Вход</button>
                                    <p class="small fw-bold mt-2 pt-1 mb-0">Нямате акаунт ? <a href="<?php echo URLBASE; ?>/registration.php"
                                                                                                      class="link-danger">Регистрирайте се</a></p>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>

            </section>
        </div>    

<script>
    $("#btn-login").unbind().bind('click', function (e) {
        e.preventDefault();
        $('#error').hide();
        var email = $("#email").val();
        var password = $('#password').val();
        if (email != "" && password != "") {
            $.ajax({
                type: 'POST',
                data: {
                    email: email,
                    password: password
                },
                cache: false,
                url: 'frontend/includes/user/login.php',
                success: function (dataResult) {
                    var dataResult = JSON.parse(dataResult);
                    console.log(dataResult);
                    if (dataResult.statusCode == 200) {
                        window.location = './index.php';
                    } else if (dataResult.statusCode == 201) {
                        $('#error').show();
                        $('#error').html('Няма такъв потребител');
                    } else if (dataResult.statusCode == 202) {
                        $('#error').show();
                        $('#error').html('Паролата не съвпада');
                    }
                }
            });
        }
         else {
            alert("Моля, въведете вашите данни.")
        }
    });
</script>

<?php
include_once 'footer.php';
