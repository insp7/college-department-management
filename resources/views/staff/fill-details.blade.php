@extends('layouts.base')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="/home"><i class="fas fa-user"></i></a></li>
    <li class="breadcrumb-item"><a href="/staff">Staff</a></li>
    <li class="breadcrumb-item active" aria-current="page">Fill Details</li>
@endsection

@section('page-content')
    <div class="row">
        <div class="col">
            <div class="card">
                <!-- Card header -->
                <div class="card-header">
                    <h3 class="mb-0">Details</h3>
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div>{{$error}}</div>
                        @endforeach
                    @endif
                </div>
                <!-- Card body -->
                <div class="card-body">
                    <form method="post" action="/staff/complete-registration" enctype="multipart/form-data">
                        @csrf

                        <div class="row">

                            <div class="col-md-4">
                                <div class="form-group">
                                    <input  value="{{ old('first_name') }}" required name="first_name" type="text" placeholder="First Name" class="form-control @error('first_name') is-invalid @enderror">
                                    @error('first_name')
                                    <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <input  value="{{ old('middle_name') }}" required name="middle_name" type="text" placeholder="Middle Name" class="form-control @error('middle_name') is-invalid @enderror">
                                    @error('middle_name')
                                    <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <input  value="{{ old('last_name') }}" required name="last_name" type="text" placeholder="Last Name" class="form-control @error('last_name') is-invalid @enderror">
                                    @error('last_name')
                                    <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                        </div>

                        <div class="row">

                            <div class="col-md-4">
                                <div class="form-group">
                                    <input  value="{{ old('contact_no') }}" required name="contact_no" type="number" placeholder="Contact Number"  class="form-control @error('contact_no') is-invalid @enderror">
                                    @error('contact_no')
                                    <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="input-group @error('date_of_birth') has-danger @enderror">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                        </div>
                                        <input type="text" value="{{ old('date_of_birth') }}" required name="date_of_birth"  placeholder="Date of Birth"  class="form-control datepicker @error('date_of_birth') is-invalid @enderror">
                                    </div>
                                    @error('date_of_birth')
                                    <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <select name="gender" id="" required class="form-control @error('gender') is-invalid @enderror">
                                        <option disabled selected>Select Gender</option>
                                        <option value="M" @if(old('gender') == 'M') selected @endif>Male</option>
                                        <option value="F" @if(old('gender') == 'F') selected @endif>Female</option>
                                        <option value="O" @if(old('gender') == 'O') selected @endif>Other</option>
                                    </select>
                                    @error('gender')
                                    <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                        </div>

                        <div class="row">

                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="input-group input-group-merge @error('password') has-danger @enderror">
                                        <div class="input-group-prepend"> <span class="input-group-text"> <i class="fa fa-key"></i> </span> </div> <input required name="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror">
                                    </div>
                                    @error('password')
                                    <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="input-group input-group-merge @error('password') has-danger @enderror">
                                        <div class="input-group-prepend"> <span class="input-group-text"> <i class="fa fa-key"></i> </span> </div> <input required name="password_confirmation" type="password" placeholder="Confirm Password" class="form-control  @error('password') is-invalid @enderror">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <input  value="{{ old('pan') }}" required name="pan" type="number" placeholder="Pan Number"  class="form-control @error('pan') is-invalid @enderror">
                                    @error('pan')
                                    <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                        </div>

                        <div class="row">

                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="input-group @error('date_of_joining_institute') has-danger @enderror">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                        </div>
                                        <input type="text" value="{{ old('date_of_joining_institute') }}" required name="date_of_joining_institute"  placeholder="Date of Joining Institute"  class="form-control datepicker @error('date_of_joining_institute') is-invalid @enderror">
                                    </div>
                                    @error('date_of_joining_institute')
                                    <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <input  value="{{ old('employee_id') }}" required name="employee_id" type="text" placeholder="Employee Id"  class="form-control @error('employee_id') is-invalid @enderror">
                                    @error('employee_id')
                                    <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" @if(old('is_teaching') == 1) checked @endif id="is_teaching_checkbox" name="is_teaching" value="1">
                                    <label class="custom-control-label" for="is_teaching_checkbox">Teaching</label>
                                </div>

                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="is_permanent_checkbox" @if(old('is_permanent') == 1) checked @endif name="is_permanent" value="1">
                                    <label class="custom-control-label" for="is_permanent_checkbox">Permanent</label>
                                </div>

                            </div>

                        </div>

                        <hr>

                        <div class="row">

                            {{--BOS CHAIRMAN--}}
                            <div class="col-md-6" id="bos_chairman_div">

                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" value="1" name="is_bos_chairman" @if(old('is_bos_chairman')) checked @endif onchange="handleBosChairmanCheckbox(event)" id="is_bos_chairman_checkbox">
                                    <label class="custom-control-label" for="is_bos_chairman_checkbox">BOS Chairman</label>
                                </div>

                                @if(old('is_bos_chairman'))
                                    <div id="is_bos_chairman_sub_form">

                                        <div class="form-group">
                                            <input   type="file" required name="bos_chairman_certificate_path"  class="form-control @error('bos_chairman_certificate_path') is-invalid @enderror">
                                            @error('bos_chairman_certificate_path')
                                            <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <div class="input-group">
                                                <textarea  required name="bos_chairman_details"  placeholder="BOS Chairman details" class="form-control @error('bos_chairman_details') is-invalid @enderror">{{ old('bos_chairman_details') }}</textarea>
                                            </div>
                                            @error('bos_chairman_details')
                                            <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                                            @enderror
                                        </div>

                                    </div>
                                @endif
                            </div>
                            <script>
                                function handleBosChairmanCheckbox(event) {
                                    if(event.target.checked){
                                        $('#bos_chairman_div').append("{{--REMOVE THIS IS is_bos_chairman is not checked--}}\n" +
                                            "                                <div id=\"bos_chairman_sub_form\">\n" +
                                            "\n" +
                                            "                                    <div class=\"form-group\">\n" +
                                            "                                        <input   type=\"file\" required name=\"bos_chairman_certificate_path\"  class=\"form-control @error('is_bos_chairman_certificate_path') is-invalid @enderror\">\n" +
                                            "                                        @error('is_bos_chairman_certificate_path')\n" +
                                            "                                        <div class=\"invalid-feedback\" style=\"display: block\">{{ $message }}</div>\n" +
                                            "                                        @enderror\n" +
                                            "                                    </div>\n" +
                                            "\n" +
                                            "                                    <div class=\"form-group\">\n" +
                                            "                                        <div class=\"input-group\">\n" +
                                            "                                            <textarea  value=\"{{ old('bos_chairman_details') }}\" required name=\"bos_chairman_details\"  placeholder=\"BOS Chairman details\" class=\"form-control @error('bos_chairman_details') is-invalid @enderror\"></textarea>\n" +
                                            "                                        </div>\n" +
                                            "                                        @error('bos_chairman_details')\n" +
                                            "                                        <div class=\"invalid-feedback\" style=\"display: block\">{{ $message }}</div>\n" +
                                            "                                        @enderror\n" +
                                            "                                    </div>\n" +
                                            "\n" +
                                            "                                </div>");
                                    }else{
                                        $('#bos_chairman_sub_form').remove();
                                    }
                                }
                            </script>

                            {{--BOS MEMBER--}}
                            <div class="col-md-6" id="bos_member_div">

                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="is_bos_member_checkbox" @if(old('is_bos_member')) checked @endif onchange="handleBosMemberCheckbox(event)" value="1" name="is_bos_member">
                                    <label class="custom-control-label" for="is_bos_member_checkbox">BOS Member</label>
                                </div>

                                @if(old('is_bos_member'))
                                    <div id="is_bos_member_sub_form">

                                        <div class="form-group">
                                            <input   type="file" required name="bos_member_certificate_path"  class="form-control @error('is_bos_member_certificate_path') is-invalid @enderror">
                                            @error('is_bos_member_certificate_path')
                                            <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <div class="input-group">
                                                <textarea   required name="bos_member_details"  placeholder="BOS Member details" class="form-control @error('bos_member_details') is-invalid @enderror">{{ old('bos_member_details') }}</textarea>
                                            </div>
                                            @error('bos_member_details')
                                            <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                                            @enderror
                                        </div>

                                    </div>
                                @endif
                            </div>
                            <script>
                                function handleBosMemberCheckbox(event) {
                                    if(event.target.checked){
                                        $('#bos_member_div').append("{{--REMOVE THIS IS is_bos_member is not checked--}}\n" +
                                            "                                <div id=\"bos_member_sub_form\">\n" +
                                            "\n" +
                                            "                                    <div class=\"form-group\">\n" +
                                            "                                        <input   type=\"file\" required name=\"bos_member_certificate_path\"  class=\"form-control @error('is_bos_member_certificate_path') is-invalid @enderror\">\n" +
                                            "                                        @error('is_bos_member_certificate_path')\n" +
                                            "                                        <div class=\"invalid-feedback\" style=\"display: block\">{{ $message }}</div>\n" +
                                            "                                        @enderror\n" +
                                            "                                    </div>\n" +
                                            "\n" +
                                            "                                    <div class=\"form-group\">\n" +
                                            "                                        <div class=\"input-group\">\n" +
                                            "                                            <textarea  value=\"{{ old('bos_member_details') }}\" required name=\"bos_member_details\"  placeholder=\"BOS Member details\" class=\"form-control @error('bos_member_details') is-invalid @enderror\"></textarea>\n" +
                                            "                                        </div>\n" +
                                            "                                        @error('bos_member_details')\n" +
                                            "                                        <div class=\"invalid-feedback\" style=\"display: block\">{{ $message }}</div>\n" +
                                            "                                        @enderror\n" +
                                            "                                    </div>\n" +
                                            "\n" +
                                            "                                </div>");
                                    }else{
                                        $('#bos_member_sub_form').remove();
                                    }
                                }
                            </script>

                            {{--INDUSTRY EXPERIENCE--}}
                            <div class="col-md-6" id="industry_experience_div">

                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="is_industry_experience_checkbox" @if(old('is_industry_experience')) checked @endif onchange="handleIndustryExperienceCheckbox(event)" value="1" name="is_industry_experience">
                                    <label class="custom-control-label" for="is_industry_experience_checkbox">Industry Experience</label>
                                </div>
                                

                                @if(old('is_industry_experience'))
                                    {{--REMOVE THIS IS is_industry_experience is not checked--}}
                                    <div id="industry_experience_sub_form">

                                    <div class="form-group">
                                        <input   type="file" required name="industry_experience_certificate_path"  class="form-control @error('industry_experience_certificate_path') is-invalid @enderror">
                                        @error('industry_experience_certificate_path')
                                        <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="number"  value="{{ old('industry_experience_years') }}" required name="industry_experience_years"  placeholder="Industry Experience Years" class="form-control @error('industry_experience_years') is-invalid @enderror">
                                        </div>
                                        @error('industry_experience_years')
                                        <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                                        @enderror
                                    </div>


                                    <div class="form-group">
                                        <div class="input-group">
                                            <textarea  required name="industry_experience_details"  placeholder="Industry Experience details" class="form-control @error('industry_experience_details') is-invalid @enderror">{{ old('industry_experience_details') }}</textarea>
                                        </div>
                                        @error('industry_experience_details')
                                        <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>
                                @endif
                            </div>
                            <script>
                                function handleIndustryExperienceCheckbox(event) {
                                    if(event.target.checked){
                                        $('#industry_experience_div').append("<div id=\"industry_experience_sub_form\">\n" +
                                            "\n" +
                                            "                                    <div class=\"form-group\">\n" +
                                            "                                        <input   type=\"file\" required name=\"industry_experience_certificate_path\"  class=\"form-control @error('industry_experience_certificate_path') is-invalid @enderror\">\n" +
                                            "                                        @error('industry_experience_certificate_path')\n" +
                                            "                                        <div class=\"invalid-feedback\" style=\"display: block\">{{ $message }}</div>\n" +
                                            "                                        @enderror\n" +
                                            "                                    </div>\n" +
                                            "\n" +
                                            "                                    <div class=\"form-group\">\n" +
                                            "                                        <div class=\"input-group\">\n" +
                                            "                                            <input type=\"number\"  value=\"{{ old('industry_experience_years') }}\" required name=\"industry_experience_years\"  placeholder=\"Industry Experience Years\" class=\"form-control @error('industry_experience_years') is-invalid @enderror\">\n" +
                                            "                                        </div>\n" +
                                            "                                        @error('industry_experience_years')\n" +
                                            "                                        <div class=\"invalid-feedback\" style=\"display: block\">{{ $message }}</div>\n" +
                                            "                                        @enderror\n" +
                                            "                                    </div>\n" +
                                            "\n" +
                                            "\n" +
                                            "                                    <div class=\"form-group\">\n" +
                                            "                                        <div class=\"input-group\">\n" +
                                            "                                            <textarea  value=\"{{ old('industry_experience_details') }}\" required name=\"industry_experience_details\"  placeholder=\"Industry Experience details\" class=\"form-control @error('industry_experience_details') is-invalid @enderror\"></textarea>\n" +
                                            "                                        </div>\n" +
                                            "                                        @error('industry_experience_details')\n" +
                                            "                                        <div class=\"invalid-feedback\" style=\"display: block\">{{ $message }}</div>\n" +
                                            "                                        @enderror\n" +
                                            "                                    </div>\n" +
                                            "\n" +
                                            "                                </div>");
                                    }else{
                                        $('#industry_experience_sub_form').remove();
                                    }
                                }
                            </script>

                            {{--SUBJECT CHAIRMAN--}}
                            <div class="col-md-6" id="subject_chairman_div">

                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="is_subject_chairman_checkbox" @if(old('is_subject_chairman')) checked @endif onchange="handleSubjectChairmanCheckbox(event)" value="1" name="is_subject_chairman">
                                    <label class="custom-control-label" for="is_subject_chairman_checkbox">Subject Chairman</label>
                                </div>


                                @if(old('is_subject_chairman'))
                                {{--REMOVE THIS IS is_subject_chairman is not checked--}}
                                <div id="is_subject_chairman_sub_form">

                                    <div class="form-group">
                                        <input   type="file" required name="subject_chairman_certificate_path"  class="form-control @error('is_subject_chairman_certificate_path') is-invalid @enderror">
                                        @error('subject_chairman_certificate_path')
                                        <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <div class="input-group">
                                            <textarea   required name="subject_chairman_details"  placeholder="Subject Chairman details" class="form-control @error('subject_chairman_details') is-invalid @enderror">{{ old('subject_chairman_details') }}</textarea>
                                        </div>
                                        @error('subject_chairman_details')
                                        <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>

                                @endif
                            </div>
                            <script>
                                function handleSubjectChairmanCheckbox(event) {
                                    if(event.target.checked){
                                        $('#subject_chairman_div').append("<div id=\"is_subject_chairman_sub_form\">\n" +
                                            "\n" +
                                            "                                    <div class=\"form-group\">\n" +
                                            "                                        <input   type=\"file\" required name=\"subject_chairman_certificate_path\"  class=\"form-control @error('is_subject_chairman_certificate_path') is-invalid @enderror\">\n" +
                                            "                                        @error('subject_chairman_certificate_path')\n" +
                                            "                                        <div class=\"invalid-feedback\" style=\"display: block\">{{ $message }}</div>\n" +
                                            "                                        @enderror\n" +
                                            "                                    </div>\n" +
                                            "\n" +
                                            "                                    <div class=\"form-group\">\n" +
                                            "                                        <div class=\"input-group\">\n" +
                                            "                                            <textarea  value=\"{{ old('subject_chairman_details') }}\" required name=\"subject_chairman_details\"  placeholder=\"Subject Chairman details\" class=\"form-control @error('subject_chairman_details') is-invalid @enderror\"></textarea>\n" +
                                            "                                        </div>\n" +
                                            "                                        @error('subject_chairman_details')\n" +
                                            "                                        <div class=\"invalid-feedback\" style=\"display: block\">{{ $message }}</div>\n" +
                                            "                                        @enderror\n" +
                                            "                                    </div>\n" +
                                            "\n" +
                                            "                                </div>");
                                    }else{
                                        $('#is_subject_chairman_sub_form').remove();
                                    }
                                }
                            </script>

                            {{--SUBJECT EXPERT--}}
                            <div class="col-md-6" id="subject_expert_div">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="is_subject_expert_checkbox" @if(old('is_subject_expert')) checked @endif onchange="handleSubjectExpertCheckbox(event)" value="1" name="is_subject_expert">
                                    <label class="custom-control-label" for="is_subject_expert_checkbox">Subject Expert</label>
                                </div>


                                @if(old('is_subject_expert'))
                                {{--REMOVE THIS IS is_subject_expert is not checked--}}
                                <div id="is_subject_expert_sub_form">

                                    <div class="form-group">
                                        <input   type="file" required name="subject_expert_certificate_path"  class="form-control @error('subject_expert_certificate_path') is-invalid @enderror">
                                        @error('subject_expert_certificate_path')
                                        <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <div class="input-group">
                                            <textarea   required name="subject_expert_details"  placeholder="Subject Expert details" class="form-control @error('subject_expert_details') is-invalid @enderror">{{ old('subject_expert_details') }}</textarea>
                                        </div>
                                        @error('subject_expert_details')
                                        <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>
                                @endif
                            </div>
                            <script>
                                function handleSubjectExpertCheckbox(event) {
                                    if(event.target.checked){
                                        $('#subject_expert_div').append("{{--REMOVE THIS IS is_subject_expert is not checked--}}\n" +
                                            "                                <div id=\"is_subject_expert_sub_form\">\n" +
                                            "\n" +
                                            "                                    <div class=\"form-group\">\n" +
                                            "                                        <input   type=\"file\" required name=\"subject_expert_certificate_path\"  class=\"form-control @error('subject_expert_certificate_path') is-invalid @enderror\">\n" +
                                            "                                        @error('subject_expert_certificate_path')\n" +
                                            "                                        <div class=\"invalid-feedback\" style=\"display: block\">{{ $message }}</div>\n" +
                                            "                                        @enderror\n" +
                                            "                                    </div>\n" +
                                            "\n" +
                                            "                                    <div class=\"form-group\">\n" +
                                            "                                        <div class=\"input-group\">\n" +
                                            "                                            <textarea  value=\"{{ old('subject_expert_details') }}\" required name=\"subject_expert_details\"  placeholder=\"Subject Expert details\" class=\"form-control @error('subject_expert_details') is-invalid @enderror\"></textarea>\n" +
                                            "                                        </div>\n" +
                                            "                                        @error('subject_expert_details')\n" +
                                            "                                        <div class=\"invalid-feedback\" style=\"display: block\">{{ $message }}</div>\n" +
                                            "                                        @enderror\n" +
                                            "                                    </div>\n" +
                                            "\n" +
                                            "                                </div>");
                                    }else{
                                        $('#is_subject_expert_sub_form').remove();
                                    }
                                }
                            </script>

                            {{--STAFF SELECTION COMITTEE--}}
                            <div class="col-md-6" id="staff_selection_committee_div">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="is_staff_selection_committee_member_checkbox" @if(old('is_staff_selection_committee_member')) checked @endif onchange="handleStaffSelectionCommitteeCheckbox(event)" value="1" name="is_staff_selection_committee_member">
                                    <label class="custom-control-label" for="is_staff_selection_committee_member_checkbox">Staff Selection Committee</label>
                                </div>


                                @if(old('is_staff_selection_committee_member'))
                                {{--REMOVE THIS IS is_staff_selection_committee is not checked--}}
                                <div id="is_staff_selection_committee_sub_form">

                                    <div class="form-group">
                                        <input   type="file" required name="staff_selection_committee_certificate_path"  class="form-control @error('staff_selection_committee_certificate_path') is-invalid @enderror">
                                        @error('staff_selection_committee_certificate_path')
                                        <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <div class="input-group">
                                            <textarea   required name="staff_selection_committee_details"  placeholder="Staff Selection Committee details" class="form-control @error('staff_selection_committee_details') is-invalid @enderror">{{ old('department_advisory_board_details') }}</textarea>
                                        </div>
                                        @error('staff_selection_committee_details')
                                        <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>
                                @endif
                            </div>
                            <script>
                                function handleStaffSelectionCommitteeCheckbox(event) {
                                    if(event.target.checked){
                                        $('#staff_selection_committee_div').append("{{--REMOVE THIS IS is_staff_selection_committee is not checked--}}\n" +
                                            "                                <div id=\"is_staff_selection_committee_sub_form\">\n" +
                                            "\n" +
                                            "                                    <div class=\"form-group\">\n" +
                                            "                                        <input   type=\"file\" required name=\"staff_selection_committee_certificate_path\"  class=\"form-control @error('staff_selection_committee_certificate_path') is-invalid @enderror\">\n" +
                                            "                                        @error('staff_selection_committee_certificate_path')\n" +
                                            "                                        <div class=\"invalid-feedback\" style=\"display: block\">{{ $message }}</div>\n" +
                                            "                                        @enderror\n" +
                                            "                                    </div>\n" +
                                            "\n" +
                                            "                                    <div class=\"form-group\">\n" +
                                            "                                        <div class=\"input-group\">\n" +
                                            "                                            <textarea  value=\"{{ old('staff_selection_committee_details') }}\" required name=\"staff_selection_committee_details\"  placeholder=\"Staff Selection Committee details\" class=\"form-control @error('staff_selection_committee_details') is-invalid @enderror\"></textarea>\n" +
                                            "                                        </div>\n" +
                                            "                                        @error('staff_selection_committee_details')\n" +
                                            "                                        <div class=\"invalid-feedback\" style=\"display: block\">{{ $message }}</div>\n" +
                                            "                                        @enderror\n" +
                                            "                                    </div>\n" +
                                            "\n" +
                                            "                                </div>");
                                    }else{
                                        $('#is_staff_selection_committee_sub_form').remove();
                                    }
                                }
                            </script>

                            {{--DEPARTMENT ADVISORY BOARD--}}
                            <div class="col-md-6" id="deparment_advisory_board_div">


                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="is_department_advisory_board_checkbox" @if(old('is_department_advisory_board')) checked @endif onchange="handleDepartmentAdvisoryBoardCheckbox(event)" value="1" name="is_department_advisory_board">
                                    <label class="custom-control-label" for="is_department_advisory_board_checkbox">Department Advisory Board</label>
                                </div>
                                @if(old('is_department_advisory_board'))
                                {{--REMOVE THIS IS is_department_advisory_board is not checked--}}
                                <div id="is_department_advisory_board_sub_form">

                                    <div class="form-group">
                                        <input   type="file" required name="department_advisory_board_certificate_path"  class="form-control @error('department_advisory_board_certificate_path') is-invalid @enderror">
                                        @error('department_advisory_board_certificate_path')
                                        <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <div class="input-group">
                                            <textarea  required name="department_advisory_board_details"  placeholder="Department Advisory Board" class="form-control @error('department_advisory_board_details') is-invalid @enderror">{{ old('department_advisory_board_details') }}</textarea>
                                        </div>
                                        @error('department_advisory_board_details')
                                        <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>
                                @endif
                            </div>
                            <script>
                                function handleDepartmentAdvisoryBoardCheckbox(event) {
                                    if(event.target.checked){
                                        $('#deparment_advisory_board_div').append("{{--REMOVE THIS IS is_department_advisory_board is not checked--}}\n" +
                                            "                                <div id=\"is_department_advisory_board_sub_form\">\n" +
                                            "\n" +
                                            "                                    <div class=\"form-group\">\n" +
                                            "                                        <input   type=\"file\" required name=\"department_advisory_board_certificate_path\"  class=\"form-control @error('department_advisory_board_certificate_path') is-invalid @enderror\">\n" +
                                            "                                        @error('department_advisory_board_certificate_path')\n" +
                                            "                                        <div class=\"invalid-feedback\" style=\"display: block\">{{ $message }}</div>\n" +
                                            "                                        @enderror\n" +
                                            "                                    </div>\n" +
                                            "\n" +
                                            "                                    <div class=\"form-group\">\n" +
                                            "                                        <div class=\"input-group\">\n" +
                                            "                                            <textarea  value=\"{{ old('department_advisory_board_details') }}\" required name=\"department_advisory_board_details\"  placeholder=\"Department Advisory Board details\" class=\"form-control @error('department_advisory_board_details') is-invalid @enderror\"></textarea>\n" +
                                            "                                        </div>\n" +
                                            "                                        @error('department_advisory_board_details')\n" +
                                            "                                        <div class=\"invalid-feedback\" style=\"display: block\">{{ $message }}</div>\n" +
                                            "                                        @enderror\n" +
                                            "                                    </div>\n" +
                                            "\n" +
                                            "                                </div>");
                                    }else{
                                        $('#is_department_advisory_board_sub_form').remove();
                                    }
                                }
                            </script>

                            {{--Academic Auditor--}}
                            <div class="col-md-6" id="academic_auditor_div">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="is_academic_audit_checkbox" @if(old('is_academic_audit')) checked @endif onchange="handleAcademicAuditorCheckbox(event)" value="1" name="is_academic_audit">
                                    <label class="custom-control-label" for="is_academic_audit_checkbox">Academic Auditor</label>
                                </div>

                                @if(old('is_academic_audit'))
                                {{--REMOVE THIS IS is_academic_audit is not checked--}}
                                <div id="is_academic_audit_sub_form">

                                    <div class="form-group">
                                        <input   type="file" required name="academic_audit_certificate_path"  class="form-control @error('academic_audit_certificate_path') is-invalid @enderror">
                                        @error('academic_audit_certificate_path')
                                        <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <div class="input-group">
                                            <textarea   required name="academic_audit_details"  placeholder="Academic Auditor details" class="form-control @error('academic_audit_details') is-invalid @enderror">{{ old('academic_audit_details') }}</textarea>
                                        </div>
                                        @error('academic_audit_details')
                                        <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>
                                @endif
                            </div>
                            <script>
                                function handleAcademicAuditorCheckbox(event) {
                                    if(event.target.checked){
                                        $('#academic_auditor_div').append("{{--REMOVE THIS IS is_academic_audit is not checked--}}\n" +
                                            "                                <div id=\"is_academic_audit_sub_form\">\n" +
                                            "\n" +
                                            "                                    <div class=\"form-group\">\n" +
                                            "                                        <input   type=\"file\" required name=\"academic_audit_certificate_path\"  class=\"form-control @error('academic_audit_certificate_path') is-invalid @enderror\">\n" +
                                            "                                        @error('academic_audit_certificate_path')\n" +
                                            "                                        <div class=\"invalid-feedback\" style=\"display: block\">{{ $message }}</div>\n" +
                                            "                                        @enderror\n" +
                                            "                                    </div>\n" +
                                            "\n" +
                                            "                                    <div class=\"form-group\">\n" +
                                            "                                        <div class=\"input-group\">\n" +
                                            "                                            <textarea  value=\"{{ old('academic_audit_details') }}\" required name=\"academic_audit_details\"  placeholder=\"Academic Auditor details\" class=\"form-control @error('academic_audit_details') is-invalid @enderror\"></textarea>\n" +
                                            "                                        </div>\n" +
                                            "                                        @error('academic_audit_details')\n" +
                                            "                                        <div class=\"invalid-feedback\" style=\"display: block\">{{ $message }}</div>\n" +
                                            "                                        @enderror\n" +
                                            "                                    </div>\n" +
                                            "\n" +
                                            "                                </div>");
                                    }else{
                                        $('#is_academic_audit_sub_form').remove();
                                    }
                                }
                            </script>

                            {{--SUBJECT EXPERT PHD--}}
                            <div class="col-md-6" id="subject_expert_phd_div">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="is_subject_expert_phd_checkbox" @if(old('is_subject_expert_phd')) checked @endif onchange="handleSubjectExpertPhdCheckbox(event)" value="1" name="is_subject_expert_phd">
                                    <label class="custom-control-label" for="is_subject_expert_phd_checkbox">Subject Expert PHD</label>
                                </div>

                                @if(old('is_subject_expert_phd'))
                                {{--REMOVE THIS IS is_subject_expert_phd is not checked--}}
                                <div id="is_subject_expert_phd_sub_form">

                                    <div class="form-group">
                                        <input   type="file" required name="subject_expert_phd_certificate_path"  class="form-control @error('subject_expert_phd_certificate_path') is-invalid @enderror">
                                        @error('subject_expert_phd_certificate_path')
                                        <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <div class="input-group">
                                            <textarea   required name="subject_expert_phd_details"  placeholder="Subject Expert PHD details" class="form-control @error('subject_expert_phd_details') is-invalid @enderror">{{ old('examination_auditor_details') }}</textarea>
                                        </div>
                                        @error('subject_expert_phd_details')
                                        <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>
                                    @endif
                            </div>
                            <script>
                                function handleSubjectExpertPhdCheckbox(event) {
                                    if(event.target.checked){
                                        $('#subject_expert_phd_div').append("{{--REMOVE THIS IS is_subject_expert_phd is not checked--}}\n" +
                                            "                                <div id=\"is_subject_expert_phd_sub_form\">\n" +
                                            "\n" +
                                            "                                    <div class=\"form-group\">\n" +
                                            "                                        <input   type=\"file\" required name=\"subject_expert_phd_certificate_path\"  class=\"form-control @error('subject_expert_phd_certificate_path') is-invalid @enderror\">\n" +
                                            "                                        @error('subject_expert_phd_certificate_path')\n" +
                                            "                                        <div class=\"invalid-feedback\" style=\"display: block\">{{ $message }}</div>\n" +
                                            "                                        @enderror\n" +
                                            "                                    </div>\n" +
                                            "\n" +
                                            "                                    <div class=\"form-group\">\n" +
                                            "                                        <div class=\"input-group\">\n" +
                                            "                                            <textarea  value=\"{{ old('subject_expert_phd_details') }}\" required name=\"subject_expert_phd_details\"  placeholder=\"Subject Expert PHD details\" class=\"form-control @error('subject_expert_phd_details') is-invalid @enderror\"></textarea>\n" +
                                            "                                        </div>\n" +
                                            "                                        @error('subject_expert_phd_details')\n" +
                                            "                                        <div class=\"invalid-feedback\" style=\"display: block\">{{ $message }}</div>\n" +
                                            "                                        @enderror\n" +
                                            "                                    </div>\n" +
                                            "\n" +
                                            "                                </div>");
                                    }else{
                                        $('#is_subject_expert_phd_sub_form').remove();
                                    }
                                }
                            </script>

                            {{--OTHER UNIVERSITIES EXAMINER--}}
                            <div class="col-md-6" id="other_universities_examiner_div">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="is_other_universities_examiner_checkbox" @if(old('is_other_universities_examiner')) checked @endif onchange="handleOtherUniversitiesExaminerCheckbox(event)" value="1" name="is_other_universities_examiner">
                                    <label class="custom-control-label" for="is_other_universities_examiner_checkbox">Other Universities Examiner</label>
                                </div>


                                @if(old('is_other_universities_examiner'))
                                {{--REMOVE THIS IS is_other_universities_examiner is not checked--}}
                                <div id="is_other_universities_examiner_sub_form">

                                    <div class="form-group">
                                        <input   type="file" required name="other_universities_examiner_certificate_path"  class="form-control @error('other_universities_examiner_certificate_path') is-invalid @enderror">
                                        @error('other_universities_examiner_certificate_path')
                                        <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <div class="input-group">
                                            <textarea  required name="other_universities_examiner_details"  placeholder="Other Universities Examiner details" class="form-control @error('other_universities_examiner_details') is-invalid @enderror">{{ old('other_universities_examiner_details') }}</textarea>
                                        </div>
                                        @error('other_universities_examiner_details')
                                        <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>
                                @endif
                            </div>
                            <script>
                                function handleOtherUniversitiesExaminerCheckbox(event) {
                                    if(event.target.checked){
                                        $('#other_universities_examiner_div').append("{{--REMOVE THIS IS is_other_universities_examiner is not checked--}}\n" +
                                            "                                <div id=\"is_other_universities_examiner_sub_form\">\n" +
                                            "\n" +
                                            "                                    <div class=\"form-group\">\n" +
                                            "                                        <input   type=\"file\" required name=\"other_universities_examiner_certificate_path\"  class=\"form-control @error('other_universities_examiner_certificate_path') is-invalid @enderror\">\n" +
                                            "                                        @error('other_universities_examiner_certificate_path')\n" +
                                            "                                        <div class=\"invalid-feedback\" style=\"display: block\">{{ $message }}</div>\n" +
                                            "                                        @enderror\n" +
                                            "                                    </div>\n" +
                                            "\n" +
                                            "                                    <div class=\"form-group\">\n" +
                                            "                                        <div class=\"input-group\">\n" +
                                            "                                            <textarea  value=\"{{ old('other_universities_examiner_details') }}\" required name=\"other_universities_examiner_details\"  placeholder=\"Other Universities Examiner details\" class=\"form-control @error('other_universities_examiner_details') is-invalid @enderror\"></textarea>\n" +
                                            "                                        </div>\n" +
                                            "                                        @error('other_universities_examiner_details')\n" +
                                            "                                        <div class=\"invalid-feedback\" style=\"display: block\">{{ $message }}</div>\n" +
                                            "                                        @enderror\n" +
                                            "                                    </div>\n" +
                                            "\n" +
                                            "                                </div>");
                                    }else{
                                        $('#is_other_universities_examiner_sub_form').remove();
                                    }
                                }
                            </script>

                            {{--EXAMINATION AUDITOR--}}
                            <div class="col-md-6" id="examination_auditor_div">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="is_examination_auditor_checkbox" @if(old('is_examination_auditor')) checked @endif onchange="handleExaminationAuditorCheckbox(event)" value="1" name="is_examination_auditor">
                                    <label class="custom-control-label" for="is_examination_auditor_checkbox">Examination Auditor</label>
                                </div>


                                @if(old('is_examination_auditor'))
                                {{--REMOVE THIS IS is_examination_auditor is not checked--}}
                                <div id="is_examination_auditor_sub_form">

                                    <div class="form-group">
                                        <input   type="file" required name="examination_auditor_certificate_path"  class="form-control @error('examination_auditor_certificate_path') is-invalid @enderror">
                                        @error('examination_auditor_certificate_path')
                                        <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <div class="input-group">
                                            <textarea   required name="examination_auditor_details"  placeholder="Examination Auditor details" class="form-control @error('examination_auditor_details') is-invalid @enderror">{{ old('examination_auditor_details') }}</textarea>
                                        </div>
                                        @error('examination_auditor_details')
                                        <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>
                                @endif
                            </div>
                            <script>
                                function handleExaminationAuditorCheckbox(event) {
                                    if(event.target.checked){
                                        $('#examination_auditor_div').append("{{--REMOVE THIS IS is_examination_auditor is not checked--}}\n" +
                                            "                                <div id=\"is_examination_auditor_sub_form\">\n" +
                                            "\n" +
                                            "                                    <div class=\"form-group\">\n" +
                                            "                                        <input   type=\"file\" required name=\"examination_auditor_certificate_path\"  class=\"form-control @error('examination_auditor_certificate_path') is-invalid @enderror\">\n" +
                                            "                                        @error('examination_auditor_certificate_path')\n" +
                                            "                                        <div class=\"invalid-feedback\" style=\"display: block\">{{ $message }}</div>\n" +
                                            "                                        @enderror\n" +
                                            "                                    </div>\n" +
                                            "\n" +
                                            "                                    <div class=\"form-group\">\n" +
                                            "                                        <div class=\"input-group\">\n" +
                                            "                                            <textarea  value=\"{{ old('examination_auditor_details') }}\" required name=\"examination_auditor_details\"  placeholder=\"Examination Auditor details\" class=\"form-control @error('examination_auditor_details') is-invalid @enderror\"></textarea>\n" +
                                            "                                        </div>\n" +
                                            "                                        @error('examination_auditor_details')\n" +
                                            "                                        <div class=\"invalid-feedback\" style=\"display: block\">{{ $message }}</div>\n" +
                                            "                                        @enderror\n" +
                                            "                                    </div>\n" +
                                            "\n" +
                                            "                                </div>");
                                    }else{
                                        $('#is_examination_auditor_sub_form').remove();
                                    }
                                }
                            </script>

                            {{--SUBJECT COORDINATOR SRC--}}
                            <div class="col-md-6" id="subject_coordinator_src_div">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="is_subject_coordinator_src_checkbox" @if(old('is_subject_coordinator_src')) checked @endif onchange="handleSubjectCoordinatorSrcCheckbox(event)" value="1" name="is_subject_coordinator_src">
                                    <label class="custom-control-label" for="is_subject_coordinator_src_checkbox">Subject Coordinator Syllabus Revision Committee</label>
                                </div>


                                @if(old('is_subject_coordinator_src'))
                                {{--REMOVE THIS IS is_subject_coordinator_src is not checked--}}
                                <div id="is_subject_coordinator_src_sub_form">

                                    <div class="form-group">
                                        <input   type="file" required name="subject_coordinator_src_certificate_path"  class="form-control @error('subject_coordinator_src_certificate_path') is-invalid @enderror">
                                        @error('subject_coordinator_src_certificate_path')
                                        <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <div class="input-group">
                                            <textarea   required name="subject_coordinator_src_details"  placeholder="Subject Coordinator Syllabus Revision Committee details" class="form-control @error('subject_coordinator_src_details') is-invalid @enderror">{{ old('examination_auditor_details') }}</textarea>
                                        </div>
                                        @error('subject_coordinator_src_details')
                                        <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>
                                @endif
                            </div>
                            <script>
                                function handleSubjectCoordinatorSrcCheckbox(event) {
                                    if(event.target.checked){
                                        $('#subject_coordinator_src_div').append("{{--REMOVE THIS IS is_subject_coordinator_src is not checked--}}\n" +
                                            "                                <div id=\"is_subject_coordinator_src_sub_form\">\n" +
                                            "\n" +
                                            "                                    <div class=\"form-group\">\n" +
                                            "                                        <input   type=\"file\" required name=\"subject_coordinator_src_certificate_path\"  class=\"form-control @error('subject_coordinator_src_certificate_path') is-invalid @enderror\">\n" +
                                            "                                        @error('subject_coordinator_src_certificate_path')\n" +
                                            "                                        <div class=\"invalid-feedback\" style=\"display: block\">{{ $message }}</div>\n" +
                                            "                                        @enderror\n" +
                                            "                                    </div>\n" +
                                            "\n" +
                                            "                                    <div class=\"form-group\">\n" +
                                            "                                        <div class=\"input-group\">\n" +
                                            "                                            <textarea  value=\"{{ old('subject_coordinator_src_details') }}\" required name=\"subject_coordinator_src_details\"  placeholder=\"Subject Coordinator Syllabus Revision Committee details\" class=\"form-control @error('subject_coordinator_src_details') is-invalid @enderror\"></textarea>\n" +
                                            "                                        </div>\n" +
                                            "                                        @error('subject_coordinator_src_details')\n" +
                                            "                                        <div class=\"invalid-feedback\" style=\"display: block\">{{ $message }}</div>\n" +
                                            "                                        @enderror\n" +
                                            "                                    </div>\n" +
                                            "\n" +
                                            "                                </div>");
                                    }else{
                                        $('#is_subject_coordinator_src_sub_form').remove();
                                    }
                                }
                            </script>



                        </div>

                        <hr>

                        <div class="row">

                            {{--ISTE--}}
                            <div class="col-md-3" id="iste_div">

                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" value="1" name="is_iste" @if(old('is_iste')) checked @endif onchange="handleIsteCheckbox(event)" id="is_iste_checkbox">
                                    <label class="custom-control-label" for="is_iste_checkbox">ISTE</label>
                                </div>


                                @if(old('is_iste'))
                                    <div id="is_iste_sub_form">

                                        <div class="form-group">
                                            <div class="input-group">
                                                <input type="text"  value="{{ old('iste_membership_id') }}" required name="iste_membership_id"  placeholder="Iste Membership Id" class="form-control @error('iste_membership_id') is-invalid @enderror">
                                            </div>
                                            @error('iste_membership_id')
                                            <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                                            @enderror
                                        </div>

                                    </div>
                                @endif
                            </div>

                            <script>
                                function handleIsteCheckbox(event) {
                                    if(event.target.checked){
                                        $('#iste_div').append("<div id=\"is_iste_sub_form\">\n" +
                                            "\n" +
                                            "                                    <div class=\"form-group\">\n" +
                                            "                                        <div class=\"input-group\">\n" +
                                            "                                            <input type=\"text\"  value=\"{{ old('iste_membership_id') }}\" required name=\"iste_membership_id\"  placeholder=\"Iste Membership Id\" class=\"form-control @error('iste_membership_id') is-invalid @enderror\">\n" +
                                            "                                        </div>\n" +
                                            "                                        @error('iste_membership_id')\n" +
                                            "                                        <div class=\"invalid-feedback\" style=\"display: block\">{{ $message }}</div>\n" +
                                            "                                        @enderror\n" +
                                            "                                    </div>\n" +
                                            "\n" +
                                            "                                </div>");
                                    }else{
                                        $('#is_iste_sub_form').remove();
                                    }
                                }
                            </script>

                            {{--IEEE--}}
                            <div class="col-md-3" id="ieee_div">

                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" value="1" name="is_ieee" @if(old('is_ieee')) checked @endif onchange="handleIeeeCheckbox(event)" id="is_ieee_checkbox">
                                    <label class="custom-control-label" for="is_ieee_checkbox">IEEE</label>
                                </div>
                                @if(old('is_iee'))
                                {{--REMOVE THIS IS is_subject_coordinator_src is not checked--}}
                                <div id="is_ieee_sub_form">

                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="text"  value="{{ old('ieee_membership_id') }}" required name="ieee_membership_id"  placeholder="Ieee Membership Id" class="form-control @error('ieee_membership_id') is-invalid @enderror">
                                        </div>
                                        @error('ieee_membership_id')
                                        <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>
                                @endif
                            </div>

                            <script>
                                function handleIeeeCheckbox(event) {
                                    if(event.target.checked){
                                        $('#ieee_div').append("<div id=\"is_ieee_sub_form\">\n" +
                                            "\n" +
                                            "                                    <div class=\"form-group\">\n" +
                                            "                                        <div class=\"input-group\">\n" +
                                            "                                            <input type=\"text\"  value=\"{{ old('ieee_membership_id') }}\" required name=\"ieee_membership_id\"  placeholder=\"Ieee Membership Id\" class=\"form-control @error('ieee_membership_id') is-invalid @enderror\">\n" +
                                            "                                        </div>\n" +
                                            "                                        @error('ieee_membership_id')\n" +
                                            "                                        <div class=\"invalid-feedback\" style=\"display: block\">{{ $message }}</div>\n" +
                                            "                                        @enderror\n" +
                                            "                                    </div>\n" +
                                            "\n" +
                                            "                                </div>");
                                    }else{
                                        $('#is_ieee_sub_form').remove();
                                    }
                                }
                            </script>

                            {{--CSI--}}
                            <div class="col-md-3" id="csi_div">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" value="1" name="is_csi" @if(old('is_csi')) checked @endif onchange="handleCsiCheckbox(event)" id="is_csi_checkbox">
                                    <label class="custom-control-label" for="is_csi_checkbox">CSI</label>
                                </div>


                                @if(old('is_csi'))
                                {{--REMOVE THIS IS is_subject_coordinator_src is not checked--}}
                                <div id="is_csi_sub_form">

                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="text"  value="{{ old('csi_membership_id') }}" required name="csi_membership_id"  placeholder="Csi Membership Id" class="form-control @error('csi_membership_id') is-invalid @enderror">
                                        </div>
                                        @error('csi_membership_id')
                                        <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>
                                @endif
                            </div>

                            <script>
                                function handleCsiCheckbox(event) {
                                    if(event.target.checked){
                                        $('#csi_div').append("<div id=\"is_csi_sub_form\">\n" +
                                            "\n" +
                                            "                                    <div class=\"form-group\">\n" +
                                            "                                        <div class=\"input-group\">\n" +
                                            "                                            <input type=\"text\"  value=\"{{ old('csi_membership_id') }}\" required name=\"csi_membership_id\"  placeholder=\"Csi Membership Id\" class=\"form-control @error('csi_membership_id') is-invalid @enderror\">\n" +
                                            "                                        </div>\n" +
                                            "                                        @error('csi_membership_id')\n" +
                                            "                                        <div class=\"invalid-feedback\" style=\"display: block\">{{ $message }}</div>\n" +
                                            "                                        @enderror\n" +
                                            "                                    </div>\n" +
                                            "\n" +
                                            "                                </div>");
                                    }else{
                                        $('#is_csi_sub_form').remove();
                                    }
                                }
                            </script>


                            {{--ACM--}}
                            <div class="col-md-3" id="acm_div">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" value="1" name="is_acm" @if(old('is_acm')) checked @endif onchange="handleAcmCheckbox(event)" id="is_acm_checkbox">
                                    <label class="custom-control-label" for="is_acm_checkbox">ACM</label>
                                </div>


                                @if(old('is_acm'))
                                {{--REMOVE THIS IS is_subject_coordinator_src is not checked--}}
                                <div id="is_acm_sub_form">

                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="text"  value="{{ old('acm_membership_id') }}" required name="acm_membership_id"  placeholder="Acm Membership Id" class="form-control @error('acm_membership_id') is-invalid @enderror">
                                        </div>
                                        @error('acm_membership_id')
                                        <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>
                                @endif
                            </div>

                            <script>
                                function handleAcmCheckbox(event) {
                                    if(event.target.checked){
                                        $('#acm_div').append("<div id=\"is_acm_sub_form\">\n" +
                                            "\n" +
                                            "                                    <div class=\"form-group\">\n" +
                                            "                                        <div class=\"input-group\">\n" +
                                            "                                            <input type=\"text\"  value=\"{{ old('acm_membership_id') }}\" required name=\"acm_membership_id\"  placeholder=\"Acm Membership Id\" class=\"form-control @error('acm_membership_id') is-invalid @enderror\">\n" +
                                            "                                        </div>\n" +
                                            "                                        @error('acm_membership_id')\n" +
                                            "                                        <div class=\"invalid-feedback\" style=\"display: block\">{{ $message }}</div>\n" +
                                            "                                        @enderror\n" +
                                            "                                    </div>\n" +
                                            "\n" +
                                            "                                </div>");
                                    }else{
                                        $('#is_acm_sub_form').remove();
                                    }
                                }
                            </script>

                        </div>


                        <button class="btn btn-primary" type="submit">Fill Details</button>


                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section ('custom-script')
    <script src="{{ asset('assets/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>

    @if(session()->has('type'))
        <script>
            $.notify({
                // options
                title: '<h4 style="color:white">{{ session('title') }}</h4>',
                message: '{{ session('message') }}',
            },{
                // settings
                type: '{{ session('type') }}',
                allow_dismiss: true,
                placement: {
                    from: "top",
                    align: "right"
                },
                offset: 20,
                spacing: 10,
                z_index: 1031,
                delay: 3000,
                timer: 1000,
                animate: {
                    enter: 'animated fadeInDown',
                    exit: 'animated fadeOutUp'
                }
            });
        </script>
    @endif
@endsection
