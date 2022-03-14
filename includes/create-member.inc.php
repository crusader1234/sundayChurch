<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <form onsubmit="_get_values(sendimage)"  name="sendimage" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-12">

                            <!--end card-header-->

                            <div class="card-body bootstrap-select-1">
                                <div class="row">

                                    <div class="col-xl-2" style="margin:auto">

                                            <!--end card-header-->
                                            <div class="">
                                                <div class="mt-4 mt-md-0">
                                                    <img class="img-thumbnail rounded-circle avatar-xl" alt="200x200" src="assets/images/users/avatar-3.jpg" data-holder-rendered="true">
                                                </div>
                                                <input required name="myimage" type="file" id="myimage" />
                                            </div>

                                        <!--end card-->
                                    </div>
                                    <!--end col-->
                                </div>
                                <!--end row-->


                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="my-3">Firstname</label>
                                        <input required name="firstname" class="form-control" type="text" id="example-text-input">
                                    </div>
                                    <!--end col-->
                                    <div class="col-md-6">
                                        <label class="my-3">Lastname</label>
                                        <input required name="lastname" class="form-control" type="text" id="example-text-input">
                                    </div>
                                    <!--end col-->
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="my-3">Phone</label>
                                        <input required name="phone" class="form-control" type="number" id="example-text-input">
                                    </div>
                                    <!--end col-->
                                    <div class="col-md-6">
                                        <label class="my-3">Email</label>
                                        <input required name="email" class="form-control" type="text" id="example-text-input">
                                    </div>
                                    <!--end col-->
                                </div>

                                <div class="row">

                                    <div class="col-md-6">
                                        <label class="my-3">Date Of Birth</label>
                                        <input required name="birth_date" class="form-control" type="date" id="example-text-input">
                                    </div>
                                    <!--end col-->
                                    <div class="col-md-6">
                                        <label class="my-3">Place Of Birth</label>
                                        <input required name="Place_of_birth" class="form-control" type="text" id="example-text-input">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="my-3">Gender</label>
                                        <div class="col-md-12">
                                            <div class="form-check-inline my-1">
                                                <div class="custom-control custom-radio">
                                                    <input value="male" type="radio" id="customRadio7" name="gender" class="custom-control-input">
                                                    <label class="custom-control-label" for="customRadio7">Male</label>
                                                </div>
                                            </div>
                                            <div class="form-check-inline my-1">
                                                <div class="custom-control custom-radio">
                                                    <input value="female" type="radio" id="customRadio8" name="gender" class="custom-control-input">
                                                    <label class="custom-control-label" for="customRadio8">Female</label>
                                                </div>
                                            </div>

                                        </div>


                                    </div>

                                    <div class="col-md-6">
                                        <label class="my-3">Residential Address</label>
                                        <input required name="address" class="form-control" type="text" id="example-text-input">
                                    </div>


                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="my-3">Occupation</label>
                                        <input name="occupation" class="form-control" type="text" id="example-text-input">
                                    </div>
                                    <!--end col-->
                                    <div class="col-md-6">
                                        <label class="my-3">Place of Work</label>
                                        <input name="place_of_work" class="form-control" type="text" id="example-text-input">
                                    </div>
                                    <!--end col-->
                                </div>

                                <div class="row">


                                    <div class="col-md-12">
                                        <label class="my-3">Marital status</label>
                                        <div class="col-md-12">
                                            <div class="form-check-inline my-1">
                                                <div class="custom-control custom-radio">
                                                    <input value="single" type="radio" id="single" name="marital_status" class="custom-control-input">
                                                    <label class="custom-control-label" for="single">single</label>
                                                </div>
                                            </div>
                                            <div class="form-check-inline my-1">
                                                <div class="custom-control custom-radio">
                                                    <input value="married" type="radio" id="married" name="marital_status" class="custom-control-input">
                                                    <label class="custom-control-label" for="married">Married</label>
                                                </div>
                                            </div>
                                            <div class="form-check-inline my-1">
                                                <div class="custom-control custom-radio">
                                                    <input value="single-with-kids" type="radio" id="single-with-kids" name="marital_status" class="custom-control-input">
                                                    <label class="custom-control-label" for="single-with-kids">Single-with-kids</label>
                                                </div>
                                            </div>
                                            <div class="form-check-inline my-1">
                                                <div class="custom-control custom-radio">
                                                    <input value="divorce" type="radio" id="divorce" name="marital_status" class="custom-control-input">
                                                    <label class="custom-control-label" for="divorce">Divorce</label>
                                                </div>
                                            </div>
                                            <div class="form-check-inline my-1">
                                                <div class="custom-control custom-radio">
                                                    <input value="divorce-with-kids" type="radio" id="divorce-with-kids" name="marital_status" class="custom-control-input">
                                                    <label class="custom-control-label" for="divorce-with-kids">Divorce-with-kids</label>
                                                </div>
                                            </div>
                                            <div class="form-check-inline my-1">
                                                <div class="custom-control custom-radio">
                                                    <input value="widow" type="radio" id="widow" name="marital_status" class="custom-control-input">
                                                    <label class="custom-control-label" for="widow">Widow</label>
                                                </div>
                                            </div>
                                            <div class="form-check-inline my-1">
                                                <div class="custom-control custom-radio">
                                                    <input value="widow-with-kids" type="radio" id="widow-with-kids" name="marital_status" class="custom-control-input">
                                                    <label class="custom-control-label" for="widow-with-kids">Widow-with-kids</label>
                                                </div>
                                            </div>

                                        </div>


                                    </div>
                                </div>
                                <!--end col-->

                                <!--end col-->


                                <div class="row">

                                    <div class="col-md-6">
                                        <label class="my-3">Home Town</label>
                                        <input required name="home_town" class="form-control" type="text" id="example-text-input">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="my-3">Home Town Address</label>
                                        <input required name="home_town_address" class="form-control" type="text" id="example-text-input">
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="my-3">baptized?</label>
                                        <div class="col-md-12">
                                            <div class="form-check-inline my-1">
                                                <div class="custom-control custom-radio">
                                                    <input value="yes" type="radio" id="yes" name="baptized" class="custom-control-input">
                                                    <label class="custom-control-label" for="yes">Yes</label>
                                                </div>
                                            </div>
                                            <div class="form-check-inline my-1">
                                                <div class="custom-control custom-radio">
                                                    <input value="no" type="radio" id="no" name="baptized" class="custom-control-input">
                                                    <label class="custom-control-label" for="no">No</label>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-md-6">
                                        <label class="my-3">Baptized Date</label>
                                        <input name="baptized_date" class="form-control" type="date" id="example-text-input">
                                    </div>
                                    <!--end col-->
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="my-3">Place Baptized</label>
                                        <input name="place_baptized" class="form-control" type="text" id="example-text-input">
                                    </div>
                                    <!--end col-->
                                    <div class="col-md-6">
                                        <label class="my-3">Baptized By</label>
                                        <input name="baptized_by" class="form-control" type="text" id="example-text-input">
                                    </div>
                                    <!--end col-->
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="my-3">certificate Date</label>
                                        <input name="certificate_date" class="form-control" type="date" id="example-text-input">
                                    </div>
                                    <!--end col-->
                                    <div class="col-md-6">
                                        <label class="my-3">certificate No.</label>
                                        <input name="certificate_no" name="birth_date" class="form-control" type="number" id="example-text-input">
                                    </div>
                                    <!--end col-->
                                </div>

                                <div class="row mt-3 d-flex justify-content-end">
                                        <div class="col-lg-1 col-4">
                                            <button type="reset" type="submit" class="btn btn-danger">Reset</button>
                                        </div>
                                        <div class="col-lg-2 col-6">
                                            <button type="submit" type="submit" class="btn btn-primary">Save Member</button>
                                        </div>
                                </div>



                            </div><!-- end card-body -->

                        </div>
                </form>
            </div>
        </div>

    </div>
</div>
</div>
</div>






<script>

        $(document).ready(function() {

$('#myimage').change(function() {

    // let formData = {};
    // formData.firstname = $('#firstname').val();
    // formData.firstname = $('#firstname').val();
    // formData.firstname = $('#firstname').val();
    // formData.firstname = $('#firstname').val();
    // formData.firstname = $('#firstname').val();
    // formData.firstname = $('#firstname').val();
    // formData.firstname = $('#firstname').val();
    // formData.firstname = $('#firstname').val();
    // formData.firstname = $('#firstname').val();
    // formData.firstname = $('#firstname').val();
    // formData.firstname = $('#firstname').val();
    // formData.firstname = $('#firstname').val();
    // formData.firstname = $('#firstname').val();
    // formData.firstname = $('#firstname').val();
    // formData.firstname = $('#firstname').val();

    // console.log(formData);
    getformdata();


    // AJAX request
    let form = new FormData();

form.append("sendimage",  myimage.files[0]);

var settings = {
  "url": "http://localhost/dlogic/api/fileupload",
  "method": "POST",
  "headers": {"Content-Type": "application/json"},
  "processData": false,
  "mimeType": "multipart/form-data",
  "contentType": false,
  "data": form
};

$.ajax(settings).done(function (response) {
    response = JSON.parse(response);
    console.log(response.message);
});

});


});



function getformdata() {
    // get all the inputs into an array.
    var $inputs = $('#sendimage :input');

    // not sure if you wanted this, but I thought I'd add it.
    // get an associative array of just the values.
    var values = {};
    $inputs.each(function() {
        values[this.name] = $(this).val();
    });

    console.log(values)


}



</script>

