{{-- Bootstrap JS --}}
<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>

{{-- plugins --}}
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
<script src="{{ asset('assets/plugins/metismenu/js/metisMenu.min.js') }}"></script>
<script src="{{ asset('assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
<script src="{{ asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatable/js/dataTables.bootstrap5.min.js') }}"></script>

{{-- Select2 --}}
<script src="{{ asset('assets/plugins/select2/js/select2.min.js') }}"></script>

{{-- AOS --}}
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init();
</script>

<script>
    $(document).ready(function() {
        $('.js-example-basic-multiple').select2();
    });
</script>

{{-- Feather Icon --}}
<script src="https://unpkg.com/feather-icons"></script>
<script>
    feather.replace()
</script>

<!-- Modal Unverified -->
<script type="text/javascript">
    window.onload = () => {
        $('#onload').modal('show');
    }
</script>

{{-- Password show & hide js --}}
<script>
    $(document).ready(function() {
        $("#show_hide_password a").on("click", function(event) {
            event.preventDefault();
            if ($("#show_hide_password input").attr("type") == "text") {
                $("#show_hide_password input").attr("type", "password");
                $("#show_hide_password i").addClass("bx-hide");
                $("#show_hide_password i").removeClass("bx-show");
            } else if ($("#show_hide_password input").attr("type") == "password") {
                $("#show_hide_password input").attr("type", "text");
                $("#show_hide_password i").removeClass("bx-hide");
                $("#show_hide_password i").addClass("bx-show");
            }
        });
    });
</script>

{{-- Custom Input File Profile Picture --}}
<script>
    function previewImage(event) {
        var input = event.target;
        var preview = document.getElementById('preview');
        var fileName = document.getElementById('file-name');

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
                fileName.textContent = input.files[0].name;
                fileName.style.display = 'block';
            };

            reader.readAsDataURL(input.files[0]);
        } else {
            preview.src = '#';
            preview.style.display = 'none';
            fileName.textContent = '';
            fileName.style.display = 'none';
        }
    }
</script>

{{-- Custom Input File Certificate --}}
<script>
    function previewImageCertificate(event) {
        var input = event.target;
        var preview = document.getElementById('preview-certificate');
        var fileName = document.getElementById('file-name-certificate');

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
                fileName.textContent = input.files[0].name;
                fileName.style.display = 'block';
            };

            reader.readAsDataURL(input.files[0]);
        } else {
            preview.src = '#';
            preview.style.display = 'none';
            fileName.textContent = '';
            fileName.style.display = 'none';
        }
    }
</script>

{{-- Datatables --}}
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>
<script>
    $(document).ready(function() {
        var table = $('#example2').DataTable({
            lengthChange: false,
            buttons: ['copy', 'excel', 'pdf', 'print']
        });

        table.buttons().container()
            .appendTo('#example2_wrapper .col-md-6:eq(0)');
    });
</script>

{{-- App JS --}}
<script src="{{ asset('assets/js/app.js') }}"></script>
<script src="{{ asset('assets/plugins/fancy-file-uploader/jquery.fileupload.js') }}"></script>
<script src="{{ asset('assets/plugins/fancy-file-uploader/jquery.iframe-transport.js') }}"></script>
<script src="{{ asset('assets/plugins/fancy-file-uploader/jquery.fancy-fileupload.js') }}"></script>
<script src="{{ asset('assets/plugins/Drag-And-Drop/dist/imageuploadify.min.js') }}"></script>

{{-- Append --}}
<script>
    function clickAdd() {
        newFormRow.classList.add("row", "mb-3");

        const newFormLabel = document.createElement("label");
        newFormLabel.classList.add("col-sm-3", "col-form-label");
        newFormLabel.setAttribute("for", "nama_makanan");
        newFormLabel.textContent = "Nama Makanan";

        const newFormInput = document.createElement("div");
        newFormInput.classList.add("col-sm-9");

        const newFormTextInput = document.createElement("input");
        newFormTextInput.classList.add("form-control");
        newFormTextInput.setAttribute("type", "text");
        newFormTextInput.setAttribute("placeholder", "Nama Makanan");

        newFormInput.appendChild(newFormTextInput);
        newFormRow.appendChild(newFormLabel);
        newFormRow.appendChild(newFormInput);
        formMakanan.insertBefore(newFormRow, addFormButton.parentNode.parentNode);
    }
</script>

{{-- File Upload --}}
<script>
    $("#fancy-file-upload").FancyFileUpload({
        params: {
            action: "fileuploader",
        },
        maxfilesize: 1000000,
    });
</script>
<script>
    $(document).ready(function() {
        $("#image-uploadify").imageuploadify();
    });
</script>

{{-- Filepond --}}
<script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>
<script src="https://unpkg.com/filepond-plugin-file-poster/dist/filepond-plugin-file-poster.js"></script>

<script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
<script src='https://unpkg.com/filepond-plugin-file-encode/dist/filepond-plugin-file-encode.min.js'></script>
<script src='https://unpkg.com/filepond-plugin-file-validate-size/dist/filepond-plugin-file-validate-size.min.js'>
</script>
<script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>

<script
    src='https://unpkg.com/filepond-plugin-image-exif-orientation/dist/filepond-plugin-image-exif-orientation.min.js'>
</script>

<script>
    FilePond.registerPlugin(
        FilePondPluginFileEncode,
        FilePondPluginFileValidateSize,
        FilePondPluginImageExifOrientation,
        FilePondPluginFilePoster,
        FilePondPluginFileValidateType
    )

    //configuration filepond
    const inputElement = document.querySelector('input[id="image"]');
    const inputElement2 = document.querySelector('input[id="file"]');
    // Create a FilePond instance
    const initialValue = inputElement.dataset.file;
    const pond = FilePond.create(inputElement, {
        acceptedFileTypes: ['image/png', 'image/jpg'],
        labelFileTypeNotAllowed: 'Hanya file dengan ekstensi .png dan .jpg yang diperbolehkan'
    });
    const pond2 = FilePond.create(inputElement2);



    //tujuan filepond
    FilePond.setOptions({
        server: {
            process: '{{ route('upload') }}', //upload
            revert: (uniqueFileId, load, error) => {
                //delete file
                deleteImage(uniqueFileId);
                error('Error terjadi saat delete file');
                load();
            },
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        }
    });
    //end config filepond

    function deleteImage(nameFile) {
        $.ajax({
            url: '{{ route('destroy') }}',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "DELETE",
            data: {
                image: nameFile,
            },
            success: function(response) {
                console.log(response);
            },
            error: function(response) {
                console.log('error')
            }
        });
    }

    $(document).ready(function() {
        $("#addForm").on('submit', function(e) {
            e.preventDefault();
            $("#saveBtn").html('Processing...').attr('disabled', 'disabled');
            var link = $("#addForm").attr('action');
            $.ajax({
                url: link,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "POST",
                data: new FormData(this),
                processData: false,
                contentType: false,
                success: function(response) {
                    $("#saveBtn").html('Save').removeAttr('disabled');
                    pond.removeFiles(); //clear
                    alert('Berhasil')
                },
                error: function(response) {
                    $("#saveBtn").html('Save').removeAttr('disabled');
                    alert(response.error);
                }
            });
        });
    });
</script>

{{-- <script>
    FilePond.registerPlugin(FilePondPluginFileValidateSize);
    FilePond.registerPlugin(FilePondPluginFileValidateType);

    const inputElements = document.querySelector('input[name="image_edit"]');
    const initialValues = inputElements.dataset.file;

    const pond = FilePond.create(inputElements, {
        acceptedFileTypes: ['image_edit/jpeg', 'image_edit/png'],
        maxFileSize: '5MB',
        files: [{
            source: initialValues,
            options: {
                type: 'local',
            },
        }, ],
    });
</script> --}}

<script>
    $(document).ready(function() {

        fetchfile();

        function fetchfile() {
            var resto_id = $("#resto_id").val();
            $.ajax({
                url: "/review_saya/edit_resto/image_edit/" + resto_id,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType: "json",
                data: {
                    "resto_id": resto_id,
                },
                type: 'POST',
                success: function(response) {
                    console.log("it Works");
                    $('.image_uploaded').html("");
                    $.each(response.file, function(key, item) {
                        $('.image_uploaded').append(
                            `
                            <li class="filepond--item" id="filepond--item-7to8a0vt0"
                                data-filepond-item-state="processing-complete"
                                style="opacity: 1; height: 48px; position: relative;">
                                <fieldset class="filepond--file-wrapper">
                                    <div class="filepond--file">
                                        <button
                                            class="filepond--file-action-button filepond--action-revert-item-processing delete_file"
                                            type="button" data-align="right" value="${item.id}"
                                            style="transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1); opacity: 1;"><svg
                                                width="26" height="26" viewBox="0 0 26 26"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M11.586 13l-2.293 2.293a1 1 0 0 0 1.414 1.414L13 14.414l2.293 2.293a1 1 0 0 0 1.414-1.414L14.414 13l2.293-2.293a1 1 0 0 0-1.414-1.414L13 11.586l-2.293-2.293a1 1 0 0 0-1.414 1.414L11.586 13z"
                                                    fill="currentColor" fill-rule="nonzero"></path>
                                            </svg>
                                            <input hidden type="text" id="image_name" value="${item.image}">
                                        </button>

                                        <div class="filepond--file-info"
                                            style="transform: translate3d(0px, 0px, 0px);"><span
                                                class="filepond--file-info-main"
                                                aria-hidden="true">${item.image}</span><span
                                                class="filepond--file-info-sub">8 KB</span></div>
                                        <div class="filepond--file-status"
                                            style="transform: translate3d(0px, 0px, 0px); opacity: 1;">
                                            <span class="filepond--file-status-main">Unggahan
                                                selesai</span><span class="filepond--file-status-sub">ketuk
                                                untuk menghapus</span>
                                        </div>
                                        <div class="filepond--progress-indicator filepond--load-indicator"
                                            style="opacity: 0; visibility: hidden; pointer-events: none;">
                                            <svg>
                                                <path stroke-width="2" stroke-linecap="round"></path>
                                            </svg>
                                        </div>
                                        <div class="filepond--progress-indicator filepond--process-indicator"
                                            style="opacity: 0; visibility: hidden; pointer-events: none;"
                                            data-align="right"><svg>
                                                <path stroke-width="2" stroke-linecap="round"
                                                    d="M 9.994973452084988 2.0000015791366526 A 8 8 0 1 0 10 2"
                                                    stroke-opacity="1"></path>
                                            </svg></div>
                                    </div>
                                </fieldset>
                                <div class="filepond--panel filepond--item-panel" data-scalable="true">
                                    <div class="filepond--panel-top filepond--item-panel"></div>
                                    <div class="filepond--panel-center filepond--item-panel"
                                        style="transform: translate3d(0px, 8px, 0px) scale3d(1, 0.32, 1);">
                                    </div>
                                    <div class="filepond--panel-bottom filepond--item-panel"
                                        style="transform: translate3d(0px, 40px, 0px);"></div>
                                </div>
                            </li>
                            `
                        );

                    });
                }
            });
        }

        // Modal Show
        $(document).on('click', '.delete_file', function(e) {
            e.preventDefault();
            var image_id = $(this).val();
            var image_name = $('#image_name').val();
            // alert(image_id);
            $('#image_id').val(image_id);
            var modal_text = document.getElementById("text_modal");

            if (modal_text.innerText.trim() === "") {
                modal_text.innerText = `Gambar resto ${image_name} akan dihapus`
            } else {
                modal_text.innerText = ''
                modal_text.innerText = `Gambar resto ${image_name} akan dihapus`
            }
            $('#deleteimageModal').modal('show');
        })

        // Deleted Image
        $(".deleteRecord").click(function() {
            var id = $('#image_id').val();

            $.ajax({
                url: "/review_saya/edit_resto/image_destroy/" + id,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'DELETE',
                data: {
                    "resto_id": id,
                    "_method": 'DELETE',
                },
                success: function(response) {
                    if (response.status == 'Success') {
                        console.log("It Works");
                        fetchfile();
                    } else {
                        console.log("It Not Works");
                    }
                }
            });

        });
    });
</script>

<script>
    $(document).ready(function() {
        $('#alertModal').modal('show');
        $('#alertModal').on('hidden.bs.modal', function() {
            $(this).remove();
        });
    });
</script>
