$(document).ready(function () {
    $('#fileInput').click(function() {
        $('#uploadError').html('').fadeOut()
        $('#uploadButton').html('Upload').fadeIn()
    });

    $("#uploadButton").click(function() {
        uploadDisplayImage();
    });

    $('#articleForm').submit(function(event) {
        event.preventDefault();
        if ($('#tag').val() != 'research' || $('#tag').val() != 'project') {
            $('#hiddenInput').val($('[role="textbox"]').html());
        }
        $('#submitButton').html('').fadeOut();
        $('#submitButton').html('<i class="fa fa-spinner fa-spin-pulse"></i>').fadeIn();
        submitForm();
    })

    $('#editArticleForm').submit(function(event) {
        event.preventDefault();
        if ($('#tag').val() != 'research' || $('#tag').val() != 'project') {
            $('#hiddenInput').val($('[role="textbox"]').html());
        }
        $('#editSubmitButton').html('').fadeOut();
        $('#editSubmitButton').html('<i class="fa fa-spinner fa-spin-pulse"></i>').fadeIn();
        submitEditForm();
    })

    $('#articleBody .s-popover').remove();

    var draftCheckbox = $('#draftCheckbox');
    var articleStatus = $('#articleStatus');

    // Attach an event listener to the checkbox
    draftCheckbox.on('change', function() {
      // Update the hidden input value based on the checkbox state
      articleStatus.val(draftCheckbox.is(':checked') ? 'pending' : 'published');
    });


    // Change form contentwhen tag is research
    $('#tag').on('change', function(){
        if ($('#tag').val() === 'research' || $('#tag').val() === 'project') {
            $('#bodyToLinkDiv label b').text('Research Link');
            $('#hiddenInput').prop('type', 'url').fadeIn();
            $('#editor-container').hide();
        } else {
            $('#bodyToLinkDiv label b').text('Body');
            $('#hiddenInput').prop('type', 'hidden').fadeOut();
            $('#editor-container').show();
        }
    })
});


function submitForm() {
    var csrfToken = document.head.querySelector('meta[name="csrf-token"]').content;
    var formData = new FormData(document.getElementById('articleForm'));
    $.ajax({
        url: '/content/write',
        type: 'POST',
        data: formData,
        headers: {
            'X-CSRF-TOKEN': csrfToken
        },
        processData: false,
        contentType: false,
        success: function(response) {
            $('#submitButton').css('background-color','green').fadeIn()
            $('#submitButton').html('').fadeOut()
            $('#submitButton').html('redirecting <i class="fa fa-spinner fa-spin-pulse"></i>').fadeIn()
            setTimeout(function () {
                if (response) {
                    window.location.href = response;
                }
            }, 2000);
        },
        error: function(error) {
            $('#submitButton').css('background-color','red').fadeIn()
            $('#submitButton').html('').fadeOut()
            $('#submitButton').html('Please try again <i class="fas fa-times"></i>').fadeIn()
            $('#submitError').html(error);
        },
    });
}


function submitEditForm() {
    var csrfToken = document.head.querySelector('meta[name="csrf-token"]').content;
    var formData = new FormData(document.getElementById('editArticleForm'));
    console.log(document.getElementById('editArticleForm'));
    $.ajax({
        url: '/content/edit',
        type: 'POST',
        data: formData,
        headers: {
            'X-CSRF-TOKEN': csrfToken
        },
        processData: false,
        contentType: false,
        success: function(response) {
            $('#editSubmitButton').css('background-color','green').fadeIn()
            $('#editSubmitButton').html('').fadeOut()
            $('#editSubmitButton').html('redirecting <i class="fa fa-spinner fa-spin-pulse"></i>').fadeIn()
            setTimeout(function () {
                if (response) {
                    window.location.href = response;
                }
            }, 2000);
        },
        error: function(error) {
            $('#editSubmitButton').css('background-color','red').fadeIn()
            $('#editSubmitButton').html('').fadeOut()
            $('#editSubmitButton').html('Please try again <i class="fas fa-times"></i>').fadeIn()
            $('#editSubmitError').html(error);
        },
    });
}


window.ImageUploadHandler = function (file) {
    return new Promise(async (resolve, reject) => {
        try {
            // Access csrfToken
            var csrfToken = document.head.querySelector('meta[name="csrf-token"]').content;
            // Simulate a delay function
            // const delay = (ms) => new Promise(resolve => setTimeout(resolve, ms));

            // Retrieve existing uploaded files array or create the array
            let imageListValue = $('#imageList').val();
            let existingFiles = imageListValue ? JSON.parse(imageListValue) : [];

            // Send file to server
            var formData = new FormData();
            formData.append('file', file);
            $.ajax({
                url: '/content/image',
                type: 'POST',
                data: formData,
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
                processData: false,
                contentType: false,
                success: function(response) {
                    
                    // Update the array of uploaded files with temporal name
                    const updatedFiles = [
                        ...existingFiles,
                        response
                    ];

                    // Store the updated array
                    $('#imageList').val(JSON.stringify(updatedFiles));

                    // Resolve with the image URL returned from server
                    resolve(response);
                },
                error: function(error) {
                    reject(error);
                },
            });

        } catch (error) {
            // Reject with the error
            reject(error);
        }
    });
};



function uploadDisplayImage() {
    var fileInput = $('#fileInput')[0];
    if (fileInput && fileInput.files && fileInput.files.length > 0) {
        var file = fileInput.files[0];
        $('#uploadError').html('').fadeOut()
        $('#uploadButton').html('<i class="fa fa-spinner fa-spin-pulse"></i>').fadeIn()
        if (isValidImage(file)) {
            
            // Use ImageUploadHandler promise
            window.ImageUploadHandler(file)
            .then((result) => {
                //Display the saved image data wherever needed
                var preview = document.getElementById('imagePreview');
                preview.style.display = 'block';
                preview.src = result;
                $('#uploadButton').css('background-color','green').fadeIn()
                $('#uploadError').html('').fadeOut()
                $('#uploadButton').html('<i class="fas fa-check"></i>').fadeIn()
                // $('#uploadButton').prop('disabled', true)
            })
            .catch((error) => {
                //Handle errors returned
                $('#uploadButton').css('background-color','red').fadeIn()
                $('#uploadError').html('').fadeOut()
                $('#uploadButton').html('<i class="fas fa-times"></i>').fadeIn()
                $('#uploadError').html('There was an erro uploading your image. Please try again');
            })
        }
    } else {
        $('#uploadError').html('').fadeOut()
        $('#uploadError').html('No file selected or file not found').fadeIn()
        return
    }

    function isValidImage(file) {
            //List of allowed image file extensions
            var allowedExtensions = ['jpg', 'jpeg', 'png', 'gif', 'svg', 'webp'];

            //Get the file extensions
            var extension = file.name.split('.').pop().toLowerCase();

            //Check if the file extension is in the alllowed list
            if (allowedExtensions.indexOf(extension)===-1) {
                $('#uploadButton').css('background-color','red').fadeIn()
                $('#uploadError').html('').fadeOut()
                $('#uploadButton').html('<i class="fas fa-times"></i>').fadeIn()
                $('#uploadError').html('Only file extensions of jpg, jpeg, png, and gif are allowed');
                return false;
            }

            //Check if the filesize is within the allowed range (in bytes)
            var maxSizeInBytes = 5 * 1024 * 1024; //5mb
            if (file.size > maxSizeInBytes) {
                $('#uploadButton').css('background-color','red').fadeIn()
                $('#uploadError').html('').fadeOut()
                $('#uploadButton').html('<i class="fas fa-times"></i>').fadeIn()
                $('#uploadError').html('Image file size exceeds the allowed limit.');
                return false;
            }
            return true;
    }
}


export default ImageUploadHandler;