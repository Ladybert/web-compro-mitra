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

// Modal create
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

// Event delegation untuk menangkap klik dari tombol "edit"
document.addEventListener('click', function(event) {
    if (event.target.id === 'openContentModal' || event.target.closest('#openContentModal')) {
        let button = event.target.closest('#openContentModal'); // Ambil tombol yang diklik

        // Ambil data dari data attributes
        let contentId = button.getAttribute('data-id');
        let contentTitle = button.getAttribute('data-title').trim();
        let contentImg = button.getAttribute('data-img');

        // Isi form modal dengan data yang diambil
        document.getElementById('dataContentTitle').value = contentTitle;
        document.getElementById('dataContentId').value = contentId;
        document.getElementById('updatePreview').value = contentImg;
        
        // Set image preview kalau ada gambar
        let previewImg = document.getElementById('updatePreview');
        let previewContainer = document.getElementById('updateImagePreview');
        if (contentImg) {
            previewImg.src = contentImg;
            previewContainer.classList.remove('hidden');
        } else {
            previewContainer.classList.add('hidden');
        }

        // Tampilkan modal edit
        document.getElementById('editModal').classList.remove('hidden');
    }
});

// Tombol close modal
document.getElementById('closeContentModal').addEventListener('click', function() {
    document.getElementById('editModal').classList.add('hidden');
});

$(document).ready(function() {
    // Event klik tombol edit
    $(document).on('click', '#openContentModal', function() {
        let id = $(this).data('id');
        let title = $(this).data('title');
        let img = $(this).data('img'); // URL gambar lama

        // Set nilai di modal
        $('#contentTitle').val(title);
        $('#updatePreview').attr('src', img); // Set gambar preview dari database
        $('#updateImagePreview').removeClass('hidden');

        // Set action form update
        $('#updateContentForm').attr('action', '/admin/content/update-content-process/' + id);

        // Reset input file biar nggak ke-cache
        $('#updateContentImage').val(null);
    });

    // Ketika input file berubah
    $('#updateContentImage').on('change', function(event) {
        const file = event.target.files[0];

        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                $('#updatePreview').attr('src', e.target.result); // Ubah preview ke gambar baru
                $('#updateImagePreview').removeClass('hidden');
            }
            reader.readAsDataURL(file);
        }
    });
});
