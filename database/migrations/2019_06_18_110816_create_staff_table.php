<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStaffTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('staff', function(Blueprint $table)
		{
			$table->increments('id');

			$table->boolean('is_permanent')->default(0);
			$table->boolean('is_teaching')->default(0);
			$table->string('pan');
			$table->integer('employee_id');
			$table->date('date_of_joining_institute');

			$table->boolean('is_bos_chairman')->default(0);
			$table->text('bos_chairman_details');
			$table->text('bos_chairman_certificate_path');

			$table->boolean('is_bos_member')->default(0);
			$table->text('bos_member_details');
            $table->text('bos_member_certificate_path');

			$table->boolean('is_industry_experience')->default(0);
			$table->integer('industry_experience_years');
			$table->text('industry_experience_details');
            $table->text('industry_experience_certificate_path');

			$table->boolean('is_subject_chairman')->default(0);
			$table->text('subject_chairman_details');
            $table->text('subject_chairman_certificate_path');

			$table->boolean('is_subject_expert')->default(0);
			$table->text('subject_expert_details');
			$table->text('subject_certificate_path');

			$table->integer('is_staff_selection_committee_member');
			$table->text('staff_selection_committee_details');
			$table->text('staff_selection_committee_certificate_path');

			$table->boolean('is_department_advisory_board')->default(0);
			$table->text('department_advisory_board_details');
			$table->text('department_advisory_board_certificate_path');

			$table->boolean('is_academic_audit')->default(0);
			$table->text('academic_audit_details');
            $table->text('academic_audit_certificate_path');

			$table->boolean('is_subject_expert_phd')->default(0);
			$table->text('subject_expert_phd_details');
            $table->text('subject_expert_phd_certificate_path');

			$table->boolean('is_other_universities_examiner')->default(0);
			$table->text('other_universities_examiner_details');
            $table->text('other_universities_examiner_certificate_path');

			$table->boolean('is_examination_auditor')->default(0);
			$table->text('examination_auditor_details');
			$table->text('examination_auditor_certificate_path');

			$table->boolean('is_subject_coordinator_src')->default(0);
			$table->text('subject_coordinator_src_details');
			$table->text('subject_coordinator_src_certificate_path');

			$table->boolean('is_iste')->default(0);
			$table->text('iste_membership_id');
			$table->text('iste_certificate_path');

			$table->boolean('is_csi')->default(0);
			$table->text('csi_membership_id');
			$table->text('csi_certificate_path');

			$table->boolean('is_ieee')->default(0);
			$table->text('ieee_membership_id');
			$table->text('ieee_certificate_path');

			$table->boolean('is_acm')->default(0);
			$table->text('acm_membership_id');
			$table->text('acm_certificate_path');

			$table->integer('is_fully_registered');

            $table->text('additional_columns');

            $table->integer('created_by');
            $table->integer('updated_by')->nullable();
            $table->softDeletes();
            $table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('staff');
	}

}
