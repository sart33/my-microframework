<h1 class="mt-2 mb-3">Здравствуйте уважаемый клиент</h1>
<form method="post" action="/webform-callback" enctype="multipart/form-data">
    <?='%webform%'?>
    <script>

        let btnSuccess = document.getElementById('btn-success');

        btnSuccess.onclick = function() {


            let nameForm = document.getElementsByName('WebForm[name]')[0];
            let surnameForm = document.getElementsByName('WebForm[surname]')[0];
            let phoneForm = document.getElementsByName('WebForm[phone]')[0];
            let emailForm = document.getElementsByName('WebForm[email]')[0];
            let selectForm = document.getElementsByName('WebForm[select]')[0];
            let agreeForm = document.getElementsByName('WebForm[agree]')[0];


            let name = nameForm.value;
            let surname = surnameForm.value;
            let phone = phoneForm.value;
            let email = emailForm.value;
            let select = selectForm.value;
            let agree = agreeForm.value;

            console.log(name)
            console.log(surname);
            console.log(phone);
            console.log(email);
            console.log(select);
            console.log(agree);
        };

    </script>
</form>

