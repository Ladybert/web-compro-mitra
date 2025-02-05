$(document).ready(function() {
    $(".toggle-password").click(function() {
        let target = $(this).data("target");
        let input = $(target);
        let type = input.attr("type") === "password" ? "text" : "password";
        input.attr("type", type);

        let img = $(this).find("img");
        let invisibleLogo = $(this).data("invisible");
        let visibleLogo = $(this).data("visible");

        img.attr("src", type === "password" ? visibleLogo : invisibleLogo);
    });
});

$(document).ready(function () {
    function toggleSubmitButton() {
        let isFilled =
            $("#new_password").val().trim().length >= 8 &&
            $("#confirm_password").val().trim().length >= 8;

        $("#submit-btn").prop("disabled", !isFilled);

        if (!isFilled) {
            $("#submit-btn")
                .removeClass("bg-[#1F3C88]")
                .addClass("bg-[#1F3C88]/25 cursor-not-allowed");
        } else {
            $("#submit-btn")
                .removeClass("bg-[#1F3C88]/25 cursor-not-allowed")
                .addClass("bg-[#1F3C88] cursor-pointer");
        }
    }

    $("#new_password, #confirm_password").on("input", toggleSubmitButton);
    toggleSubmitButton();
});

document.getElementById('openModal').addEventListener('click', function() {
    document.getElementById('modal').classList.remove('hidden');
});

document.getElementById('closeModal').addEventListener('click', function() {
    document.getElementById('modal').classList.add('hidden');
});

document.getElementById('contentImage').addEventListener('change', function(event) {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('preview').src = e.target.result;
            document.getElementById('imagePreview').classList.remove('hidden');
        }
        reader.readAsDataURL(file);
    }
});