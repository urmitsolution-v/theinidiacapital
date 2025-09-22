@section('title', 'Dashboard - Stock-Markect')
@extends('layout.admin')
@section('content')

    <div class="content-page">
        <div class="content">

            <!-- Start Content-->
            <div class="container-fluid">

                <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                    <div class="flex-grow-1">
                        <h4 class="fs-18 fw-semibold m-0">General Setting</h4>
                    </div>

                    <div class="text-end">
                        <ol class="breadcrumb m-0 py-0">
                            <li class="breadcrumb-item"><a href="/admin/dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item active">Banners</li>
                        </ol>
                    </div>
                </div>

                <!-- General Form -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">

                            <div class="card-header">
                                <h5 class="card-title mb-0">All Details</h5>
                            </div><!-- end card header -->

                            <div class="card-body">
                                <form method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">

                                        <div class="col-12">
                                            <h5>Refer Setting</h5>

                                          <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    
                                                    <label for="simpleinput" class="form-label">Refer & Earn <span class="text-warning">( percentages  {{ refer_amount() }} % )</span></label>
                                                    <small>Earn rewards when you invest this amount.</small>
                                                    <input type="number" placeholder="" id="simpleinput"
                                                        name="refer_amount" value="{{ $row->refer_amount ?? "" }}" class="form-control">
                                                    @error('refer_amount')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>


                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="simpleinput" class="form-label">Upi Id </label>
                                                    <input type="text" placeholder="" id="simpleinput"
                                                        name="upiid" value="{{ $row->upiid ?? "" }}" class="form-control">
                                                    @error('upiid')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>



                                            <div class="col-lg-12 bg-light p-2 mb-3">
    <h4 class="mt-4 mb-3">Bank Details</h4>
    <div class="row">
        <div class="col-lg-6 mb-3">
            <label class="form-label" for="account_holder_name">Account Holder Name</label>
            <input type="text" class="form-control" id="account_holder_name" name="account_holder_name"
                   value="{{ $data->account_holder_name ?? '' }}" placeholder="Enter account holder name">
            @error('account_holder_name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-lg-6 mb-3">
            <label class="form-label" for="account_number">Account Number</label>
            <input type="text" class="form-control" id="account_number" name="account_number"
                   value="{{ $data->account_number ?? '' }}" placeholder="Enter account number">
            @error('account_number')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-lg-6 mb-3">
            <label class="form-label" for="ifsc_code">IFSC Code</label>
            <input type="text" class="form-control" id="ifsc_code" name="ifsc_code"
                   value="{{ $data->ifsc_code ?? '' }}" placeholder="Enter IFSC code">
            @error('ifsc_code')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-lg-6 mb-3">
            <label class="form-label" for="bank_name">Bank Name</label>
            <input type="text" class="form-control" id="bank_name" name="bank_name"
                   value="{{ $data->bank_name ?? '' }}" placeholder="Enter bank name">
            @error('bank_name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-lg-6 mb-3">
            <label class="form-label" for="branch_name">Branch Name</label>
            <input type="text" class="form-control" id="branch_name" name="branch_name"
                   value="{{ $data->branch_name ?? '' }}" placeholder="Enter branch name">
            @error('branch_name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-lg-6 mb-3">
            <label class="form-label" for="bank_address">Bank Address</label>
            <input type="text" class="form-control" id="bank_address" name="bank_address"
                   value="{{ $data->bank_address ?? '' }}" placeholder="Enter bank address">
            @error('bank_address')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>



                                            <div class="col-lg-6 ">
                                                <div class="mb-3">
                                                    <label for="simpleinput" class="form-label">Qr Code</label>
                                                    <input type="file" id="simpleinput" name="banner" accept="image/*"
                                                        class="form-control">
                                                    @error('favicon')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                   
                                                    @if (isset($data->banner))
                                                    <div class="col- mt-3">
                                                        <div class="uploaded_image ">
                                                            <img class="shadow"
                                                                src="{{ url('uploads') }}/{{ $data->banner }}"
                                                                alt=""
                                                                style="    width: 120px;
                                                         height: 120px;
                                                      object-fit: contain;"
                                                                loading="lazy">
                                                        </div>
                                                    </div>
                                                @endif

                                                </div>
                                            </div>
                                          </div>
                                        </div>

                                        <hr>

                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="simpleinput" class="form-label">Phone</label>
                                                <input type="number" placeholder="+91 1234567890" id="simpleinput"
                                                    name="phone" value="{{ $row->phone }}" class="form-control">
                                                @error('phone')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="simpleinput" class="form-label">phone 2</label>
                                                <input type="number" placeholder="+91 1234567890" id="simpleinput"
                                                    name="phone_2" value="{{ $row->phone_2 }}" class="form-control">
                                                @error('phone_2')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label for="simpleinput" class="form-label">Email</label>
                                                <input type="email" id="simpleinput" name="email"
                                                    value="{{ $row->email }}" class="form-control">
                                                @error('email')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="simpleinput" class="form-label">Facebook</label>
                                                <input type="text" id="simpleinput"
                                                    name="facebook" value="{{ $row->facebook }}" class="form-control">
                                                @error('facebook')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="simpleinput" class="form-label">Twitter</label>
                                                <input type="text" id="simpleinput"
                                                    name="twitter" value="{{ $row->twitter }}" class="form-control">
                                                @error('twitter')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="simpleinput" class="form-label">Linkedin</label>
                                                <input type="text" id="simpleinput"
                                                    name="linkedin" value="{{ $row->linkedin }}" class="form-control">
                                                @error('linkedin')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="simpleinput" class="form-label">Instagram</label>
                                                <input type="text" id="simpleinput"
                                                    name="instagram" value="{{ $row->instagram }}" class="form-control">
                                                @error('instagram')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="simpleinput" class="form-label">Website Logo</label>
                                                <input type="file" id="simpleinput" name="image" accept="image/*"
                                                    class="form-control">
                                                @error('image')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror



                                                @if (isset($data->image))
                                                    <div class="col-12">
                                                        <div class="uploaded_image ">
                                                            <img class="shadow"
                                                                src="{{ url('uploads') }}/{{ $data->image }}"
                                                                alt=""
                                                                style="    width: 120px;
    height: 120px;
    object-fit: contain;"
                                                                loading="lazy">
                                                        </div>
                                                    </div>
                                                @endif


                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="simpleinput" class="form-label">Website Favicon</label>
                                                <input type="file" id="simpleinput" name="favicon" accept="image/*"
                                                    class="form-control">
                                                @error('favicon')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                                @if (isset($data->favicon))
                                                    <div class="col-12">
                                                        <div class="uploaded_image ">
                                                            <img class="shadow"
                                                                src="{{ url('uploads') }}/{{ $data->favicon }}"
                                                                alt=""
                                                                style="    width: 120px;
height: 120px;
object-fit: contain;"
                                                                loading="lazy">
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label for="simpleinput" class="form-label">Address</label>
                                                <textarea class="form-control" id="example-textarea" name="location" rows="5" spellcheck="false">{{ $row->location }}</textarea>
                                                @error('location')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label for="simpleinput" class="form-label">location Iframe</label>
                                                <textarea class="form-control" id="example-textarea" name="location_iframe" rows="5" spellcheck="false">{{ $row->location_iframe }}</textarea>

                                                @error('location_iframe')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                  



                                        <div class="col-12">
                                            <h5 class="bg-light p-3">Website Home Seo</h5>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="simpleinput" class="form-label">Meta Title</label>
                                                <input type="text" id="simpleinput" name="meta_title"
                                                    value="{{ $row->meta_title }}" class="form-control">
                                                @error('meta_title')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="simpleinput" class="form-label">Meta Tags</label>
                                                <input type="text" id="simpleinput" name="meta_tags"
                                                    value="{{ $row->meta_tags }}" class="form-control">
                                                @error('meta_tags')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>


                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label for="simpleinput" class="form-label">Meta Description</label>
                                                <textarea class="form-control" id="example-textarea" name="meta_description" rows="5" spellcheck="false">{{ $row->meta_description }}</textarea>

                                                @error('meta_description')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>



                                     

                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>


                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>


            </div> <!-- container-fluid -->

        </div> <!-- content -->


    </div>

@endsection
