@extends('layouts.base')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="/home"><i class="fas fa-user"></i></a></li>
    <li class="breadcrumb-item"><a href="/staff">Staff</a></li>
    <li class="breadcrumb-item active" aria-current="page">Edit Staff</li>
@endsection

@section('page-content')
    <div class="row">
        <div class="col">
            <div class="card">
                <!-- Card header -->
                <div class="card-header">
                    <h3 class="mb-0">Details</h3>
                </div>
                <!-- Card body -->
                <div class="card-body">
                    <form method="post" action="/staff/complete-registration">
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
                                    <input type="date" value="{{ old('date_of_birth') }}" required name="date_of_birth" type="date" placeholder="Date of Birth"  class="form-control @error('date_of_birth') is-invalid @enderror">
                                    @error('date_of_birth')
                                    <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- TODO REPLACE WITH<div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                    </div>
                                    <input class="form-control datepicker" placeholder="Select date" type="text" value="06/20/2019">
                                </div>
                            </div>--}}


                            <div class="col-md-4">
                                <div class="form-group">
                                    <select name="gender" id="" class="form-control @error('gender') is-invalid @enderror">
                                        <option value="M">Male</option>
                                        <option value="F">Female</option>
                                        <option value="O">Other</option>
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
                                        <div class="input-group-prepend"> <span class="input-group-text"> <i class="fa fa-key"></i> </span> </div> <input required name="password_confirmation" type="password" placeholder="Confirm Password" class="form-control">
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
                                    <input type="date" value="{{ old('date_of_joining_institue') }}" required name="date_of_joining_institue" type="date" placeholder="Date of Birth"  class="form-control @error('date_of_joining_institue') is-invalid @enderror">
                                    @error('date_of_joining_institue')
                                    <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <input  value="{{ old('employee_id') }}" required name="employee_id" type="number" placeholder="Employee Id"  class="form-control @error('employee_id') is-invalid @enderror">
                                    @error('employee_id')
                                    <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            
                            <div class="col-md-4">
                                <div class="col-md-6">
                                    <input type="checkbox" value="1">Teaching
                                </div>
                                <div class="col-md-6">
                                    <input type="checkbox" value="1">Permanent
                                </div>
                            </div>

                        </div>

                        <hr>

                        <div class="row">

                            {{--BOS CHAIRMAN--}}
                            <div class="col-md-6">
                                <label for="">BOS Chairman</label> <input type="checkbox" value="1" name="is_bos_chairman">

                                {{--REMOVE THIS IS is_bos_chairman is not checked--}}
                                <div id="is_bos_chairman_sub_form">

                                    <div class="form-group">
                                        <input   type="file" required name="bos_chairman_certificate_path"  class="form-control @error('is_bos_chairman_certificate_path') is-invalid @enderror">
                                        @error('is_bos_chairman_certificate_path')
                                        <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <div class="input-group">
                                            <textarea  value="{{ old('bos_chairman_details') }}" required name="bos_chairman_details"  placeholder="BOS Chairman details" class="form-control @error('bos_chairman_details') is-invalid @enderror"></textarea>
                                        </div>
                                        @error('bos_chairman_details')
                                        <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>
                            </div>

                            {{--BOS MEMBER--}}
                            <div class="col-md-6">
                                <label for="">BOS Member</label> <input type="checkbox" value="1" name="is_bos_member">

                                {{--REMOVE THIS IS is_bos_member is not checked--}}
                                <div id="is_bos_member_sub_form">

                                    <div class="form-group">
                                        <input   type="file" required name="bos_member_certificate_path"  class="form-control @error('is_bos_member_certificate_path') is-invalid @enderror">
                                        @error('is_bos_member_certificate_path')
                                        <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <div class="input-group">
                                            <textarea  value="{{ old('bos_member_details') }}" required name="bos_member_details"  placeholder="BOS Member details" class="form-control @error('bos_member_details') is-invalid @enderror"></textarea>
                                        </div>
                                        @error('bos_member_details')
                                        <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>
                            </div>

                            {{--INDUSTRY EXPERIENCE--}}
                            <div class="col-md-6">
                                <label for="">Industry Experience</label> <input type="checkbox" value="1" name="is_industry_experience">

                                {{--REMOVE THIS IS is_industry_experience is not checked--}}
                                <div id="is_industry_experience_sub_form">

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
                                            <textarea  value="{{ old('industry_experience_details') }}" required name="industry_experience_details"  placeholder="BOS Member details" class="form-control @error('industry_experience_details') is-invalid @enderror"></textarea>
                                        </div>
                                        @error('industry_experience_details')
                                        <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>
                            </div>

                            {{--SUBJECT CHAIRMAN--}}
                            <div class="col-md-6">
                                <label for="">Subject Chairman</label> <input type="checkbox" value="1" name="is_subject_chairman">

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
                                            <textarea  value="{{ old('subject_chairman_details') }}" required name="subject_chairman_details"  placeholder="BOS Member details" class="form-control @error('subject_chairman_details') is-invalid @enderror"></textarea>
                                        </div>
                                        @error('subject_chairman_details')
                                        <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>
                            </div>

                            {{--SUBJECT EXPERT--}}
                            <div class="col-md-6">
                                <label for="">Subject Expert</label> <input type="checkbox" value="1" name="is_subject_expert">

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
                                            <textarea  value="{{ old('subject_expert_details') }}" required name="subject_expert_details"  placeholder="BOS Member details" class="form-control @error('subject_expert_details') is-invalid @enderror"></textarea>
                                        </div>
                                        @error('subject_expert_details')
                                        <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>
                            </div>

                            {{--STAFF SELECTION COMITTEE--}}
                            <div class="col-md-6">
                                <label for="">Staff Selection Committee</label> <input type="checkbox" value="1" name="is_staff_selection_committee">

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
                                            <textarea  value="{{ old('staff_selection_committee_details') }}" required name="staff_selection_committee_details"  placeholder="BOS Member details" class="form-control @error('staff_selection_committee_details') is-invalid @enderror"></textarea>
                                        </div>
                                        @error('staff_selection_committee_details')
                                        <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>
                            </div>

                            {{--DEPARTMENT ADVISORY BOARD--}}
                            <div class="col-md-6">
                                <label for="">Department Advisory Board</label> <input type="checkbox" value="1" name="is_department_advisory_board">

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
                                            <textarea  value="{{ old('department_advisory_board_details') }}" required name="department_advisory_board_details"  placeholder="BOS Member details" class="form-control @error('department_advisory_board_details') is-invalid @enderror"></textarea>
                                        </div>
                                        @error('department_advisory_board_details')
                                        <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>
                            </div>

                            {{--Academic Auditor--}}
                            <div class="col-md-6">
                                <label for="">Academic Auditor</label> <input type="checkbox" value="1" name="is_academic_audit">

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
                                            <textarea  value="{{ old('academic_audit_details') }}" required name="academic_audit_details"  placeholder="BOS Member details" class="form-control @error('academic_audit_details') is-invalid @enderror"></textarea>
                                        </div>
                                        @error('academic_audit_details')
                                        <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>
                            </div>

                            {{--SUBJECT EXPERT PHD--}}
                            <div class="col-md-6">
                                <label for="">Subject Expert PHD</label> <input type="checkbox" value="1" name="is_subject_expert_phd">

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
                                            <textarea  value="{{ old('subject_expert_phd_details') }}" required name="subject_expert_phd_details"  placeholder="BOS Member details" class="form-control @error('subject_expert_phd_details') is-invalid @enderror"></textarea>
                                        </div>
                                        @error('subject_expert_phd_details')
                                        <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>
                            </div>

                            {{--OTHER UNIVERSITIES EXAMINER--}}
                            <div class="col-md-6">
                                <label for="">Other Universities Examination </label> <input type="checkbox" value="1" name="is_other_universities_examiner">

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
                                            <textarea  value="{{ old('other_universities_examiner_details') }}" required name="other_universities_examiner_details"  placeholder="BOS Member details" class="form-control @error('other_universities_examiner_details') is-invalid @enderror"></textarea>
                                        </div>
                                        @error('other_universities_examiner_details')
                                        <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>
                            </div>

                            {{--EXAMINATION AUDITOR--}}
                            <div class="col-md-6">
                                <label for="">Examination Auditor</label> <input type="checkbox" value="1" name="is_examination_auditor">

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
                                            <textarea  value="{{ old('examination_auditor_details') }}" required name="examination_auditor_details"  placeholder="BOS Member details" class="form-control @error('examination_auditor_details') is-invalid @enderror"></textarea>
                                        </div>
                                        @error('examination_auditor_details')
                                        <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>
                            </div>

                            {{--SUBJECT COORDINATOR SRC--}}
                            <div class="col-md-6">
                                <label for="">Subject Coordinator Syllabus Revision Committee</label> <input type="checkbox" value="1" name="is_subject_coordinator_src">

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
                                            <textarea  value="{{ old('subject_coordinator_src_details') }}" required name="subject_coordinator_src_details"  placeholder="BOS Member details" class="form-control @error('subject_coordinator_src_details') is-invalid @enderror"></textarea>
                                        </div>
                                        @error('subject_coordinator_src_details')
                                        <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>
                            </div>



                        </div>

                        <hr>

                        <div class="row">

                        {{--ISTE--}}
                        <div class="col-md-3">
                            <label for="">ISTE</label> <input type="checkbox" value="1" name="is_iste">

                            {{--REMOVE THIS IS is_subject_coordinator_src is not checked--}}
                            <div id="is_iste_sub_form">

                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text"  value="{{ old('iste_membership_id') }}" required name="iste_membership_id"  placeholder="BOS Member details" class="form-control @error('iste_membership_id') is-invalid @enderror">
                                    </div>
                                    @error('iste_membership_id')
                                    <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>
                        </div>

                        {{--IEEE--}}
                        <div class="col-md-3">
                            <label for="">IEEE</label> <input type="checkbox" value="1" name="is_ieee">

                            {{--REMOVE THIS IS is_subject_coordinator_src is not checked--}}
                            <div id="is_ieee_sub_form">

                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text"  value="{{ old('ieee_membership_id') }}" required name="ieee_membership_id"  placeholder="BOS Member details" class="form-control @error('ieee_membership_id') is-invalid @enderror">
                                    </div>
                                    @error('ieee_membership_id')
                                    <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>
                        </div>

                        {{--CSI--}}
                        <div class="col-md-3">
                            <label for="">CSI</label> <input type="checkbox" value="1" name="is_csi">

                            {{--REMOVE THIS IS is_subject_coordinator_src is not checked--}}
                            <div id="is_csi_sub_form">

                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text"  value="{{ old('csi_membership_id') }}" required name="csi_membership_id"  placeholder="BOS Member details" class="form-control @error('csi_membership_id') is-invalid @enderror">
                                    </div>
                                    @error('csi_membership_id')
                                    <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>
                        </div>


                        {{--ACM--}}
                        <div class="col-md-3">
                            <label for="">ACM</label> <input type="checkbox" value="1" name="is_acm">

                            {{--REMOVE THIS IS is_subject_coordinator_src is not checked--}}
                            <div id="is_acm_sub_form">

                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text"  value="{{ old('acm_membership_id') }}" required name="acm_membership_id"  placeholder="BOS Member details" class="form-control @error('acm_membership_id') is-invalid @enderror">
                                    </div>
                                    @error('acm_membership_id')
                                    <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>
                        </div>

                        </div>


                        <button class="btn btn-primary" type="submit">Fill Details</button>


                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section ('custom-script')

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
